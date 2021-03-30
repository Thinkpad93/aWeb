@Component({
    selecor: 'hello',
    template: '<p>{{ greeting }}</p>'
})

export class HelloComponent {
    private greeting: string;
    constructor() {
        this.greeting = 'Hello, Angular 2!';
    }
}