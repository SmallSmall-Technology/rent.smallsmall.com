    var baseUrl = "https://dev-rent.smallsmall.com/";
    
    window.onload = function() {
        
        //document.getElementById('credit-amount').value = '';
        
        var banks = "<option selected='selected'>Banks</option>";

    	$.ajaxSetup ({ cache: false });
    
    	$.ajax({
    
    		url: baseUrl+"loans/bank_codes/",
    
    		secureuri : false,
    
    		type: "POST",
    
    		dataType : 'json',
    
    		success: function(data) {
    
    		    console.log(data);
    
    			for(let i = 0; i < data.data.length; i++){
    
    				banks += '<option value="'+data.data[i].code+'">'+data.data[i].name+'</option>';
    
    			}
    
    			$('.lenco-banks').html(banks);
    
    		}
    
    	});
        
        return false;
        
    }
    $('.wallet-transfer-btn').click(function(){
        
        if($('.wallet-fund-transfer-details').is(":hidden")){
            
            $('.wallet-fund-transfer-details').css('display', 'block');
            
        }else{
            
            $('.wallet-fund-transfer-details').css('display', 'none');
            
        }
        
        return false;
        
    });
    //Javascript File
    $('#top-up-btn').unbind("click").click(function(){
        
        var amount = $.trim($('#funding-amount').val());
        
        if(amount){
        
            $('body').addClass('no-scroll');
            
            $('.form-overlay').css('display', 'block');
            
            $('.funding-overlay ').css('display', 'block');
            
        }else{
            
            $('#funding-amount').css("border-bottom", "2px solid #F00");
            
            alert("Enter amount you want to fund wallet with.");
            
        }
        
        return false;
        
    });
    $('.fund-withdrawal-btn').unbind("click").click(function(){
        
        $('body').addClass('no-scroll');
        
        $('.form-overlay').css('display', 'block');
        
        $('.withdrawal-overlay ').css('display', 'block');
        
        
            
        return false;
        
    });
    $(document).on('click', '.close-button', function(){
        
        $('body').removeClass('no-scroll');
        
        $('.form-overlay').css('display', 'none');
        
        $('.form-overlay-box').css('display', 'none');
        
    });
    $('#funding-amount').keyup(function(){
        
        var amount = $.trim($('#funding-amount').val());
        
        if(!(/^\d+$/.test(amount))){
            
            alert("Special characters are not allowed.1");
            
            $('#funding-amount').val('');
            
            $('.walletTxt').val('');
            
            return false;
            
        }else{
            
            $('#cost_amount').val(amount);
            
            $('#amount').val(amount);
            
            $('#overlay-amt').html(numberWithCommas(amount).replace(/\s/g, ''));
            
            return false;
            
        }
    });
    $('#amount').keyup(function(){
        
        var amount = $.trim($('#amount').val());
        
        if(!(/^\d+$/.test(amount))){
            
            alert("Special characters are not allowed.2");
            
            $('#amount').val('')
            
            $('.walletTxt').val('');
            
        }else{
            
            $('#cost_amount').val(amount);
            
        }
        
        return false
    });
    
    $('#bvn').keyup(function(){
        
        var bvn = $(this).val();
        
        if(!(/^\d+$/.test(bvn))){
            
            alert("Special characters are not allowed.3");
            
            $('#bvn').val('');
            
        }
        
        return false;
        
    });
    
    $('.get-loan-btn').click(function(){
        
        $('.loan-spc').hide();
        
        $('.get-loan-spc').show();
        
        //window.scrollTo(800,300);
        
    });
    $('.pay-loan-btn').click(function(){
        
        $('.loan-spc').hide();
        
        $('.pay-loan-spc').show();
        
        //window.scrollTo(800,300);
        
    });
    
    $('#credit-amount').keyup(function(){
        
        var amount = $('#credit-amount').val();
        
        var interest_rate = 0.04;
        
        var payback = 0;
        
        if(amount == ''){
            
            $('.amount-payable').html(0);
        
        }
        
        if(!(/^\d+$/.test(amount))){
            
            alert("Special characters are not allowed.4");
            
            $('#credit-amount').val('');
            
        }else{
            
            payback = amount * interest_rate;
            
            payback = parseInt(payback) + parseInt(amount);
            
            $('.credit-principal').html(numberWithCommas(amount).replace(/\s/g, ''));
            
            $('.amount-payable').html(numberWithCommas(payback).replace(/\s/g, ''));
        }
        
        return false;
        
    });
    
    $('#loanRequestForm').submit(function(e){
        
        e.preventDefault();
        
        $('.proceed-btn').val('Wait...');
        
        if($("input[name='loan-agreement']:checked").length > 0){
        
            var amount = $('#credit-amount').val();
            
            var loan_purpose = [];
        		
        	$.each($("input[name='purpose']:checked"), function(){
        	    
        		loan_purpose.push($(this).val());
        		
        	});
        	
        	if(!amount){
        	    
        	    alert("You need to specify amount");
    				
    			$('.proceed-btn').val('Proceed');
    			
    			return false
        	    
        	}
        	
        	var data = {"amount" : amount, "purpose" : loan_purpose};
        	
        	$.ajaxSetup ({ cache: false });
        	
    		$.ajax({
    		    
    			url: baseUrl+"loans/post_transaction/",
    			
    			type: "POST",
    			
    			dataType : 'json',
    			
    			data: data,
    			
    			success: function(data) {
    			    
    				if(data.result == "success"){
    				    
    				   	
    				}else{
    				
    				    $('.proceed-btn').val('Proceed');
    				    
    					return false;
    				 }
    				
    			},
    			error: function() {
    				//modalAjaxError('openLogIn');
    				alert('Check internet connection');
    				
    				$('.proceed-btn').val('Proceed');
    				
    				return false;
    			}
    		});
    
        	
        }else{
            
            alert("You need to agree to our terms and conditions to proceed");
            
            $('.proceed-btn').val('Proceed');
            
            return false;
        }
        
    });
    
    $('.update-bvn-btn').click(function(){
        
        $('.update-bvn-btn').html('Updating...');
        
        $('.account-create-btn').removeClass('update-bvn-btn');
        
        if($("input[name='loan-agreement']:checked").length > 0){
        
            var bvn = $('#bvn').val();
            
            var account_name = $('#account_name').val();
            
            if(!bvn){
                
                $('#bvn').css("border-bottom", "2px solid #F00");
                
                $('.account-create-btn').html('Update');
                
                $('.account-create-btn').addClass('update-bvn-btn');
                
                return false;
            }
            
            if(!account_name){
                
                $('#account_name').css("border-bottom", "2px solid #F00");
                
                $('.account-create-btn').html('Update');
                
                $('.account-create-btn').addClass('update-bvn-btn');
                
                return false;
            }
            
            var data = {"bvn" : bvn, "account_name" : account_name};
            
            $.ajaxSetup ({ cache: false });
            
    		$.ajax({
    		    
    			url: baseUrl+"loans/create_virtual_account/",
    			
    			type: "POST",
    			
    			dataType : 'json',
    			
    			data: data,
    			
    			success: function(data) {
    				if(data.result == "success"){
    				    
    				    alert("Account successfully created!");
    				    
    				    $('.update-bvn-btn').html('Created...');
    				    
    				    window.history.back();
    				    
    				    // location.reload(true);
    				    
    				    return false;
    				   	
    				}else{
    				
    				    $('.account-create-btn').html('Update');
    				    
    				    alert(data.details+" : "+data.data);
    				    
    				    $('.account-create-btn').addClass('update-bvn-btn');
    				    
    					return false;
    				 }
    				
    			},
    			error: function() {
    				//modalAjaxError('openLogIn');
    				alert('Check internet connection');
    				
    				$('.account-create-btn').addClass('update-bvn-btn');
    				
    				$('.account-create-btn').html('Update');
    				
    				return false;
    			}
    		});
        		
        }else{
            
            alert("You need to agree to our terms and conditions to proceed");
    				
    		$('.account-create-btn').addClass('update-bvn-btn');
            
            $('.account-create-btn').html('Update');
            
            return false;
        }
        
    });
    
    $('.transfer-btn').unbind("click").click(function(){
        
        
        var account_number = $('#receiver-account-number').val();
        
        var amount = $('#receiver-transfer-amount').val();
        
        var bank = $('.lenco-banks').val();
        
        var narration = $('#receiver-narration').val();
        
        $('#transfer-btn').removeClass('transfer-btn');
        
        $('#transfer-btn').addClass('grey-bg');
        
        $('#transfer-btn').css('cursor', 'not-allowed');
        
        $('.transfer-btn').html('Working ...');
        
        var filteredList = $('.verify-transfer-fields').filter(function(){

			return $(this).val() == "";

		});

		if(filteredList.length > 0){
		    
			$('.overlay-result.withdrawal').addClass("red-bg");
				    
            $('.overlay-result.withdrawal').html("All fields are mandatory.");
            
            $('.overlay-result.withdrawal').slideDown();
            		
			$('#transfer-btn').addClass('transfer-btn');
                    
            $('#transfer-btn').removeClass('grey-bg');
            
            $('#transfer-btn').css('cursor', 'pointer');
            
            $('#transfer-btn').html('Make Transfer');

			return false;

		}
        
        var data = {"amount" : amount, "account_number" : account_number, "bank" : bank, "narration" : narration};
        	
    	$.ajaxSetup ({ cache: false });
    	
		$.ajax({
		    
			url: baseUrl+"loans/transfer_money/",
			
			type: "POST",
			
			dataType : 'json',
			
			data: data,
			
			success: function(data) {
			    
				if(data.result == "success"){
				    
				    $('.overlay-result.withdrawal').addClass("green-bg");
				    
            		$('.overlay-result.withdrawal').html("Money transferred successfully.");
                    
                    $('.overlay-result.withdrawal').slideDown();
				    
				    $('#receiver-account-number').val('');
        
                    $('#receiver-transfer-amount').val('');
                    
                    $('#receiver-narration').val('');
        
                    $('#transfer-btn').addClass('transfer-btn');
                    
                    $('#transfer-btn').removeClass('grey-bg');
                    
                    $('#transfer-btn').css('cursor', 'pointer');
                    
                    $('#transfer-btn').html('Make Transfer');
				   	
				}else{
				    
				    $('.overlay-result.withdrawal').addClass("red-bg");
				    
            		$('.overlay-result.withdrawal').html("Error: "+data.message);
                    
                    $('.overlay-result.withdrawal').slideDown();
				    
				    $('#transfer-btn').addClass('transfer-btn');
                    
                    $('#transfer-btn').removeClass('grey-bg');
                    
                    $('#transfer-btn').css('cursor', 'pointer');
                    
                    $('#transfer-btn').html('Make Transfer');
                    
				 }
				
			},
			error: function() {
			    
				//modalAjaxError('openLogIn');
				$('.overlay-result.withdrawal').addClass("red-bg");
				    
        		$('.overlay-result.withdrawal').html("Error: Contact admin");
                
                $('.overlay-result.withdrawal').slideDown();
				    
			    $('#transfer-btn').addClass('transfer-btn');
                    
                $('#transfer-btn').removeClass('grey-bg');
                    
                $('#transfer-btn').css('cursor', 'pointer');
                    
                $('#transfer-btn').html('Make Transfer');
                
			}
		});
        
        return false;
        
    });
    
    function numberWithCommas(amt) {
    
    	"use strict";
    
        return amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    
    }