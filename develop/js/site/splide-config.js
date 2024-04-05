document.addEventListener('DOMContentLoaded', function() {
    const splideElements = document.querySelectorAll('.splide');

    splideElements.forEach(function(splideElement) {
        let splide = new Splide(splideElement).mount();

        // Adjust arrow visibility based on the number of slides and perPage option
        function adjustArrowsVisibility() {
            let perPage = splide.options.perPage;
            let totalSlides = splide.length;
            let arrows = splideElement.querySelectorAll('.splide__arrow');

            if (totalSlides <= perPage) {
                arrows.forEach(arrow => arrow.style.display = 'none');
            } else {
                arrows.forEach(arrow => arrow.style.display = '');
            }
        }

        // Initially adjust arrows visibility
        adjustArrowsVisibility();

        // Adjust arrow visibility on Splide update events e.g., after a window resize
        splide.on('updated', adjustArrowsVisibility);

        let pagination = splideElement.querySelector('.custom-pagination'); 

        if (pagination) {
            for (let i = 0; i < splide.length; i++) {
                let line = document.createElement('span');
                line.classList.add('pagination-line');
                pagination.appendChild(line);

                (function(index) {
                    line.addEventListener('click', function() {
                        splide.go(index);
                    });
                })(i);
            }

            function updatePagination(activeIndex) {
                if (!pagination) return;

                var lines = pagination.querySelectorAll('.pagination-line');
                lines.forEach(function(line, index) {
                    if (index === activeIndex) {
                        line.classList.add('is-active');
                    } else {
                        line.classList.remove('is-active');
                    }
                });
            }

            splide.on('mounted move', function() {
                updatePagination(splide.index);
            });

            updatePagination(splide.index);
        }
    });
});
