//语法糖
class Animal {
    constructor(name = 'Sprinkles',energy = 1000) {
        this.name = name;
        this.energy = energy;
    }
    eat(food) {
        this.energy += food / 9;
    }
}


class Dessert {
    constructor(calories = 250) {
        this.calories = calories;
    }
}

class IceCream extends Dessert {
    constructor(flavor, calories, toppings = []) {
        super(calories);
        this.flavor = flavor;
        this.toppings = toppings;
    }
    addTopping(topping) {
        this.toppings.push(topping);
    }
}

