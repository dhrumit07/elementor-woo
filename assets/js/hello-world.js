( function( $ ) {

	//
	// /**
 	//  * @param $scope The Widget wrapper element as a jQuery element
	//  * @param $ The jQuery alias
	//  */
	// var WidgetHelloWorldHandler = function( $scope, $ ) {
	// 	console.log( $scope );
	// };
	//
	// // Make sure you run this code under Elementor.
	// $( window ).on( 'elementor/frontend/init', function() {
	// 	elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', WidgetHelloWorldHandler );
	// } );


	$('.modal-link').click(function(){
		$('.modal').show();
		$('.modal-bg').show();
	});
	$('.modal .close').click(function(){
		$('.modal').hide();
		$('.modal-bg').hide();
	})

	$("#product_submit").submit(function (e) {
		e.preventDefault();

		let name  = $("#name").val();
		let price =  $("#price").val();
		if ( name && price ){
			$.ajax( {
				url: ElementorWoo.root + 'wc/v3/products',
				method: 'POST',
				beforeSend: function ( xhr ) {
					xhr.setRequestHeader( 'X-WP-Nonce', ElementorWoo.nonce );
				},
				data:{
					name :name,
					regular_price : price
				}
			} ).done( function ( response ) {
				alert("Product Created sucessfully!");
			} );
		} else {
			alert("Please enter name and price");
		}

		$('.modal').hide();
		$('.modal-bg').hide();
	});


} )( jQuery , ElementorWoo );
