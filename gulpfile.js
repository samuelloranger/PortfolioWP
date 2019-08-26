const gulp = require('gulp');
const sass = require('gulp-sass');
const sourceMaps = require('gulp-sourcemaps');
const autoPrefixer = require('gulp-autoprefixer');

function styles(cb) {
    return gulp.src('./scss/*.scss')
        .pipe(sourceMaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoPrefixer({
            cascade: false
        }))
        .pipe(sourceMaps.write())
        .pipe(gulp.dest('./css'));
    cb();
};

function watch(cb) {
    gulp.watch('./scss/*.scss', gulp.series('styles'));
    cb();
};

function defaut(cb){
    console.log("allo");
    // place code for your default task here
    cb();
};

exports.default=defaut;
exports.styles=styles;
exports.watch=watch;