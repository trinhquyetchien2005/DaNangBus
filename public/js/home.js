document.addEventListener("DOMContentLoaded", function () {
    // Scroll Effect
    function initScrollEffect() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add(`${entry.target.dataset.effect}-active`);
                }
            });
        });

        const elements = document.querySelectorAll("[data-effect]");
        elements.forEach((element) => observer.observe(element));
    }

    // Carousel Functionality
    function initCarousel() {
        const carouselItems = document.querySelectorAll("[data-carousel-item]");
        const indicators = document.querySelectorAll("[data-carousel-slide-to]");
        let currentIndex = 0;
        const intervalTime = 5000;
        let slideInterval;

        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.classList.toggle("hidden", i !== index);
                item.classList.toggle("active", i === index);
            });
            indicators.forEach((indicator, i) => {
                indicator.setAttribute("aria-current", i === index ? "true" : "false");
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        }

        indicators.forEach((indicator, index) => {
            indicator.addEventListener("click", () => {
                clearInterval(slideInterval);
                currentIndex = index;
                showSlide(currentIndex);
                startSlideShow();
            });
        });

        document.querySelector("[data-carousel-prev]").addEventListener("click", () => {
            clearInterval(slideInterval);
            prevSlide();
            startSlideShow();
        });

        document.querySelector("[data-carousel-next]").addEventListener("click", () => {
            clearInterval(slideInterval);
            nextSlide();
            startSlideShow();
        });

        function startSlideShow() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }

        showSlide(currentIndex);
        startSlideShow();
    }

    initScrollEffect();
    initCarousel();
});
