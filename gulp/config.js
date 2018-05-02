const APP_SRC = './assets/src/';
const APP_DEST = './assets/public/';
const APP_ASSETS = './assets/public/';

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
  },

  templates: {
    watchSrc: './views/',
    text_domain: 'ecritures-numeriques', // Replace with your domain
    twig_files: 'views/**/*.twig', // Twig Files
    php_files: '**/*.php', // PHP Files
    cacheFolder: 'views/cache/**', // Cache Folder
    destFolder: 'languages', // Folder where .pot file will be saved
    keepCache: false // Delete cache files after script finishes
  }
};
