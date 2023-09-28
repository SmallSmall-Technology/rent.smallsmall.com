
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-css/verification.css" />

<!-- MAIN SECTION -->
<main class="container-fluid">
    <div class="row">
        <div class="col-md-3 verify-container">
            <div class="d-flex align-items-center">
                <p class="mr-md-4 mr-0 verify-me">Verify me</p>
                <p class="verify-number d-md-block d-none">1 of 5</p>
            </div>
            <p class="verify-body">Before you can subscribe with us we need to know who you are since this will be a long
                partnership. Please
                <a href="privacyPolicy.html">read</a> our policy on data sharing.
            </p>
            <p class="verify-number d-md-none d-block">1 of 5</p>
        </div>
        <div class="col-md-6">
            <div class="text-center mt-md-5">
                <h2 class="verify-title">Personal details</h2>
                <p class="verify-body">Provide your personal details.</p>
            </div>
            <div class="form-container mt-5">
                <form id="profileVerification" class="px-md-5 " method="POST" action="">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control verify-txt-f" id="first-name" placeholder="Firstname" />
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" class="form-control verify-txt-f" id="last-name" placeholder="Lastname" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" class="form-control verify-txt-f" id="email" placeholder="Email" />
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" class="form-control verify-txt-f" id="phone" placeholder="Phone" />
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" class="form-control verify-txt-f" id="gross-pay" placeholder="Net Monthly Income" />
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" onclick="(this.type='date')" class="form-control verify-txt-f" id="dob" placeholder="Date Of Birth" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <select id="marital-status" class="form-control verify-txt-f">
                                        <option selected>Marital status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">widowed</option>

                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- // Gender-->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <select id="inputState" class="form-control standard-select verify-txt-f gender" id="gender">
                                        <option selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- Country -->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <select class="form-control standard-select country verify-txt-f" id="country">
                                        <option value="" selected="selected">Country</option>
                                        <?php

                                        $CI = &get_instance();

                                        $countries = $CI->get_countries();

                                        foreach ($countries as $country => $value) {

                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- State -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="select customized-select">
                                    <select class="standard-select states verify-txt-f">
                                        <option value="" selected="selected">State</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="select customized-select">
                                    <input type="text" class="form-control rss-text-f verify-txt-f" id="city" placeholder="City" />
                                </div>
                            </div>
                        </div>

                        <!-- ID Number -->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" class="form-control verify-txt-f" id="passport-number" placeholder="ID Number/Driver's License" />
                                </div>
                            </div>
                        </div>

                        <!-- Linkedin Url -->

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="customized-select">
                                    <input type="text" class="form-control rss-text-f" id="linkedin-url" placeholder="Linkedin URL (optional)" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5 text-center">
                        <button type="submit" class="rss-form-button verifyBut" id="verifyBut">Next</div>
                        <!-- <a href="" class="btn verify-btn px-5 py-2 rss-form-button verifyBut">Next</a> -->
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?php echo base_url() . 'assets/js/verification.js' ?>"></script>

<script src="<?php echo base_url() . 'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url() . 'assets/js/state-picker.js' ?>"></script>