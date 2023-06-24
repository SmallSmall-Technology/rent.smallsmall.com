                    <div class="messages-content">
                        <div class="message-cols inbox-col">
                            <div class="compose-menu compose-msg"><i class="fa fa-pencil"></i></div>
                            <div id="inbox-messages">
                                
                            </div>
        					<div style="text-align:center;width:100%;font-size:14px;color:#138E3D" id="inbox-data-loading"> </div>
                            <div class="load-more-bar" id="load-inbox-messages">
                                <div class="load-more-img"></div> 
                            </div>

                        </div>
                        <div class="message-cols compose-col">
                            <div class="close-compose-box">x</div>
                            
                            <!---Reply box here---->
                            <div class="reply-container">
                                <form id="tenantReplyMsg" method="POST">
                                    <div class="feature-msg">
                                        <div class="msg-head">
                                            <div class="msg-sender inbox-sender">...</div>
                                            <div class="msg-stat">
                                                <div class="stat-ball"></div>
                                            </div>
                                            <!---<div class="msg-date">Today</div>--->
                                        </div>
                                        <div class="msg-subject inbox-sub">...</div>
                                        <div class="msg-body inbox-msg">
                                            ...
                                        </div>
                                        <div>
                                            <textarea rows="5" id="reply-txt-field" class="feature-reply-fld" placeholder="Reply here..."></textarea>
                                        </div>
                                        <input type="hidden" id="inbox-msg-id" val="" />
                                        <input type="hidden" id="inbox-receiver" val="" />
                                        <input type="submit" class="submit-reply green-bg msg-send-btn" value="Send" />
                                        
                                    </div>
                                </form>
                            </div>
                            <!----Reply box here---->
                            
                            <!---Compose box here---->
                            <div class="compose-container">
                                <form id="tenantNewMsg" method="POST">
                                    <div class="feature-msg">
                                        <div class="msg-head">
                                            <div class="msg-sender">New Message</div>
                                        </div>
                                        <div class="form-controls-container">
                                            <input type="text" name="compose-subject" class="compose-sub dash-txt-f" placeholder="Subject" id="compose-sub" />
                                        </div>
                                        <div class="msg-body">
                                            <!----message appears here  ---->
                                        </div>
                                        <div style="padding:10px">
                                            <textarea rows="5" id="compose-msg" class="compose-msg feature-reply-fld" placeholder="Your message..."></textarea>
                                        </div>
                                        <input type="submit" class="submit-message green-bg msg-send-btn" value="Send" />
                                    </div>
                                </form>
                            </div>
                            <!----Compose box here---->
                            <!---Loader overlay --->
                            <div class="msg-loader inbox-loader"></div>
                            <!---Loader overlay --->
                        </div>
                    </div>
                    
                </div>
<script src="<?php echo base_url(); ?>assets/js/message-opener.js" type="text/javascript"></script>
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
            $.ajax({
                
                url:"<?php echo base_url(); ?>rss/fetchMessages",
                
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