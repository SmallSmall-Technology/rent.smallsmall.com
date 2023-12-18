// JavaScript Document
// function selectFeatured(evt){
// 	"use strict";
// 	var pictureList = document.getElementsByClassName('upldImg');
	
// 	var featPicField = document.getElementById('featuredPic');
	
// 	featPicField.value = evt;
	
// 	var clickedImg = document.getElementById(evt);	
	
// 	for(let i = 0; i < pictureList.length; i++){
		
// 		pictureList[i].classList.remove('featuredImg');
		
// 		/*var picOuterID = pictureList[i].parentElement.id;
		
// 		var parID = document.getElementById(picOuterID);
		
// 		parID.childNodes[0].remove();*/
	
// 	}
	
// 	clickedImg.classList.add("featuredImg");
	
// 	var featuredSpan = document.createElement("SPAN");
	
// 	featuredSpan.innerHTML = "featured";
	
// 	featuredSpan.classList.add("featTT");
	
// 	var spanID = clickedImg.parentElement.id;
	
// 	var outerSpan = document.getElementById(spanID);
	
// 	outerSpan.appendChild(featuredSpan);
	
// 	clickedImg.style.borderColor = "#3ac47d";
// }


var baseUrl = "https://dev-rent.smallsmall.com/";

// function selectFeatured(evt) {
//     "use strict";
//     var pictureList = document.getElementsByClassName('upldImg');
//     var featPicField = document.getElementById('featuredPic');
//     featPicField.value = evt;

//     // Get the folder name from the hidden input field
//     var foldername = document.getElementById('foldername').value;

//     // Remove the "featuredImg" class from all images
//     for (let i = 0; i < pictureList.length; i++) {
//         pictureList[i].classList.remove('featuredImg');
//         var spanID = pictureList[i].parentElement.id;
//         var outerSpan = document.getElementById(spanID);
//         // Remove the "featured" span
//         var featuredSpan = outerSpan.querySelector(".featTT");
//         if (featuredSpan) {
//             outerSpan.removeChild(featuredSpan);
//         }
//         // Reset border color
//         pictureList[i].style.borderColor = "";
//     }

//     // Add the "featuredImg" class to the clicked image
//     var clickedImg = document.getElementById(evt);
//     clickedImg.classList.add("featuredImg");

//     // Add the "featured" span to the clicked image's parent
//     var featuredSpan = document.createElement("SPAN");
//     featuredSpan.innerHTML = "Featured";
//     featuredSpan.classList.add("featTT");
//     var spanID = clickedImg.parentElement.id;
//     var outerSpan = document.getElementById(spanID);
//     outerSpan.appendChild(featuredSpan);

//     // Make an AJAX request to the PHP controller to update the S3 bucket
//     $.ajax({
//         type: "POST",
//         url: baseUrl + 'admin/propertiesFeatureImage/',
//         data: { imageKey: evt, foldername: foldername }, // Include the folder name in the request
//         success: function (response) {
//             // Handle the response from the controller (e.g., display a success message)
//             console.log('Image featured successfully.');
//         },
//         error: function () {
//             console.error('Failed to feature image.');
//         }
//     });
// }


// Use for removeImg
function selectFeatured(evt) {
    "use strict";
    var pictureList = document.getElementsByClassName('upldImg');
    var featPicField = document.getElementById('featuredPic');
    featPicField.value = evt;

    // Get the folder name from the hidden input field
    var foldername = document.getElementById('foldername').value;

    // Remove the "featuredImg" class from all images
    for (let i = 0; i < pictureList.length; i++) {
        pictureList[i].classList.remove('featuredImg');
        var spanID = pictureList[i].parentElement.id;
        var outerSpan = document.getElementById(spanID);
        // Remove the "featured" span
        var featuredSpan = outerSpan.querySelector(".featTT");
        if (featuredSpan) {
            outerSpan.removeChild(featuredSpan);
        }
        // Reset border color
        pictureList[i].style.borderColor = "";
    }

    // Add the "featuredImg" class to the clicked image
    var clickedImg = document.getElementById(evt);
    clickedImg.classList.add("featuredImg");

    // Add the "featured" span to the clicked image's parent
    var featuredSpan = document.createElement("SPAN");
    featuredSpan.innerHTML = "Featured";
    featuredSpan.classList.add("featTT");
    var spanID = clickedImg.parentElement.id;
    var outerSpan = document.getElementById(spanID);
    outerSpan.appendChild(featuredSpan);

    // Make an AJAX request to the PHP controller to update the S3 bucket
    $.ajax({

        type: "POST",

        url: baseUrl + 'admin/removeImg/',

        data: { imageKey: evt, foldername: foldername }, // Include the folder name in the request

        success: function (response) {

            // Handle the response from the controller (e.g., display a success message)
            console.log('Image featured successfully.');
            
            if(response == 1){
										
                alert("Image successfully deleted!" );
                
                $('.removal-id-'+id).remove();
                        
            }else{

                alert('Could not delete image');
                
                $('.remove-img').html('remove <i class"fa fa-trash"></i>');

            }				


            

        },

        error: function () {

            console.error('Failed to feature image.');

        }

    });
}

