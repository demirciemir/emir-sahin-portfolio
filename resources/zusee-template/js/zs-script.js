/* ========================================================================== */
/*                             OFFCANVAS VARIABLE                             */
/* ========================================================================== */
var myOffcanvas = document.getElementById("top_offcanvas");
var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

/* ========================================================================== */
/*                                HEADER SCRIPT                               */
/* ========================================================================== */
function initScrollNavigation(menuClass, headerClass, offset) {
    var header = document.querySelector(headerClass); // Select header using class with dot
    var menu = document.querySelector(menuClass); // Select menu using class with dot

    // Check if both the header and menu exist before adding event listeners
    if (header) {
        window.addEventListener('scroll', function () {
            var scrollPosition = window.scrollY || window.pageYOffset;

            // Manage fixed header
            if (scrollPosition > 100) { // Scroll past 100px
                header.classList.add('fixed');
            } else {
                header.classList.remove('fixed');
            }

            // Update the active menu item based on the current scroll position
            var sections = document.querySelectorAll('section'); // Select all sections

            sections.forEach(section => {
                var sectionTop = section.offsetTop; // Get the top position of the section
                var sectionHeight = section.offsetHeight; // Get the height of the section

                // Check if the current scroll position is within the section's range
                if (scrollPosition >= sectionTop - header.offsetHeight - offset &&
                    scrollPosition < sectionTop + sectionHeight - offset) {
                    // Remove active class from all menu links
                    document.querySelectorAll(`${menuClass} a`).forEach(link => {
                        link.classList.remove('active');
                    });

                    // Find the corresponding link and add the active class
                    var currentLink = document.querySelector(`${menuClass} a[href="#${section.id}"]`);
                    if (currentLink) {
                        currentLink.classList.add('active');
                    }
                }
            });
        });
    }



    /* ========================================================================== */
    /*                            MENU SCROLLING SCRIPT                           */
    /* ========================================================================== */
    if (menu) { // Only proceed if the menu exists
        document.querySelectorAll(`${menuClass} a, .go_btn`).forEach(anchor => {
            anchor.addEventListener('click', function (e) {


                var href = this.getAttribute('href'); // Get the href attribute

                // Check if href contains a valid hash (not empty, not just "#", and corresponds to an element ID)
                if (href && href.startsWith('#') && href.length > 1) {
                    var targetElement = document.querySelector(href); // Select the target element by ID

                    // Only proceed if the target element exists
                    if (targetElement) {
                        e.preventDefault(); // Prevent default behavior
                        bsOffcanvas.hide();
                        var headerHeight = header.offsetHeight; // Get the header height
                        var elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;

                        // Scroll to the section, accounting for header height
                        window.scrollTo({
                            top: elementPosition - headerHeight,
                            behavior: 'smooth'
                        });

                    }
                }
            });
        });
    }
}

/* ========================================================================== */
/*                            TOP OFFCANVAS SCRIPT                            */
/* ========================================================================== */

/* Cloning the navigation list */
var zsNav = document.querySelector(".rdn_menu");

// Get the div element with class offcanvas_nav
var offcanvasNav = document.querySelector(".offcanvas_nav");

// Check if both elements are found
if (zsNav && offcanvasNav) {
    // Clone the ul element
    var clonedUl = zsNav.cloneNode(true);

    // Replace the element classes new class
    clonedUl.className = "offcanvas_list scroll_menu";

    // Get all li elements with class "has_child" in the cloned ul
    var hasChildItems = clonedUl.querySelectorAll("li.has_child");

    // Loop through each li element with class "has_child"
    hasChildItems.forEach(function (item) {
        // Create a new span element with class "boxes"
        var newSpan = document.createElement("span");
        newSpan.className = "dd_child_btn cursor_big fa fa-angle-down";

        // Append the new span element to the current li element
        item.appendChild(newSpan);
    });


    // Append the cloned ul element to the offcanvas_nav div
    offcanvasNav.appendChild(clonedUl);
}

