
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/verification.css" />

<main class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-12 col-lg-3 verify-container">
            <div class="d-flex align-items-center">
                <p class="mr-md-4 mr-0 verify-me">Verify me</p>
                <p class="verify-number d-md-block d-none">3 of 5</p>
            </div>
            <p class="verify-body">Before you can subscribe with us, we need to know who you are since this will be a long partnership. Please <a href="<?php echo base_url('privacy-policy'); ?>">read</a> our policy on data sharing.</p>
            <p class="verify-number d-md-none d-block">3 of 5</p>
        </div>
        <div class="col-md-8 col-12 col-lg-6">
            <div class="text-center mt-md-5">
                <h2 class="verify-title">Employment history</h2>
                <p class="verify-body">Provide your employment history</p>
            </div>
            <div class="form-container mt-5">
                <form id="employmentForm" class="px-md-5" method="POST" autocomplete="off">

                    <!-- Employment status -->
                    <div class="d-flex row">
                        <div class="col-md-6 col-12">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="employment-status" name="employment-status" class="form-control employment_status verify-txt-f">
                                                <option selected disabled>Employment status</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Self employed">Self employed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Occupation -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <input type="text" class="form-control job_title verify-txt-f" id="occupation" placeholder="Occupation / Job title" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Company Name -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <input type="text" class="form-control company_name verify-txt-f" id="companyName" placeholder="Company Name" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Company Address -->
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control company_address verify-txt-f" id="companyAddress" rows="5" placeholder="Company address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Horizontal divider -->
                    <div class="divider my-5"></div>

                    <!-- HR Manager's details -->
                    <div>
                        <div class="text-center my-md-5 mb-3">
                            <h2 class="verify-title">HR Manager's details</h2>
                        </div>
                        <div class="row">

                            <!-- HR Name -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control manager_hr_name verify-txt-f" id="hrName" placeholder="HR manager’s name">
                                    </div>
                                </div>
                            </div>

                            <!-- HR Phone Number -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control manager_hr_phone verify-txt-f" id="hrPhone" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>

                            <!-- HR Email -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control manager_hr_email verify-txt-f" id="hrEmail" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Horizontal divider -->
                    <div class="divider my-5"></div>

                    <!-- Guarantor's details -->
                    <div>
                        <div class="text-center my-md-5 mb-3">
                            <h2 class="verify-title">Guarantor details</h2>
                            <p class="verify-body">Provide your guarantor's history</p>
                        </div>
                        <div class="row">

                            <!-- Guarantor Name -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control guarantor_name verify-txt-f" id="guarantorName" placeholder="Guarantor name">
                                    </div>
                                </div>
                            </div>

                            <!-- Guarantor Phone -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control guarantor_phone verify-txt-f" id="guarantorPhone" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>

                            <!-- Guarantor Email -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control guarantor_email verify-txt-f" id="guarantorEmail" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <!-- Guarantor Occupation -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control guarantor_job_title verify-txt-f" id="guarantorOccupation" placeholder="Occupation/Job Title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <textarea class="form-control guarantor_address verify-txt-f" id="guarantorAddress" rows="5" placeholder="Address"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit or next button -->
                    <div class="row mb-5">
                        <div class="col-12 mt-5 text-center">
                            <a href="#" class="text-dark mr-4 text-decoration-none">&lt; &nbsp;back</a>
                            <button type="submit" class="btn verify-btn px-5 py-2 rss-form-button verifyBut" id="verifyBut">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="<?php echo base_url() . 'assets/js/verification.js' ?>"></script>

<!--Bootstrap js and Popper js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

