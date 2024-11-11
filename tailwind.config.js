/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/css/tailwind.css',
    './resources/**/*.sass',
  ],
    theme: {
    extend: {},
    screens: {
      'mobile': '640px',       // Cho thiết bị di động
      'tablet': '768px',       // Cho máy tính bảng
      'laptop': '1024px',     // Cho màn hình máy tính nhỏ
      'desktop': '1280px',    // Màn hình máy tính lớn
      '2.5k': '1440px',        // Cho độ phân giải 2.5K (WQHD)
    },
  },
  plugins: [],
}
