document.addEventListener('DOMContentLoaded', function() {
    // Initialize Fancybox only once globally
    Fancybox.bind("[data-fancybox='popup']", {
        closeButton: true,
        infinite: false,
        animated: true
    });

    // Listen for clicks on buttons to dynamically update titles
    document.querySelectorAll(".popup-link").forEach(element => {
        element.addEventListener('click', function(event) {
            const newTitle = this.getAttribute('data-title');
            // Directly update the popup title
            document.getElementById('popup-title').textContent = newTitle;
        });
    });
});
