/* eslint-disable */
import gulp        from 'gulp'
import browserSync from 'browser-sync'
import server      from './server'

import {
  fonts,
  favicons,
  images,
  scripts,
  styles
} from '../config';
/* eslint-enable */

const reload = (done) => {
  server.reload();
  done();
};

const watchTask = () => {
  gulp.watch(fonts.src, gulp.series('copies', reload));
  gulp.watch(favicons.src, gulp.series('copies', reload));
  gulp.watch(images.src, gulp.series('images', reload));
  gulp.watch(scripts.watchSrc, gulp.series('scripts', reload));
  gulp.watch(styles.watchSrc, gulp.series('styles', reload));
};

gulp.task('watch', watchTask);
