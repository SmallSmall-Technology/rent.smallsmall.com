<div class="slider-main home">
  <div class="slider-overlay">
    <?php if(isset($notifications) && !empty($notifications)){ ?>
    <div id="notification-bar-home" class="notification-bar-home">
      <div id="notification-container">
        <span id="notification-icn">New</span>
        <span id="notification-details"><?php echo $notifications['message']; ?></span>
        <span id="notification-lnk"
          ><a target="_blank" href="<?php echo $notifications['notification_link']; ?>"><i class="fa fa-angle-right"></i></a
        ></span>
      </div>
    </div>
    <?php } ?>
    <div class="hero-large">Do you want to pay your rent monthly?</div>
    <div class="hero-small">Renting doesn't have to be hard, enjoy the ease that comes with a monthly plan</div>
    <div class="home-search-container">
      <div class="top-form">
        <form action="<?php echo base_url('rss/filter'); ?>" method="POST">
          <span class="map-case"><i class="fa fa-map-marker"></i></span>
          <span class="city-case">
            <input type="text" list="cities" placeholder="Search here..." class="city" id="city-txt" />
            <datalist role="listbox" id="cities">
              <?php if(!empty($the_cities) && isset($the_cities)){ ?>
              <?php foreach($the_cities as $the_city =>
              $each_city){ ?>
              <option value="<?php echo $each_city['city']; ?>"><?php echo $each_city['city']; ?></option>
              <?php } ?>
              <?php } ?>
            </datalist>
          </span>
          <span class="button-case fake-btn"><i class="fa fa-search"></i></span>
          <button type="submit" class="city-search-btn home-sub-btn" hidden />
        </form>
      </div>
    </div>
  </div>
