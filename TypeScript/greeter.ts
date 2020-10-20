function getters(person: string) {
    return "Hello" + person;
}

let user = "Jane User";

let list: number[] = [1, 2, 3];

let lists: Array<number> = [1, 2, 3, 4];



document.body.innerHTML = getters(user);

let body: HTMLElement = document.body;
let allDiv: NodeList = document.querySelectorAll('div');
document.addEventListener('click', function (e: MouseEvent) {
    console.log(e);
});






