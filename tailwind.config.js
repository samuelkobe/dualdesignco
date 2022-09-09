module.exports = {
  content: ["./**/*.php", "./**/*.css",],
  theme: {
    extend: {
      colors: {
        brand: {
          main: '#D9D4C8',
          alt: '#C8C9C4',
          third: '#A5A281',
          fourth: '#894837',
          black: '#2D333A',
        }
      },
      flexShrink: {
        '4': 4
      },
      fontFamily: {
        sans: ["neue-haas-grotesk-text", "sans-serif"],
        title: ["Grand Slang", "san-serif"],
        handwriting: ["The Impressionist", "sans-serif"],
        button: ["Miso", "sans-serif"],
      },
      minWidth: {
        '1/2': '50%',
        '1/3': '33.3334%',
      },
      minHeight: {
        '0': '0',
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%',
        'full': '100%',
      },
      spacing: {
        '1/2': '50%',
        '1/3': '33.3334%',
        '1/4': '25%',
        '1/6': '16.6667%',
        '1/8': '12.5%',
        '1/12': '8.3333%',
        '1/24': '4.1667%',
        'video': '56.6667%',
      },
      transitionDuration: {
        '0': '0ms',
      },
      transitionDelay: {
        '0': '0ms',
      },
      transitionProperty: {
        'height': 'height',
        'transform-height': 'transform, height',
      },
      width: {
        '3/8': '37.5%',
        '5/8': '62.5%',
      },
      zIndex: {
        '1': '1',
      },
    },
  },
  plugins: [
    
  ],
};
