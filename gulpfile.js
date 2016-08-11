var gulp       = require('gulp'),
	sass       = require('gulp-sass'),
	concat     = require('gulp-concat'),
	prefix     = require('gulp-autoprefixer'),
	sourcemaps = require('gulp-sourcemaps'),
	uglify     = require('gulp-uglify'),
	notify     = require('gulp-notify');

gulp.task('sass', function() {
	return gulp.src('styles/sass/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'compressed',
			errLogToConsole: true
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('styles/css'))
		.pipe(notify({
			title: 'SASS Success',
			message: 'Compressed: <%= file.relative %>'
		}));
});

gulp.task('scripts', function() {
	return gulp.src('js/src/**/*.js')
		.pipe(concat('main.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('js/dist'))
		.pipe(notify({
			title: 'JS Success',
			message: 'Compressed: <%= file.relative %>'
		}));
});

gulp.task('watch', function() {
	gulp.watch('styles/sass/**/*.scss', ['sass']);
	gulp.watch('js/src/**/*.js', ['scripts']);
});

gulp.task('default', ['sass','scripts','watch']);