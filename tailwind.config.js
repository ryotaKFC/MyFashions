/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",  // ← これ重要
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // 黒　背景とかベースに
        base: '#122753',
        // 黄　決定とか肯定
        primary: '#000000', 
        // 赤　キャンセルとか否定
        danger: '#e60013',
        // 警告とかエラー系
        // warning: '',
      },
    },
  },
  plugins: [],
}

