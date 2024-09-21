( function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    // Open the mobile menu
    mobileMenuToggle.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');  // Toggle the hidden class
    });

    // Close the mobile menu
    mobileMenuClose.addEventListener('click', function () {
        mobileMenu.classList.add('hidden');  // Add the hidden class
    });

    // Close the menu if user clicks outside
    window.addEventListener('click', function (event) {
        if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
}() );
