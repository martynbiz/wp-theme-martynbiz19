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
    'bower_components/imagesloaded/imagesloaded.pkgd.js',
    'bower_components/masonry-layout/dist/masonry.pkgd.js',
    'js/app.js' // this should be last
];

/**
 * Compile Sass files
 */
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

gulp.task('compile:js', [], () =>
  gulp.src(SCRIPTS)
    .pipe(concat('script.js')) // combine js files
    .pipe(gulp.dest('./')));

/**
 * Watch Sass files for changes
 */
gulp.task('watch:sass', ['compile:sass'], () => {
    gulp.watch(SASS_SOURCES, ['compile:sass']); //, 'lint:sass']);
});

/**
 * Watch Js files for changes
 */
gulp.task('watch:js', ['compile:js'], () => {
    gulp.watch(JS_SOURCES, ['compile:js']);
});

/**
 * Default task executed by running `gulp`
 */
gulp.task('default', ['watch:sass', 'watch:js']);
