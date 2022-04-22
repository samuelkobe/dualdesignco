module.exports = {
  content: ["./**/*.php", "./**/*.css",],
  theme: {
    extend: {
      colors: {
        brand: {
          main: '#967553',
          alt: '#E2E2CE',
          black: '#231F20',
        }
      },
      minHeight: {
        '0': '0',
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%',
        'full': '100%',
      },
      transitionDuration: {
        '0': '0ms',
      },
    },
  },
  plugins: [
    
  ],
};
