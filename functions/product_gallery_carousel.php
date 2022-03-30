<?php 

add_action('wp_footer', function(){ ?>
    <script type="text/javascript">
        const swiper = new Swiper('.custom-slider-jm', {
//             autoplay: {
//                 delay: 5000,   
//                 disableOnInteraction: false,
//             },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'bullets',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
<?php }, 100);