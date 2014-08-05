var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var filter = require('gulp-filter');
var concat = require('gulp-concat');
var bower = require('main-bower-files');
var uglify = require('gulp-uglify');
var ngAnnotate = require('gulp-ng-annotate');
gulp.task('styles', function(){

  return gulp.src([
      'public/styles/main.scss'
    ])
    .pipe(sass({
      loadPath: [
        process.cwd() + '/bower_components/bootstrap-sass-official/assets/stylesheets'
      ]
    }))
    .pipe(gulp.dest('public/dist'));
});
gulp.task('scripts', function(){
  return gulp.src('public/scripts/**/*.js')
        .pipe(ngAnnotate())
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/dist'));
});

gulp.task('vendor', function(){
  var js = filter('**/*.js');
  return gulp.src(bower())
         .pipe(js)
         .pipe(concat('vendor.js'))
         .pipe(uglify())
         .pipe(gulp.dest('public/dist'));
});

gulp.task('default', ['styles', 'scripts'], function(){
  gulp.watch('public/styles/**/*.scss', ['styles']);
  gulp.watch('public/scripts/**/*.js', ['scripts']);
});
