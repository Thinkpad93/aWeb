let user = {
  name: 'John',
  age: 30,
};

//let clone = Object.assign({}, user);
let clone = {};

for (let key in user) {
  clone[key] = user[key];
}

let { name, age, isAdmin: isAdmin = false } = user;
