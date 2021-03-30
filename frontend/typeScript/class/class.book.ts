class Book {
    name: string | undefined;
    price: number | undefined;
    surplus: number | undefined;

    constructor(params: {
        name: string,
        price: number | undefined
        surplus?: number | undefined
    }) {
        this.name = params.name;
        this.price = params.price;
        this.surplus = params.surplus;
    }
}

let book = new Book({ name: '', price: 1285 });