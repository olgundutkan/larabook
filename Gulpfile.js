var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');

gulp.task('css', function() {
   	gulp.src('app/assets/sass/main.scss')
       .pipe(sass())
       .pipe(autoprefixer('last 10 version'))
       .pipe(gulp.dest('public/css'));
   	gulp.src('vendor/bower_components/bootstrap-3-datepicker/css/datepicker.css')
       .pipe(sass())
       .pipe(autoprefixer('last 10 version'))
       .pipe(gulp.dest('public/css'));
});

gulp.task('compress', function() {
	gulp.src('vendor/bower_components/bootstrap-3-datepicker/js/bootstrap-datepicker.js')
	.pipe(uglify())
	.pipe(gulp.dest('public/js'))
});

gulp.task('watch', function() {
   gulp.watch('app/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);