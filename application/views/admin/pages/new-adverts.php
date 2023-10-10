<div class="app-main__outer">

<div class="app-main__inner">

    <div class="app-page-title">

        <div class="page-title-wrapper">

            <div class="page-title-heading">

                <div class="page-title-icon">

                    <i class="pe-7s-chat text-success">

                    </i>

                </div>

                <div>

                    Adverts						

                </div>

            </div>

            </div>

    </div> 

    <div class="tab-content">			

        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">

            <div class="main-card mb-3 card">

                <div class="card-body"><h5 class="card-title">New Adverts</h5>
                <div class="form-report"></div>
                <?php echo form_open_multipart('admin/prc_adverts');?>

                    <div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Notification</label>

                        <input name="notificationTitle" id="notificationTitle" placeholder="Title" type="subject" class="form-control verify-txt">
                    </div>
                    <div class="position-relative form-group"><label for="notificationTitle" class="col-form-label">Advert Link</label>

                        <input name="advertTitle" id="notificationLink" placeholder="https://www.link.com" type="subject" class="form-control verify-txt">
                    </div>

                    <div class="position-relative  form-group">
                        <label for="debt-note" class="">Upload Image</label>
<<<<<<< HEAD
                        <input type="file" name="imgName"  required/>
=======
                        <input type="file" name="imgName[]" multiple required/>
>>>>>>> 23c651059074162dfecc48c23bdd2794333393e7
                    </div>
                    
                    <div class="position-relative form-group">

                        <div class="position-relative input-group">

                            <button class="submit-but btn btn-primary">Submit</button>

                        </div>

                    </div>

                </form>

                </div>

            </div>

        </div>

    </div>

</div>