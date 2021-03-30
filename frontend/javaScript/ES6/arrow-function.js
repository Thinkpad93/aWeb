const upperizedName = ["Farrin", "Kagure", "Asser"].map(function (name) {
  return name.toUpperCase();
});

// arrow function
const upperizedNames = ["Farrin", "Kagure", "Asser"].map((name) => {
  name = name.toUpperCase();
  return `${name} has ${name.length} characters in their name`;
});

const greet = (name) => `Hello ${name}!`;

const sayHi = () => console.log("Hello Udacity Student!");

const squares = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10].map((square) => {
  return square * square;
});

console.log(...squares);

function IceCream() {
  this.scoops = 0;
}

IceCream.prototype.addScoop = function () {
  setTimeout(() => {
    this.scoops++;
    console.log("scoop added!");
  }, 0.5);
};

const dessert = new IceCream();
dessert.addScoop();

function greet(name = "Student", greeting = "Welcome") {
  return `${greeting} ${name}`;
}

// array
function houseDescriptor([houseColor = "green", shutterColors = ["red"]]) {
  return `I have a ${houseColor} house with ${shutterColors.join(
    " and "
  )} shutters`;
}

// object
function houseDescriptor({
  houseColor = "green",
  shutterColors = ["red"],
} = {}) {
  return `I have a ${houseColor} house with ${shutterColors.join(
    " and "
  )} shutters`;
}

function buildHouse({ floors = 1, color = "red", walls = "brick" } = {}) {
  return `Your house has ${floors} floor(s) with ${color} ${walls} walls`;
}

buildHouse({ floors: 3, color: "yellow" });
