/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './.{html,js,php}',
  ],
  theme: {
    extend: {
      // colors: {
      //   clifford: "#da373d",
      // },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};
