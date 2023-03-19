/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./**/*.js", "./**/*.html"],
  theme: {
    extend: {
      colors:{
        "primary": "#f8fafc",
        "secondary" : "#f43f5e",
        "tertiary" : "#10b981",
        "dark-tertiary": "#064e3b"
      }
    },
  },
  plugins: [require('prettier-plugin-tailwindcss')],
};
