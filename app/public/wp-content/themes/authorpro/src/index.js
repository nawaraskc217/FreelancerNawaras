import './style.scss';
(function () {
    document.addEventListener('DOMContentLoaded', () => {
        /**
         * Search Modal Logic
         */
        const searchToggle = document.getElementById('search-toggle');
        const searchModal = document.getElementById('search-modal');
        const searchModalClose = document.getElementById('search-modal-close');
        const searchCloseBtn = document.getElementById('search-close-btn');
        const searchModalContent = document.getElementById('search-modal-content');

        if (searchToggle && searchModal) {
            const searchInput = searchModal.querySelector('input[type="search"]');

            function openModal() {
                searchModal.classList.remove('invisible', 'opacity-0');
                searchModal.classList.add('visible', 'opacity-100');
                // Animate content
                setTimeout(() => {
                    searchModalContent.classList.remove('opacity-0', 'scale-95');
                    searchModalContent.classList.add('opacity-100', 'scale-100');
                    if (searchInput) searchInput.focus();
                }, 10);
            }

            function closeModal() {
                searchModalContent.classList.remove('opacity-100', 'scale-100');
                searchModalContent.classList.add('opacity-0', 'scale-95');

                setTimeout(() => {
                    searchModal.classList.remove('visible', 'opacity-100');
                    searchModal.classList.add('invisible', 'opacity-0');
                }, 200);
            }

            searchToggle.addEventListener('click', function (e) {
                e.preventDefault();
                openModal();
            });

            if (searchModalClose) {
                searchModalClose.addEventListener('click', closeModal);
            }

            if (searchCloseBtn) {
                searchCloseBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    closeModal();
                });
            }

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && searchModal.classList.contains('visible')) {
                    closeModal();
                }
            });
        }

        /**
         * Mobile Menu Toggles (Accordion)
         * Using event delegation or direct robust listeners
         */
        const toggleButtons = document.querySelectorAll('.mobile-menu-toggle');

        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Use currentTarget to ensure we get the button, not the SVG
                const button = e.currentTarget;
                const targetId = button.getAttribute('aria-controls');
                const submenu = document.getElementById(targetId);
                const icon = button.querySelector('svg');

                if (submenu) {
                    // Toggle Dropdown Visibility
                    submenu.classList.toggle('hidden');

                    // Toggle ARIA State
                    const isExpanded = button.getAttribute('aria-expanded') === 'true';
                    button.setAttribute('aria-expanded', !isExpanded);

                    // Rotate Icon
                    if (icon) {
                        icon.classList.toggle('rotate-180');
                    }
                }
            });
        });

        /**
         * Mobile Menu Toggle (Header)
         */
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
})();