/* ========================================================================== */
/*                 ANIMATION SCRIPT FOR MOBILE NAVIGATION MENU                */
/* ========================================================================== */
let slidingUp = (target, duration = 500) => {
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + "ms";
    target.style.boxSizing = "border-box";
    target.style.height = target.offsetHeight + "px";
    target.offsetHeight;
    target.style.overflow = "hidden";
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
        target.style.display = "none";
        target.style.removeProperty("height");
        target.style.removeProperty("padding-top");
        target.style.removeProperty("padding-bottom");
        target.style.removeProperty("margin-top");
        target.style.removeProperty("margin-bottom");
        target.style.removeProperty("overflow");
        target.style.removeProperty("transition-duration");
        target.style.removeProperty("transition-property");
        //alert("!");
    }, duration);
};

let slidingDown = (target, duration = 500) => {
    target.style.removeProperty("display");
    let display = window.getComputedStyle(target).display;

    if (display === "none") display = "block";

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = "hidden";
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = "border-box";
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + "ms";
    target.style.height = height + "px";
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    window.setTimeout(() => {
        target.style.removeProperty("height");
        target.style.removeProperty("overflow");
        target.style.removeProperty("transition-duration");
        target.style.removeProperty("transition-property");
    }, duration);
};
let slidingToggle = (target, duration = 500) => {
    if (window.getComputedStyle(target).display === "none") {
        return slidingDown(target, duration);
    } else {
        return slidingUp(target, duration);
    }
};


/* ========================================================================== */
/*                           VANILLA COUNTER SCRIPT                           */
/* ========================================================================== */
function rdn_counter(itemClass, durationTime = 5) {
    const counters = document.querySelectorAll(itemClass);
    const speed = 200; // The lower the slower
    if (counters) {
        counters.forEach(counter => {
            const updateCount = () => {

                const target = +counter.getAttribute('data-end');
                const count = +counter.innerText;

                // Lower inc to slow and higher to slow
                const inc = target / speed;

                // console.log(inc);
                // console.log(count);

                // Check if target is reached
                if (count < target) {
                    // Add inc to count and output in counter
                    counter.innerText = Math.ceil(count + inc);
                    // Call function every ms
                    setTimeout(updateCount, durationTime);
                } else {
                    counter.innerText = target;
                }

            };
            updateCount();
        })
    }
};

/* ========================================================================== */
/*                             MOUSE CURSOR SCRIPT                            */
/* ========================================================================== */
function CursorMouse(targets) {
    const cursor = document.querySelector(targets);

    if (cursor) {
        const links = document.querySelectorAll("a,button,.cursor_big");

        // Function to toggle the cursor size and class
        function toggleCursorSize(isLarge, newClass) {
            if (isLarge) {
                cursor.classList.add(newClass);
            } else {
                cursor.classList.remove(newClass);
            }
        }

        // Initially hide the cursor and tooltip
        cursor.style.display = "none";

        // Event listener to show the cursor when entering the view
        document.addEventListener("mousemove", (e) => {
            cursor.style.display = "flex"; // Show the cursor on any mouse movement
            anime({
                targets: cursor,
                left: e.clientX,
                top: e.clientY,
                duration: 500,
                easing: "easeOutQuad",
            });
        });

        links.forEach((link) => {
            link.addEventListener("mouseenter", () => {
                toggleCursorSize(true, "large"); // Make the cursor larger when entering a link
            });

            link.addEventListener("mouseleave", () => {
                toggleCursorSize(false, "large"); // Restore the original cursor size when leaving the link
            });
        });

    }
}

/* ========================================================================== */
/*                              EQUIP LIST SCRIPT                             */
/* ========================================================================== */
// Function to set up event listeners for a specific list of eq_list items
function setupEqList(eqListContainer, imgContainer) {
    const eqLists = eqListContainer.querySelectorAll('.eq_list');
    const imgDisplay = imgContainer.querySelector('img');
    let imgActiveAdded = false; // To track if the img_eq has been activated

    eqLists.forEach(eqList => {
        eqList.addEventListener('mouseenter', () => {
            // Add active class to the li as before
            eqLists.forEach(el => el.classList.remove('active')); // Reset other li elements
            eqList.classList.add('active'); // Activate the current li

            // Update the image source
            const imageSrc = eqList.dataset.image;
            imgDisplay.src = imageSrc;

            // Add the active class to img_eq only once
            if (!imgActiveAdded) {
                imgContainer.classList.add('active');
                imgActiveAdded = true; // Mark img_eq as active so it doesn't get added again
            }
        });
    });
}