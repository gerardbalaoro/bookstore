let palette = require('./resources/js/palette.js');

module.exports = {
  theme: {
    extend: {
      spacing: {
        '72': '18rem',
        '80': '20rem',
        '84': '21rem',
        '96': '24rem',
      },
      maxWidth: {
        '40': '10rem',
        '72': '18rem',
        '80': '20rem',
        '84': '21rem',
        '96': '24rem',
      },
      width: {
        'fit': 'fit-content',
      },
      height: {
        'fit': 'fit-content',
      },
      colors: {
        'amazon': palette('FF9900', {
          'only': [500, 600]
        }),
        'barnesnoble': palette('59A364', {
          'only': [500, 600]
        }),
        'bookfusion': palette('00A5E3', {
          'only': [500, 600]
        }),
        'google': palette('039BE5', {
          'only': [500, 600]
        }),
        'mobi-asin': palette('ECC846', {
          'only': [500, 600]
        })
      }
    },
    borderWidth: {
      default: '1px',
      '0': '0',
      '2': '2px',
      '3': '3px',
      '4': '4px',
      '6': '6px',
      '8': '8px',
    },
  },
  variants: {},
  plugins: []
}
