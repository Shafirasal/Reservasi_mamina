/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.php",
    "./public/**/*.js",
    './views/**/*.php',
  
  ],

  theme: {
    extend: {
      fontFamily:{
        sans:['Poppins', 'sans-serif'],
      }
    },
  },
  plugins: [],
  safelist: [
    'text-[#555555]',
    'bg[#FEF8F8]'
  ],
}

