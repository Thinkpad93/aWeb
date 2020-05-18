var gulp = require("gulp");
var bs = require("browser-sync").create(); //自动刷新浏览器

//启动 livereload
function startServer() {
  bs.init({
    serveStatic: ["./"],
    port: 3000,
    proxy: "http://beta.whddd666.com",
    startPath: "README.md"
  });
}

//注册 build_dev 任务
gulp.task("dev", gulp.series(gulp.parallel(startServer)));
