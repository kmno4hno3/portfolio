const {src, dest, series, parallel, watch} = require('gulp');
const sass = require('gulp-sass');
const minifyCss = require('gulp-minify-css');
const notify = require('gulp-notify');
const browserSync = require('browser-sync').create();
const connectPHP = require('gulp-connect-php');

const paths = {
  php: './*.php',
  scss: './sass/**/*.scss'
}

function mincss(cb){
  return src(paths.scss)
  .pipe(sass().on('error', sass.logError))
  .pipe(minifyCss())
  .pipe(dest('css'))
  .pipe(notify('Done!'));
}

function php(cb) {
  src(paths.php);
}

function browserSyncInit(cb) {
  browserSync.init({
    proxy: 'http://localhost:8000'
  })
}


function watcher(cb){
  browserSyncInit();
  // コンパイル
  watch(paths.php, php);
  watch(paths.scss, mincss);

  // live reload task
  watch([paths.scss, paths.php]).on('change', browserSync.reload);

  console.log('under watching...');
}

function phpserver(cb) {
  connectPHP.server({
      base: '.',
      hostname: 'localhost',
      port:8000
  })
}

exports.build = series(phpserver, mincss);
exports.default = parallel(series(phpserver, mincss), watcher);