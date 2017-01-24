var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var livereload = require('gulp-livereload');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var es = require('event-stream');
var flatten = require('gulp-flatten');
var size = require('gulp-filesize');
var uglify = require('gulp-uglify');

var path = {
    app: './wp-content/themes/aprendreenmain/',
    app_dev: './wp-content/themes/aprendreenmain/app/',
    app_scss: './wp-content/themes/aprendreenmain/app/scss/',
    app_fonts: './wp-content/themes/aprendreenmain/app/fonts/',
    app_js: './wp-content/themes/aprendreenmain/app/js/',
    app_img: './wp-content/themes/aprendreenmain/app/img/',
    dest_img: './wp-content/themes/aprendreenmain/dist/img/',
    dest_fonts: './wp-content/themes/aprendreenmain/dist/fonts/',
    dest_css: './wp-content/themes/aprendreenmain/dist/css/',
    dest_js: './wp-content/themes/aprendreenmain/dist/js/',
    npm_dir: './node_modules/'
};

gulp.task('sass', function () {
    gulp.src([path.app_scss + 'main.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(autoprefixer())
        .pipe(gulp.dest(path.dest_css))
        .pipe(livereload());
});

gulp.task('images', function () {
    gulp.src([path.app_img + '*.jpg', path.app_img + '*.png'])
        .pipe(flatten())
        .pipe(gulp.dest(path.dest_img));
});

gulp.task('browserify', function () {
    // we define our input files, which we want to have
    // bundled:
    var files = [
        path.app_js + 'main.js'
    ];
    // map them to our stream function
    var tasks = files.map(function (entry) {
        return browserify({
            entries: [entry],
            debug: true,
            paths: ['./node_modules']
        })
            .bundle().on('error', function (err) {
                console.log(err.message);
                this.emit('end');
            })
            .pipe(source('main.js'))
            .pipe(buffer())
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(sourcemaps.write('./'))
            .pipe(flatten())
            .pipe(gulp.dest(path.dest_js));
    });
    // create a merged stream
    return es.merge.apply(null, tasks);
});


gulp.task('watch', function () {
    livereload.listen();
    // Sass files
    gulp.watch([
        path.app_scss + '**/*.scss'
    ], ['sass']);

    // JS files
    gulp.watch([
        path.app_js + '**/*.js'
    ], ['browserify']);
});

gulp.task('uglifyJs', ['browserify'], function () {
    return gulp.src(path.app_js + '*.js')
        .pipe(uglify())
        .pipe(gulp.dest(path.dest_js))
        .pipe(size());
});

gulp.task('fonts', function () {
    gulp.src([
        path.app_fonts + '*.{ttf,woff,eot,svg,woff2}'
    ])
        .pipe(flatten())
        .pipe(gulp.dest(path.dest_fonts));
});

gulp.task('default', ['sass', 'uglifyJs', 'browserify', 'fonts', 'images', 'watch']);
gulp.task('build', ['sass', 'uglifyJs', 'fonts', 'images']);
