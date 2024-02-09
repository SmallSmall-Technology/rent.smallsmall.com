// JavaScript Document
$(document).ready(function () {

    var baseUrl = "https://rent.smallsmall.com/";

    var order = "";


    if (localStorage.getItem('rentalBasket') === null) {

        //Create a unique localstorage ID for basket

        var basketID = '_' + Math.random().toString(36).substr(2, 9);

        var orderType = "property";

        var paymentOption = "";

        var newrentalBasket = {

            "id": basketID,

            "orderType": orderType,

            "paymentOption": paymentOption,

            "furnisure": [],

            "property": []

        };

        window.localStorage.setItem('rentalBasket', JSON.stringify(newrentalBasket));

    } else {
        //Get all cart products

        order = JSON.parse(localStorage.getItem('rentalBasket'));

        order.orderType = "property";

        window.localStorage.setItem('rentalBasket', JSON.stringify(order));

    }

    var pay_property = "";

    var width = $(window).width();

    var s_width = "";

    /*if (width > 900){
        
        pay_property = document.getElementById('pay-property-web');
        
        s_width = "web";
    }

    if (width <= 900){
        
        pay_property = document.getElementById('pay-property-mob');
        
        s_width = "mob";
    }*/


$(document).on('submit', '#paymentForm', function (e) {
    e.preventDefault();

    // Initialize Mixpanel with your project token
    mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');

    var pay_property = document.getElementById('pay-property');
    pay_property.innerHTML = "Loading...";

    var payment_plan = $('#payment-plan').val();
    
    var move_in_date = $('#move-in-date').val();
    
    var inspectionStat = $('#inspection_stat').val();
    
    var v_stat = document.getElementById('cvstat').value;
    
    var v_profile = document.getElementById('verification_profile').value;
    
    var userID = document.getElementById('userID').value;
    
    var verified = document.getElementById('verified').value;

    if (inspectionStat == 'no') {
        
        alert("You need to book an inspection first.");
        
        pay_property.innerHTML = "Subscribe";
        
        return false; // Prevent redirection
    }

    if (payment_plan === "") {
        
        alert("Select a payment plan before proceeding.");
        
        pay_property.innerHTML = "Subscribe";
        
        return false; // Prevent redirection
    }

    if (move_in_date === "") {
        
        alert("Select a move-in date before proceeding.");
        
        pay_property.innerHTML = "Subscribe";
        
        return false; // Prevent redirection
    }

    if (v_stat != 'yes' && v_profile == 1) {
        
        alert('Account not verified yet!');
        
        pay_property.innerHTML = "Subscribe";
        
        return false; // Prevent redirection
    }

    if (!userID) {
        
        alert('You are not logged in');
        
        window.location.href = baseUrl + "login";
        
        return false; // Prevent redirection
    }

    // Proceed only if all validations pass
    var paymentOption = "wallet"; // Set the payment option here

    var book_as = 'Individual'; // document.getElementById('book-as').value;
    
    var duration = document.getElementById('duration').value;
    
    var productID = document.getElementById('property_id').value;
    
    var productTitle = document.getElementById('productName').value;
    
    var prodPrice = document.getElementById('amount-due').value;
    
    var securityDeposit = document.getElementById('sec-deposit').value;
    
    var img = document.getElementById('imageLink').value;
    
    var productUrl = window.location.href;

    // Retrieve the values of the hidden input fields
    var subscriptionFees = $('input[name="subscription-fees"]').val();
    
    var serviceChargeDeposit = $('input[name="service-charge-deposit"]').val();
    
    var securityDepositFund = $('input[name="security-deposit-fund"]').val();
    
    var total = $('input[name="total"]').val();

    var order = JSON.parse(localStorage.getItem('rentalBasket'));
    
    if (order.property.length > 0) {
        order.property.length = 0;
    }

    order.paymentOption = paymentOption;

    var productDetails = {
        "productID": productID,
        "productTitle": productTitle,
        "paymentPlan": payment_plan,
        "prodPrice": prodPrice,
        "imageLink": img,
        "productUrl": productUrl,
        "securityDeposit": securityDeposit,
        "duration": duration,
        "book_as": book_as,
        "move_in_date": move_in_date,
        "subscriptionFees": subscriptionFees,
        "serviceChargeDeposit": serviceChargeDeposit,
        "securityDepositFund": securityDepositFund,
        "total": total
    };

    order.property.push(productDetails);

    window.localStorage.setItem('rentalBasket', JSON.stringify(order));
    // console.log(productDetails); // Log the productDetails object
    // console.log(verified); // Log the value of verified
    // throw new Error("Code execution stopped.");

    if (verified == 'no') {
        // Redirect to verification page
        window.location.href = baseUrl + "rss/verification/profile-verification/";
        return false; // Prevent redirection
    } else {
        // Go straight to payment page
        order = JSON.parse(localStorage.getItem('rentalBasket'));
        var data = { "order": order };

        $.ajaxSetup({ cache: false });

        // Identify the user by their userID in Mixpanel to track Users
        mixpanel.identify(userID);

        // Track the user property event
        mixpanel.track('Property Subscription', {
            'PropertyID': productID,
            'PropertyTitle': productTitle,
            'SubscriptionFees': subscriptionFees,
            'UserID': userID
        });

        $.ajax({
            url: baseUrl + "rss/insertOrderDetails/",
            type: "POST",
            data: data,
            dataType: 'json',
            complete: function (data) {
                // console.log(data);
                // throw new Error("Code execution stopped.");
                
                //Redirect to summary page
                pay_property.innerHTML = "Subscribed";
				// $('#continue-but').html("Continue");

                // Track the successful subscribers
                mixpanel.track('Successful Property Subscriber', {
                    'PropertyID': productID,
                    'PropertyTitle': productTitle,
                    'SubscriptionFees': subscriptionFees,
                    'UserID': userID
                });
				
                window.localStorage.removeItem('rentalBasket');
                window.location.href = baseUrl + "payment-summary/";
                return false;
            }
        });
    }
});


    $('#mobPaymentForms').submit(function (e) {
        e.preventDefault();

        // Initialize Mixpanel with your project token
        mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');

        var pay_property = document.getElementById('mob-pay-property');
        
        pay_property.innerHTML = "Loading...";

        var payment_plan = $('#mob-payment-plan').val();
        
        var move_in_date = $('#mob-move-in-date').val();
        
        var inspectionStat = $('#inspection_stat').val();
        
        var v_profile = document.getElementById('verification_profile').value;
        
        var userID = document.getElementById('userID').value;
        
        var verified = document.getElementById('verified').value;
        
        var v_stat = document.getElementById('cvstat').value;

        if (inspectionStat == 'no') {
            
            alert("You need to book an inspection first.");
            
            pay_property.innerHTML = "Subscribe";
            
            return false;
        }

        if (payment_plan === "") {
            
            alert("Select a payment plan before proceeding.");
            
            pay_property.innerHTML = "Subscribe";
            
            return false;
        }

        if (move_in_date === "") {
            
            alert("Select a move-in date before proceeding.");
            
            pay_property.innerHTML = "Subscribe";
            
            return false;
        }

        if (v_stat !== 'yes' && v_profile == 1) {
            
            alert('Account not verified yet!');
            
            pay_property.innerHTML = "Subscribe";
            
            return false;
        }

        if (!userID) {
            
            alert('You are not logged in');
            
            window.location.href = baseUrl + "login";
            
            return false;
        }

        var paymentOption = "wallet"; // Set the payment option here
        
        // var paymentPlan = document.getElementById('payment-plan').value;
        
        var book_as = 'Individual'; // document.getElementById('book-as').value;
        
        // var move_in_date = document.getElementById('move-in-date').value;
        
        var duration = document.getElementById('duration').value;
        
        var productID = document.getElementById('property_id').value;
        
        var productTitle = document.getElementById('productName').value;
        
        var prodPrice = document.getElementById('amount-due').value;
        
        var securityDeposit = document.getElementById('sec-deposit').value;
        
        var img = document.getElementById('imageLink').value;
        
        var productUrl = window.location.href;
        
        
        // Retrieve the values of the hidden input fields
        var subscriptionFees = $('input[name="subscription-fees"]').val();

        var serviceChargeDeposit = $('input[name="service-charge-deposit"]').val();
        var securityDepositFund = $('input[name="security-deposit-fund"]').val();

        var total = $('input[name="total"]').val();
        
        

        var order = JSON.parse(localStorage.getItem('rentalBasket'));
        
        if (order.property.length > 0) {
            
            order.property.length = 0;
            
        }

        order.paymentOption = paymentOption;

        var productDetails = {
            
            "productID": productID,
            
            "productTitle": productTitle,
            
            "paymentPlan": payment_plan,
            
            "prodPrice": prodPrice,
            
            "imageLink": img,
            
            "productUrl": productUrl,
            
            "securityDeposit": securityDeposit,
            
            "duration": duration,
            
            "book_as": book_as,
            
            "move_in_date": move_in_date,
            
           "subscriptionFees": subscriptionFees,
           
            "serviceChargeDeposit": serviceChargeDeposit,
        
            "securityDepositFund": securityDepositFund,
            
            "total": total

        };
        // for (var key in productDetails) {
            
        //     if (productDetails.hasOwnProperty(key) && productDetails[key] === "") {
                
        //         alert("Please fill in all the required fields.");
                
        //         pay_property.innerHTML = "Subscribe";
                
        //         return false;
        //     }
        // }

        order.property.push(productDetails);

        window.localStorage.setItem('rentalBasket', JSON.stringify(order));

        if (verified == 'no') {
            
            window.location.href = baseUrl + "rss/verification/profile-verification/";
            
            return false;
            
        } else {
            
            order = JSON.parse(localStorage.getItem('rentalBasket'));
            
            var data = { "order": order };

            $.ajaxSetup({ cache: false });

            // Track the user property event
            mixpanel.track('Property Subscription', {
                'PropertyID': productID,
                'PropertyTitle': productTitle,
                'SubscriptionFees': subscriptionFees,
                'UserID': userID
            });

            $.ajax({
                
                url: baseUrl + "rss/insertOrderDetails/",
                
                type: "POST",
                
                data: data,
                
                dataType: 'json',
                
                complete: function (data) {
                    
                    pay_property.innerHTML = "Subscribed";
                    
                    // console.log(data);
                    // throw new Error("Code execution stopped.");

                    // Track the successful subscribers
                    mixpanel.track('Successful Property Subscriber', {
                        'PropertyID': productID,
                        'PropertyTitle': productTitle,
                        'SubscriptionFees': subscriptionFees,
                        'UserID': userID
                    });
                
                    window.localStorage.removeItem('rentalBasket');
                    
                    window.location.href = baseUrl + "payment-summary/";
                    
                    return false;
                }
            });
        }
    });



    $('.pay-option').click(function () {

        $('.fake-check-box').removeClass('active-payment-option');

        $('.pay-option').css("background", "#FFF");

        var paymentOption = $(this).attr('id');

        $("#" + paymentOption).css("background", "#CBEEFC");

        $('#payment_option').val(paymentOption);

        $('.fcb-' + paymentOption).addClass('active-payment-option');


    });


    $('#continue-but').click(function () {

        // Initialize Mixpanel with your project token
        mixpanel.init('86e1f301cd45debd226a5a82ad553d5c');

        $('#continue-but').html("wait...");

        var userID = document.getElementById('userID').value;

        var verified = document.getElementById('verified').value;

        var order = JSON.parse(localStorage.getItem('rentalBasket'));

        var paymentOption = document.getElementById('payment_option').value;

        if (paymentOption == '') {

            alert('Please select a mode of payment before you proceed!');

            $('#pay-property').html("Continue");

            return false;
        }


        if (!userID) {

            alert('You are not logged in');

            window.location.href = baseUrl + "login";

            return false;

        }

        //var reporting = document.getElementById('reportage');	
        var paymentPlan = "";

        var book_as = "";

        var move_in_date = "";

        var duration = "";


        paymentPlan = document.getElementById('payment-plan').value;

        book_as = 'Individual';//document.getElementById('book-as').value;

        move_in_date = document.getElementById('move-in-date').value;

        duration = document.getElementById('duration').value;

        var productID = document.getElementById('property_id').value;

        var productTitle = document.getElementById('productName').value;

        var prodPrice = document.getElementById('amount-due').value;

        var securityDeposit = document.getElementById('sec-deposit').value;

        var img = document.getElementById('imageLink').value;

        var productUrl = window.location.href;

        if (order.property.length > 0) {

            order.property.length = 0;

        }

        //Update payment option

        order.paymentOption = paymentOption;

        var productDetails = { "productID": productID, "productTitle": productTitle, "paymentPlan": paymentPlan, "prodPrice": prodPrice, "imageLink": img, "productUrl": productUrl, "securityDeposit": securityDeposit, "duration": duration, "book_as": book_as, "move_in_date": move_in_date };

        order.property.push(productDetails);

        window.localStorage.setItem('rentalBasket', JSON.stringify(order));


        if (verified == 'no') {

            //Redirect to verification page
            window.location.href = baseUrl + "rss/verification/profile-verification/";

        } else {

            //Go straight to payment page

            order = JSON.parse(localStorage.getItem('rentalBasket'));


            var data = { "order": order };


            $.ajaxSetup({ cache: false });

            // Track the mode of payment
            mixpanel.track('Property Subscriber Payment Plan', {
                'PropertyID': productID,
                'PropertyPlan': paymentPlan,
                'AmountDue': prodPrice,
                'UserID': userID
            });

            $.ajax({

                url: baseUrl + "rss/insertOrderDetails/",

                type: "POST",

                data: data,

                dataType: 'json',

                complete: function (data) {
                    //console.log("transaction: "+data.result);
                    //if(data.result == "success"){

                    //Redirect to pay
                    // 	$('#continue-but').html("Continue");
                    // Track the mode of payment
                    mixpanel.track('Property Subscriber Payment Plan', {
                        'UserID': userID,
                        'PropertyID': productID,
                        'PropertyPlan': paymentPlan,
                        'AmountDue': prodPrice
                    });

                    window.localStorage.removeItem('rentalBasket');

                    window.location.href = baseUrl + "payment-summary/";

                    return false;

                    /*}else{

                        alert("Error!!!"); 

                        $('#continue-but').html("Continue");
                    	
                        return false;

                    }*/

                }

            });


        }



    });

    $('.close-button').click(function () {

        // $('.popup-container').css("display", "none");

        // $('.popup.payment-option-pop').css("display", "none");

    });

});