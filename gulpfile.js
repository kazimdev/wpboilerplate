'use strict';

const gulp = require('gulp');
const node_sass = require('node-sass');
const sass = require('gulp-sass')(node_sass);
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', function () {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(autoprefixer({
            cascade: false,
            grid: true
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('assets/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('assets/scss/**/*.scss', gulp.series('sass'));
});
