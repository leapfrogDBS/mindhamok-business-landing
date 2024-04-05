const App = {
    init: function() {
        this.initScrollToNext();
        this.initAccordions();
        this.initToggleSwitch();
        this.initDayCounter();
        this.initScrollHeader();
        this.initHamburgerToggle();
        this.initLoadMorePosts();
        this.attachEventListeners();
    },

    attachEventListeners: function() {
        document.body.addEventListener('click', (event) => {
            if (event.target.matches('.youtube-thumbnail-wrapper') || event.target.closest('.youtube-thumbnail-wrapper')) {
                const videoId = event.target.dataset.videoid || event.target.closest('.youtube-thumbnail-wrapper').dataset.videoid;
                this.openLightbox(videoId);
            }
        });
        document.getElementById('lightbox').addEventListener('click', (event) => {
            if (event.target.id === 'lightbox' || event.target.matches('.lightbox-close')) {
                this.closeLightbox();
            }
        });
    },

    openLightbox: function(videoId) {
        var lightbox = document.getElementById('lightbox');
        var iframe = document.getElementById('lightbox-video');

        iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
        lightbox.classList.remove('hidden');
    },

    closeLightbox: function() {
        var lightbox = document.getElementById('lightbox');
        var iframe = document.getElementById('lightbox-video');

        iframe.src = '';
        lightbox.classList.add('hidden');
    },

    initScrollToNext: function() {
        const scrollToNext = document.querySelector('.scroll-to-next');
        if (scrollToNext) {
            scrollToNext.addEventListener('click', function() {
                let currentSection = this.closest('section');
                let nextSection = currentSection.nextElementSibling;
                while (nextSection && nextSection.tagName.toLowerCase() !== 'section') {
                    nextSection = nextSection.nextElementSibling;
                }
                if (nextSection) {
                    const headerOffset = 58;
                    const sectionTop = nextSection.getBoundingClientRect().top + window.pageYOffset;
                    const offsetPosition = sectionTop - headerOffset;
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        }
    },

    initAccordions: function() {
        const accordionItems = document.querySelectorAll('.accordion-item');
        if (accordionItems.length > 0) {
            accordionItems.forEach(item => {
                const accordionTitle = item.querySelector('.accordion-title');
                if (accordionTitle) {
                    accordionTitle.addEventListener('click', () => {
                        accordionTitle.classList.toggle('active');
                        const accordionContent = item.querySelector('.accordion-content');
                        if (accordionContent) {
                            if (accordionContent.style.maxHeight) {
                                accordionContent.style.maxHeight = null;
                            } else {
                                accordionContent.style.maxHeight = `${accordionContent.scrollHeight}px`;
                            }
                        }
                        accordionItems.forEach(otherItem => {
                            if (otherItem !== item) {
                                const otherContent = otherItem.querySelector('.accordion-content');
                                if (otherContent) {
                                    otherContent.style.maxHeight = null;
                                }
                                const otherTitle = otherItem.querySelector('.accordion-title');
                                if (otherTitle) {
                                    otherTitle.classList.remove('active');
                                }
                            }
                        });
                    });
                }
            });
        }
    },

    initToggleSwitch: function() {
        const toggleSwitch = document.getElementById('content-toggle');
        const accordion1 = document.getElementById('accordion-staff');
        const accordion2 = document.getElementById('accordion-student');
        const textElement = document.getElementById('toggle-heading');
        if (toggleSwitch && accordion1 && accordion2 && textElement) {
            toggleSwitch.addEventListener('change', function() {
                if (this.checked) {
                    App.toggleText(textElement, 'What Students get', accordion1, accordion2);
                } else {
                    App.toggleText(textElement, 'What Staff get', accordion2, accordion1);
                }
            });
        }
    },

    toggleText: function(textElement, text, accordionToHide, accordionToShow) {
        textElement.style.opacity = '0';
        setTimeout(() => {
            textElement.textContent = text;
            textElement.style.opacity = '1';
            accordionToHide.classList.toggle('active');
            accordionToHide.classList.add('accordion-invisible');
            accordionToShow.classList.toggle('active');
            setTimeout(() => {
                accordionToShow.classList.remove('accordion-invisible');
            }, 10);
        }, 100);
    },

    

    initDayCounter: function() {
        const dateElements = document.querySelectorAll('[data-date-time]');
        if (dateElements.length > 0) {
            dateElements.forEach(element => {
                const match = element.getAttribute('data-date-time').match(/(\w+) (\d+), (\d+)/);
                if (match) {
                    const [_, month, day, year] = match;
                    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    const monthIndex = months.indexOf(month);
                    const eventDate = new Date(Date.UTC(parseInt(year), monthIndex, parseInt(day)));
                    const currentDate = new Date();
                    const startOfDayCurrentDate = new Date(Date.UTC(currentDate.getUTCFullYear(), currentDate.getUTCMonth(), currentDate.getUTCDate()));
                    const daysUntil = Math.floor((eventDate - startOfDayCurrentDate) / (1000 * 60 * 60 * 24));
                    element.querySelector('.days-until').textContent = daysUntil;
                }
            });
        }
    },

    initScrollHeader: function() {
        const header = document.getElementById('masthead');
        if (header) {
            window.addEventListener('scroll', function() {
                const scrollDistance = 100;
                if (window.scrollY > scrollDistance) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        }
    },

    initHamburgerToggle: function() {
        const hamburger = document.getElementById('hamburger');
        const curtainMenu = document.getElementById('curtain-menu');
        const curtainMenuContent = document.querySelector('.curtain-menu-content');
        if (hamburger && curtainMenu && curtainMenuContent) {
            hamburger.addEventListener('click', function() {
                this.classList.toggle('toggle');
                curtainMenu.classList.toggle('invisible');
                curtainMenu.classList.toggle('opacity-0');
                curtainMenuContent.classList.toggle('!translate-x-0');
                document.body.classList.toggle('overflow-hidden');
            });
        }
    },   
    initLoadMorePosts: function() {
        const posts = document.querySelectorAll('.post-item');
        const loadMoreBtn = document.getElementById('load-more');

        if (posts.length && loadMoreBtn) { // Check if posts and the Load More button exist
            let visibleCount = 4; // Number of posts to show initially and after each click

            // Function to show initial posts and next set of posts
            function showPosts() {
                posts.forEach((post, index) => {
                    if (index < visibleCount) {
                        post.classList.add('visible');
                    }
                });

                // Hide the Load More button if all posts are visible
                if (visibleCount >= posts.length) {
                    loadMoreBtn.style.display = 'none';
                }
            }

            showPosts();

            // Load More button click event
            loadMoreBtn.addEventListener('click', function() {
                visibleCount += 4;
                showPosts();
            });
        }
    },
    

    
};

document.addEventListener("DOMContentLoaded", () => App.init());
