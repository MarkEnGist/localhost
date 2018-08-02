var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    del = require('del'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    cache = require('gulp-cache'),
    autoprefixer = require('gulp-autoprefixer'),
    livereload = require('gulp-livereload'),
    cleanCSS = require('gulp-clean-css'),
    htmlmin = require('gulp-html-minifier2');

gulp.task('reload-css', function () {
    return gulp.src('/app/_css/**/*.css')
        .pipe(livereload());
});
gulp.task('reload-php', function () {
    return gulp.src('**/*.php')
        .pipe(livereload());
});
gulp.task('reload-js', function () {
    return gulp.src('app/_js/**/*.js')
        .pipe(livereload());
});
gulp.task('sass', function () {
    return gulp.src('app/_sass/**/*.+(sass|cscc)')
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
        .pipe(gulp.dest('app/_css/'))
});
gulp.task('scripts', function () {
    return gulp.src([
        'app/libs/jquery/dist/jquery.min.js',
        'app/libs/jquery-pjax/jquery.pjax.js'
    ])
        .pipe(concat('libs.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('app/_js/'));
});
gulp.task('make-css-libs', function () {
    return gulp.src(['!app/_css/**/main.css', '!app/_css/**/*.min.css', 'app/_css/**/*.css'])
        .pipe(concat('libs.css'))
        .pipe(gulp.dest('app/_css/'));
});
gulp.task('css-libs', ['make-css-libs', 'sass'], function () {
    return gulp.src('app/_css/libs.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('app/_css/'))
});

gulp.task('clear', function () {
    return cache.clearAll();
});

gulp.task('clean', function () {
    return del.sync('dist/');
});

gulp.task('img', function () {
    return gulp.src('app/img/**/*')
        .pipe(cache(imagemin({
            interlaced: true,
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        })))
        .pipe(gulp.dest('dist/img'));
});

gulp.task('clean-css', function () {
    return gulp.src(['!app/_css/**/*.min.css', 'app/_css/**/*.css'])
        .pipe(cleanCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('app/_css/'))
});

gulp.task('watch', ['css-libs', 'scripts'], function () {
    livereload.listen({host: 'localhost'});
    gulp.watch('app/_sass/**/*.sass', ['sass']);
    gulp.watch('app/_css/**/*.css', ['reload-css']);
    gulp.watch('app/_js/**/*.js', ['reload-js']);
    gulp.watch('**/*.+(php|html)', ['reload-php']);
});

gulp.task('default', ['watch']);

gulp.task('build', ['clean', 'img', 'sass', 'scripts', 'clean-css'], function () {

    var buildCss = gulp.src([
        'app/_css/main.min.css',
        'app/_css/libs.min.css'
    ])
        .pipe(gulp.dest('dist/_css'));

    var buildFonts = gulp.src('app/fonts/**/*')
        .pipe(gulp.dest('dist/fonts/'));

    var buildJs = gulp.src(['!app/_js/**/*.min.js', 'app/_js/**/*'])
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('dist/_js/'));

    var buildMinJs = gulp.src('app/_js/**/*.min.js')
        .pipe(gulp.dest('dist/_js/'));

    var buildHtml = gulp.src('app/*.+(html|php)')
        .pipe(htmlmin())
        .pipe(gulp.dest('dist/'));

    var buildPhp = gulp.src('app/_php/**/*')
        .pipe(gulp.dest('dist/_php/'));
});