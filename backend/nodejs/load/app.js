const http = require('http');
const fs = require('fs');
const url = require('url');

const html2canvas = require('html2canvas');

const port = 9528;
const hostname = '127.0.0.1';

const server = http.createServer((req, res) => {
  let surl = url.parse(req.url, true).query;
  console.log(surl);
  console.log(Object.keys(surl).length);
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World\n');
  // if (url.indexOf('html')) {
  //   res.setHeader('Content-Type', 'text/html');
  //   fs.readFile(`./${url}`, 'utf-8', (err, data) => {
  //     if (err) {
  //       // throw new Error(err);
  //     }
  //     console.log(data);
  //     res.end(data);
  //   });
  // } else {
  //   res.setHeader('Content-Type', 'text/plain');
  //   res.end('Hello World\n');
  // }
  // console.log(url);
  // res.statusCode = 200;
  // res.setHeader('Content-Type', 'text/plain');
  // res.end('Hello World\n');
});

server.listen(port, hostname, () => {
  console.log(`server running at http://${hostname}:${port}`);
});
