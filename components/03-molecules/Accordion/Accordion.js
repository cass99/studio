
export default class Accordion {

    /**
     * initialize
     */
    constructor() {
        this.elements = {
            $main: document.querySelectorAll('.Accordion'),
        };

        if (this.elements.$main) {
            this.elements.$main.forEach($accordion => {
                this.toggleItems($accordion);
            });
        }
    }

    toggleItems($accordion) {
        let $items = $accordion.querySelectorAll('.Accordion__item');
        $items.forEach($item => {
            let $head = $item.querySelector('.Accordion__head');
            $head.addEventListener('click', () => {
                $item.classList.toggle('Accordion__item--show');
            })
        });
    }
}