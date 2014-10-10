var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var pkg  = require('./package.json');

// Modernizr
gulp.task('modernizr', function() {
  return gulp.src('bower_components/modernizr/modernizr.js')
    .pipe(gulp.dest('js/libs'))
});

// coffee
gulp.task('coffee', function() {
  return gulp.src(['src/coffee/**/*.coffee', '!src/coffee/groundwork.all.coffee'])
    .pipe($.coffee({
      bare: true,
    }))
    .pipe($.concat('groundwork.all.js'))
    .pipe(gulp.dest('js/libs'))
});


// javascript
gulp.task('js', function() {
  return gulp.src('js/iemoto-groundworkcss-2.js')
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe(gulp.dest('js'))
});

// compass(sass)
gulp.task('compass', function() {
  gulp.src('sass/*.scss')
    .pipe($.compass({
      import_path: 'src/sass',
      sass:      'sass',
      css:       'css',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: true,
      comments:  false
    }))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('css'))
    .pipe($.replace('../images/', 'images/'))
    .pipe($.replace('../fonts/', 'fonts/'))
    .pipe($.replace('/*# sourceMappingURL=style.css.map */', ''))
    .pipe(gulp.dest('./'))
});

// watch
gulp.task('watch', function () {
  gulp.watch('js/iemoto-groundworkcss-2.js', ['js']);
  gulp.watch(['sass/{,*/}{,*/}*.scss', 'src/sass/*.sass'], ['compass']);
});

// default task
gulp.task('init',['modernizr','coffee','js','compass']);
gulp.task('default',['js','compass']);
