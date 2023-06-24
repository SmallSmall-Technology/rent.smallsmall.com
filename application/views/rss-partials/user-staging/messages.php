    <div class="row">
      <div class="col-12 my-5">
        <p style="font-size: 22px;">Inbox</p>
      </div>


    </div>
    <div class="row">
      <div class="col-md-12 d-flex justify-content-between mb-4">
        <div>
          <p>All</p>
        </div>
        <div class="new-message d-flex justify-content-end">
          <button data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
            aria-controls="collapseExample" class="btn btn-send d-flex align-items-center"><img class="img-fluid"
              src="assets/images/add-msg.svg" alt="">&nbsp;&nbsp;
            New Message
          </button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="inbox-left d-flex flex-column px-3 py-3">
            <div id="inbox-messages">
                                
            </div>
			<div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="inbox-data-loading"> </div>
            <div class="load-more-bar" id="load-inbox-messages">
                <div class="load-more-img"></div> 
            </div>

        </div>
      </div>
      <div class="col-md-8">
        <div class="inbox-right p-5 ">
          <div class="inbox-expand py-4">
            <p class="mb-4 inbox-dt"></p>
            <h5 class="mb-4 inbox-sub"></h5>
            <div class=" d-flex align-items-center ">
              <div class="inbox-msg-icon py-3  mr-2">
                <div class="msg-icon d-flex justify-content-center align-items-center">CX</div>
              </div>
              <div class="inbox-msg-intro flex-grow-1  py-3 pl-2 text-dark">
                <h5 class="inbox-sender"></h5>
              </div>
            </div>
            <div class="inbox-body">
              <p class="mb-4 inbox-msg"></p>
              
            </div>

            <form method="" action="" class="collapse" id="collapseExample">
              <div class="form-group">
                <textarea class="form-control textarea-custom" placeholder="Write a message..."
                  id="exampleFormControlTextarea1" rows="4"></textarea>
              </div>
              <div class="d-flex justify-content-end">
                <button class="btn btn-send d-flex align-items-center">send <img class="img-fluid"
                    src="assets/images/send-btn.svg" alt="">
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </main>
    
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
                    output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
                    output += '</div>';
                    
                }
                
                $('#inbox-data-loading').html(output);
                
            }
        
            lazzy_loader(limit);
        
            function load_data(limit, start)
            {
                //$.noConflict();
                
                $.ajaxSetup ({ cache: false });
    
    	        $.ajax({
                    
                    url:"<?php echo base_url(); ?>user/fetchMessages",
                    
                    method:"POST",
                    
                    data:{limit:limit, start:start},
                    
                    cache: false,
                    
                    success:function(data){
                        
                        if(data == ''){
                            
                            $('#inbox-data-loading').html('No more result found');
                            action = 'active';
                            
                        }else{
                            
                            $('#inbox-messages').append(data);
                            
                            $('#inbox-data-loading').html("");
                            
                            action = 'inactive';
                        }
                    }
                })
            }
            
            if(action == 'inactive'){
                
                action = 'active';
                
                load_data(limit, start);
                
            }
            
            $('#load-inbox-messages').click(function(){
                
                lazzy_loader(limit);
                
                action = 'active';
                
                start = start + limit;
                
                setTimeout(function(){
                    
                    load_data(limit, start);
                    
                }, 1000);
                
            });
            
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/js/message-opener.js" type="text/javascript"></script>