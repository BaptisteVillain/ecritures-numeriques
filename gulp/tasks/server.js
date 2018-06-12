/* eslint-disable */
import gulp from 'gulp';
import browserSync from 'browser-sync';
const server = browserSync.create();
import { bsServer } from '../config';
/* eslint-enable */

const serverTask = done => {
  server.init(
    {
      proxy: `localhost:${bsServer.port}`
    },
    done()
  );
};

gulp.task('server', serverTask);

export default server;
