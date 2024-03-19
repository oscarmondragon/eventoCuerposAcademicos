import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                verde: "#62836C",
                dorado: "#9D9361",
                textos: "#4D4D4D",
                color_primary: "#3B5A60",
                color_secundary: "#D9AC52",
                rojo: "#E86562",
                blanco: "#F1F2F2",
                trasnparente: "rgb(255, 255, 255, .3)",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
