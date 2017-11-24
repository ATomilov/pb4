jQuery(document).ready(function($) {
    $('.faq-section').on('click', '.faq_item', function() {
        $(this).children('.faq_info_exp').slideToggle();
    });
});