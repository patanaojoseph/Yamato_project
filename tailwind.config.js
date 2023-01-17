/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                nunito: ["nunito", "sans-serif"],
            },
        },
        fontFamily: {
            nunito: ["nunito", "sans-serif"],
            MyFont: ['"My Font"', "serif"], // Ensure fonts with spaces have " " surrounding it.
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
