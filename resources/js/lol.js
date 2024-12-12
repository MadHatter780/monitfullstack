import mqtt from "mqtt";

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

        temp: "...",
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
            // Setup MQTT client
            this.client = mqtt.connect("ws://192.168.1.98:8083/mqtt");

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
                        this.p_t = power.T;

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
                    console.log("as");
                } catch (e) {
                    console.error("Error parsing MQTT message:", e);
                }
            });
        },

        destroy() {
            if (this.client) {
                this.client.end();
                console.log("MQTT client disconnected");
            }
        },

        updateTable(msg) {
            const newVoltEntry = {
                v_ab: msg.data.Voltage.A_B,
                v_bc: msg.data.Voltage.B_C,
                v_ca: msg.data.Voltage.C_A,
                v_an: msg.data.Voltage.A_N,
                v_bn: msg.data.Voltage.B_N,
                v_cn: msg.data.Voltage.C_N,
                time: this.formatTimestamp,
            };

            this.historyVoltage.unshift(newVoltEntry); // Add to the beginning of the array
            if (this.historyVoltage.length > this.maxHistory) {
                this.historyVoltage.pop(); // Remove the oldest entry
            }
            // console.log(this.historyVoltage);
        },

        updateTableC(msg) {
            const newCurrentEntry = {
                c_a: msg.data.Current.A,
                c_b: msg.data.Current.B,
                c_c: msg.data.Current.C,
            };

            this.historyCurrent.unshift(newCurrentEntry); // Add to the beginning of the array
            if (this.historyCurrent.length > this.maxHistoryC) {
                this.historyCurrent.pop(); // Remove the oldest entry
            }
            console.log(this.historyCurrent);
        },

        formatTimestamp() {
            const date = new Date();

            const daysOfWeek = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
            ];
            const months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ];

            const dayOfWeek = daysOfWeek[date.getDay()];
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            const hours = String(date.getHours()).padStart(2, "0");
            const minutes = String(date.getMinutes()).padStart(2, "0");
            const seconds = String(date.getSeconds()).padStart(2, "0");

            return `${dayOfWeek}, ${month} ${day}, ${year} ${hours}:${minutes}:${seconds}`;
        },

        updateTableP(msg) {
            const newPowerEntry = {
                p_a: msg.data.Power.A,
                p_b: msg.data.Power.B,
                p_c: msg.data.Power.C,
                p_t: msg.data.Power.T,
            };

            this.historyPower.unshift(newPowerEntry); // Add to the beginning of the array
            if (this.historyPower.length > this.maxHistoryP) {
                this.historyPower.pop(); // Remove the oldest entry
            }
            console.log(`hEY ${this.historyPower}`);
        },
    }));
});
