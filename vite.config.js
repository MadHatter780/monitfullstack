import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "0.0.0.0", // Atau gunakan IP lokal Anda seperti '192.168.1.100'
        port: 3000, // Ganti dengan port yang sesuai jika perlu
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/lol.js", // Pastikan lol.js ada di sini
            ],
            refresh: true,
        }),
    ],
});
