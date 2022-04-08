const os = require('os');

//方法返回一个对象数组，包含每个逻辑 CPU 内核的信息。
let cpus = os.cpus();
cpus.map((item) => {
  let { model, speed, times } = item;
  console.log(model);
  console.log(speed);
  console.log(times);
  for (let i in times) {
    console.log(times[i]);
  }
});

//以字符串的形式返回操作系统的主机名
console.log(os.hostname());
