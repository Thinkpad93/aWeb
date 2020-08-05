class WordCount extends HTMLElement  {
    constructor() {
        super();
        var shadowRoot = this.attachShadow({mode: 'open'});
        shadowRoot.innerHTML = `
            <style>
                
            </style>
            <slot></slot>
        `
    }
}

customElements.define('word-count', WordCount);