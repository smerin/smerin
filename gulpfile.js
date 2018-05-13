// Local project config
var config = require("./config.json");

// Include gulp
var gulp = require("gulp");
var fs = require("fs");

// Include Plugins
var sass = require("gulp-ruby-sass");
var rename = require("gulp-rename");
var cleancss = require("gulp-clean-css");
var livereload = require("gulp-livereload");
var autoprefixer = require("gulp-autoprefixer");
var replace = require("gulp-replace");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var jshint = require("gulp-jshint");
var stripDebug = require("gulp-strip-debug");
var removeCode = require("gulp-remove-code");
var stylish = require("jshint-stylish");
var plumber = require("gulp-plumber");
var sourcemaps = require("gulp-sourcemaps");

gulp.task("styles", function() {
  return sass("./sass/*.scss", { style: "nested", sourcemap: false })
    .pipe(
      plumber(function(error) {
        console.log("--------------------");
        console.log("" + error);
        console.log("--------------------");
        this.emit("end");
      })
    )
    .pipe(
      autoprefixer({
        browsers: ["last 2 versions", "ie 7"]
      })
    )
    .pipe(gulp.dest("./"))
    .pipe(rename({ suffix: ".min" }))
    .pipe(cleancss({ compatibility: "ie9" }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./"))
    .pipe(livereload());
});

// JS
gulp.task("scripts", function() {
  return (
    gulp
      .src(config.js_files)
      .pipe(concat("script.js"))
      .pipe(jshint())
      .pipe(jshint.reporter(stylish))
      //.pipe(uglify())
      .pipe(gulp.dest("./"))
      .pipe(livereload())
  );
});

// JS - Lib Files
//gulp.task('lib_scripts', function(){
//    return gulp.src(config.js_lib_files)
//        .pipe(concat('site.lib.js'))
//        .pipe(gulp.dest(config.env.build + 'js/'));
//});

// Build
gulp.task("build", ["html", "styles", "scripts"], function() {
  console.log("Built");
});

// Watch files for changes
gulp.task("watch", function() {
  livereload.listen();
  gulp.watch("./sass/*.scss", { debounceDelay: 2000 }, ["styles"]);
  gulp.watch("./sass/*/*.scss", { debounceDelay: 2000 }, ["styles"]);
  gulp.watch("./js/*.js", { debounceDelay: 2000 }, ["scripts"]);
});

// Default task wrapper
gulp.task("default", ["watch"]);
