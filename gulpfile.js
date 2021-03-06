var gulp = require('gulp'),
    less = require('gulp-less'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    growl = require('gulp-notify-growl'),
    phpunit = require('gulp-phpunit');


var paths = {
    'dev': {
        'less': './resources/assets/less/',
        'js': './resources/assets/js/',
        'vendor': './resources/assets/vendor/'
    },
    'production': {
        'css': './public/assets/css/',
        'js': './public/assets/js/'
    }
};

// CSS
/*gulp.task('css', function () {
    return gulp.src(paths.dev.less + 'app.less')
        .pipe(less())
        .pipe(gulp.dest(paths.production.css))
        .pipe(minify({keepSpecialComments: 0}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(paths.production.css));
});*/

gulp.task('css', function () {
    return gulp.src([paths.dev.vendor + 'angular-material/angular-material.css'])
        .pipe(concat('app.css'))
        .pipe(gulp.dest(paths.production.css))
        .pipe(minify({keepSpecialComments: 0}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(paths.production.css));
});

gulp.task('vendor', function () {
    return gulp.src([
        paths.dev.vendor + 'angular/angular.min.js',
        paths.dev.vendor + 'angular-animate/angular-animate.min.js',
        paths.dev.vendor + 'angular-aria/angular-aria.min.js',
        paths.dev.vendor + 'angular-material/angular-material.min.js',
        paths.dev.vendor + 'angular-messages/angular-messages.min.js'
    ])
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(paths.production.js));
});

// JS
gulp.task('js', function () {
    return gulp.src([
        paths.dev.js + '/app/'
    ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.production.js));
});

// PHP Unit
gulp.task('phpunit', function () {
    var options = {debug: false, notify: true};
    return gulp.src('./tests/*.php')
        .pipe(phpunit('./vendor/bin/phpunit', options))

        .on('error', notify.onError({
            title: 'PHPUnit Failed',
            message: 'One or more tests failed.'
        }))

        .pipe(notify({
            title: 'PHPUnit Passed',
            message: 'All tests passed!'
        }));
});

gulp.task('watch', function () {
    gulp.watch(paths.dev.less + '/*.less', ['css']);
    gulp.watch(paths.dev.js + '/*.js', ['js']);
    gulp.watch('./tests/*.php', ['phpunit']);
});

gulp.task('default', ['css','vendor', 'js', 'phpunit', 'watch']);
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
/*
 var elixir = require('laravel-elixir');
 elixir(function(mix) {
 mix.less('app.less');
 });
 */
