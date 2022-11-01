const gulp = require('gulp');
const {series, parallel} = require('gulp');
const sass = require('gulp-sass')(require('sass'));

function buildStyles() {
    return gulp.src('./assets/src/scss/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/css'));
}

exports.buildStyles = buildStyles;
exports.default = function () {
    buildStyles()
    gulp.watch('./assets/src/scss/**/*.scss', series(buildStyles));
}