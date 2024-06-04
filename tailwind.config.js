import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                "whiteish": "#FCFDFD",
                "off-white": "#F0EFF8",
                "blackish": "#060414",
                "dark-blue": "#1C1364",
                "brown-1": "#504747",
                "brown-2": "#4B4A52",
                "light-orange": "#EE845C",
                "light-green": "#379B59",
                "light-gray": "#EEE4E0",
                "dark-gray": "#737677",
                "light-purple": "#686298",
                "profile-header": "#34333A",
                "forgot-password": "#A79EBA",
            },
            fontFamily: {
                "poppins": ["Poppins", "sans-serif"],
                "ibm": ["IBM Plex Sans", "sans-serif"],
            },
        },
    },

    plugins: [forms],
};
