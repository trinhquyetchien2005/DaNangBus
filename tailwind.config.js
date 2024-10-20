/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/css/tailwind.css', // Thêm tệp CSS của bạn
  ],
    theme: {
    extend: {},
  },
  plugins: [],
}
