// Mike's Gulp Starter Workflow
'use strict';

// Require our stuff
var    gulp = require('gulp'),
browserSync = require('browser-sync').create(),
   cleanCSS = require('gulp-clean-css'),
     concat = require('gulp-concat'),
     uglify = require('gulp-uglify'),
     rename = require('gulp-rename'),
       sass = require('gulp-sass'),
       maps = require('gulp-sourcemaps');

// Set those paths
const base_path = './',
            src = base_path + '_dev',
           dist = base_path + 'assets',
          paths = {
              js: src + '/js/*.js',
            scss: src + '/sass/styles.scss'
          };

// Do stuff with SASS
gulp.task('makeCSS', () => {
    return gulp.src(paths.scss)
        .pipe(maps.init())
        .pipe(sass())
        .pipe(cleanCSS({compatibility: '*'}, {level: '2'}))
        .pipe(rename('styles.min.css'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest(dist))
        .pipe(browserSync.stream());
});

// Do stuff with Javascript
gulp.task('makeJS', () => {
    return gulp.src(paths.js)
        .pipe(maps.init())
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(rename('scripts.min.js'))
        .pipe(maps.write('./'))
        .pipe(gulp.dest(dist))
        .pipe(browserSync.stream());
});

// Watch for changes and do stuff
gulp.task('watch' , () => {
    gulp.watch(src + '/sass/*.scss', ['makeCSS']);
    gulp.watch(paths.js, ['makeJS']);
});

// Setup a Gulp Server with Browser Sync
gulp.task('serve', ['makeCSS', 'makeJS'], function() {
    browserSync.init({
        proxy: 'dethloffmfg.beta:8888'
    });
    gulp.watch(src + '/sass/*.scss', ['makeCSS']);
    gulp.watch(paths.js, ['makeJS']);
    gulp.watch("./*.php").on('change', browserSync.reload);
});

// Do this stuff by default
gulp.task('default', ['serve']);