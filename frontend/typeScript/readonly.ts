type MyReadonly<T> = {
  readonly [P in keyof T]: T[P];
};

interface Todo {
  title: string;
  desciption: string;
}

const todo: MyReadonly<Todo> = {
  title: 'Hey',
  desciption: 'foobar',
};

// todo.title = 'Hello';

Math.pow(10, '2');