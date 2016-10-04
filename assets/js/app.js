/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    $window = $(window),
    states,
    prevUrl,
    $root = '/';
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
            $(window).resize(function(event) {});
            $(document).ready(function($) {
                $body = $('body');
                $ajaxContainer = $('#lightbox .inner');
                History.Adapter.bind(window, 'statechange', function() {
                    var State = History.getState();
                    console.log(State);
                    var content = State.data;
                    if (content.type == 'project') {
                        $body.addClass('project');
                        app.loadContent(State.url, $ajaxContainer);
                    } else if (content.type == 'index') {
                        $body.removeClass('project lightbox');
                        setTimeout($ajaxContainer.empty, 300);
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
                    if ($el.data('target') == "project") {
                        History.pushState({
                            type: 'project'
                        }, $sitetitle + " | " + $el.data('title'), $el.attr('href'));
                    } else if ($el.data('target') == "index") {
                        e.preventDefault();
                        app.goIndex();
                    }
                });
                $(".project").hover(app.hoverVideo, app.hideVideo);
                $("#js-words").Morphext({
                    animation: "flipInX",
                    separator: ",",
                    speed: 1000
                });
                $('.quotes').slick({
                    dots: true,
                    arrows: false,
                    fade: true,
                    adaptiveHeight: true,
                    autoplay: true,
                    speed: 500
                });
                $("#lightbox").click(function() {
                    app.goIndex();
                }).children().click(function(e) {
                    return false;
                });
                $window.load(function() {
                    $(".loader").fadeOut("fast");
                });
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
            states = History.savedStates;
            prevUrl = states[states.length - 2].hash;
            History.pushState({
                type: 'index'
            }, $sitetitle, prevUrl);
        },
        loadContent: function(url, target) {
            target.load(url + ' #wrapper', function(response) {
                $body.addClass('lightbox');
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