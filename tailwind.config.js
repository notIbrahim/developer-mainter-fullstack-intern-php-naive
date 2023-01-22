/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{php, html, js}",
    "./public/*.{php, html, js}",
    "./app/*.{php, html, js}",
    "./app/**/*.{php, html, js}",
    "./app/**/**/*.{php, html, js}",
    "./app/**/**/**/*.{php, html, js}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
