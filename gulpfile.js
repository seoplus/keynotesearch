// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var terser = require('gulp-terser');
var imagemin = require('gulp-imagemin');
var ignore = require('gulp-ignore');
var rimraf = require('gulp-rimraf');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var replace = require('gulp-replace');
var autoprefixer = require('gulp-autoprefixer');

// Configuration file to keep your code DRY
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function () {
  var stream = gulp
    .src(`${paths.sass}/*.scss`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit('end');
        },
      })
    )
    .pipe(sass({ errLogToConsole: true }))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css))
    .pipe(rename('custom-editor-style.css'));
  return stream;
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task('watch', function () {
  gulp
    .watch(`${paths.sass}/**/*.scss`, gulp.series('styles'))
    .on('change', browserSync.reload);
  gulp
    .watch(
      [
        `${paths.dev}/**/*.js`,
        'js/**/*.js',
        '!build/js/child-theme.js',
        '!build/js/child-theme.min.js',
      ],
      gulp.series('scripts')
    )
    .on('change', browserSync.reload);

  //Inside the watch task.
  gulp.watch(`${paths.imgsrc} /**`, gulp.series('imagemin-watch'));
});

// Run:
// gulp imagemin
// Running image optimizing task
gulp.task('imagemin', function () {
  gulp.src(`${paths.imgsrc}/**`).pipe(imagemin()).pipe(gulp.dest(paths.img));
});

/**
 * Ensures the 'imagemin' task is complete before reloading browsers
 * @verbose
 */
gulp.task(
  'imagemin-watch',
  gulp.series('imagemin', function reloadBrowserSync() {
    browserSync.reload();
  })
);

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task('cssnano', function () {
  return gulp
    .src(`${paths.css}/child-theme.css`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit('end');
        },
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(cssnano({ discardComments: { removeAll: true } }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task('minifycss', function () {
  return gulp
    .src(paths.css + '/child-theme.css')
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS({ compatibility: '*' }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit('end');
        },
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task('cleancss', function () {
  return gulp
    .src(`${paths.css}/*.min.css`, { read: false }) // Much faster
    .pipe(ignore('child-theme.css'))
    .pipe(rimraf());
});

gulp.task('styles', gulp.series('sass', 'minifycss'));

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function () {
  browserSync.init(cfg.browserSyncWatchFiles, cfg.browserSyncOptions);
});

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task('scripts', function () {
  var scripts = [
    // Start - All BS4 stuff
    `${paths.dev}/src/js/bootstrap4/bootstrap.bundle.js`,

    // End - All BS4 stuff

    `${paths.dev}/src/js/skip-link-focus-fix.js`,

    // Adding currently empty javascript file to add on for your own themes´ customizations
    // Please add any customizations to this .js file only!
    `${paths.dev}/js/main.js`,
  ];
  gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat('child-theme.min.js'))
    .pipe(terser())
    .pipe(gulp.dest(paths.js));

  return gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat('child-theme.js'))
    .pipe(gulp.dest(paths.js));
});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task('watch-bs', gulp.parallel('browser-sync', 'watch', 'scripts'));

// Deleting any file inside the /src folder
gulp.task('clean-source', function () {
  return del(['src/**/*']);
});

// Deleting the files distributed by the copy-assets task
gulp.task('clean-vendor-assets', function () {
  return del([
    `${paths.dev}/js/bootstrap4/**`,
    `${paths.dev}/sass/bootstrap4/**`,
    './fonts/*wesome*.{ttf,woff,woff2,eot,svg}',
    `${paths.dev}/sass/fontawesome/**`,
    `${paths.dev}/sass/underscores/**`,
    `${paths.dev}/js/skip-link-focus-fix.js`,
    `${paths.js}/**/skip-link-focus-fix.js`,
    `${paths.js}/**/popper.min.js`,
    `${paths.js}/**/popper.js`,
    paths.vendor !== '' ? `${paths.js}${paths.vendor}/**` : '',
  ]);
});

// Deleting any file inside the /dist folder
gulp.task('clean-dist', function () {
  return del([`${paths.dist}/**`]);
});

// Run
// gulp dist
// Copies the files to the /dist folder for distribution as simple theme
gulp.task(
  'dist',
  gulp.series('clean-dist', function copyToDistFolder() {
    const ignorePaths = [
        `!${paths.node}`,
        `!${paths.node}/**`,
        `!${paths.dev}`,
        `!${paths.dev}/**`,
        `!${paths.dist}`,
        `!${paths.dist}/**`,
        `!${paths.distprod}`,
        `!${paths.distprod}/**`,
        `!${paths.sass}`,
        `!${paths.sass}/**`,
      ],
      ignoreFiles = [
        '!readme.txt',
        '!readme.md',
        '!package.json',
        '!package-lock.json',
        '!gulpfile.js',
        '!gulpconfig.json',
        '!CHANGELOG.md',
        '!.travis.yml',
        '!jshintignore',
        '!codesniffer.ruleset.xml',
      ];

    console.log({ ignorePaths, ignoreFiles });

    return gulp
      .src(['**/*', ...ignorePaths, ...ignoreFiles, '*'], { buffer: false })
      .pipe(
        replace(
          '/js/jquery.slim.min.js',
          `/js${paths.vendor}/jquery.slim.min.js`,
          { skipBinary: true }
        )
      )
      .pipe(
        replace('/js/popper.min.js', `/js${paths.vendor}/popper.min.js`, {
          skipBinary: true,
        })
      )
      .pipe(
        replace(
          '/js/skip-link-focus-fix.js',
          `/js${paths.vendor}/skip-link-focus-fix.js`,
          { skipBinary: true }
        )
      )
      .pipe(gulp.dest(paths.dist));
  })
);

// Deleting any file inside the /dist-product folder
gulp.task('clean-dist-product', function () {
  return del([`${paths.distprod}/**`]);
});

// Run
// gulp dist-product
// Copies the files to the /dist-prod folder for distribution as theme with all assets
gulp.task(
  'dist-product',
  gulp.series('clean-dist-product', function copyToDistFolder() {
    return gulp
      .src([
        '**/*',
        `!${paths.node}`,
        `!${paths.node}/**`,
        `!${paths.dist}`,
        `!${paths.dist}` + '/**',
        `!${paths.distprod}`,
        `!${paths.distprod}/**`,
        '*',
      ])
      .pipe(gulp.dest(paths.distprod));
  })
);

// Deleting any file inside the /dist-product folder
gulp.task('compile', gulp.series('styles', 'scripts', 'dist'));