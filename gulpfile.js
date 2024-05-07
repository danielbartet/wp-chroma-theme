'use strict';

// Packages
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const sourcemaps = require('gulp-sourcemaps');
const debug = require('gulp-debug');

// Paths
const paths = {
  js: [
    './node_modules/redux/dist/redux.min.js',
    './src/js/utilities.js',
    './src/js/state-management/store.js',
    './src/js/lazy-load.js',
    './src/js/jquery.js',
    './src/js/wp-embed.js',
    './src/js/disqus.js',
    './src/js/social-events.js',
    './src/js/slider/slider.js',
    './src/js/form-action.js',
    './src/js/ui/chroma-infinite.js',
    './src/js/ui/chroma-scroll-anchors.js',
    './node_modules/masonry-layout/dist/masonry.pkgd.js',
    './node_modules/imagesloaded/imagesloaded.pkgd.min.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery.min.js',
    './src/js/gallery-initial.js',
    "./src/ad-loaders/ad-appender.js",
    "./src/ad-loaders/rev-content.js",
    './src/js/wallpapers/wallscript.js',
    './src/js/like-button.js'
  ],
  sass: [
    './src/sass/social-share-fix/share-fix.sass',
    './src/sass/_INDEX.scss',
    './src/wallsass/wallpaper.scss',
    './src/giveaway-widget-external/gawidget.scss',
    './src/sass/colors.scss'
  ]
};

// JavaScript processing
function js() {
  return gulp.src(paths.js)
    .pipe(sourcemaps.init())
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(concat('main.js'))
    .pipe(uglify().on('error', function (err) {
      console.error('Error during JavaScript minification:', err.toString());
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/js/'));
}

// SASS processing
function css() {
  return gulp.src(paths.sass)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(concat('main.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/css/'));
}

// Watch task
function watch() {
  gulp.watch(paths.js, js);
  gulp.watch(paths.sass, css);
}

// Define complex tasks
const build = gulp.series(gulp.parallel(js, css), watch);

// Export tasks
exports.js = js;
exports.css = css;
exports.watch = watch;
exports.build = build;
exports.default = build;
