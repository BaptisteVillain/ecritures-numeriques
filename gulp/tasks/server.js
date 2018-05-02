/* eslint-disable */
import gulp from 'gulp';
import browserSync from 'browser-sync';
const server = browserSync.create();
/* eslint-enable */

const serverTask = done => {
  server.init(
    {
      proxy: 'localhost:7777'
    },
    done()
  );
};

gulp.task('server', serverTask);

export default server;
