var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var runSequence = require('run-sequence');

var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};


gulp.task('sass', function () {
  return gulp.src('assets/scss/**/*.scss') // Gets all files ending with .scss in app/scss and children dirs
    .pipe(plumber(function (error) {
      console.log("Error happend!", error.message);
      this.emit('end');
    }))
    .pipe(sourcemaps.init())
    .pipe(sass()) // Passes it through a gulp-sass
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(plumber.stop())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('assets/css')) // Outputs it in the css folder
})


// Watchers
gulp.task('watch', function () {
  gulp.watch('assets/scss/**/*.scss', ['sass']);
})

gulp.task('default', function (callback) {
  runSequence(['sass', 'watch'],
    callback
  )
})