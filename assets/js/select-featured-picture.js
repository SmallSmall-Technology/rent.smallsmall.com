// JavaScript Document
function selectFeatured(evt){
	"use strict";
	var pictureList = document.getElementsByClassName('upldImg');
	
	var featPicField = document.getElementById('featuredPic');
	
	featPicField.value = evt;
	
	var clickedImg = document.getElementById(evt);	
	
	for(let i = 0; i < pictureList.length; i++){
		
		pictureList[i].classList.remove('featuredImg');
		
		/*var picOuterID = pictureList[i].parentElement.id;
		
		var parID = document.getElementById(picOuterID);
		
		parID.childNodes[0].remove();*/
	
	}
	
	clickedImg.classList.add("featuredImg");
	
	var featuredSpan = document.createElement("SPAN");
	
	featuredSpan.innerHTML = "featured";
	
	featuredSpan.classList.add("featTT");
	
	var spanID = clickedImg.parentElement.id;
	
	var outerSpan = document.getElementById(spanID);
	
	outerSpan.appendChild(featuredSpan);
	
	clickedImg.style.borderColor = "#3ac47d";
}