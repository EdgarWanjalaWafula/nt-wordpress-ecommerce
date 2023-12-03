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

    function miscScripts() {
        $(".parralax-window").parallax({ speed: .3 })
    }

    function slidingPanels() {
        /**
         * Control all sliding panels with this single function. 
         * @params toggle-btn
         */

        let a = $(".toggle-btn")
        $(a).on("click", function () {
            let b = this.dataset['target'],
                c = `#${b}`
            $(this)
            $(c)
                .addClass("open")
        })
    }

    function productSearch() {
        /**
         * Search for products from product post type. Pass the action parameter to inc/woocommerce-hooks function to fetch and display the data. 
         * @param data_fetch
         * @param 
         */
        let searchInpt = $("input[name='product-search']"),
            searchRes = $(".search-results")

        $(searchInpt).on("input", function () {
            let searchVal = $(this).val()

            if (searchVal.length > 4) {
                $.ajax({
                    type: "post",
                    url: 'https://localhost/newman-tactical/wp-admin/admin-ajax.php',
                    data: { action: 'data_fetch', keyword: searchVal },
                    success: function (response) {
                        $(searchRes).html(response)
                    }
                });
            }

        })
    }
});
