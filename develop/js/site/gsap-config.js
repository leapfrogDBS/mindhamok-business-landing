document.addEventListener('DOMContentLoaded', function () {
  // Check if .accordion-img-col exists
  if(document.querySelector(".accordion-img-col")) {
    gsap.to(".accordion-img-col .accordion-image", {
      yPercent: 20,
      ease: "none",
      scrollTrigger: {
        trigger: ".accordion-img-col",
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      }
    });
  }

  // Check if any element with id #stop1 exists
    if(document.querySelector("#stop1")) {
      gsap.to("#stop1", {
        scrollTrigger: {
          trigger: ".svg-col",
          start: "top bottom",
          end: "bottom top",
          scrub: true,
        },
        attr: { offset: 0 },
        ease: "none",
      });
    }


  // Function to animate counters
const animateCounters = () => {
  document.querySelectorAll('.counter').forEach(counter => {
      const startVal = 0;
      const endVal = parseInt(counter.getAttribute('data-target'));
      const duration = 1.5; // Duration in seconds

      // GSAP animation with ScrollTrigger
      gsap.to(counter, {
          scrollTrigger: {
              trigger: counter,
              start: "top 80%", // Start animation when top of counter is 80% from the top of the viewport
              toggleActions: "restart pause resume pause"
          },
          textContent: endVal,
          duration: duration,
          snap: {textContent: 1}, // Snap to integer values
          ease: "power1.inOut",
          modifiers: {
              textContent: function(textContent) {
                  return Math.round(textContent); // Round the value to avoid decimal numbers
              }
          },
          onUpdate: function() { // Update function to change the displayed number
              counter.textContent = Math.round(this.targets()[0].textContent);
          }
      });
  });
};

// Initialize the function
animateCounters();

gsap.utils.toArray('.slide-up').forEach(item => {
  gsap.from(item, {
    y: 50, // Starting below its start position
    opacity: 0, // Starting from fully transparent
    duration: 1, // Animation takes 1 second
    ease: 'power1.out', // Easing function for a smooth effect
    scrollTrigger: {
      trigger: item,
      start: 'top 80%', // When the top of the item hits the 80% viewport height
      toggleActions: 'play none none none'
    }
  });
});

gsap.utils.toArray('.slide-down').forEach(item => {
  gsap.from(item, {
    y: -50, // Starting below its start position
    opacity: 0, // Starting from fully transparent
    duration: 1, // Animation takes 1 second
    ease: 'power1.out', // Easing function for a smooth effect
    scrollTrigger: {
      trigger: item,
      start: 'top 80%', // When the top of the item hits the 80% viewport height
      toggleActions: 'play none none none'
    }
  });
});

gsap.utils.toArray('.fade-in-left').forEach(item => {
  gsap.from(item, {
    x: -100, // Start 100 pixels to the left of its start position
    opacity: 0,
    duration: 1,
    ease: 'power1.out',
    scrollTrigger: {
      trigger: item,
      start: 'top 80%',
      toggleActions: 'play none none none',
    }
  });
});

gsap.utils.toArray('.fade-in-right').forEach(item => {
  gsap.from(item, {
    x: 100, 
    opacity: 0,
    duration: 1,
    ease: 'power1.out',
    scrollTrigger: {
      trigger: item,
      start: 'top 80%',
      toggleActions: 'play none none none'
    }
  });
});



}); // End of DOMContentLoaded

/* Preloader animation */
gsap.to("#stop4", {
  attr: {offset: 0}, // Animate to the start of the gradient
  duration: 1,
  repeat: -1,
  yoyo: true, // Return to the initial state
  ease: "none",
});


window.addEventListener('load', function() {
  gsap.to("#preloader", {
      opacity: 0, 
      duration: 1,
      onComplete: function() {
          // Once the fade completes, set display to 'none'
          document.getElementById("preloader").style.display = "none";
      }
  });
});
