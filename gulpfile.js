'use strict';
//packages
const gulp = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const rename = require('gulp-rename')
const autoprefixer = require('gulp-autoprefixer')
const babel = require('gulp-babel')
const debug = require('gulp-debug')

//srcs js
const util = "./src/js/utilities.js"
const store = './src/js/state-management/store.js'
const lazyload = './src/js/lazy-load.js'
const disqus = './src/js/disqus.js'
const socialController = './src/js/social-events.js'
const sliderScript = './src/js/slider/slider.js'
const infiniteScroll = './src/js/ui/chroma-infinite.js'
const scrollAnchors = './src/js/ui/chroma-scroll-anchors.js'

//srcs sass
const shareFix = './src/sass/social-share-fix/share-fix.sass'

//gallery srcs
const masonryLayout = "./node_modules/masonry-layout/dist/masonry.pkgd.js"
const imagesloaded = "./node_modules/imagesloaded/imagesloaded.pkgd.min.js"
const blueimpGallery = "./node_modules/blueimp-gallery/js/blueimp-gallery.min.js"
const galleryInitial = "./src/js/gallery-initial.js"

//Ad triggers
const adAppender = "./src/ad-loaders/ad-appender.js"
const revContent = "./src/ad-loaders/rev-content.js"

//core js
gulp.task('js', function() {
  return gulp
    .src([util,lazyload, './src/js/_INDEX.js', socialController, scrollAnchors, store])
    .pipe(debug({title: 'FILES IN SRC:'}))
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(uglify().on('error', function(e) {
                console.log(e);
             }))
    .pipe(gulp.dest('./dist/js/'));
});

//core sass
// gulp.task('sass', function() {
//   return gulp
//     .src('./src/sass/_INDEX.scss')
//     .pipe(rename('main.css'))
//     .pipe(debug({title: 'FILES IN SRC:'}))
//     .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
//     .pipe(autoprefixer())
//     .pipe(gulp.dest('./dist/css/'));
// });

gulp.task('sass', function() {
  return gulp
    .src('./src/sass/_INDEX.scss')
    .pipe(rename('main.css'))
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./dist/css'));
});

gulp.task('watch', function() {
  gulp.watch('src/sass/**/*.scss', ['sass']);
})

//sharefix sass
gulp.task('sharefix', function() {
  return gulp
    .src(shareFix)
    .pipe(debug({title: 'FILES IN SRC:'}))
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./dist/css/'));
});

//slider js
gulp.task('slider', function() {
  return gulp
    .src([sliderScript])
    .pipe(debug({title: 'FILES IN SRC:'}))
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(concat('slider.js'))
    .pipe(uglify())
    .pipe(uglify().on('error', function(e) {
                console.log(e);
             }))
    .pipe(gulp.dest('./dist/js/'));
});

gulp.task('adsjs', function() {
    return gulp
        .src([adAppender])
        .pipe(concat('contentads.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'));
});

gulp.task('revContent', function() {
    return gulp
        .src([revContent])
        .pipe(concat('rev-content.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'));
});

//disqus js
gulp.task('disqus', function() {
    return gulp
        .src(disqus)
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'));
});

//watch
gulp.task('watch', function() {
  gulp.watch('./src/sass/**/*.scss', gulp.series('sass'))
  gulp.watch('./src/sass/**/*.sass', gulp.series('sass'))
  gulp.watch('./src/js/**/*.js', gulp.series('js'))
})

//wallpaper sass
gulp.task('wallsass', function() {
    return gulp
      .src("./src/wallsass/wallpaper.scss")
      .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
      .pipe(autoprefixer())
      .pipe(gulp.dest('./dist/css/'));
});

//wallpaper js
gulp.task('walljs', function() {
  return gulp
      .src(['./src/js/wallpapers/wallscript.js', './src/js/like-button.js'])
      .pipe(babel())
      .pipe(concat('wallscript.js'))
      .pipe(uglify())
      .pipe(gulp.dest('./dist/js/'));
});
//gallery js
gulp.task('galleryjs', function() {
  return gulp
      .src([masonryLayout, imagesloaded, blueimpGallery, galleryInitial])
      .pipe(concat('gallery.js'))
      .pipe(uglify())
      .pipe(gulp.dest('./dist/js/'));
});
//infinite-scroll js
gulp.task('inf', function() {
  return gulp
      .src(infiniteScroll)
      .pipe(babel({}))
      .pipe(concat('chroma-infinite.js'))
      .pipe(uglify())
      .pipe(gulp.dest('./dist/js/'));
})
//giveaway external encapsulation
gulp.task('ext-giveaway', function() {
  return gulp
    .src('./src/giveaway-widget-external/gawidget.scss')
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest("./dist/css/"));
})
//chroma admin theme sass
gulp.task('admin-theme', function() {
  return gulp
    .src("./src/sass/colors.scss")
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest("./dist/css/"));
});

gulp.task('default', gulp.series(
  gulp.parallel('js', 'slider', 'adsjs', 'revContent', 'disqus', 'galleryjs', 'inf', 'walljs', 'sass', 'sharefix', 'wallsass', 'ext-giveaway', 'admin-theme'),
  'watch'
));
