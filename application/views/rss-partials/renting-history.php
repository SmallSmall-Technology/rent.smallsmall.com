<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/verification.css" />

<!-- MAIN SECTION -->
<main class="container-fluid ">
    <div class="row">
        <div class="col-md-4 col-12 col-lg-3 verify-container">
            <div class="d-flex align-items-center">
                <p class="mr-md-4 mr-0 verify-me">Verify me</p>
                <p class="verify-number d-md-block d-none">2 of 4</p>
            </div>
            <p class="verify-body">Before you can subscribe with us we need to know who you are since this will be a long
                partnership. Please
                <a href="<?php echo base_url('privacy-policy'); ?>">read</a> our policy on data sharing.
            </p>
            <p class="verify-number d-md-none d-block">2 of 4</p>
        </div>
        <div class="col-md-8 col-12 col-lg-6">
            <div class="text-center mt-md-5">
                <h2 class="verify-title">Rental history</h2>
                <p class="verify-body">Provide your rental history</p>
            </div>
            <div class="form-container mt-5">
                <form id="rentingHistoryForm" autocomplete="off" class="px-md-5 verificationForm regForm" method="POST">

                    <div class="d-flex row">

                        <div class="col-md-6 col-12 order-md-0 order-1">
                            <div class="row">

                                <!-- Country -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="country" name="country" class="form-control country verify-txt-f">
                                                <option selected="selected">Country</option>

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

                                <!-- Curent Address -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <textarea class="form-control present_address verify-txt-f" id="" rows="5">Current address</textarea>
                                    </div>
                                </div>

                                <!-- Reason for leaving -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <textarea class="form-control reason_for_leaving" id="" rows="5">Reasons for leaving</textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 col-12 order-md-1 order-0">
                            <div class="row">

                                <!-- State -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="states" class="form-control states verify-txt-f">
                                                <option value="" selected="selected">State</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <input type="text" disabled class="form-control city verify-txt-f" id="city" placeholder="City">
                                        </div>
                                    </div>
                                </div>

                                <!-- Previous Eviction -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="previous-eviction" name="previous-eviction" class="form-control previous_eviction">
                                                <option selected>Any previous eviction</option>
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Current Renting Status -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="renting_status" name="renting_status" class="form-control renting_status verify-txt-f">
                                                <option selected>Current renting status</option>
                                                <option value="Yes">Renting</option>
                                                <option value="No">Not renting</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pet -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="pets" name="pets" class="form-control pet">
                                                <option selected>Pet</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Disability/Illness -->
                                <div class=" col-12">
                                    <div class="form-group">
                                        <div class="customized-select">
                                            <select id="critical-illness" name="critical-illness" class="form-control critical_illness">
                                                <option selected>Disability/Illness</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="divider my-5"></div>

                    <div>
                        <div class="text-center my-md-5 mb-3">
                            <h2 class="verify-title">Landlord info</h2>
                        </div>
                        <div class=" row">

                            <!-- //Landlord Name -->

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control landlord_full_name verify-txt-f" placeholder="Current Landlord name" id="">
                                    </div>
                                </div>

                                <!-- Landlord Email -->
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control landlord_email verify-txt-f" placeholder="Current Landlord email" id="">
                                    </div>
                                </div>

                                <!-- Landlord Phone Number -->
                                <div class="form-group">
                                    <div class="customized-select">
                                        <input type="text" class="form-control landlord_phone verify-txt-f" placeholder="Landlord Phone Number " id="">
                                    </div>
                                </div>

                            </div>

                            <div class=" col-md-6 col-12">
                                <div class="form-group">
                                    <textarea class="form-control landlord_address verify-txt-f" id="" rows="5">Address</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-12 mt-5 text-center">
                            <a href="https://rent.smallsmall.com/rss/verification/profile-verification" class="text-dark mr-4 text-decoration-none">&lt; &nbsp;back</a>
                            <button type="submit" class="btn verify-btn px-5 py-2 rss-form-button verifyBut" id="verifyBut">Next
                                <!-- <a href="verificationThree.html" class="btn verify-btn px-5 py-2">Next</a> -->
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

<script src="<?php echo base_url() . 'assets/js/country-picker.js' ?>"></script>

<script src="<?php echo base_url() . 'assets/js/state-picker.js' ?>"></script>


<!--Bootstrap js and Popper js -->
<script src="<?php echo base_url(); ?>assets/updated-assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="<?php echo base_url(); ?>assets/updated-assets/js/bootstrap-js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>