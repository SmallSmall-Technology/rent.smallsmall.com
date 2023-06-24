    <main class="container">
        <div class="row mt-5">
          <div class="col-12 d-flex justify-content-between">
            <div style="color: #7D8993; font-size: 13px; font-weight: 300;" class="font-weight-lighter">
              <span>Rentsmallsmall</span>
              <span>></span>
              <span><?php echo $title; ?></span>
            </div>
            <div class="d-md-block d-none">
                <?php if(@$verification_status == 'yes'){ ?>
                        <button type="button" class="btn btn-dark">Verified</button>
              <?php }else{ ?>
                        <button style="color:#DADADA" type="button" class="btn btn-light">Verified</button>
              <?php } ?>
              <button style="line-height: 14px;" type="button" class="btn btn-outline-dark">
                <small style="font-size: 10px; line-height: 14px;">Referral
                  code
                </small><br>
                <?php echo $refCode; ?>
              </button>
            </div>
          </div>
        </div>