</div>
<div class="other-content">
  <div class="other-content-inner">
    <div class="content-pack">
      <div class="content-head-title">A new & smart way to live</div>
      <div class="content-head-subtitle">Out with the old in with the new, experience an easier way to live and pay flexibly</div>
      <div class="joy-pane">
        <div class="joy-pane-item">
          <img src="<?php echo base_url(); ?>assets/images/joyful-subscriber.png" alt="joyful subscriber" />
        </div>
        <div class="joy-pane-item">
          <table width="100%">
            <tr>
              <td width="50px" valign="top">
                <i id="bullet-checks" class="bx bx-check-square"></i>
              </td>
              <td>
                <div class="bullet-title">Zero legal & agency fee</div>
                <div class="bullet-note">Get connected to verified properties to save brokerage & legal fees. Never any surprise or hidden fees</div>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <i id="bullet-checks" class="bx bx-check-square"></i>
              </td>
              <td>
                <div class="bullet-title">Monthly payment</div>
                <div class="bullet-note">Subscribe to any of our flexible payment plans and pay your subscribtion with ease.</div>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <i id="bullet-checks" class="bx bx-check-square"></i>
              </td>
              <td>
                <div class="bullet-title">Vetted homes</div>
                <div class="bullet-note">Browse and filter through our growing listings.</div>
              </td>
            </tr>
            <tr>
              <td valign="top"></td>
              <td>
                <div class="home-button blue-bg web-disp"><a href="<?php echo base_url('signup'); ?>">Get started</a></div>
              </td>
            </tr>
          </table>
          <div class="home-button blue-bg mobile-disp"><a href="<?php echo base_url('signup'); ?>">Get started</a></div>
        </div>
      </div>
    </div>

    <div class="content-pack">
      <div class="how-it-works-pane">
        <div class="how-it-works-topic">HOW IT WORKS</div>
        <div class="hiw-container">
          <div class="hiw-item">
            <div class="hiw-topic">How to subscribe with RentSmallSmall</div>
            <div class="hiw-note">Simple steps to subscribing with us.</div>
            <div class="hiw-question web-disp">Ready to find your home?</div>
            <div class="home-button white-bg web-disp"><a href="<?php echo base_url('properties'); ?>">Get started now</a></div>
          </div>
          <div class="hiw-item">
            <table cellpadding="10px" width="100%">
              <tr>
                <td width="30px" valign="top">
                  <img src="<?php echo base_url(); ?>assets/img/home-icons/keyboard.svg" width="30px" alt="keyboard" />
                </td>
                <td>
                  <div class="hiw-sub-topic">Sign up & Search</div>
                  <div class="hiw-sub-note">Get instant access to our listings when you register on our platform.</div>
                </td>
              </tr>
              <tr>
                <td valign="top"><img src="<?php echo base_url(); ?>assets/img/home-icons/clock.svg" width="30px" alt="keyboard" /></td>
                <td>
                  <div class="hiw-sub-topic">Schedule A Visit</div>
                  <div class="hiw-sub-note">Take a tour of our properties in person or virtually.</div>
                </td>
              </tr>
              <tr>
                <td valign="top"><img src="<?php echo base_url(); ?>assets/img/home-icons/credit-card.svg" width="30px" alt="keyboard" /></td>
                <td>
                  <div class="hiw-sub-topic">Subscribe & Pay online</div>
                  <div class="hiw-sub-note">Be a part of our community. Enjoy zero payment hassle.</div>
                </td>
              </tr>
            </table>
          </div>
          <div class="hiw-item">
            <table cellpadding="10px" width="100%">
              <tr>
                <td width="30px" valign="top"><img src="<?php echo base_url(); ?>assets/img/home-icons/verify.svg" width="30px" alt="keyboard" /></td>
                <td>
                  <div class="hiw-sub-topic">See verified listing</div>
                  <div class="hiw-sub-note">Explore our well vetted homes curated just for you.</div>
                </td>
              </tr>
              <tr>
                <td valign="top"><img src="<?php echo base_url(); ?>assets/img/home-icons/shield-check.svg" width="30px" alt="keyboard" /></td>
                <td>
                  <div class="hiw-sub-topic">Get verified</div>
                  <div class="hiw-sub-note">Receive confirmation on your validity and we are good to go.</div>
                </td>
              </tr>
            </table>

            <div class="hiw-question mobile-disp">Ready to find your home?</div>
            <div class="home-button white-bg mobile-disp"><a href="<?php echo base_url('properties'); ?>">Get started now</a></div>
          </div>
        </div>
      </div>
    </div>

    <div class="content-pack">
      <div class="content-head-title">Explore homes on RentSmallSmall</div>
      <div class="content-head-subtitle">Search from over 200+ verified listings</div>
      <div class="explore-container">
        <div class="ex-container-items">
          <div class="shared-image">
            <div class="prop-overlay-txt">
              <div class="large-prop-desc"><a href="<?php echo base_url('type/all'); ?>">Verified Homes</a></div>
              <div class="large-prop-num">
                <a href="<?php echo base_url('type/all'); ?>"><?php echo @$verified_homes." homes"; ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="ex-container-items">
          <div class="small-prop-boxes premium">
            <div class="prop-overlay-txt">
              <div class="small-prop-desc"><a href="#">Premium Homes</a></div>
              <div class="small-prop-num">
                <a href="#"><?php echo @$premium_props." homes"; ?></a>
              </div>
            </div>
          </div>
          <div class="small-prop-boxes bedspace">
            <div class="prop-overlay-txt">
              <div class="small-prop-desc"><a href="<?php echo base_url('type/bed-space'); ?>">Bedspace</a></div>
              <div class="small-prop-num">
                <a href="<?php echo base_url('type/bed-space'); ?>"><?php echo @$bedspaces." bedspaces"; ?></a>
              </div>
            </div>
          </div>
          <div class="small-prop-boxes shared-h">
            <div class="prop-overlay-txt">
              <div class="small-prop-desc"><a href="<?php echo base_url('type/shared-home'); ?>">Shared Homes</a></div>
              <div class="small-prop-num">
                <a href="<?php echo base_url('type/shared-home'); ?>"><?php echo @$shared_homes." homes"; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!---- Mobile explore container ------>
      <div class="mobile-explore-container">
        <div class="mobile-ex-container-items">
          <div class="shared-image">
            <div class="prop-overlay-txt">
              <div class="large-prop-desc"><a href="#">Verified Homes</a></div>
              <div class="large-prop-num">
                <a href="#"><?php echo @$verified_homes." homes"; ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="mobile-ex-container-items">
          <div class="mobile-prop-disp mobile-premium">
            <div class="prop-overlay-txt">
              <div class="large-prop-desc"><a href="<?php echo base_url('properties'); ?>">Premium Homes</a></div>
              <div class="large-prop-num">
                <a href="<?php echo base_url('properties'); ?>"><?php echo @$premium_props." homes"; ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="mobile-ex-container-items">
          <div class="mobile-prop-disp mobile-bedspace">
            <div class="prop-overlay-txt">
              <div class="large-prop-desc"><a href="<?php echo base_url('type/bed-space'); ?>">Bed Spaces</a></div>
              <div class="large-prop-num">
                <a href="<?php echo base_url('type/bed-space'); ?>"><?php echo @$bedspaces." bedspaces"; ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="mobile-ex-container-items">
          <div class="mobile-prop-disp mobile-shared-h">
            <div class="prop-overlay-txt">
              <div class="large-prop-desc"><a href="<?php echo base_url('type/shared-home'); ?>">Shared Homes</a></div>
              <div class="large-prop-num">
                <a href="<?php echo base_url('type/shared-home'); ?>"><?php echo @$shared_homes." homes"; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!---- Mobile explore container ------->
    </div>

    <div class="content-pack">
      <div class="content-head-title">Find a neighborhood near you</div>
      <div class="content-head-subtitle">Enjoy quality living experience within proximity. It’s closer than you think!</div>
      <ul class="neighborhood-link">
        <li class="neighborhood-link-item active-neighborhood" id="link-1">Lagos</li>
        <li class="neighborhood-link-item" id="link-2">Abuja</li>
      </ul>
      <ul class="neighborhood-cities lagos" id="city-1">
        <?php if(isset($the_cities) && !empty($the_cities)){ ?>
        <?php foreach($the_cities as $the_city =>
        $each_city){ ?>
        <?php if($each_city['state_id'] == 2671){ ?>
        <li class="city-item-link">
          <a href="<?php echo base_url(); ?>areas-we-cover/<?php echo $each_city['id']; ?>"
            ><span class="city-overflow"><?php echo $each_city['city']; ?></span></a
          >
        </li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
      </ul>
      <ul class="neighborhood-cities abuja other-cities" id="city-2">
        <?php if(isset($the_cities) && !empty($the_cities)){ ?>
        <?php foreach($the_cities as $the_city =>
        $each_city){ ?>
        <?php if($each_city['state_id'] == 2648){ ?>
        <li class="city-item-link">
          <a href="<?php echo base_url(); ?>areas-we-cover/<?php echo $each_city['id']; ?>"
            ><span class="city-overflow"><?php echo $each_city['city']; ?></span></a
          >
        </li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>

    <div class="content-pack">
      <div class="bragging-pane">
        <div class="bragging-topic">We are proud of some of our numbers</div>
        <div class="bragging-note">
          In line with our goals of organizing the property rental market and providing affordable housing, we make it a duty to celebrate our every
          breakthrough.
        </div>
        <div class="bragging-right-container">
          <div class="bragging-right-item">
            <span id="topic">18</span>
            <span id="note">Locations</span>
          </div>
          <div class="bragging-right-item">
            <span id="topic">25,000</span>
            <span id="note">Monthly stays</span>
          </div>
          <div class="bragging-right-item">
            <span id="topic">1.4Bn</span>
            <span id="note">Saved on Legal <br />& Agency fees</span>
          </div>
        </div>
      </div>
    </div>

    <div class="content-pack">
      <div class="content-head-title-small align-center">How RentSmallSmall stacks up against the rest</div>

      <table class="stack-table" width="100%">
        <tr>
          <th class="stack-th align-left" width="40%">Why choose RentSmallSmall?</th>
          <th class="stack-th align-center" width="20%">RentSmallSmall</th>
          <th class="stack-th align-center" width="40%">Traditional Real Estate</th>
        </tr>
        <tr>
          <td class="stack-td align-left">Flexible payment plans</td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/check-mark.png" /></td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/cross.png" /></td>
        </tr>
        <tr>
          <td class="stack-td align-left">Monthly movement options</td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/check-mark.png" /></td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/cross.png" /></td>
        </tr>
        <tr>
          <td class="stack-td align-left">Zero hidden fees</td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/check-mark.png" /></td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/cross.png" /></td>
        </tr>
        <tr>
          <td class="stack-td align-left">Gender & Ethinic equality</td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/check-mark.png" /></td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/cross.png" /></td>
        </tr>
        <tr>
          <td class="stack-td align-left">100% transparency</td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/check-mark.png" /></td>
          <td class="stack-td align-center"><img src="<?php echo base_url(); ?>assets/img/home-icons/cross.png" /></td>
        </tr>
      </table>
    </div>

    <div class="content-pack">
      <div class="content-head-title-small align-center">FAQs</div>
      <div class="content-head-subtitle align-center">
        Here's a list of the most common customer questions. If you can't find an answer to your question,<br />please don't hesitate to reach out to
        us
      </div>
      <div class="faq-container">
        <div class="faq-box" id="faq-0">
          <div id="title-0" class="faq-title">What is RentSmallSmall about? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-0">
            At RentsmallSmall , we offer our customers looking for a home access to flexible payment plans. We list both furnished and unfurnished
            apartments on our platform in top locations in Nigeria. Payment can be made monthly, bimonthly, quarterly, ...whatever frequency of
            payment is most convenient for you. Here, there are no agency or agreement fees required!<br />
            We also provide property owners with premium services that include getting verified subscribers (tenants) for their property, saving them
            time and stress in getting tenants. With us, you earn your rental income as and when due without suffering any payment defaults.
          </div>
        </div>

        <div class="faq-box" id="faq-1">
          <div id="title-1" class="faq-title">Can you talk to my Landlord to collect my rent monthly? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-1">
            You can refer a property owner (Landlord) to list with us by convincing them to put their Property on the Rent Smallsmall platform.<br />

            You stand to earn a referral fee once an agreement is signed with the landlord and you could earn between 5k -100k depending on the rental
            price of the property.
          </div>
        </div>

        <div class="faq-box" id="faq-2">
          <div id="title-2" class="faq-title">What is Security deposit? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-2">
            Security deposit is a refundable one-off payment which serves as rent insurance as well as a caution fee on the condition that no damages
            were incurred on the property nor any default in rent payment. It's paid at the beginning of your contract and refunded when the agreed
            period of stay has elapsed.<br />

            However if you vacate the apartment before the agreed time, you run the risk of forfeiting the payment.
          </div>
        </div>

        <div class="faq-box" id="faq-3">
          <div id="title-3" class="faq-title">How do I schedule to inspect a property I like on RentSmallSmall? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-3">
            When you find the unit you like, you fill out the inspection request form found at the bottom of each link, you get a confirmation email
            and our agents get in touch with you within 24-48 hours.<br />

            If you see the unit and like it, you apply for verification, if successful, you make payments, get your agreement and move in
          </div>
        </div>

        <div class="faq-box" id="faq-4">
          <div id="title-4" class="faq-title">Will I pay for property inspection? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-4">
            At Rent SmallSmall, We do not charge for inspection, no matter how many properties you desire to inspect!
          </div>
        </div>

        <div class="faq-box" id="faq-5">
          <div id="title-5" class="faq-title">
            What does verification & other requirements for subscription mean? <i class="fa fa-angle-down"></i>
          </div>
          <div class="faq-note" id="note-5">
            We put our clients through a verification process and for this they’d be required to provide a valid ID, 4 months worth of bank statement,
            employment/business information as well as personal details.
          </div>
        </div>

        <div class="faq-box" id="faq-6">
          <div id="title-6" class="faq-title">Can I speak with someone at RentSmallSmall? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-6">
            You can reach out to our customer experience team on; 09037222669 / 09036339800 (Monday-Friday; 9am-4pm) for assistance or if you have any
            questions. Thank you!
          </div>
        </div>

        <div class="faq-box" id="faq-7">
          <div id="title-7" class="faq-title">Where are you located? <i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-7">We are currently located in Lagos but have properties in Lagos & Abuja</div>
        </div>

        <div class="faq-box" id="faq-8">
          <div id="title-8" class="faq-title">Eviction Security Deposit<i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-8">
            Every subscriber is obligated to pay an Eviction Security Deposit of Two Hundred Thousand Naira (N200,000.00) only or one-month subscription fee equivalent- whichever is higher in value which shall be refundable only after the effluxion of the term or termination of the agreement and the successful handover/vacant possession of the property to the Legal Representative or property owner without any delays, hold over or continuous possession by the subscribers. Any breach of any term of the agreement or other clauses with regards to termination or the handover of vacant possession of the property, he/she shall forfeit the eviction security deposit and deployed to the recovery of premises.
          </div>
        </div>

        <div class="faq-box" id="faq-9">
          <div id="title-9" class="faq-title">Payment date<i class="fa fa-angle-down"></i></div>
          <div class="faq-note" id="note-9">
            This is the date when all subscribers are obligated to promptly make payment of all statutory fees which includes the subscription fee,
            service charges and all other fees on or before the 5th day of every month for the duration of the term. Where the subscriber fails to
            make payment, it will disrupt services, which we recommend against.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/header-sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/js/faq.js"></script>
<script>
  let button = document.querySelector(".fake-btn");
  let input = document.querySelector(".home-sub-btn");

  button.onclick = () => {
    input.click();
  };
</script>
<script>
  $(".neighborhood-link-item").click(function () {
    $(".neighborhood-link-item").removeClass("active-neighborhood");

    var id_val = $(this).attr("id").replace(/link-/, "");

    $(".neighborhood-cities").hide();

    $("#link-" + id_val).addClass("active-neighborhood");

    $("#city-" + id_val).show();
  });
</script>
