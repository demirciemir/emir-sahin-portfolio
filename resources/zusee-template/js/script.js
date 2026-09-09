(function () {
    "use strict";

    // Add an event listener to ensure that the HTML,CSS,Javascript & Image structure is fully loaded
    window.addEventListener('load', function () {

        /* ========================================================================== */
        /*                              PRELOADER SCRIPT                              */
        /* ========================================================================== */
        var preloader = document.getElementById('preloader');


        // Check if the preloader exists
        var preloader = document.getElementById('preloader');

        if (preloader) {
            // Add fade-out effect if preloader exists
            preloader.classList.add('fade-out');

            // Wait for the transition to end before removing the preloader
            setTimeout(function () {
                preloader.style.display = 'none';
            }, 500); // Match this delay with the CSS transition duration
        }

        /* ========================================================================== */
        /*                             HOME SLIDER SCRIPT                             */
        /* ========================================================================== */
        zsSlide('.home_slider');

        /* ========================================================================== */
        /*                  HEADER POSITION,SCROLLING & CLASS SCRIPT                  */
        /* ========================================================================== */
        /* Usage: initScrollNavigation(MenuClass,HeaderCLass,Offset) */
        initScrollNavigation('.scroll_menu', '.top_header', 30);

        /* ========================================================================== */
        /*                           SCROLLING EFFECT SCRIPT                          */
        /* ========================================================================== */
        scrollCue.init();

        /* ========================================================================== */
        /*                        MOUSE FOLLOW ANIMATION SCRIPT                       */
        /* ========================================================================== */
        CursorMouse(".cursor");
    });

    /* ========================================================================== */
    /*                              NAVIGATION SCRIPT                             */
    /* ========================================================================== */

    if (document.querySelector(".rdn_menu ")) {
        const nav_menu = document
            .querySelector(".rdn_menu")
            .querySelectorAll(".has_child");

        for (var i = 0; i < nav_menu.length; i++) {
            nav_menu[i].addEventListener("mouseenter", function () {
                this.classList.add("visible");
            });
            nav_menu[i].addEventListener("mouseleave", function () {
                this.classList.remove("visible");
            });
        }
    }

    /* ========================================================================== */
    /*                              OFFCANVAS SCRIPT                              */
    /* ========================================================================== */
    /* run the offcanvas button script */
    /*  The variable bsOffcanvas is in zs-script.js */
    document.querySelectorAll(".mobile_menu_btn").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            bsOffcanvas.toggle();
        });
    });
    /* offcanvas menu animation script */
    const mb_menu = document
        .querySelector(".offcanvas_list")
        .querySelectorAll(".dd_child_btn");

    for (var imb = 0; imb < mb_menu.length; imb++) {
        mb_menu[imb].addEventListener("click", function (e) {
            //toogle class active for the icon button
            this.parentNode.classList.toggle("active");
            //dropdown slide effect with 200ms transition
            slidingToggle(this.parentNode.querySelector(".nav_menu_child"), 200);
            e.preventDefault();
        });
    }
    /* ========================================================================== */
    /*                              EQUIP LIST SCRIPT                             */
    /* ========================================================================== */
    // Find all eq_lists containers
    document.querySelectorAll('.eq_lists').forEach(eqListContainer => {
        const listId = eqListContainer.dataset.list;
        const imgContainer = document.querySelector(`.img_eq[data-list="${listId}"]`);
        //run function to change the image on hover
        if (imgContainer) {
            setupEqList(eqListContainer, imgContainer);
        }
    });

    /* ========================================================================== */
    /*                                ABOUT SLIDER                                */
    /* ========================================================================== */
    const aboutSlider = new Swiper('.about_slider', {
        speed: 800,
        loop: true,
        slidesPerView: 1,
        centeredSlides: false,
        crossFade: true,
        effect: "fade",
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
    });

    /* ========================================================================== */
    /*                             TESTIMONIAL SLIDER                             */
    /* ========================================================================== */
    const testiSlider = new Swiper('.testi_slider', {
        speed: 800,
        loop: true,
        slidesPerView: 1,
        centeredSlides: false,
        crossFade: true,
        effect: "fade",
        spaceBetween: '32px',
        autoHeight: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.testi_nav .next',
            prevEl: '.testi_nav .prev',
        },
    });

    /* ========================================================================== */
    /*                                 BLOG SLIDER                                */
    /* ========================================================================== */
    const blogSlider = new Swiper('.blog_slider', {
        speed: 800,
        loop: false,
        slidesPerView: 1,
        centeredSlides: false,
        spaceBetween: '32px',
        breakpoints: {
            767: {
                slidesPerView: 2,
            },
            991: {
                slidesPerView: 3,
            },
        },
        autoplay: {
            delay: 6000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.blog_nav .next',
            prevEl: '.blog_nav .prev',
        },
    });

    /* ========================================================================== */
    /*                               LIGHTBOX SCRIPT                              */
    /* ========================================================================== */
    /* For Video */
    const videoLightbox = GLightbox({
        selector: ".popup_video"
    });

    /* For Image Gallery */
    const imgLightbox = GLightbox({
        selector: ".popup_gallery",
    });
    /* ========================================================================== */
    /*                         ISOTOPE / EVENTS FILTERING                         */
    /* ========================================================================== */
    //variable
    const elem = document.querySelector(".port_body");
    const filtersElem = document.querySelector(".port_filter");

    //only run isotope if elem exist
    if (elem) {
        //isotope layout script
        const rdn_port_list = new Isotope(elem, {
            // options
            itemSelector: ".port_item",
            layoutMode: "masonry",
        });

        // Adding a delay of 300ms make sure the layout properly load
        setTimeout(() => {
            //  Isotope initialization code
            rdn_port_list.arrange();
        }, 300);

        //only run isotope filtersElem exist
        if (filtersElem) {
            // isotope filtering script
            filtersElem.addEventListener("click", function (event) {
                if (!matchesSelector(event.target, "a")) {
                    return;
                }
                const filterValue = event.target.getAttribute("data-filter");

                // use the data-filter attribute
                rdn_port_list.arrange({
                    filter: filterValue,
                });
                //adding active class for filter button
                filtersElem.querySelector(".active").classList.remove("active");
                event.target.classList.add("active");
                event.preventDefault();
            });
        }
    }

    /* ========================================================================== */
    /*                                 PLYR SCRIPT                                */
    /* ========================================================================== */
    const plyr_video = new Plyr('.plyr_video', {
        controls: [
            'play-large', // The large play button in the center
            'play', // Play/pause playback
            'mute', // Toggle mute
            'fullscreen', // Toggle fullscreen
        ]
    });
    /* ========================================================================== */
    /*                     TRIGGER FUNCTION IN VIEWPORT SCRIPT                    */
    /* ========================================================================== */

    /* counter effect script when on viewport*/

    //variable for the row section of the count element
    const counterSection = document.querySelectorAll(".about_box");
    //run the counter effect when the element is on viewport
    counterSection.forEach(function (element) {
        var observer = new IntersectionObserver(
            function (entries) {
                // Check if the observed element is intersecting with the viewport
                if (entries[0].isIntersecting) {
                    // Call the function when the element enters the viewport
                    rdn_counter(".zs_count", 20);

                    // Stop observing the element after the first intersection
                    observer.unobserve(entries[0].target);
                }
            }, {
                once: true
            }
        ); // Use the 'once' option to trigger only once

        // Start observing the current element
        observer.observe(element);
    });


})();