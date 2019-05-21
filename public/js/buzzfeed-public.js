(function( $ ) {
	'use strict';

		$( document ).ready(function() {

			console.log( "ready!" ); //Test if javascript works

			//To check that this div of headline will working with
			$('.buzzfeed-headlines .buzzfeed-headline').each(function(i, widget){
				console.log("This div is: ", widget);
			

				$.post(
					buzzfeed_settings.ajax_url,
					{
						action: 'buzzfeed',
					},
					function(response) {
						if (response.success){
							console.log("I got a reponse!", response);
							
							//get each element in array
							//const output = "Test output";
							$.each(response.data, function(i, data){
								//	const test = data.author;
									//create HTML and get title, description and link
									var output = "";
									output += '<h3>Title' + data.title + '</h3>';
									output += '<p>Description'+ data.description + '</p>';
									output += '<a href=" '+ data.url +' "> Read More </a>';
									$(widget).append(output);
							}); //.each	
							
							
						} else {
							console.log("Something went wrong")
						}
						
					}
				);
			})


			
		});

})( jQuery );
