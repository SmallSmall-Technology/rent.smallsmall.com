    <div class="other-content">
            <div class="verification-container">
                <div class="ver-page">Verify Me</div>
                <div class="ver-note">Before you can subscribe with us we need to know who you are since this will be a long partnership. We do not share data with any 3rd party or government agency.</div>
                <div class="ver-curr">Uploads</div>
                <div class="progress" style="height: 9px; width: 100%;">
                    <div class="progress-bar" role="progressbar" style="width: 40%; background: #007DC1 !important;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <ul id="progressbar">
                    <li class="active verification"></li>
                    <li class="active verification"></li>
                    <li class="active verification"></li>
                    <li class="active verification"></li>
                </ul>
                <div class="ver-form-container">
                    <form id="uploadForm" class="verificationForm regForm" method="POST" enctype="multipart/form-data">
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <label>Bank Statement</label>
                                <div class="approved-files">Accepted file types: PDF</div> 
                                <div class="drop-boxes" id="dropzone-bank">
                                    <input type="file" class="input statement-inp" id="upload" hidden />
                                    <div id="dd-dir">Drag and Drop or <span class="browse-btn">Browse</span></div>
                                </div>
                                <div class="file-dets">
                                    <div class="file-name">
                                        <div id="statement-fileName" class="fileName"></div>
                                    </div>

                                    <div class="progress-container" id="statement-progress">
                                        <div class="meter">

                                            <div class="meter-text" id="statement-meter-text"></div>

                                            <span id="statement-progress-bar" style="width:0%"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-holder">
                                <label>Valid ID</label> 
                                <div class="approved-files">Accepted file types: JPG, JPEG, PNG, PDF</div>                       
                                <div class="drop-boxes" id="dropzone-id">
                                    <input type="file" class="input2 identification-inp" id="upload" hidden />
                                    <div  id="dd-dir">Drag and Drop or <span class="browse-btn-2">Browse</span></div>
                                </div>
                                
                                <div class="file-dets">
                                    <div class="file-name">
                                        <div id="id-fileName" class="fileName"></div>
                                    </div>

                                    <div class="progress-container" id="id-progress">
                                        <div class="meter">

                                            <div id="id-meter-text" class="meter-text"></div>

                                            <span id="id-progress-bar" style="width:0%"></span>

                                        </div>                                    
                                    </div>                                   
                                </div>

                            </div>
                        </div>
                        <div class="form-input-cont">
                            <label><input name="terms-use-link" type="radio" />I agree that the submission of this information does not guarantee that RentSmallSmall will offer this property to me and that RentSmallSmall may reject the application without giving any reasons. Term of Use</label>
                        </div>
                        <div class="form-input-cont">
                            <label><input name="tenancy-term" type="radio" />I have read and agreed to the Subscription terms, and a personalized copy will be sent to me via email before I move into the property.</label>
                        </div> 
                        <div class="form-input-cont">
                            <div class="input-holder">
                                <button type="submit" class="rss-form-button verifyBut" id="verifyBut">Finish</div>
                            </div>
                            <div class="input-holder">                        
                                &nbsp;
                            </div>
                        </div> 
                        <input type="hidden" id="userID" value="<?php echo @$userID; ?>" />
        
                		<input type="hidden" id="statement" value="" />
                
                		<input type="hidden" id="idcard" value="" />
                
                		<input type="hidden" id="statement-state" value="0" />
                
                		<input type="hidden" id="id-state" value="0" />                     
                    </form>
                </div>
            </div>

        </div>
        
        <script>
                 
                var baseUrl = "https://dev-rent.smallsmall.com/";
                
                let button = document.querySelector('.browse-btn');
                let input = document.querySelector('.input');

                let button2 = document.querySelector('.browse-btn-2');
                let input2 = document.querySelector('.input2');

                let file;
                let file2;

                button.onclick = () =>{
                    input.click();
                };

                button2.onclick = () =>{
                    input2.click();
                };
                
                input2.addEventListener('change', function() {
                	"use strict";
                	var fd = new FormData();
                	var files = $(this)[0].files[0];
                	var folderName = $('#userID').val();
                	var filepath = "";
                	
                	//alert(files[0].name);
                	
                	//return false;
                	
                	fd.append('files',files);        
                	$.ajax({
                		xhr: function() {
                			var xhr = new window.XMLHttpRequest();
                			xhr.upload.addEventListener("progress", function(evt) {
                				if (evt.lengthComputable) {
                					var percentComplete = ((evt.loaded / evt.total) * 100);
                					$("#id-progress-bar").css("width", percentComplete + '%');
                					
                					if(percentComplete === 100){
                					    
                					    $('#id-state').val(1);
                					    
                					}
                				}
                			}, false);
                			return xhr;
                		},
                		url: baseUrl+'rss/uploadIdentification/'+folderName,
                		type: 'post',
                		data: fd,
                		contentType: false,
                		processData: false,
                		beforeSend: function(){
                			$('#id-meter-text').html("Uploading...");
                		},
                		success:function(data, folder, pictures){
                			filepath = folderName+'/'+files.name.replace(/\s+/g, '_');
                			$('#id-meter-text').html("Done");
                			$('#id-fileName').html("<span style='color:green;'>Successful upload</span>");
                			$('#idcard').val(filepath);
                
                		}
                	});
                });
                input.addEventListener('change', function() {
                	"use strict";
                	var fd = new FormData();
                	var files = $(this)[0].files[0];
                	var folderName = $('#userID').val();
                	var filepath = "";
                	
                	//alert(files[0].name);
                	
                	//return false;
                	
                	fd.append('files',files);        
                	$.ajax({
                		xhr: function() {
                			var xhr = new window.XMLHttpRequest();
                			xhr.upload.addEventListener("progress", function(evt) {
                				if (evt.lengthComputable) {
                					var percentComplete = ((evt.loaded / evt.total) * 100);
                					$("#statement-progress-bar").css("width", percentComplete + '%');
                					if(percentComplete === 100){
                					    
                					    $('#statement-state').val(1);
                					    
                					}
                					
                				}
                			}, false);
                			return xhr;
                		},
                		url: baseUrl+'rss/uploadIdentification/'+folderName,
                		type: 'post',
                		data: fd,
                		contentType: false,
                		processData: false,
                		beforeSend: function(){
                			$('#statement-meter-text').html("Uploading...");
                		},
                		success:function(data, folder, pictures){
                			filepath = folderName+'/'+files.name.replace(/\s+/g, '_');
                			$('#statement-meter-text').html("Done");
                			$('#statement-fileName').html("<span style='color:green;'>Successful upload</span>");
                			$('#statement').val(filepath);
                
                		}
                	});
                });

                
            </script>

<script src="<?php echo base_url().'assets/js/verification.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/upload-verification-file.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/custom-file-input.js' ?>"></script>