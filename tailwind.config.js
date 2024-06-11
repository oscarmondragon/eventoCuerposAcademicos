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
    safelist: [{
        pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
        variants: ["sm", "md", "lg", "xl", "2xl"],
    }, ],

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
                rojo: "#e02424",
                blanco: "#F1F2F2",
                trasnparente: "rgb(255, 255, 255, .3)",
                'amarillo': {
                    '50': '#faf7ec',
                    '100': '#f4eacd',
                    '200': '#ead49e',
                    '300': '#d9ac52',
                    '400': '#d29a3d',
                    '500': '#c3852f',
                    '600': '#a86726',
                    '700': '#864c22',
                    '800': '#703f23',
                    '900': '#613522',
                    '950': '#381a10',
                },
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
