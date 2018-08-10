/**
 * @see https://www.cssigniter.com/use-sass-gulp-wordpress-theme-plugin-development-workflow/
 */


const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const groupmq = require('gulp-group-css-media-queries');
// const bs = require('browser-sync');
// const sassLint = require('gulp-sass-lint');
const concat = require('gulp-concat');

const SASS_SOURCES = [
  './*.scss', // This picks up our style.scss file at the root of the theme
  // 'scss/**/*.scss', // All other Sass files in the /css directory
];

const JS_SOURCES = [
  './js/*.js', // This picks up our style.scss file at the root of the theme
];

const INCLUDE_PATHS = [
    'bower_components/foundation-sites/_vendor',
    'bower_components/foundation-sites/scss',
    'bower_components/motion-ui/src'
];

const SCRIPTS = [
    'bower_components/jquery/dist/jquery.js',
    'bower_components/what-input/dist/what-input.js',
    'bower_components/foundation-sites/dist/js/foundation.js',
    'js/app.js' // this should be last
];

/**
 * Compile Sass files
 */
// gulp.task('compile:sass', ['lint:sass'], () =>
gulp.task('compile:sass', [], () =>
  gulp.src(SASS_SOURCES, { base: './' })
    .pipe(plumber()) // Prevent termination on error
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded', // Expanded so that our CSS is readable
      includePaths: INCLUDE_PATHS,
    })).on('error', sass.logError)
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false,
      })
    ]))
    .pipe(groupmq()) // Group media queries!
    .pipe(gulp.dest('.'))); // Output compiled files in the same dir as Sass sources
    // .pipe(bs.stream())); // Stream to browserSync

gulp.task('compile:js', [], () =>
  gulp.src(SCRIPTS)
    .pipe(concat('script.js')) // combine js files
    .pipe(gulp.dest('./')));

// // Task for compiling scripts, and minifying. Run with 'gulp js'
// gulp.task('js', function() {
//
//     return gulp.src(scripts)
//         .pipe(concat('app.js')) // combine js files
//         .pipe(gulp.dest('dist/js'));
// });

/**
 * Start up browserSync and watch Sass files for changes
 */
gulp.task('watch:sass', ['compile:sass'], () => {
  // bs.init({
  //   proxy: 'http://localhost/wordpress-installation'
  // });

  gulp.watch(SASS_SOURCES, ['compile:sass']); //, 'lint:sass']);
});

/**
 * Start up browserSync and watch Js files for changes
 */
gulp.task('watch:js', ['compile:js'], () => {
  // bs.init({
  //   proxy: 'http://localhost/wordpress-installation'
  // });

  gulp.watch(JS_SOURCES, ['compile:js']);
});

// /**
//  * Lint Sass
//  */
// gulp.task('lint:sass', () =>
//   gulp.src(SASS_SOURCES)
//     .pipe(plumber()));
//     // .pipe(sassLint())
//     // .pipe(sassLint.format()));

/**
 * Default task executed by running `gulp`
 */
gulp.task('default', ['watch:sass', 'watch:js']);
