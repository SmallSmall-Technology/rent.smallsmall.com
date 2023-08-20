// // JavaScript Document
// // function selectFeatured(evt){
// // 	"use strict";
// // 	var pictureList = document.getElementsByClassName('upldImg');
	
// // 	var featPicField = document.getElementById('featuredPic');
	
// // 	featPicField.value = evt;
	
// // 	var clickedImg = document.getElementById(evt);	
	
// // 	for(let i = 0; i < pictureList.length; i++){
		
// // 		pictureList[i].classList.remove('featuredImg');
		
// // 		/*var picOuterID = pictureList[i].parentElement.id;
		
// // 		var parID = document.getElementById(picOuterID);
		
// // 		parID.childNodes[0].remove();*/
	
// // 	}
	
// // 	clickedImg.classList.add("featuredImg");
	
// // 	var featuredSpan = document.createElement("SPAN");
	
// // 	featuredSpan.innerHTML = "featured";
	
// // 	featuredSpan.classList.add("featTT");
	
// // 	var spanID = clickedImg.parentElement.id;
	
// // 	var outerSpan = document.getElementById(spanID);
	
// // 	outerSpan.appendChild(featuredSpan);
	
// // 	clickedImg.style.borderColor = "#3ac47d";
// // }

// // JavaScript Document updated for s3 features images
// function selectFeatured(evt) {
//     "use strict";
//     var pictureList = document.getElementsByClassName('upldImg');
//     var featPicField = document.getElementById('featuredPic');
//     featPicField.value = evt;
//     var clickedImg = document.getElementById(evt);

//     // Assuming you have a new order (e.g., imageOrder) for the images
//     // based on the selected featured image.
//     // You need to retrieve or generate this order in your PHP backend.

//     // Example imageOrder: ["image3.jpg", "image1.jpg", "image2.jpg", ...]

//     // Implement logic to reorder the images in the S3 bucket based on imageOrder.
//     reorderImagesInS3(imageOrder);
// }

// function reorderImagesInS3(imageOrder) {
//     // Implement logic to copy objects to new keys (filenames) based on imageOrder.
//     // You'll need to use AWS SDK for PHP to interact with S3.
//     // Loop through imageOrder and copy objects accordingly.

//     // Example logic (simplified):
//     for (var i = 0; i < imageOrder.length; i++) {
//         var sourceKey = "uploads/properties/" + foldername + "/" + imageOrder[i];
//         var destinationKey = "uploads/properties/" + foldername + "/new-" + imageOrder[i]; // New key/filename
//         copyObjectToS3(sourceKey, destinationKey);
//     }

//     // Delete old objects (images) after copying to new keys (filenames).
//     // This step requires careful handling to avoid data loss.
// }

// function copyObjectToS3(sourceKey, destinationKey) {
//     // Implement logic to copy an object from sourceKey to destinationKey in S3.
//     // You can use the AWS SDK for PHP to copy objects between keys.

//     // Example logic (simplified):
//     try {
//         var params = {
//             Bucket: bucket,
//             CopySource: bucket + "/" + sourceKey,
//             Key: destinationKey
//         };

//         s3.copyObject(params, function (err, data) {
//             if (err) {
//                 console.log("Error copying object: " + err);
//             } else {
//                 console.log("Object copied successfully: " + destinationKey);
//             }
//         });
//     } catch (err) {
//         console.log("Error copying object: " + err);
//     }
// }
