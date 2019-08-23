
/*--------------------------------------------------------

    Main Scripts

    [Table of contents]
        01. CAROUSEL
        02. RANDOM HEADER
        03. HEADER CONTENT OPACITY
        04. NAVBAR
        05. STICKY NAVBAR
        06. MAGNIFIC POPUP
        07. COUNTERS
        08. NAVBAR WIDTH FIX
        09. CONTACT FORM
        10. SCROLL TO TOP
        11. SMOOTH SCROLL
        12. PAGE ANIMATIONS
        13. PRELOADER
        14. ISOTOPE

--------------------------------------------------------*/

(function(){
    'use strict';
    $(window).ready(function(){

        /*--------------------------------------------------------
            01. CAROUSEL
        --------------------------------------------------------*/
        $(function(){
            $(".caption").owlCarousel({
                navigation: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                transitionStyle: "fade",
                mouseDrag: false,
                touchDrag: false,
                autoPlay: true
            });
        });

        /*--------------------------------------------------------
            02. RANDOM HEADER
        --------------------------------------------------------*/
        $(function(){
            var random = Math.ceil(Math.random() * 6),
                newHeader = "header-" + random;
            $('.head').addClass(newHeader);
        });

        /*--------------------------------------------------------
            03. HEADER CONTENT OPACITY
        --------------------------------------------------------*/
        $(function(){
            var element = $('.caption .item'),
                offsetEnd = 450,
                opacity,
                offset = $(document).scrollTop();
            offset > offsetEnd ? opacity = 0 : opacity = 1 - offset/offsetEnd;
            element.css("opacity", opacity);
            $(window).scroll(function(){
                offset = $(document).scrollTop();
                offset <= offsetEnd ? opacity = 1 - offset/offsetEnd : opacity = 0;
                element.css('opacity', opacity);
            });
        });

        /*--------------------------------------------------------
            04. NAVBAR
        --------------------------------------------------------*/
        $(function(){
            var head = $('.head').height(),
                navbar = $('.navbar');
            $(this).scrollTop() >= head ? navbar.removeClass('normal').addClass('offset') : navbar.removeClass('offset').addClass('normal');
            $(window).scroll(function () {
                $(this).scrollTop() >= head ? navbar.removeClass('normal').addClass('offset') : navbar.removeClass('offset').addClass('normal');
            });
        });

        /*--------------------------------------------------------
            05. STICKY NAVBAR
        --------------------------------------------------------*/
        $(function(){
            $('.navbar').sticky({
                topSpacing: 0
            });
        });

        /*--------------------------------------------------------
            06. MAGNIFIC POPUP
        --------------------------------------------------------*/
        $(function(){
            $('#works .grid').magnificPopup({
                delegate: 'a',
                type: 'image'
            });
        });

        /*--------------------------------------------------------
            07. COUNTERS
        --------------------------------------------------------*/
        $(function(){
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });

        /*--------------------------------------------------------
            08. NAVBAR WIDTH FIX
        --------------------------------------------------------*/
        $(function(){
            var width = $('.head').width();
            $('.navbar').css('max-width', width);
            $(window).resize(function() {
                var width = $('.head').width();
                $('.navbar').css('max-width', width);
            });
        });

        /*--------------------------------------------------------
            09. CONTACT FORM
        --------------------------------------------------------*/
        $(function() {
            var inputName = $("#contacts-name");
            var inputEmail = $("#contacts-email");
            var inputSubject = $("#contacts-subject");
            var inputMessage = $("#contacts-message");
            $("#contacts-send").click(function() {
                var name = inputName.val();
                var email = inputEmail.val();
                var subject = inputSubject.val();
                var message = inputMessage.val();
                var valid = true;

                if (name == "") {
                    inputName.css('border-color','#ed5564');
                    valid = false;
                }

                if (email == "") {
                    inputEmail.css('border-color','#ed5564');
                    valid = false;
                }

                if (subject == "") {
                    inputSubject.css('border-color','#ed5564');
                    valid = false;
                }

                if (message == "") {
                    inputMessage.css('border-color','#ed5564');
                    valid = false;
                }

                var postData = {
                    "name": name,
                    "email": email,
                    "subject": subject,
                    "message": message
                };

                if (valid) {
                    $.post("contact_me.php", postData, function(response) {
                        $("#contacts-errors").empty().css('color', '#48cfae');
                        for (var i = 0, n = response.length; i < n; i++) {
                            if (response[i].status == 0) $("#contacts-errors").css('color', '#ed5564');
                            $("#contacts-errors").append(response[i].message + "<br>");
                        }
                    }, "json");
                }
                return false;
            });

            $("#contacts input, #contacts textarea").keyup(function() {
                $(this).css('border-color', '');
            });
        });

        /*--------------------------------------------------------
            10. SCOLL TO TOP
        --------------------------------------------------------*/
        $(function(){
            if ($(window).width() > 850) {
                $(window).scroll(function(){
                    $(this).scrollTop() > 500 ? $('.scrolltop').fadeIn() : $('.scrolltop').fadeOut();
                });
                $('.scrolltop').click(function(){
                    $('html, body').animate({scrollTop: 0}, 500);
                    return false;
                });
            }
        });

        /*--------------------------------------------------------
            11. SMOOTH SCROLL
        --------------------------------------------------------*/
        $(function(){
            var height = $('nav').height();
            $('.scroll').click(function(){
                var href = $(this).attr("href");
                var hash = href.substr(href.indexOf("#"));
                if (hash == '#home') {
                    $('html, body').animate({scrollTop: 0}, 500);
                }
                else {
                    $('html,body').animate({scrollTop:$(this.hash).offset().top - height}, 500);
                }
            });
        });

        /*--------------------------------------------------------
            12. PAGE ANIMATIONS
        --------------------------------------------------------*/
        $(function(){
            new WOW().init();
        });
    }); /* end of ready function */


    $(window).load(function(){

        /*--------------------------------------------------------
            13. PRELOADER
        --------------------------------------------------------*/
        $(function(){
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({'overflow':'visible'});
        });

        /*--------------------------------------------------------
            14. ISOTOPE
        --------------------------------------------------------*/
        $(function(){
            var $container = $('#works .grid');
            $container.imagesLoaded(function() {
                $container.isotope({
                    itemSelector: '.item',
                    layoutMode: 'fitRows'
                });
            });
            $('#works .filters li').click(function() {
                $('#works .filters li').removeClass('active');
                $(this).addClass('active');
                var filter = $(this).attr('data-filter');
                $('#works .item').each(function(){
                    $(this).find('a').css({
                        'cursor': 'pointer'
                    });
                    $(this).css({
                        '-webkit-transform': 'scale(1)',
                        '-moz-transform': 'scale(1)',
                        '-o-transform': 'scale(1)',
                        'transform': 'scale(1)',
                        'opacity': 1
                    });
                    if (filter != '*' && !$(this).hasClass(filter)) {
                        $(this).find('a').css({
                            'cursor': 'not-allowed'
                        });
                        $(this).css({
                            '-webkit-transform': 'scale(0.8)',
                            '-moz-transform': 'scale(0.8)',
                            '-o-transform': 'scale(0.8)',
                            'transform': 'scale(0.8)',
                            'opacity': '0.3'
                        });
                    }
                });
            });
        });
    }); /* end of load function */
})(jQuery);