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
    }

    function slidingPanels() {
        /**
         * Control all sliding panels with this single function. 
         * @params toggle-btn
         */

        let a = $(".toggle-btn"),
            x = $(".panel-close"),
            body = $(document.body)

        $(document).ready(function () {
            $(a).on("click", function () {
                let b = this.dataset['target'],
                    c = `#${b}`

                $(body).addClass("show-overlay")
                $(this)
                $(c)
                    .addClass("open")

            })
        });

        $(x).on('click', function () {
            let y = this.dataset['target'],
                z = `#${y}`
            $(body).removeClass("show-overlay")
            $(z).removeClass("open")
        })
    }

    function productSearch() {
        /**
         * Search for products from product post type. Pass the action parameter to inc/woocommerce-hooks function to fetch and display the data. 
         * 
         */
        let searchInpt = $("input[name='product-search']"),
            searchRes = $(".search-results"),
            searchPanel = $(".search-panel"),
            searchTime, 
            searchBar = $(".search-progress")

        $(searchInpt).on("input", function () {
            let searchVal = $(this).val()

            if (searchVal.length > 3) {
                $.ajax({
                    type: "post",
                    url: 'https://localhost/newman-tactical/wp-admin/admin-ajax.php',
                    data: { action: 'data_fetch', keyword: searchVal },
                    beforeSend: function () {
                        $(searchRes).html("Fetching..")
                        searchTime = new Date().getTime();
                    },
                    success: function (response) {
                        $(searchRes).html(response)
                    },
                    complete: function () {
                        $(searchPanel).addClass('show-results')
                        $(searchBar).css({ "transition-duration": new Date().getTime() - searchTime + 'ms' , 'width': '100%'})
                    }
                });
            } else {
                $(searchRes).html("")
                $(searchBar).css({ 'width': '0'})
                if (window.innerWidth < 579) {
                    $(searchPanel).css({
                        height: "81px"
                    })
                }
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
