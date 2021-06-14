var EventEmitter = require('events');

const eventEmit = new EventEmitter();

eventEmit.on('message', (text) => {
  console.log(text);
});

eventEmit.emit('message', 'hello message');