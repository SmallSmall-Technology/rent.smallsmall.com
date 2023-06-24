
   <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- Favicon link -->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/bootstrap-css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
    
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="<?php echo base_url(); ?>assets/updated-assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/updated-assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/updated-assets/fontawesome/css/solid.css" rel="stylesheet" />
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/updated-assets/css/custom-css/faq.css" />
 
  <title><?php echo $title; ?></title>
</head>

<body>
 
 
 
  <main>

  <!-- <<<<<<<<faq page 1>>>>>>>>> -->
  <section class="gen__sectn">
    <h1 class="faqgen__header">FAQ center</h1>
    <p class="faqgen__parag">Get answers about living in a Rentsmallsmall property</p>
  </section>

  <!-- <<<<<<<<<<<<<faq page 2>>>>>>>>>>>>>> -->

  <section class="faqbody__sectn">
    <div>
      <h2 class="faq__sub">Subscriber basics</h2>
      <h2 class="sub__bas_ss">RentSmallsmall basics</h2>
      <div class="faqwn__btn">
        <button class="aa">
          <a href="<?php echo base_url('subscription'); ?>"><img class="sub__image" src="<?php echo base_url(); ?>assets/updated-assets/images/faqsub.svg" width="15%"  alt="subscription">
            Subscription</a>
        </button>

        <button class="ab">
          <a href="<?php echo base_url('apartment-policy'); ?>"><img class="apartmtpoli_-image" src="<?php echo base_url(); ?>assets/updated-assets/images/faqhome.svg"
            width="15%"  alt="policy">Apartment policy </a>
        </button>

        <button class="ac">
          <a href="<?php echo base_url('moving'); ?>"> <img class="mv_in_outimage" src="<?php echo base_url(); ?>assets/updated-assets/images/faqmove.svg" width="20rem"
              alt="tour"> Move-in & Move-out </a>
        </button>

      </div>
      <button class="secuity__btn">
        <a href="<?php echo base_url('safety-and-security'); ?>"> <img class="safety__image" src="<?php echo base_url(); ?>assets/updated-assets/images/faqshield .svg"
            width="20rem" alt="security"> Safety & Security </a>
      </button>
    </div>

    <!-- <<<<<<< faq page 3 >>>>>>>>> -->

    <h2 class="landld__basics">Landlord basics</h2>
    <section class="land__basbtn">
      <button class="ba">
        <a href="<?php echo base_url('faq-tenants'); ?>"><img class="tenant__image" src="<?php echo base_url(); ?>assets/updated-assets/images/faqtenants.svg" width="20rem"
            alt="tenants"> Tenants</a>
      </button>

      <button class="bb">
        <a href="<?php echo base_url('faq-payout'); ?>"><img class="payout__image" src="<?php echo base_url(); ?>assets/updated-assets/images/faqpayout.svg" alt="payout"> Pay out
        </a>
      </button>

      <button class="bc">
        <a href="<?php echo base_url('property-management'); ?>"><img class="propmanag__image" src="<?php echo base_url(); ?>assets/updated-assets/images/faqpropman.svg"
            alt="property"> Property management </a>
      </button>

    </section>
  </section>

  <!--<<<<<<<<<<<<<< faq page 4>>>>>>>>>>>>> -->
  <div class="enquiry__cnr">
    <p class="curious__qtn">Still have questions? </p>
    <a href="<?php echo base_url('ask-us'); ?>"><p class="ask__us">Ask us</p></a>
  </div>

</main>