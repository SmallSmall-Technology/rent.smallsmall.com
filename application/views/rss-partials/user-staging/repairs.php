
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Repairs</p>
      </div>
      <div class="col-12">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  dashboard-active px-0" id="currentBookingBtn" href="#"
              role="button">Request</a>
          </li>

          <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0" id="historyBtn" href="#" role="button">Repairs</a>
          </li>
        </nav>
      </div>

      <!-- default Request -->
      <div class="col-12 mt-5 collapse show " id="currentBooking">
        <div class="primary-background p-5 d-flex justify-content-center align-content-center">
          <div class="text-center">
            <img class="mb-4" style="width: 100px;" src="<?php echo base_url(); ?>assets/user-assets/images/wrench.gif" alt="">
            <p class="mb-2" style="font-size: 22px;">Request new repairs</p>
            <p class="mb-4" style="font-size: 13px;">Place a request for any repairs</p>
            <button type="button" class="btn btn-dark py-3 btn-custom-primary px-5" data-toggle="modal"
              data-target="#request">Request</button>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="request" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">
                <h5 class="modal-title font-weight-light" id="staticBackdropLabel">Request new repairs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-5">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type of repair</label>
                    <select class="form-control p-4" id="exampleFormControlSelect1">
                      <option>Choose repair type</option>

                    </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Repair details</label>
                    <textarea class="form-control p-4" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>

                  <div class="form-group">
                    <label class="" for="inlineFormInputGroup">Repair date</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <img class="img-fluid" src="assets/images/date.svg" alt="">
                        </div>
                      </div>
                      <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="date">
                    </div>
                  </div>

                  <div class="">
                    <!-- <input type="file" class="custom-file-input" id="inputGroupFile01"> -->
                    <label class="upload-btn text-center" for="inputGroupFile01">upload photo
                      <input type="file" class="">
                    </label>
                  </div>


                  <div class="my-4 text-center">
                    <button type="submit" class="btn btn-dark py-2 btn-custom-primary px-5" data-toggle="modal"
                      data-target="#createWallet">Send request</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>


      <!-- Repairs -->
      <div class="col-12 mt-5 collapse" id="history">
        <div class="current-booking">
          <table class="table">
            <thead class="thead-dark" >
              <tr>
                <th scope="col">Category</th>
                <th scope="col">Date</th>
                <th scope="col">Date Fixed</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="repair-data">
              
            </tbody>
          </table>
        </div>
      </div>


    </div>

  </main>
  
  <!-- Jquery js -->
  <script src="./assets/js/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <!-- Bootstrap js and Popper js -->
  <script src="./assets/js/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="./assets/js/bootstrap-js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $("#currentBookingBtn").click(function () {
        $("#currentBooking").addClass("show");
        $("#checklist").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color dashboard-active")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").removeClass("secondary-text-color")

      });
      $("#checklistBtn").click(function () {
        $("#checklist").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#history").removeClass("show");
        $("#checklistBtn").addClass("primary-text-color dashboard-active")
        $("#checklistBtn").removeClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color dashboard-active")

      });
      $("#historyBtn").click(function () {
        $("#history").addClass("show");
        $("#currentBooking").removeClass("show");
        $("#checklist").removeClass("show");

        $("#checklistBtn").addClass("secondary-text-color")
        $("#checklistBtn").removeClass("primary-text-color dashboard-active")
        $("#currentBookingBtn").addClass("secondary-text-color")
        $("#currentBookingBtn").removeClass("primary-text-color dashboard-active")
        $("#historyBtn").removeClass("secondary-text-color")
        $("#historyBtn").addClass("primary-text-color dashboard-active")
      });

    });
  </script>
  <script src="<?php echo base_url(); ?>assets/js/repair.js"></script>
<script>
    $(document).ready(function(){
    
        var limit = 10;
        
        var start = 0;
        
        var action = 'inactive';
    
        function lazzy_loader(limit){
            
            var output = '';
          
            for(var count=0; count<limit; count++){
              
                output += '<div class="post-data">';
                output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                output += '</div>';
                
            }
            
            $('#repair-data-loading').html(output);
            
        }
    
        lazzy_loader(limit);
    
        function load_data(limit, start)
        {
            $.ajax({
                
                url:"<?php echo base_url(); ?>user/fetchRepairs",
                
                method:"POST",
                
                data:{limit:limit, start:start},
                
                cache: false,
                
                success:function(data){
                    
                    if(data == ''){
                        
                        $('#repair-data-loading').html('No more result found');
                        action = 'active';
                        
                    }else{
                        
                        $('#repair-data').append(data);
                        
                        $('#repair-data-loading').html("");
                        
                        action = 'inactive';
                    }
                }
            })
        }
        
        if(action == 'inactive'){
            
            action = 'active';
            
            load_data(limit, start);
            
        }
        
        $('#load-repairs').click(function(){
            
            lazzy_loader(limit);
            
            action = 'active';
            
            start = start + limit;
            
            setTimeout(function(){
                
                load_data(limit, start);
                
            }, 1000);
            
        });
        
    });
</script>
