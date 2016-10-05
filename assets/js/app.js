/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    isMobile = false,
    $window = $(window);
$(function() {
    $.fn.isOnScreen = function() {
        var win = $window;
        var viewport = {
            top: win.scrollTop(),
            left: win.scrollLeft()
        };
        viewport.right = viewport.left + width;
        viewport.bottom = viewport.top + height;
        var bounds = this.offset();
        bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();
        return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    };
    var app = {
        init: function() {
            $(window).resize(function(event) {
                app.sizeSet();
            });
            $(document).ready(function($) {
                $body = $('body');
                $ajaxContainer = $('#lightbox .inner');
                $mobileMenu = $('nav.mobile-menu');
                app.centerContainer();
                History.Adapter.bind(window, 'statechange', function() {
                    var State = History.getState();
                    console.log(State);
                    var content = State.data;
                    if (content.type == 'project') {
                        $body.addClass('project');
                        app.loadContent(State.url, $ajaxContainer);
                    } else {
                        $body.removeClass('project lightbox');
                        setTimeout(function() {
                            var $frame = $('#video-player iframe');
                            $frame.attr('src', '');
                            $ajaxContainer.empty();
                        }, 500);
                    }
                });
                //esc
                $(document).keyup(function(e) {
                    if (e.keyCode === 27) app.goIndex();
                });
                //left
                $(document).keyup(function(e) {
                    if (e.keyCode === 37 && $slider) app.goPrev($slider);
                });
                //right
                $(document).keyup(function(e) {
                    if (e.keyCode === 39 && $slider) app.goNext($slider);
                });
                $('body').on('click', '[data-target]', function(e) {
                    $el = $(this);
                    e.preventDefault();
                    if (!isMobile) {
                        if ($el.data('target') == "project") {
                            History.pushState({
                                type: 'project'
                            }, $sitetitle + " | " + $el.data('title'), $el.attr('href'));
                        } else if ($el.data('target') == "index") {
                            e.preventDefault();
                            app.goIndex();
                        }
                    } else {
                        window.location.href = $el.attr('href');
                    }
                });
                $('.menu-toggle').click(function(e) {
                    e.preventDefault();
                    $mobileMenu.addClass('is-visible');
                });
                $mobileMenu.find('.close').click(function(e) {
                    e.preventDefault();
                    $mobileMenu.removeClass('is-visible');
                });
                $(".project").hover(app.hoverVideo, app.hideVideo);
                $('.quotes').slick({
                    dots: true,
                    arrows: false,
                    fade: true,
                    adaptiveHeight: true,
                    autoplay: true,
                    speed: 500
                });
                $("#lightbox, #lightbox .close").click(function(e) {
                    e.preventDefault();
                    app.goIndex();
                }).children().click(function(e) {
                    return false;
                });
                $window.load(function() {
                    $(".loader").fadeOut("fast");
                    if ($('#numbers .num').size() > 0) {
                        $window.scroll(function(event) {
                            $('#numbers .num:not(".triggered")').each(function(index, el) {
                                if ($(this).isOnScreen()) {
                                    $(this).addClass('triggered').prop('number', ($(this).data('number') - 20).toString()).animateNumber({
                                        number: $(this).data('number')
                                    }, 1500);
                                }
                            });
                        });
                    }
                    $("#js-words").Morphext({
                        animation: "flipInX",
                        separator: ",",
                        speed: 1000
                    });
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (width <= 770 || Modernizr.touch) isMobile = true;
            if (isMobile) {
                if (width >= 770) {
                    //location.reload();
                }
            }
        },
        hoverVideo: function(e) {
            $('video', this).get(0).play();
        },
        hideVideo: function(e) {
            var video = $('video', this).get(0);
            video.pause();
            video.currentTime = 0;
        },
        goIndex: function() {
            History.pushState({
                type: 'index'
            }, $sitetitle, $root);
        },
        loadContent: function(url, target) {
            console.log('load');
            target.load(url + ' #wrapper', function(response) {
                $("body iframe").on("load", function() {
                    app.centerContainer();
                    $body.addClass('lightbox');
                });
            });
        },
        ajaxLoadContent: function(url, target) {
            $.ajax({
                url: url,
                success: function(data) {
                    $(target).html(data);
                }
            });
        },
        centerContainer: function() {
            var offset = (height - $ajaxContainer.height()) / 2;
            $ajaxContainer.parent().css('padding-top', offset);
        },
        deferImages: function() {
            var imgDefer = document.getElementsByTagName('img');
            for (var i = 0; i < imgDefer.length; i++) {
                if (imgDefer[i].getAttribute('data-src')) {
                    imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
                }
            }
        }
    };
    app.init();
});