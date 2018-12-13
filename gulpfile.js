var gulp = require("gulp");
var ts = require("gulp-typescript");
var less = require('gulp-less');
var path = require('path');
var watch = require('gulp-watch');

// default task
gulp.task("default", Array(
	'typescript',
	'less'
), function () {
	console.log(' Default task ');
});


// typescript task
gulp.task("typescript", function () {
	console.log(' Compiling typescript ');
	var tsResult = gulp.src('src/client/typescript/**')
		.pipe(ts({
			noImplicitAny: true,
			module: 'amd', // commonjs
			moduleResolution: 'node',
			esModuleInterop: true,
			allowJs: true,
			target: 'es5',
			strict: true, // for typing
			lib: ['es2016', 'dom']
		}));
	return tsResult.js.pipe(gulp.dest('web/js/'));
});

// less task
gulp.task('less', function () {
	console.log(' Compiling less ');
	return gulp.src('src/client/less/*.less')
		.pipe(less())
		.pipe(gulp.dest('web/css/'));
});


// configure which files to watch and what tasks to use on file changes
gulp.task('watch', ['default'], function() {
	gulp.watch('src/client/typescript/**', ['typescript']);
	gulp.watch('src/client/less/*', ['less']);
});

