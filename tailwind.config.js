/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./**/*.js", "./**/*.html"],
  theme: {
    extend: {
      colors:{
        "primary": "#f8fafc",
        "secondary" : "#f43f5e",
      }
    },
  },
  plugins: [require('prettier-plugin-tailwindcss')],
};
