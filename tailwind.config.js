import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors.js';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        // fontFamily: {
        //     primary: "Playfair Display",
        //     body: "work Sans"
        // },
        container: {
            DEFAULT: "1rem",
            lg:"3rem"
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                "dark-primary": "#050402",
                "dark-secondary": "#1C1D24",
                "dark-navy-100": "#07567D",
                "dark-navy-500": "#292042",
                accent:{
                    DEFAULT: "#ac6b34",
                    hover: "#925a2b"
                },
                paragraph: "#878e99",
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red
                },
        },
    },
    plugins: [forms],
};
