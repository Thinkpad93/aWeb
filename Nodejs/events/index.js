var EventEmitter = require('events');

let e = new EventEmitter();

e.on('message', (text) => {
  console.log(text);
});

e.emit('message', 'hello message');