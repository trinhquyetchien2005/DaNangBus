/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/css/tailwind.css',
    './resources/**/*.sass',
    './resources/**/*.jsx',
    './resources/**/*.ts',
    './resources/**/*.tsx',
  ],
    theme: {
    extend: {},
    screens: {
      'mobile': '640px',       
      'tablet': '768px',       
      'laptop': '1024px',     
      'desktop': '1280px',    
      '2.5k': '1440px',        
    },
  },
  plugins: [require('tailwindcss-motion')],
}
