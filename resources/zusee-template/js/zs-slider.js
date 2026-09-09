/* ========================================================================== */
/*                             HOME SLIDER SCRIPT                             */
/* ========================================================================== */
let slideTimeline;
let delayValue = 3000;

function zsSlide(slideContainer) {
    /* ========================================================================== */
    /*                               Global Variable                              */
    /* ========================================================================== */
    const sliderContainer = document.querySelector(slideContainer);
    // Check if there are no slides
    if (sliderContainer) {
        const slideItem = sliderContainer.querySelectorAll(".slider_item");
        const slideTitle = sliderContainer.querySelectorAll(".slider_title");
        // Get the value of the data-delay attribute
        const dataDelay = sliderContainer.getAttribute('data-delay');

        // Check if dataDelay is not null and not an empty string
        if (dataDelay !== null && dataDelay.trim() !== "") {
            delayValue = Number(dataDelay); // Convert to a number
        }

        /* ========================================================================== */
        /*                 Create custom list for each slider item                  */
        /* ========================================================================== */
        // Get the .slider_pagination ul
        var slideLinkUl = document.querySelector(".slider_pagination");

        // Iterate over each slide title
        slideItem.forEach(function (item, index) {
            // Create a new li element for each title
            var liElement = document.createElement("li");
            liElement.classList.add("cursor_big");
            // Add is-active class only to the first li element
            if (index === 0) {
                liElement.classList.add("is-active");
            }

            // Append the li element to the .slider_pagination ul
            slideLinkUl.appendChild(liElement);
        });



        /* ========================================================================== */
        /*                         Splitting the slider title                         */
        /* ========================================================================== */
        slideTitle.forEach((element) => {
            // Get the text content of the element
            const text = element.textContent.trim();

            // Create new HTML content for each word
            const wordsHTML = text.split(" ").map(word => {
                // Wrap each character of the word in a span with class "letter"
                const lettersHTML = word.split("").map(character => {
                    return `<span class="letter">${character}</span>`; // Wrap character in span
                }).join("");

                // Return the wrapped word with inline-block class
                return `<span class="d-inline-block">${lettersHTML}</span>`; // Wrap word in span
            }).join("&nbsp;"); // Preserve spaces using non-breaking space

            // Replace the content of the element with the new HTML content
            element.innerHTML = wordsHTML; // Use innerHTML to change the content
        });
        /* ========================================================================== */
        /*                          Slider Animation Function                         */
        /* ========================================================================== */
        // Variables
        let current = 0;
        const animDuration = 500;
        const imgDuration = 300;

        // Ensure the slideTimeline is null
        slideTimeline = null;

        function startAnimation() {
            if (slideTimeline) {
                slideTimeline.pause();
                slideTimeline = null;
            }
            const slideSub = slideItem[current].querySelector(".slider_subtitle");
            const slideLetter = slideItem[current].querySelectorAll(".letter");
            const slideImg = slideItem[current].querySelectorAll(".slider_img");
            const slideText = slideItem[current].querySelector(".slider_text");
            const slideBtn = slideItem[current].querySelector(".slider_btn_box");

            slideTimeline = anime
                .timeline({
                    loop: false,
                    duration: animDuration,
                    complete: function () {
                        callback();
                    },
                })
                .add({
                    targets: slideItem[current],
                    opacity: [0, 1],
                    translateY: ["-100%", 0],
                    easing: "linear",
                    duration: 300,
                }).add({
                    // Paused for duration slide
                    duration: 500,
                })
                .add({
                    targets: slideImg[0],
                    translateX: [-200, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[1],
                    translateY: [-200, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[2],
                    translateY: [200, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[3],
                    translateX: [200, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideSub,
                    translateY: [30, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideLetter,
                    translateY: [30, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                    delay: (el, i) => 30 * i,
                }, "-=" + imgDuration)
                .add({
                    targets: slideText,
                    translateY: [30, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideBtn,
                    translateY: [50, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: "easeOutExpo",
                }, "-=" + imgDuration)
                .add({
                    // Paused for duration slide
                    duration: delayValue,
                })
                .add({
                    targets: slideSub,
                    translateY: [0, -10],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideLetter,
                    translateY: [0, -10],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInExpo",
                    delay: (el, i) => 20 * i,
                }, "-=" + imgDuration)
                .add({
                    targets: slideText,
                    translateY: [0, -10],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideBtn,
                    translateY: [0, 100],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInExpo",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[0],
                    translateX: [0, -200],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInCubic",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[1],
                    translateY: [0, -200],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInCubic",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[2],
                    translateY: [0, 200],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInCubic",
                }, "-=" + imgDuration)
                .add({
                    targets: slideImg[3],
                    translateX: [0, 200],
                    translateZ: 0,
                    opacity: [1, 0],
                    easing: "easeInCubic",
                }, "-=" + imgDuration)
                .add({
                    targets: slideItem[current],
                    opacity: [1, 0],
                    translateY: [0, "-100%"],
                    easing: "linear",
                    duration: 300,
                }).add({
                    // Paused for duration slide
                    duration: 300,
                })
        }
        startAnimation();

        function callback() {
            const newIndex = current === slideItem.length - 1 ? 0 : current + 1;
            const currentSlide = slideItem[current];
            const newSlide = slideItem[newIndex];

            currentSlide.classList.remove("is-active");
            newSlide.classList.add("is-active");
            current = newIndex;
            changeListActive();

            startAnimation();
        }

        // Add a click event handler to restart animation on "prev" button click
        const prevBtn = document.querySelector(".nav_slider .prev");
        prevBtn.addEventListener("click", function () {
            const newIndex = current === 0 ? slideItem.length - 1 : current - 1;
            btnAnime(newIndex);
            changeListActive();
        });

        // Add a click event handler to restart animation on "next" button click
        const nextBtn = document.querySelector(".nav_slider .next");
        nextBtn.addEventListener("click", function () {
            const newIndex = current === slideItem.length - 1 ? 0 : current + 1;
            btnAnime(newIndex);
            changeListActive();
        });

        function btnAnime(newIndex) {
            const currentSlide = slideItem[current];
            const newSlide = slideItem[newIndex];

            currentSlide.classList.remove("is-active");
            newSlide.classList.add("is-active");
            current = newIndex;
            startAnimation();
        }

        // Function for list button
        function listBtn() {
            const listSlide = document.querySelectorAll(".slider_pagination li");
            listSlide.forEach((element, index) => {
                element.addEventListener("click", function () {
                    if (current != index) {
                        const newIndex = index;
                        btnAnime(newIndex);
                        changeListActive();
                    }
                });
            });
        }
        listBtn();

        // Change active list
        function changeListActive() {
            const listSlide = document.querySelectorAll(".slider_pagination li");
            listSlide.forEach((element, index) => {
                if (current == index) {
                    element.classList.add("is-active");
                } else {
                    element.classList.remove("is-active");
                }
            });
        }
    }
}