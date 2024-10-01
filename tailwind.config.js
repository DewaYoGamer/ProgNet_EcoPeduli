/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Montserrat', 'sans-serif'],
            ComicLemon: ['ComicLemon', 'sans-serif'],
        },
        colors: {
            primary: '#50623A',
            secondary: colors.lime[300],
            third: '#789461',
            fourth: '#DBE7C9',
        },
    },
  },
  plugins: [],
}

