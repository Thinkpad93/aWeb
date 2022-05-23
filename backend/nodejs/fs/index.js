const fs = require('fs');
const path = require('path');

// 异步读取
fs.readFile('fs.txt', 'utf-8', (err, data) => {
  if (err) {
    console.err(err);
  }
  console.log('异步读取: ' + data.toString());
});

//同步读取
let data = fs.readFileSync('./fs.txt');
console.log('同步读取: ' + data.toString());

//获取文件大小，创建时间等信息
fs.stat('fs.txt', (err, stats) => {
  if (err) {
    console.err(err);
  }
  console.log(stats);
  // 是否是文件:
  console.log('isFile:' + stats.isFile());
  // 是否是目录:
  console.log('isDirectory: ' + stats.isDirectory());
  if (stats.isFile()) {
    // 文件大小:
    console.log('size: ' + stats.size);
    // 创建时间, Date对象:
    console.log('birth time: ' + stats.birthtime);
    // 修改时间, Date对象:
    console.log('modified time: ' + stats.mtime);
  }
});
