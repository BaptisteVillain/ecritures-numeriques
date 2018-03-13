const APP_SRC    = 'src/';
const APP_DEST   = 'public/';
const APP_ASSETS = 'public/';

module.exports = {
  bsServer: {
    server: {
      baseDir: './../..'
    },
    port: '7777',
    open: 'local'
  },

  fonts: {
    watchSrc: `${APP_SRC}fonts`,
    src: `${APP_SRC}fonts/**`,
    dest: `${APP_DEST}fonts`
  },

  favicons: {
    watchSrc: `${APP_SRC}favicons`,
    src: `${APP_SRC}favicons/**`,
    dest: `${APP_DEST}favicons`
  },

  images: {
    watchSrc: `${APP_SRC}img/**`,
    src: `${APP_SRC}img/**`,
    dest: `${APP_ASSETS}img`,
    opts: {
      gifsicle: { interlaced: true },
      jpegtran: { progressive: true },
      optipng: { optimizationLevel: 5 },
      svgo: {
        plugins: [{ removeViewBox: true }, { cleanupIDs: false }]
      }
    }
  },

  scripts: {
    watchSrc: `${APP_SRC}js/**/*.js`,
    src: `${APP_SRC}js/main.js`,
    vendorSrc: APP_SRC + '/assets/scripts/vendors/*.js',
    dest: `${APP_ASSETS}js`
  },

  styles: {
    watchSrc: `${APP_SRC}scss/**/*.scss`,
    src: `${APP_SRC}scss/main.scss`,
    dest: `${APP_ASSETS}css`,
    autoprefixerOpts: {
      browsers: ['last 2 versions', 'ie >= 10']
    }
  }
};
