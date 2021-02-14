(function ($, ElementorWoo) {

    class WidgetHandlerClass extends elementorModules.frontend.handlers.Base {

        getDefaultSettings() {
            return {
                selectors: {
                    firstSelector: '.modal-link',
                    secondSelector: '.modal',

                },
            };
        }

        getDefaultElements() {
            const selectors = this.getSettings('selectors');
            return {
                $firstSelector: this.$element.find(selectors.firstSelector),
                $secondSelector: this.$element.find(selectors.secondSelector),
            };
        }

        bindEvents() {
            // this.elements.$firstSelector.on( 'click', this.onFirstSelectorClick.bind( this ) );
            this.elements.$firstSelector.on('click', this.onFirstSelectorClick.bind(this));


        }

        onFirstSelectorClick(event) {
            event.preventDefault();


            let name = prompt("Enter Product Name", '');

            let price = prompt("Enter Price", '');

            if (name && price) {
                $.ajax({
                    url: ElementorWoo.root + 'wc/v3/products',
                    method: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('X-WP-Nonce', ElementorWoo.nonce);
                    },
                    data: {
                        name: name,
                        regular_price: price
                    }
                }).done(function (response) {
                    alert("Product Created sucessfully!");
                });
            } else {
                alert("FAILED TRY AGAIN!");
            }
            // this.elements.$secondSelector.show();
        }
    }


    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(WidgetHandlerClass, {
            $element,
            $,
            ElementorWoo


        });
    }
    // Make sure you run this code under Elementor.
    $(window).on('elementor/frontend/init', function () {
        // console.log(elementorFrontend);
        elementorFrontend.hooks.addAction('frontend/element_ready/elementor-woo.default', addHandler);
    });

    //
    // $('.modal-link').click(function(){
    // 	$('.modal').show();
    // 	$('.modal-bg').show();
    // });
    // $('.modal .close').click(function(){
    // 	$('.modal').hide();
    // 	$('.modal-bg').hide();
    // })
    //
    // $("#product_submit").submit(function (e) {
    //     e.preventDefault();
    //
    //     let name = $("#name").val();
    //     let price = $("#price").val();
    //     if (name && price) {
    //         $.ajax({
    //             url: ElementorWoo.root + 'wc/v3/products',
    //             method: 'POST',
    //             beforeSend: function (xhr) {
    //                 xhr.setRequestHeader('X-WP-Nonce', ElementorWoo.nonce);
    //             },
    //             data: {
    //                 name: name,
    //                 regular_price: price
    //             }
    //         }).done(function (response) {
    //             alert("Product Created sucessfully!");
    //         });
    //     } else {
    //         alert("Please enter name and price");
    //     }
        // $('.modal').hide();
        // $('.modal-bg').hide();
    // });


})(jQuery, ElementorWoo);
