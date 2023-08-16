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

                    Edit Agreement	

                </div>

            </div>

            </div>

    </div> 

<div class="row">
    
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                Subscription agreement
                
                <div class="btn-actions-pane-right">
                    
                </div>
        </div>
            
            
        <div class="table-responsive">
                <?php echo form_open_multipart('admin/edit_upload');?>  
                
                    <br></br>
                    <div class="form-row" style = "margin-left: 10px;">
                        
                        
                        <div class="col-md-4"><label for="debt-note" class="">Start year</label>
                        <select name="start-yr" id="start-yr" class="form-control verify-debt-txt" required>
                            
                        <?php for($i = 2020; $i < 2071; $i++){ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                        </select></div>
                        
                        
                        <div class="col-md-4"><label for="debt-note" class="">End year</label><select required = 'true' name="end-yr" id="end-yr" class="form-control verify-debt-txt">
                            
                        <?php for($i = 2020; $i < 2071; $i++){ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                        </select></div></div><br></br>
                        
                        
                    <div class="col-md-4">
                    <input type="hidden" name = "sub_id" value = "<?php echo @$ids ?>">
                    <div class="position-relative form-group"><label for="debt-note" class="">Property</label><select name="sub-propty" id="sub-propty" class="form-control verify-debt-txt">
                    <?php foreach($proptys as $propty => $value){ ?>
                        <option value="<?php echo $value['propertyID']; ?>"><?php echo $value['propertyTitle']; ?></option>
                    <?php } ?></select>
                    </div></div>  
                    
                    <div class="col-md-4">
                        <label for="debt-note" class="">Upload Document</label>
                        <input type="file" name="filename" required/>
                    </div><br></br>
                    
                    
                    <div class="col-md-4">
                        <input type="submit" value="upload"/><br></br>
                        
                    </div>
                        
                    </form>
            </div>

</div>
    </div>
</div>