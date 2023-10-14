export default class Hamburger {

    /**
     * initialize
     */
    constructor() {
        this.elements = {
            $main: document.querySelector('.Hamburger'),
        };

        if (this.elements.$main) {
            this.toggleOpen();
        }
    }

    toggleOpen() {
        this.elements.$main.addEventListener('click', (event) => {
            this.elements.$main.classList.toggle('Hamburger--open');
        });
    }
}