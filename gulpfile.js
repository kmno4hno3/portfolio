const { src, dest, series, parallel, watch } = require("gulp");
const sass = require("gulp-sass");

const cleanCss = require("gulp-clean-css");

const notify = require("gulp-notify");                    // 通知を行う
const browserSync = require("browser-sync").create();     // 起動中にソース変更でブラウザをライブリロード
const connectPHP = require("gulp-connect-php");

const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");             // cssを指定ブラウザごとに変換
const plumber = require("gulp-plumber");                  // エラーが起きてもタスクが停止しない
const sassGlob = require("gulp-sass-glob");               // 指定したディレクトリ以下のscssをimport
const cssdeclsort = require('css-declaration-sorter');    // プロパティの順番を自動でソート
const mmq = require('gulp-merge-media-queries');          //バラバラのメディアクエリを一つにまとめる

const paths = {
  php: "./*.php",
  scss: "./sass/**/*.scss",
};

function sassToCss(cb) {
  return src(paths.scss)
    .pipe(plumber({                                                   // コンパイルエラー時、エラーメッセージをデスクトップ通知
      errorHandler: notify.onError("Error: <%= error.message %>")
    }))
    .pipe(sassGlob())                                                 // 指定ディレクトリ以下のscssをimport
    .pipe(sass().on("error", sass.logError))                          // コンパイル実行 & エラーを出力
    .pipe(postcss([
      autoprefixer()                                                  // 各ブラウザの最新2バージョンに合わせたベンダープレフィックスを指定(package.jsonに記載)
    ]))
    .pipe(postcss([                                                   // 作成されたcssにベンダープレフィックスを付与
      cssdeclsort({order: 'alphabetical'})                            // プロパティをアルファベット順に変換
    ]))
    .pipe(mmq())                                                      // バラバラのメディアクエリを一つにまとめる
    .pipe(cleanCss())                                                 // cssファイル圧縮
    .pipe(dest("css"))                                                // cssファイル出力
    .pipe(notify("Done!"));                                           // 完了時デスクトップ通知
}

function php(cb) {
  src(paths.php);
}

function browserSyncInit(cb) {
  browserSync.init({
    proxy: "http://localhost:8000",
  });
}

function watcher(cb) {
  browserSyncInit();
  // コンパイル
  watch(paths.php, php);
  watch(paths.scss, sassToCss);

  // live reload task
  watch([paths.scss, paths.php]).on("change", browserSync.reload);

  console.log("under watching...");
}

function phpserver(cb) {
  connectPHP.server({
    base: ".",
    hostname: "localhost",
    port: 8000,
  });
}

exports.sass = series(sassToCss);
exports.build = series(phpserver, sassToCss);
exports.default = parallel(series(phpserver, sassToCss), watcher);
