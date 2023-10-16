
export default class CoursesList {

    /**
     * initialize
     */
    constructor() {
        this.elements = {
            $main: document.querySelectorAll('.CoursesList'),
        };

        if (this.elements.$main) {
            this.elements.$main.forEach($courseList => {
                this.genreSwitcher($courseList);
            });
        }
    }

    genreSwitcher($courseList) {
        let $genres = $courseList.querySelectorAll('.CoursesList__genreItem');
        let $sliders = $courseList.querySelectorAll('.CoursesList__slider');

        $genres.forEach($genre => {
            $genre.addEventListener('click', () => {
                let $genreData = $genre.dataset.genre;

                $genres.forEach($item => {
                    $item.classList.remove('CoursesList__genreItem--active');
                });
                $genre.classList.add('CoursesList__genreItem--active');

                $sliders.forEach($item => {
                    if ($item.dataset.genre === $genreData && !$item.classList.contains('CoursesList__slider--active')) {
                        $item.classList.add('CoursesList__slider--active');
                    } else {
                        $item.classList.remove('CoursesList__slider--active');
                    }
                });
            })
        });
    }
}