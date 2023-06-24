                <!---- Main pane starts here ---->
                
                <div class="prop-rating-top"> 
                    <table>                            
                        <tr>
                            <td width="50px" valign="top"><div class="top-booking-icon prop-rating-icon"></div></td>
                            <td>
                                <div class="dash-bt-header white-txt">Property Rating</div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td width="50px" valign="top"></td>
                            <td>
                                <div class="dash-bt-subheader white-txt">Hello, this is your next step for verification,click this Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitationullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</div>                                     
                            </td>
                        </tr>
                    </table>                 
                </div> 
                
                <div class="survey-container">
                    <form method="POST" id="ratingForm">
                        <div class="form-controls-container">
                            <div class="result-bar"></div>
                                <label>How satisfied are you using this property?</label>
                                <div class="survey-option-container">
                                    <div class="survey-option-item satifaction-option" id="satifaction-option-1">
                                        <div class="survey-icon extremely-unsatisfied-blk"></div>
                                        <div class="survey-txt">Extremely Unsatisfied</div>
                                    </div>
                                    <div class="survey-option-item satifaction-option" id="satifaction-option-2">
                                        <div class="survey-icon unsatisfied-blk"></div>
                                        <div class="survey-txt">Unsatisfied</div>                                    
                                    </div>
                                    <div class="survey-option-item satifaction-option" id="satifaction-option-3">
                                        <div class="survey-icon neutral-blk"></div>
                                        <div class="survey-txt">Neutral</div>                                    
                                    </div>
                                    <div class="survey-option-item satifaction-option" id="satifaction-option-4">
                                        <div class="survey-icon satisfied-blk"></div>
                                        <div class="survey-txt">Satisfied</div>
                                    </div>
                                    <div class="survey-option-item satifaction-option" id="satifaction-option-5">
                                        <div class="survey-icon very-satisfied-blk"></div>
                                        <div class="survey-txt">Very Satisfied</div>                                    
                                    </div>
                                </div>
                        </div>
    
                        <div class="form-controls-container">
                            <label>Rate this property</label>
                            <div class="survey-option-container">
                                <div class="survey-option-item grade-option" id="grade-option-1">
                                    <div class="survey-box">1</div>
                                    <div class="survey-txt">Bad</div>
                                </div>
                                <div class="survey-option-item grade-option" id="grade-option-2">
                                    <div class="survey-box">2</div>                              
                                </div>
                                <div class="survey-option-item grade-option" id="grade-option-3">
                                    <div class="survey-box">3</div>                                  
                                </div>
                                <div class="survey-option-item grade-option" id="grade-option-4">
                                    <div class="survey-box">4</div>
                                </div>
                                <div class="survey-option-item grade-option" id="grade-option-5">
                                    <div class="survey-box">5</div>
                                    <div class="survey-txt">Great</div>                                    
                                </div>
                            </div>
                        </div>
    
                        <div class="form-controls-container">
                            <label>Do you have any thoughts you want to share?</label>
                            <textarea rows="10" id="rating-note" class="txtarea-survey"></textarea>
                        </div>
                        <input type="hidden" id="satisfaction-value" value="" />
                        <input type="hidden" id="grade-value" value="" />
                        <input type="hidden" id="property_id" value="<?php echo $booking['propertyID']; ?>" />
                        <div class="form-controls-container">
                            <input type="submit" class="action-btns green-bg rating-btn" value="Submit">
                        </div>
                    
                    </form>
                </div>
                <!----Transaction table ends here ---->

            </div>
            <!---- Main pane ends here ---->
<script src="<?php echo base_url(); ?>assets/js/property-rating.js"></script>