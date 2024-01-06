/**
 * @author 	Edgar Wanjala Wafula 
 * @url 	https://edgarwanjala.co.ke
 * 
 * Website integration scripts
 */

'use strict'

jQuery(document).ready(function ($) {
    miscScripts()
    slidingPanels()
    productSearch()
    singleProductScripts()

    function miscScripts() {
        $(".parralax-window").parallax({ speed: .3 })

        // let modalWindow = $("#offer-modal")
        // if (modalWindow.length > 0) {
        //     const myModal = new bootstrap.Modal(modalWindow, {
        //         keyboard: false
        //     })

        //     setTimeout(() => {
        //         myModal.show(myModal)
        //     }, 1800);
        // }

        if ($('.theme-carousel').length) {
            $('.theme-carousel').owlCarousel({
                loop:true,
                animateOut: 'fadeOut',
                autoplay:true,
                margin:10,
                dots:false,
                nav:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        }

        // $("#newman-bike-reel").YTPlayer({
        //     optimizeDisplay:false,
        //     showControls:false,
        //     videoURL:'https://youtu.be/1R-avBbNLIo',
        //     containment:'.video-bg',
        //     autoPlay:true,
        //     mute:true,
        //     startAt:0,
        //     showYTLogo: false, 
        //     opacity:1,
        //     onReady: function () {
        //         $('body').addClass('video-ready')
        //     }
        // }); // Load Youtube Player 
    }

    function slidingPanels() {
        /**
         * Control all sliding panels with this single function. 
         * @params toggle-btn
         */

        let a = $(".toggle-btn"),
            x = $(".panel-close"),
            body = $(document.body),
            slidingPanelTL = gsap.timeline({ defaults: { duration: .8, ease: "expo.inOut" } })

        $(a).on("click", function () {
            let b = this.dataset['target'],
                c = `#${b}`

            $(body).addClass("show-overlay")
            $(this)
            $(c)
                .addClass("open")

        })

        $(x).on('click', function () {
            let y = this.dataset['target'],
                z = `#${y}`
            $(body).removeClass("show-overlay")
            $(z).removeClass("open")
        })
    }

    function productSearch() {
        /**
         * Search for products from product post type. Pass the action parameter to inc/woocommerce-hooks function to fetch and display the data. Localized 
         * 
         */
        let searchInpt = $("input[name='product-search']"),
            searchRes = $(".search-results"),
            searchPanel = $(".search-panel"),
            searchTime,
            searchBar = $(".search-progress"),
            wpAjaxURL = localized_objects['wp-ajax-url'], 
            searchTl = gsap.timeline({ defaults: { duration: .8, ease: "expo.inOut" } })

        $(searchInpt).on("input", function () {
            let searchVal = $(this).val()

            if (searchVal.length > 3) {
                $.ajax({
                    type: "post",
                    url: wpAjaxURL,
                    data: { action: 'data_fetch', keyword: searchVal },
                    beforeSend: function () {
                        $(searchRes).html("Fetching..")
                        searchTime = new Date().getTime();
                    },
                    success: function (response) {
                        // (() => {
                        //     searchTl
                        //         .to(searchPanel, { height: '50vh' })
                        //         .to(searchBar, { transitionDuration: new Date().getTime() - searchTime + 'ms', width: '100%' })
                        //         .call(() => {
                        //             $(searchRes).html(response)
                        //         })
                        // })()
                        setTimeout(() => {
                            $(searchRes).html(response)
                        }, (new Date().getTime() - searchTime) / 2);
                    },
                    complete: function () {
                        $(searchPanel).addClass('show-results')
                        $(searchBar).css({ "transition-duration": new Date().getTime() - searchTime + 'ms', 'width': '100%' })
                    }
                });

                return
            } else {
                $(searchRes).html("")
                $(searchBar).css({ 'width': '0' })
                $(searchPanel).removeClass('show-results')
            }
        })
    }

    function singleProductScripts() {
        /**
         * 1. Select shoe size value
         * 2. Add, minus quantity value
         */
        let a = $('input[name="newman_shoe_size"]'),
            b = $(".single_add_to_cart_button"),
            c = $(".size-list li"),
            d = $(".quantity-cart .qty-plus-minus i"),
            e = $(".quantity-cart input")

        if ($(!c || !a)) {
            $(c).on('click', function () {
                $(c).removeClass("selected")
                $(this).addClass("selected")
                $(a).attr('value', (this.dataset['size']))
            })
        }

        if ($(d)) {
            $(d).on('click', function () {
                let f = $(e).attr('value')

                if ($(this).hasClass('qty-add')) {

                    if (f > 6) { // set the max 
                        return
                    }

                    $(e).attr('value', parseInt(f) + 1)

                    return //
                }

                if (f < 2) { // check the min 
                    return
                }

                $(e).attr('value', parseInt(f) - 1)
            })
        }
    }
});
