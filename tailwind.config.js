/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./**/*.js", "./**/*.html"],
  theme: {
    extend: {
      colors: {
        primary: "#f8fafc",
        secondary: "#f43f5e",
      },
      zIndex: {
        100: "100",
      },
    },
  },
plugins: []
};
