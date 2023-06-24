
	<div class="item-pane">

		<div class="pane-inner">
            <div class="spc-div">
                <?php 
        			$client = new \GuzzleHttp\Client();
        			
            	    /* Data */
                    
                    
                    //$startDate = date("Y-m-d", strtotime($today)); //select date in Y-m-d format
        					
            	    //$nMonths = 1;
            	    
                    //$due_date = $this->endCycle($startDate, $nMonths); // output: 2014-07-02
                    
                    $curl = curl_init();
                    			
            		curl_setopt_array($curl, array(
            			
            		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/accounts",
            
            		  	CURLOPT_RETURNTRANSFER => true,
            
            		  	CURLOPT_HTTPHEADER => [
            				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",
            
            				"content-type: application/json"
            		  	]
            		));
            
            		$response = curl_exec($curl);
            		
            		$err = curl_error($curl);
            		
            		//echo "Response: ".$response." Error: ".$err;
            		
            		$response = json_decode($response);
            		
            		//$response = (array) $response[0];
            		
            		print_r($response);
            		
            		echo "<br /><br />";
            		
            		
            		echo get_object_vars($response->data->virtualAccounts[0]->bankAccount)['accountName'];
            		
                ?>
    		</div>
		</div>

	</div>