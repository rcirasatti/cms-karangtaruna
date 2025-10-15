/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#134686",
                secondary: "#EBCB90",
                accent: "#FFF0CE",
                color_bg: "#F3F2EC", 
            },
            fontFamily: {
                montserrat: ["Montserrat", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
