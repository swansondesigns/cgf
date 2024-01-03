const { src, dest, watch, series } = require('gulp');

const sass = require('gulp-sass')(require('node-sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const rename = require('gulp-rename');
// const browsersync = require( 'browser-sync' ).create();

const themeName = 'cgf';
const sassFolder = '../wp-content/themes/' + themeName + '/sass';
const watchFilesSass = sassFolder + '/**/*.scss';
const sourceFileSass = sassFolder + '/style.scss';
const sourceFileEditorSass = sassFolder + '/editor-style.scss';
const destFolderSass = '../wp-content/themes/' + themeName + '/assets/css/';
// const sassSourceFilesForTask = [sourceFileSass, sourceFileEditorSass];
// const sassSourceFilesForWatch = [watchFilesSass, sourceFileEditorSass];
const sassSourceFilesForTask = [sourceFileSass];
const sassSourceFilesForWatch = [watchFilesSass];

// Sass Task
function scssTask() {
	return src(sassSourceFilesForTask, { sourcemaps: true })
		.pipe(sass())
		.pipe(postcss([cssnano()]))
		.pipe(rename({ suffix: '.min' }))
		.pipe(dest(destFolderSass, { sourcemaps: '.' }));
}

// // JavaScript Task
// const terser = require( 'gulp-terser' );
// function jsTask() {
// 	return src( 'app/js/script.js', { sourcemaps: true } )
// 		.pipe( terser() )
// 		.pipe( dest( 'dist', { sourcemaps: '.' } ) );
// }

// // Browsersync Task
// function browserSyncServe( cb ) {

// 	browsersync.init({
// 		server: {
// 			baseDir: '.'
// 		}
// 	});
// 	cb();
// }

// function browsersyncReload(cb) {
// 	browsersync.reload();
// 	cb();
// }

function watchTask() {
	// watch( '*.php', browsersyncReload );
	// watch( ['app/scss/**/*.scss','app/js/**/*.scss'], series( scssTask, jsTask, browsersyncReload ) );
	// watch( [ watchFilesSass, 'app/js/**/*.js'], series( scssTask, jsTask ) );
	watch(sassSourceFilesForWatch, series(scssTask));
}

function build(cb) {
	scssTask();
	cb();
}

exports.build = series(
	scssTask
	// jsTask,
);

exports.default = series(
	scssTask,
	// jsTask,
	watchTask
);
