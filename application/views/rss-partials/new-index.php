<link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/index.css" />

<!-- MAIN SECTION -->
<main class="container-fluid">
    <!-- Banner section -->
    <section class="banner">

        <!-- Notification -->
        <?php // if (isset($notifications) && !empty($notifications)) { ?>
            <!-- <div id="notification-bar-home" class="notification-bar-home">
                <div id="notification-container">
                    <span id="notification-icn">New</span>
                    <span id="notification-details" class="notification-details"><?php // echo $notifications['message']; ?></span>
                    <span id="notification-lnk"><a target="_blank" href="<?php  // echo $notifications['notification_link']; ?>"><i class="fa fa-angle-right"></i></a></span>
                </div>
            </div> -->
        <?php // } ?>
        <!-- End Notification -->

        <div class="banner-text">
            <h2>Do you want to pay rent monthly?</h2>
            <p class="font-weight-light">
                Renting doesn’t have to be hard, enjoy the ease that comes with a
                monthly payment plan.
            </p>
        </div>
        <div class="search d-md-none d-block w-100 bg-white">

            <form form method="POST" action="<?php echo base_url('rss/filter'); ?>">
                <div class="row m-0">
                    <div class="col-11 text-dark search-left">
                        <i class="fa-solid fa-location-dot location-icon"></i>
                        <span class="">Location..</span>

                        <input class="search-input" type="text" placeholder="Where would you like to live?" />

                        <datalist role="listbox" id="cities">
                            <?php if (!empty($the_cities) && isset($the_cities)) { ?>
                                <?php foreach ($the_cities as $the_city =>
                                    $each_city) { ?>
                                    <option value="<?php echo $each_city['city']; ?>"><?php echo $each_city['city']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </datalist>

                    </div>
                    <div class="col-1 search-icon">
                        <button class="submit-container s_logo" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </section>

    <!-- Supported partners -->
    <!--<section class="my-4 patners">-->
    <!--    <div class="row justify-content-center ">-->
    <!--        <div class="col-md-5 col-12 ">-->
    <!--            <div class="d-flex py-md-5  justify-content-around  align-items-center">-->
    <!--                <div class="backed-by">-->
    <!--                    <p class="m-0 pr-md-3 pr-3">Backed by</p>-->
    <!--                </div>-->
    <!--                <div class="">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/updated-assets/images/techsters.svg" alt="" />-->
    <!--                </div>-->
    <!--                <div class="">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/updated-assets/images/lenco.svg" alt="" />-->
    <!--                </div>-->
    <!--                <div class="">-->
    <!--                    <img src="<?php echo base_url(); ?>assets/updated-assets/images//oyster.svg" alt="" />-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--</section>-->

    <section class="my-4 patners">
        <div class="row justify-content-center ">
            <div class="col-md-5 col-12 ">
                <div class="d-flex py-md-5  justify-content-around  align-items-center">
                    <div class="backed-by">
                        <p class="m-0 pr-md-3 pr-3">Backed by</p>
                    </div>
                    <div class="">
                        <img src="<?php echo base_url(); ?>assets/updated-assets/images/techsters.svg" alt="" />
                    </div>
                    <!-- <div class="">
            <img src="./assets/images/lenco.svg" alt="" />
          </div> -->
                    <div class="">
                        <img src="<?php echo base_url(); ?>assets/updated-assets/images/oyster.svg" alt="" />
                    </div>
                    <div class="">
                        <img src="<?php echo base_url(); ?>assets/updated-assets/images/berrywood-logo.png" alt="" />
                    </div>
                </div>
            </div>
        </div>

    </section>


    <div class="container-md constainer-fluid my-md-4 my-2">
        <section class="smart-way row my-4">
            <div class="col-12 my-md-5 my-2">
                <h1 class="font-weight-bold">
                    The smart way to live with no barriers
                </h1>
                <p class="font-weight-light">
                    Experience a better way to live and pay flexibly.
                </p>
            </div>
            <div class="col-12 mb-5">
                <div class="primary-custom-container">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-1 col-2" style="line-height: 34px; padding-right: 0;">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/verifiedmark.svg" alt="" />
                                </div>
                                <div class="col-md-11 col-10">
                                    <p class="mb-0 steps-title">Zero legal & agency Fee</p>
                                    <p class="steps-body font-weight-light">
                                        Get connected to verified properties to save brokerage &
                                        legal fees. Never any surprise or hidden fees.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-1 col-2" style="line-height: 34px; padding-right: 0;">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/verifiedmark.svg" alt="" />
                                </div>
                                <div class="col-md-11 col-10">
                                    <p class="mb-0 steps-title">Monthly payment</p>
                                    <p class="steps-body font-weight-light">
                                        Subscribe to any of our flexible payment plans & pay
                                        your subscritpion with ease.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-1 col-2" style="line-height: 34px; padding-right: 0;">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/verifiedmark.svg" alt="" />
                                </div>
                                <div class="col-md-11 col-10">
                                    <p class="mb-0 steps-title">Vetted Homes</p>
                                    <p class="steps-body font-weight-light">
                                        Browse & filter our growing unique listings.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-4">
                            <div class="row">
                                <div class="col-md-1 col-2" style="line-height: 34px; padding-right: 0;"></div>
                                <div class="col-md-11 col-10">
                                    <a href="<?php echo base_url('signup'); ?>" class="btn primary-background w-75 p-3">
                                        Get started
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="how-works-container row my-5">
            <div class="col-12 my-5">
                <div class="secondary-custom-container my-5">
                    <div class="row mx-0">
                        <div class="col-md-6 col-12 how-it-works">
                            <p class="title mb-0">HOW IT WORKS</p>
                            <p class="how-it-works-subscribe">
                                How to subscribe with RentSmallsmall
                            </p>
                            <div class="d-flex flex-column align-items-center">
                                <p class="">Ready to find your home?</p>
                                <a href="<?php echo base_url('properties'); ?>" class="btn btn-primary get-started-btn">
                                    Get started now
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 how-it-works--steps">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2" style="line-height: 34px; padding-right: 0;">
                                            <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/keyboard.svg" alt="" />
                                        </div>
                                        <div class="col-10">
                                            <p class="mb-0 steps-title--right">
                                                Sign up & Search listings
                                            </p>
                                            <p class="steps-body font-weight-light">
                                                Get instant access to our listings when you register
                                                on our platform.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2" style="line-height: 34px; padding-right: 0;">
                                            <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/clock.svg" alt="" />
                                        </div>
                                        <div class="col-10">
                                            <p class="mb-0 steps-title--right">
                                                Schedule A Visit
                                            </p>
                                            <p class="steps-body font-weight-light">
                                                Take a tour of our properties in person or
                                                virtually.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2" style="line-height: 34px; padding-right: 0;">
                                            <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/shieldcheck.svg" alt="" />
                                        </div>
                                        <div class="col-10">
                                            <p class="mb-0 steps-title--right">
                                                Get verified & Pay with wallet
                                            </p>
                                            <p class="steps-body font-weight-light">
                                                Be a part of our community. Enjoy zero payment
                                                hassle.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="explore-homes mt-md-5">
            <div class="row">
                <div class="col-md-6 col-12">
                    <img src="<?php echo base_url(); ?>assets/updated-assets/images/homeexplore.svg" class="img-fluid w-100" alt="explore_home_image" />
                </div>
                <div class="col-md-6 col-12">
                    <h1>Explore our homes</h1>
                    <p class="mb-0">
                        Whatever stage you are in your life you can find a home that
                        suits your budget and gives you peace of mind.
                    </p>
                    <small style="font-size: 12px; font-weight: lighter;">
                        Search from over 200+ verified listings
                    </small>
                    <div class="my-5">
                        <div class="mb-3">
                            <a href="<?php echo base_url('type/all'); ?>" class="btn primary-background explore-custom-btn" style="
                  font-size: 25px;
                  font-weight: 500;
                  border-radius: 15px;
                ">
                                Verified Homes
                                <small style="font-size: 12px; font-weight: lighter;">
                                    &nbsp;(<?php echo @$verified_homes . "+"; ?>)
                                </small>
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="<?php echo base_url('type/shared-home'); ?>" class="btn primary-background explore-custom-btn" style="
                  font-size: 25px;
                  font-weight: 500;
                  border-radius: 15px;
                ">
                                Shared Homes
                                <small style="font-size: 12px; font-weight: lighter;">
                                    &nbsp;(<?php echo @$shared_homes . "+"; ?>)
                                </small>
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="<?php echo base_url('type/bed-space'); ?>" class="btn primary-background explore-custom-btn" style="
                  font-size: 25px;
                  font-weight: 500;
                  border-radius: 15px;
                ">
                                Bedspace
                                <small style="font-size: 12px; font-weight: lighter;">
                                    &nbsp;(<?php echo @$bedspaces . "+"; ?>)
                                </small>
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="#" class="btn primary-background explore-custom-btn" style="
                  font-size: 25px;
                  font-weight: 500;
                  border-radius: 15px;
                ">
                                Premium Homes
                                <small style="font-size: 12px; font-weight: lighter;">
                                    &nbsp;(<?php echo @$premium_props . "+"; ?>)
                                </small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="find-neighbour my-5">
            <div class="row">
                <div class="col-md-4 col-12 my-5 left-column">
                    <h2 class="font-weight-bold ">Find a neighborhood near you</h2>
                    <p>
                        Enjoy quality living experience within proximity. It’s closer
                        than you think!
                    </p>
                </div>
                <div class="col-md-8 col-12 my-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Lagos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                Abuja
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row w-100 mt-5">
                                <div class="col-12">
                                    <?php if (isset($the_cities) && !empty($the_cities)) { ?>
                                        <?php $first_city_id = ''; ?>
                                        <?php foreach ($the_cities as $the_city => $each_city) { ?>
                                            <?php if ($each_city['state_id'] == 2671) { ?>
                                                <?php if (empty($first_city_id)) {
                                                    // set the ID of the first city
                                                    $first_city_id = $each_city['id'];
                                                ?>
                                                    <!--<a class="btn primary-background explore-custom-btn" href="<?php echo base_url(); ?>areas-we-cover/<?php echo $each_city['id']; ?>">-->
                                                    <a href="<?php echo base_url(); ?>areas-we-cover/<?php echo $each_city['id']; ?>" class="mr-3 mt-3 font-weight-bold btn city-btn active-btn-custom" data-city-id="<?php echo $each_city['state_id']; ?>">
                                                        <?php echo $each_city['city']; ?>
                                                    </a>
                                                    </a>
                                                <?php } else { ?>
                                                    <!--<a class="btn primary-background explore-custom-btn" href="<?php echo base_url(); ?>areas-we-cover/<?php echo $each_city['id']; ?>">-->
                                                    <a href="<?php echo base_url(); ?>areas-we-cover/<?php echo $each_city['id']; ?>" class="mr-3 mt-3 font-weight-bold btn city-btn" data-city-id="<?php echo $each_city['state_id']; ?>">
                                                        <?php echo $each_city['city']; ?>
                                                    </a>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>


                                <div class="col-12 mt-4">
                                    <button class="mr-3 mt-3 font-weight-bold btn active-btn-custom">
                                        View more neighborhoods &nbsp;&nbsp;
                                        <i class="fa-solid fa-arrow-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row w-100 mt-5">
                                <div class="col-12">
                                    <a href="#" class="mr-3 mt-3 font-weight-bold btn city-btn" data-city-id="<?php echo $each_city['state_id']; ?>">
                                        Coming Soon
                                    </a>
                                </div>

                                <div class="col-12 mt-4">
                                    <button class="mr-3 mt-3 font-weight-bold btn active-btn-custom">
                                        View more neighborhoods &nbsp;&nbsp;
                                        <i class="fa-solid fa-arrow-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <section class="container-fluid">
        <div class="row proud-satistics-container">
            <div class="col-md-6 col-12">
                <div class="proud-satistics-text">
                    <p class="mb-3">We are proud of some of our numbers</p>
                    <p>In line with our goals of organzing the property
                        rental market and providing affordable housing,
                        we make it a duty to celebrate our every breakthrough.</p>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex mb-5 justify-content-between">
                    <div class="proud-satistics-figure">
                        <p>18</p>
                        <p>Locations</p>
                    </div>
                    <div class="proud-satistics-figure">
                        <p>N200m</p>
                        <p>Saved on legal & agency fee</p>
                    </div>
                </div>
                <div>
                    <div class="proud-satistics-figure">
                        <p>40,000+</p>
                        <p>Monthly Stays</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-md container-fluid px-md-5 px-0">
        <div class="row">
            <div class="col-12  my-5">
                <h2 class="font-weight-bold text-center">
                    How RentSmallsmall stacks up against the rest
                </h2>
            </div>
            <!-- Desktop view for table -->
            <div class="col-12 d-md-block d-none">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="border-0 font-weight-lighter pt-4">
                                Why choose RentSmallsmall?
                            </td>
                            <td style="width: 40px;" class="pt-4 border-0 text-center secondary-background primary-text-color-alt font-weight-bold top-middle-table">
                                RentSmallSmall
                            </td>
                            <td class="border-0 text-center pt-4">
                                Traditional real estate
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-weight-bold border-right-0 border-left-0">
                                Flexible payment plans
                            </td>
                            <td class="text-center primary-text-color secondary-background border-0">
                                <i class="fa-solid fa-circle-check"></i>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-weight-bold border-right-0 border-left-0">
                                Monthly movement options
                            </td>
                            <td class="text-center primary-text-color secondary-background border-0">
                                <i class="fa-solid fa-circle-check"></i>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-weight-bold border-right-0 border-left-0">
                                Zero hidden fees
                            </td>
                            <td class="text-center primary-text-color secondary-background border-0">
                                <i class="fa-solid fa-circle-check"></i>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-weight-bold border-right-0 border-left-0">
                                Gender & Ethnic equality
                            </td>
                            <td class="text-center primary-text-color secondary-background border-0">
                                <i class="fa-solid fa-circle-check"></i>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-weight-bold border-right-0 border-left-0">
                                100% transparency
                            </td>
                            <td class="text-center primary-text-color secondary-background border-0">
                                <i class="fa-solid fa-circle-check"></i>
                            </td>
                            <td class="text-center">
                                <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- mobile view for table -->
            <div class="col-12 d-md-none d-block">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="border-0 font-weight-lighter pt-4">
                                            Why choose RentSmallsmall?
                                        </td>
                                        <td class="pt-4 border-0 text-center secondary-background primary-text-color-alt font-weight-bold top-middle-table">
                                            RentSmallSmall
                                        </td>
                                        <!-- <td class="border-0 text-center pt-4">Traditional real estate</td> -->
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Flexible payment plans
                                        </td>
                                        <td class="text-center primary-text-color secondary-background border-0">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <!-- <td class="text-center"><i class="fa-solid text-danger fa-xmark fa-2x"></i></td> -->
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Monthly movement options
                                        </td>
                                        <td class="text-center primary-text-color secondary-background border-0">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <!-- <td class="text-center"><i class="fa-solid text-danger fa-xmark fa-2x"></i></td> -->
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Zero hidden fees
                                        </td>
                                        <td class="text-center primary-text-color secondary-background border-0">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <!-- <td class="text-center"><i class="fa-solid text-danger fa-xmark fa-2x"></i></td> -->
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Gender & Ethinic equality
                                        </td>
                                        <td class="text-center primary-text-color secondary-background border-0">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <!-- <td class="text-center"><i class="fa-solid text-danger fa-xmark fa-2x"></i></td> -->
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            100% transparency
                                        </td>
                                        <td class="text-center primary-text-color secondary-background border-0">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <!-- <td class="text-center"><i class="fa-solid text-danger fa-xmark fa-2x"></i></td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        </div>
                        <div class="carousel-item">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="border-0 font-weight-lighter pt-4">
                                            Why choose RentSmallsmall?
                                        </td>
                                        <!-- <td
                    class="pt-4 border-0 text-center secondary-background primary-text-color font-weight-bold top-middle-table">
                    RentSmallSmall</td> -->
                                        <td class="border-0 text-center pt-4">
                                            Traditional real estate
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Flexible payment plans
                                        </td>
                                        <!-- <td class="text-center primary-text-color secondary-background border-0"><i
                      class="fa-solid fa-circle-check"></i></td> -->
                                        <td class="text-center">
                                            <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Monthly movement options
                                        </td>
                                        <!-- <td class="text-center primary-text-color secondary-background border-0"><i
                      class="fa-solid fa-circle-check"></i></td> -->
                                        <td class="text-center">
                                            <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Zero hidden fees
                                        </td>
                                        <!-- <td class="text-center primary-text-color secondary-background border-0"><i
                      class="fa-solid fa-circle-check"></i></td> -->
                                        <td class="text-center">
                                            <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            Gender & Ethinic equality
                                        </td>
                                        <!-- <td class="text-center primary-text-color secondary-background border-0"><i
                      class="fa-solid fa-circle-check"></i></td> -->
                                        <td class="text-center">
                                            <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold border-right-0 border-left-0">
                                            100% transparency
                                        </td>
                                        <!-- <td class="text-center primary-text-color secondary-background border-0"><i
                      class="fa-solid fa-circle-check"></i></td> -->
                                        <td class="text-center">
                                            <i class="fa-solid text-danger fa-xmark fa-2x"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Phone apps Download -->
    <section class="container-md container-fluid phone-apps">
        <div class="app-download-container primary-background">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div>
                        <h2 class="font-weight-bold">
                            Book, pay & manage your tenancy on the go.
                        </h2>
                        <p>
                            Our app allows you to access all our properties, pay rent
                            using your wallet, debit card or crypto.
                        </p>
                    </div>
                    <div class="apps row mb-5">
                        <div class="col-6">
                            <a href="https://apps.apple.com/us/app/smallsmall/id1643608622">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/appstore.svg" alt="" />
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="https://play.google.com/store/apps/details?id=com.smallsmall.mobile&pli=1">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/updated-assets/images/googleplay.svg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-md-none d-block px-5">
                    <img src="<?php echo base_url(); ?>assets/updated-assets/images/phone-mobile.png" style=" top: 17px; position: relative;" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="phone-container d-md-block d-none">
                <img src="<?php echo base_url(); ?>assets/updated-assets/images/phone-mobile.png" class="img-fluid" alt="" />
            </div>
        </div>
    </section>

    <section class="faq-section px-md-5 my-md-5">
        <div class="row">
            <div class="col-md-5 col-sm-12 text-left my-md-0 my-5">
                <div class="mb-5 faq-section-mobile">
                    <h1>FAQs</h1>
                    <p class="d-md-none d-block">
                        Get answers about renting with RentSmallsmall
                    </p>
                    <h3 class="d-md-block d-none">
                        Get answers about renting with RentSmallsmall
                    </h3>
                </div>
                <div class="d-md-block d-none">
                    <h2 class="font-weight-bold">Ask us anything</h2>
                    <p class="">
                        <i class="fa-solid fa-envelope mr-3"></i>
                        customerexperience@smallsmall.com
                    </p class="">
                    <p>
                        <i class="fa-solid fa-phone mr-3"></i>
                        0903 633 9800 0903 722 2669
                    </p>
                </div>

            </div>


            <div class="col-md-7 col-sm-12">
                <div class="accordion" id="accordionExample">
                    <div class="card card-custom mb-2">
                        <div class="card-header py-md-4 card-header-custom" id="headingOne">
                            <h2 class="mb-0 d-flex">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is RentSmallSmall about?
                                </button>

                                <i data-toggle="collapse" data-target="#collapseOne" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                At RentsmallSmall , we offer our customers looking for a home access to flexible payment plans. We list both furnished and unfurnished apartments on our platform in top locations in Nigeria. Payment can be made monthly, bimonthly, quarterly, ...whatever frequency of payment is most convenient for you. Here, there are no agency or agreement fees required!
                                We also provide property owners with premium services that include getting verified subscribers (tenants) for their property, saving them time and stress in getting tenants. With us, you earn your rental income as and when due without suffering any payment defaults.
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="card-header py-md-4 card-header-custom" id="headingTwo">
                            <h2 class="mb-0 d-flex">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Can you talk to my Landlord to collect my rent monthly?
                                </button>


                                <i data-toggle="collapse" data-target="#collapseTwo" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                You can refer a property owner (Landlord) to list with us by convincing them to put their Property on the Rent Smallsmall platform.
                                You stand to earn a referral fee once an agreement is signed with the landlord and you could earn between 5k -100k depending on the rental price of the property.
                            </div>
                        </div>
                    </div>
                    <div class="card card-custom mb-2">
                        <div class="card-header py-md-4 card-header-custom" id="headingThree">
                            <h2 class="mb-0 d-flex">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is Security deposit?
                                </button>

                                <i data-toggle="collapse" data-target="#collapseThree" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Security deposit is a refundable one-off payment which serves as rent insurance as well as a caution fee on the condition that no damages were incurred on the property nor any default in rent payment. It's paid at the beginning of your contract and refunded when the agreed period of stay has elapsed.
                                However if you vacate the apartment before the agreed time, you run the risk of forfeiting the payment.
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom mb-2">
                        <div class="card-header py-md-4 card-header-custom" id="headingFour">
                            <h2 class="mb-0 d-flex">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How do I schedule to inspect a property I like on RentSmallSmall?
                                </button>

                                <i data-toggle="collapse" data-target="#collapseFour" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                When you find the unit you like, you fill out the inspection request form found at the bottom of each link, you get a confirmation email and our agents get in touch with you within 24-48 hours.
                                If you see the unit and like it, you apply for verification, if successful, you make payments, get your agreement and move in
                            </div>
                        </div>
                    </div>


                    <div class="card card-custom mb-2">
                        <div class="card-header py-md-4 card-header-custom" id="headingFive">
                            <h2 class="mb-0 d-flex">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Can I speak with someone at RentSmallSmall?
                                </button>

                                <i data-toggle="collapse" data-target="#collapseFive" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                You can reach out to our customer experience team on; 09037222669 / 09036339800 (Monday-Friday; 9am-4pm) for assistance or if you have any questions. Thank you!
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom mb-2">
                        <div class="card-header py-md-4 card-header-custom" id="headingSix">
                            <h2 class="mb-0 d-flex">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Will I pay for property inspection?
                                </button>

                                <i data-toggle="collapse" data-target="#collapseSix" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>
                            </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                At Rent SmallSmall, We do not charge for inspection, no matter how many properties you desire to inspect!
                            </div>
                        </div>
                    </div>

                    <br><br><br>
                    <div class="card card-custom mb-2">
                        <!--<div class="card-header py-md-4 card-header-custom" id="headingSeven">-->
                        <!--    <h2 class="mb-0 d-flex">-->
                        <!--        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">-->
                        <!--            Payment date-->
                        <!--        </button>-->

                        <!--        <i data-toggle="collapse" data-target="#collapseSeven" class="fa-solid fa-circle-plus " style="color: #007dc1; cursor: pointer;"></i>-->
                        <!--    </h2>-->
                        <!--</div>-->
                        <!--<div id="collapseSeven" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">-->
                        <!--    <div class="card-body">-->
                        <!--        This is the date when all subscribers are obligated to promptly make payment of all statutory fees which includes the subscription fee, service charges and all other fees on or before the 5th day of every month for the duration of the term. Where the subscriber fails to make payment, it will disrupt services, which we recommend against.-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>


                </div>
            </div>

            <div class="col-12 d-md-none d-flex justify-content-center ask-anything my-5">
                <div>
                    <h2 class="font-weight-bold">Ask us anything</h2>
                    <p class="">
                        <i class="fa-solid fa-envelope mr-3"></i>
                        customerexperience@smallsmall.com
                    </p class="">
                    <p>
                        <i class="fa-solid fa-phone mr-3"></i>
                        0903 633 9800 0903 722 2669
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- hopscotch-script -->
    <script id="hopscotch-script" type="text/javascript">
        (function(w, d) {
            if (typeof w === "undefined") return;
            w.Hopscotch = w.Hopscotch || function() {
                (w.Hopscotch.q = w.Hopscotch.q || []).push(arguments);
            };
            var elm = d.createElement("div");
            elm.setAttribute("data-widget-host", "hopscotch");
            elm.setAttribute("data-props-api-key", "4db66c1c-9e8a-431b-b232-06c381199931");
            d.getElementsByTagName("body")[0].appendChild(elm);
            var s = d.createElement("script");
            s.src = "https://app.hopscotch.club/widget.js?";
            s.async = 1;
            s.defer = 1;
            d.getElementsByTagName("body")[0].appendChild(s);
        })(window, document);
    </script>
    <!-- end hopscotch-script -->

    <!--LiveCaller -->

    <script>
        (function(w, t, c, p, s, e, l, k) {
            p = new Promise(function(r) {
                w[c] = {
                    client: function() {
                        return p
                    }
                };
                l = document.createElement('div');
                l.setAttribute("id", "live-caller-widget");
                s = document.createElement(t);
                s.async = 1;
                s.setAttribute("data-livecaller", 'script');
                k = document.body || document.documentElement;
                k.insertBefore(l, k.firstChild);
                l.setAttribute("data-livecaller", 'mount-el');
                s.src = 'https://cdn.livecaller.io/js/app.js';
                e = document.getElementsByTagName(t)[0];
                e ? e.parentNode.insertBefore(s, e) : k.insertBefore(s, l.nextSibling);
                s.onload = function() {
                    r(w[c]);
                };
            });
            return p;
        })(window, 'script', 'LiveCaller').then(function() {
            try {
                LiveCaller.config.merge({
                    "widget": {
                        "id": "0f219ecc-f79c-4c42-9eb4-9bb8619ef916"
                    },
                    "app": {
                        "locale": "en"
                    }
                });
                LiveCaller.liftOff();
            } catch (e) {}
        });
    </script>

    <!--End LiveCaller -->


    <!-- Start of smallsmall Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=2d3eeb0d-adb2-4733-8b53-a7e10b20ea14"> </script>
    <!-- End of smallsmall Zendesk Widget script -->

</main>

<script>
    $(document).ready(function() {
        $('.city-btn').click(function() {
            // remove active class from all buttons
            $('.city-btn').removeClass('active-btn-custom');

            // add active class to the clicked button
            $(this).addClass('active-btn-custom');
        });
    });
</script>



<script>
    amplitude.getInstance().logEvent('RSS Homepage');
</script>

<!-- Pixel Code for https://www.benifit.app/ -->
<script defer src="https://www.benifit.app/pixel/p3t5u90cv9dva8170ke1h465ponmbhel"></script>
<!-- END Pixel Code -->