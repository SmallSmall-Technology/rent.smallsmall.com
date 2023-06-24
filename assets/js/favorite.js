if(localStorage.getItem('favCart') != null){
	
	var alreadyWished = JSON.parse(localStorage.getItem('favCart'));
	
	var prop_id = $('.property_id').val(); 
	
	for(let i = 0; i < alreadyWished.favoriteItems.length; i++){
		
		if(prop_id == alreadyWished.favoriteItems[i]){

			$('.sal-icns').removeClass("like"); 
			$('.sal-icns').addClass("liked");
		}
	} 
} 

$('.favorite-prop').click(function(){
	
	"use strict";
	
	//Remove liked 
	var id = $('.property_id').val(); 
	
	$('.sal-icns').removeClass("like");
	
	if(localStorage.getItem('favCart') === null){
		
		//Create a unique localstorage basket ID
		var basketID = '_' + Math.random().toString(36).substr(2, 9);

		var itemCount = 0;
		var wishListCart = {
							"id": basketID,
							"favoriteItemCount": itemCount,
							"favoriteItems" : []
					   		}; 

		window.localStorage.setItem('favCart', JSON.stringify(wishListCart));	
		
	}else{
				
		var existing = 0;
		//Get all wishlisted product
		var alreadyWished = JSON.parse(localStorage.getItem('favCart'));
		
		if(alreadyWished.favoriteItems.length > 0){
			
			for(let i = 0; i < alreadyWished.favoriteItems.length; i++){
				if(id == alreadyWished.favoriteItems[i] ){
				   
					$('.sal-icns').removeClass("liked"); 
					$('.sal-icns').addClass("like");
					alreadyWished.favoriteItems.splice(i, 1);
					alert("Removed from favorites");
					window.localStorage.setItem('favCart', JSON.stringify(alreadyWished));
					existing = 1; 
					return false;
				}
			} 
		}
		
		if(!existing){
			alreadyWished.favoriteItems.push(id);
			$('.sal-icns').removeClass("like");
			$('.sal-icns').addClass("liked");
			alert("Added to favorites");
			window.localStorage.setItem('favCart', JSON.stringify(alreadyWished));	
			return false;
		}		
		
	}	
	//Add to local storage
});
$('.share-prop').click(function(){
	"use strict";
	if ($('.share-content').is(':hidden') ) {
		
		$('.share-content').show(200);
		
		return false;
		
	}else{
		
		$('.share-content').hide(200);
		
		return false;
		
	}
});
