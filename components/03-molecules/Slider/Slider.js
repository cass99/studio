import {tns} from '../../../node_modules/tiny-slider/src/tiny-slider.js';

export default class Slider {

    /**
     * initialize
     */
    constructor() {
        this.elements = {
            $main: document.querySelectorAll('.Slider'),
        };

        if (this.elements.$main) {
            this.elements.$main.forEach($slider => {
                this.init($slider);
                this.stageAdjustDots($slider);
            });
        }
    }

    init($slider) {
        let $container = $slider.querySelector('.Slider__container');

        let $options = {
            container: $container,
            items: 1,
            slideBy: "page",
            autoplay: true,
            mouseDrag: true,
            controls: false,
            autoplayButtonOutput: false,
            navPosition: 'bottom',
            controlsText: ['', '']
        };

        if ($slider.classList.contains('Slider--coursesList')) {
            if ($container.children.length === 1) {
                $options.center = true;
            }
        
            $options.fixedWidth = 260;
            $options.gutter = 10;
            $options.controls = true;
            $options.controlsPosition = 'bottom';
            $options.responsive = {
                "1210": {
                    "items": 4,
                    "fixedWidth": false,
                    "gutter": 20
                }
            };
        }

        tns($options);
    }

    stageAdjustDots($slider) {
        if ($slider.classList.contains('Slider--stage')) {
            if (window.innerWidth > 1210) {
                this.stageSetTopToDots($slider);
            }

            window.addEventListener("resize", () => {
                if (window.innerWidth > 1210) {
                    this.stageSetTopToDots($slider);
                } else {
                    this.stageSetTopToDots($slider, true);
                }
            });
        }
    }

    stageSetTopToDots($slider, $setDefault = false) {
        let $dots = $slider.querySelector('.tns-nav'),
            $dotsWidth = $dots.clientWidth,
            $text = $slider.parentElement.nextElementSibling,
            $textHeight = $text.clientHeight;
        
        if ($setDefault) {
            $dots.style.bottom = "10px";
        } else {
            $dots.style.bottom = `${($textHeight / 2) - ($dotsWidth / 2)}px`;
        }
    }
}