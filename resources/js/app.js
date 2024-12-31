import "./bootstrap";
import mqtt from "mqtt";
import ApexCharts from "apexcharts";
document.addEventListener("alpine:init", () => {
    Alpine.data("mqttHandler", () => ({
        p_a: "...",
        p_b: "...",
        p_c: "...",
        p_t: "...",

        c_a: "...",
        c_b: "...",
        c_c: "...",

        v_ab: "...",
        v_bc: "...",
        v_ca: "...",

        v_an: "...",
        v_bn: "...",
        v_cn: "...",

        prev: "asasa",
        increase: "",

        mac: "...",
        historyVoltage: [],
        maxHistory: 8,

        historyCurrent: [],
        maxHistoryC: 10,

        historyPower: [],
        maxHistoryP: 10,

        client: null,
        chart: null,
        data: [],
        XAXISRANGE: 90000, // 90 seconds range
        lastDate: new Date().getTime(),

        init() {
            this.initChart(); // Initialize chart
            // Setup MQTT client
            this.client = mqtt.connect("wss://broker.emqx.io:8084/mqtt");
            this.client.on("connect", () => {
                console.log("Connected to MQTT broker");
                this.client.subscribe("spBv1.0/power_meter", (err) => {
                    if (!err) {
                        console.log("Subscribed to topic!");
                    }
                });
            });

            this.client.on("message", (topic, message) => {
                try {
                    const msg = JSON.parse(message.toString());
                    if (msg.data) {
                        let power = msg.data.Power || 0;
                        this.p_a = power.A;
                        this.p_b = power.B;
                        this.p_c = power.C;
                        this.p_t = (power.T / 10 ** 6).toFixed(2);

                        let current = msg.data.Current || 0;
                        this.c_a = current.A;
                        this.c_b = current.B;
                        this.c_c = current.C;

                        let volt = msg.data.Voltage || 0;
                        this.v_ab = volt.A_B;
                        this.v_bc = volt.B_C;
                        this.v_ca = volt.C_A;
                        this.v_an = volt.A_N;
                        this.v_bn = volt.B_N;
                        this.v_cn = volt.C_N;
                        this.mac = msg.mac;
                        this.temp = msg.temp_system;
                    }
                    this.updateTable(msg);
                    this.updateTableC(msg);
                    this.updateTableP(msg);
                    this.formatTimestamp(msg.timestamp);

                    // Update the chart data when new data is received
                    this.updateChart();
                } catch (e) {
                    console.error("Error parsing MQTT message:", e);
                }
            });
        },

        // Initialize the bar chart using ApexCharts
        initChart() {
            if (!this.chart) {
                const categories = ["R", "S", "T"]; // Label baru
                const series = [
                    {
                        name: "Random Data",
                        data: [10, 20, 30], // Initial random data
                    },
                ];
                const chartElement = this.$refs.chartContainer;

                this.chart = new ApexCharts(chartElement, {
                    chart: {
                        type: "bar",
                        height: 400,
                        width: "100%",
                    },
                    series: series,
                    colors: ["#ff5733"],
                    xaxis: {
                        categories: categories, // Pindahkan categories ke xaxis
                        title: {
                            text: "Current (A)",
                            style: {
                                fontSize: "20px",
                                color: "#fff",
                            },
                        },
                        labels: {
                            style: {
                                colors: "#fff",
                            },
                        },
                    },
                    yaxis: {
                        title: {
                            text: "Phase",
                            style: {
                                fontSize: "20px",
                                color: "#fff",
                            },
                        },
                        labels: {
                            style: {
                                colors: "#fff",
                            },
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            dataLabels: {
                                position: "top",
                            },
                        },
                    },
                    dataLabels: {
                        enabled: true,
                        offsetX: 30,
                        offsetY: 0,
                        style: {
                            colors: ["#fff"],
                            fontSize: "24px",
                            fontWeight: "bold",
                        },
                    },
                });

                this.chart.render();
            }
        },

        // Update chart data
        updateChart() {
            if (this.chart) {
                // Example of updating the chart data dynamically from the new MQTT data
                const updatedData = [this.c_a, this.c_b, this.c_c]; // Use your actual data here
                this.chart.updateSeries([
                    {
                        name: "Value",
                        data: updatedData,
                    },
                ]);
            }
        },

        formatTimestamp() {
            const date = new Date();
            const hours = String(date.getHours()).padStart(2, "0"); // Mengubah jam menjadi dua digit
            const minutes = String(date.getMinutes()).padStart(2, "0"); // Mengubah menit menjadi dua digit
            const seconds = String(date.getSeconds()).padStart(2, "0"); // Mengubah detik menjadi dua digit
            return `${hours}:${minutes}:${seconds}`; // Menggabungkan jam, menit, dan detik dalam format HH:mm:ss
        },

        updateTable(msg) {
            const newVoltEntry = {
                v_ab: msg.data.Voltage.A_B,
                v_bc: msg.data.Voltage.B_C,
                v_ca: msg.data.Voltage.C_A,
                v_an: msg.data.Voltage.A_N,
                v_bn: msg.data.Voltage.B_N,
                v_cn: msg.data.Voltage.C_N,
                time: this.formatTimestamp(),
            };

            this.historyVoltage.unshift(newVoltEntry);
            if (this.historyVoltage.length > this.maxHistory) {
                this.historyVoltage.pop();
            }
        },

        updateTableC(msg) {
            const newCurrentEntry = {
                c_a: msg.data.Current.A,
                c_b: msg.data.Current.B,
                c_c: msg.data.Current.C,
                time: this.formatTimestamp(),
            };

            this.historyCurrent.unshift(newCurrentEntry);
            if (this.historyCurrent.length > this.maxHistoryC) {
                this.historyCurrent.pop();
            }
        },

        updateTableP(msg) {
            const newPowerEntry = {
                p_a: msg.data.Power.A,
                p_b: msg.data.Power.B,
                p_c: msg.data.Power.C,
                p_t: msg.data.Power.T.toLocaleString("id-ID"),
                time: this.formatTimestamp(),
            };

            this.historyPower.unshift(newPowerEntry);
            if (this.historyPower.length > this.maxHistoryP) {
                this.historyPower.pop();
            }
        },

        destroy() {
            if (this.client) {
                this.client.end();
                console.log("MQTT client disconnected");
            }
        },
    }));
});
