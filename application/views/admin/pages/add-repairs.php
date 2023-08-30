<div class="app-main__outer">

<div class="app-main__inner">

    <div class="app-page-title">

        <div class="page-title-wrapper">

            <div class="page-title-heading">

                <div class="page-title-icon">

                    <i class="pe-7s-user text-success">

                    </i>

                </div>

                <div>

                    Add Repairs	

                </div>

            </div>

            </div>

    </div> 

    <div class="tab-content">			

        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

            <div class="main-card mb-3 card">

                <div class="card-body"><h5 class="card-title">New Repairs</h5>

                <?php //echo @$error; ?> <!-- Error Message will show up here -->

                <?php //echo @$success; ?> <!-- Error Message will show up here -->

                <?php //echo form_open_multipart('admin/admin_signup/'.$this->session->userdata('adminID').'');?>

                <?php echo form_open_multipart('landlord/add_repairs');?>

                    <div class="position-relative row form-group"><label for="fname" class="col-sm-2 col-form-label">Repair type</label>

                        <div class="col-sm-10"><input name="repair_type" id="repair_type" placeholder="Repair type" type="text" class="verify-txt form-control"></div>

                    </div>

                    <div class="position-relative row form-group"><label for="lname" class="col-sm-2 col-form-label">Cost</label>

                        <div class="col-sm-10"><input name="cost" id="cost" placeholder="cost" type="text" class="verify-txt form-control"></div>

                    </div>

                    <div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Date</label>

                        <div class="col-sm-10"><input name="repair_date" id="repair_date" placeholder="date" type="date" class="verify-txt form-control"></div>

                    </div>

                    <div class="position-relative row form-group"><label for="property" class="col-sm-2 col-form-label">Property</label>

                        <input type="hidden" name = "sub_id" value = "<?php echo @$ids ?>">

                        <input type="hidden" name = "sub-propty" id= "sub-propty" value = "">

                        <div class="position-relative form-group">
                            <input type = "text" id = "live_search" placeholder="Type a property here..." value="" style = "width:100%" />
                            <ul id="searchresult" style = " display: none; list-style: none; padding: 2em; border: 1px solid black; margin-top: 2em; border-radius: 10px; cursor: pointer;"></ul> 
                        </div>
                        
                    </div>

                    <div class="position-relative row form-group"><label for="userAccess" class="col-sm-2 col-form-label">Status</label>

                        <div class="col-sm-10">

                            <select name="repair_status" id="repair_status" class="form-control verify-txt">

                                <option value="">Select Option</option>

                                <option value="progress">In progress</option>

                                <option value="completed">completed</option>
        
                            </select>

                        </div>

                    </div>

                    

                    <!--<div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Profile Image</label>

                        <div class="col-sm-10"><input id='real-input' name='userfile' type="file" class="form-control-file">

                            <small class="form-text text-muted">Select an image for the article (JPG, GIF or PNG format only)</small>

                        </div>

                    </div>-->



                    <div class="position-relative row form-check">

                        <div class="col-sm-10 offset-sm-2">

                            <input type="submit" value="submit"/>

                        </div>

                    </div>


                </form>

                </div>

            </div>

        </div>

    </div>

</div>