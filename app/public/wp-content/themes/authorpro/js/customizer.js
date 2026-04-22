(function ($) {
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    // Update Primary Brand Color (--color-brand-600)
    wp.customize('authorpro_color_brand_600', function (value) {
        value.bind(function (newval) {
            document.documentElement.style.setProperty('--color-brand-600', newval);
        });
    });

    // Update Brand Hover Color (--color-brand-700)
    wp.customize('authorpro_color_brand_700', function (value) {
        value.bind(function (newval) {
            document.documentElement.style.setProperty('--color-brand-700', newval);
        });
    });

    // Update Heading Color (--color-slate-900)
    wp.customize('authorpro_color_slate_900', function (value) {
        value.bind(function (newval) {
            document.documentElement.style.setProperty('--color-slate-900', newval);
        });
    });

    // Update Body Text Color (--color-slate-600)
    wp.customize('authorpro_color_slate_600', function (value) {
        value.bind(function (newval) {
            document.documentElement.style.setProperty('--color-slate-600', newval);
        });
    });
}(jQuery));

(function ($) {
    // Helper function to toggle classes AND apply CSS instantly
    function updateAuthorProBackgroundClasses() {
        var bgImage = wp.customize('background_image') ? wp.customize('background_image').get() : '';
        var bgColor = wp.customize('background_color') ? wp.customize('background_color').get() : '';

        // 1. Apply the actual CSS to the body instantly
        if (bgImage) {
            $('body').css('background-image', 'url("' + bgImage + '")');
        } else {
            $('body').css('background-image', 'none');
        }

        if (bgColor) {
            $('body').css('background-color', bgColor);
        } else {
            $('body').css('background-color', '');
        }

        // 2. Toggle Tailwind Wrapper Classes
        var defaultColor = 'ffffff';
        var hasCustomBg = (bgImage !== '' || (bgColor !== '' && bgColor !== '#' + defaultColor && bgColor !== defaultColor));

        // CRITICAL FIX: Only target the main content wrapper. Exclude Header and Footer!
        var $mainContentWrapper = $('.authorpro-main-wrapper');
        var $mainContainer = $mainContentWrapper.children('.authorpro-container');
        var $heroHeaders = $('header.border-b.pt-20.pb-16'); // Only targets archive/search hero sections

        if (hasCustomBg) {
            // Apply custom background classes ONLY to main content
            $mainContentWrapper.removeClass('bg-slate-50').addClass('bg-transparent');
            $mainContainer.addClass('bg-white/95 rounded-2xl shadow-sm py-10 mt-6 mb-12');
            $heroHeaders.removeClass('bg-white').addClass('bg-white/95 backdrop-blur-md');
            $('body').addClass('custom-background');

            // CRITICAL FIX: Remove solid white background from inner wrapper
            $('.innerbody').removeClass('bg-white');
        } else {
            // Revert to default classes ONLY for main content
            $mainContentWrapper.removeClass('bg-transparent').addClass('bg-slate-50');
            $mainContainer.removeClass('bg-white/95 rounded-2xl shadow-sm py-10 mt-6 mb-12');
            $heroHeaders.removeClass('bg-white/95 backdrop-blur-md').addClass('bg-white');
            $('body').removeClass('custom-background');

            // CRITICAL FIX: Restore solid white background to inner wrapper
            $('.innerbody').addClass('bg-white');
        }
    }

    // Listen for Background Image changes
    wp.customize('background_image', function (value) {
        value.bind(function () {
            updateAuthorProBackgroundClasses();
        });
    });

    // Listen for Background Color changes
    wp.customize('background_color', function (value) {
        value.bind(function () {
            updateAuthorProBackgroundClasses();
        });
    });
})(jQuery);