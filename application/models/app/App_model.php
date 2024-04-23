<?php

class App_model extends CI_Model {

	public function __construct()
	{

		parent::__construct();

		$this->load->database();

	}

	private $_limit;

	private $_pageNumber;

	private $_offset;

	// setter getter functionf

	public function setLimit($limit) {

		$this->_limit = $limit;

	}

	public function setPageNumber($pageNumber) {

		$this->_pageNumber = $pageNumber;

	}

	public function setOffset($offset) {

		$this->_offset = $offset;

	}
	
	public function login($username, $password){
	    
	    $this->db->select('a.userID, a.confirmation, a.lastLogin, b.firstName, b.lastName, b.user_type, b.phone, b.age, b.gender, b.verified, b.profile_picture, b.interest, b.referral_code, b.account_manager, b.interest, b.email');
	    
	    $this->db->from('login_tbl as a');
	    
	    $this->db->where('a.email', $username);
	    
	    $this->db->where('a.password', $password);
	    
	    $this->db->where('b.status', 'Active');
	    
	    $this->db->join('user_tbl as b', 'a.userID = b.userID');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function register($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $referred_by, $rc, $age, $gender, $useragent){
	    
	    $digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;

		$this->userID = $id;

		$this->firstName = $fname; // please read the below note

		$this->lastName = $lname;

		$this->email = $email;

		$this->password = $password;

		$this->phone = $phone;

		$this->income = $income;

		$this->referral = $referral;
		
		$this->age = $age;
		
		$this->gender = $gender;
		
		$this->referred_by = $referred_by;
		
		$this->referral_code = $rc;

		$this->user_type = $user_type;

		$this->interest = $interest;

		$this->verified = 'no';

		$this->points = 100;
		
		$this->platform = 'App';
		
		$this->user_agent = $useragent;

		$this->status = 'Active';

		$this->regDate = date('Y-m-d H:i:s');

		if($this->db->insert('user_tbl', $this)){

			$lastlog = date('Y-m-d H:i:s');

			$res = $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $lastlog, 'confirmation' => $confirmationCode));
			

			if($res){

				return 1;
				
			}else{

				return 0;

			}
		}else{
		    
			return 0;
		}
	    
	}
	
	public function properties(){
	    
	    $this->db->select('a.price, a.propertyTitle, a.propertyID, a.bed, a.bath, a.available_date, a.city, a.featuredImg, a.imageFolder, b.type');

		$this->db->from('property_tbl as a');
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
		
	}

	public function propertyID(){
	    
	    $this->db->select('a.propertyID');

		$this->db->from('property_tbl as a');
		
		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchVersion(){
	    
	    $this->db->select('*');

		$this->db->from('app_version');
		
		$query = $this->db->get();

		return $query->row_array();
	}

	public function updateVersion($build_number, $version_number){
	    
		$id = 1;

	    $versionUpdate = array("build_number" => $build_number, "version_number" => $version_number);
	        
		$this->db->where('id', $id);
		
		return $this->db->update('app_version', $versionUpdate);
		
	}
	
	public function fetchFeaturedProperties(){
	    
	    $this->db->select('a.price, a.propertyTitle, a.propertyID, a.bed, a.bath, a.available_date, a.city, a.featuredImg, a.imageFolder, b.type');

		$this->db->from('property_tbl as a');
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType');

		$this->db->where('a.featured_property', 'yes');

		$this->db->limit(6);
		
		$this->db->order_by('a.available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
		
	}
	
	public function get_property($id){
	    
	    $this->db->select('a.*, a.furnishing as furnishing_type, b.name');
	    
	    $this->db->from('property_tbl as a');
	    
	    $this->db->where('a.propertyID', $id);
	    
	    $this->db->join('furnishings as b', 'a.furnishing = b.type');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function apartment_types(){
	    
	    $this->db->select('id, type');
	    
	    $this->db->from('apt_type_tbl');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function fetchLocations(){
	    
	    $this->db->select('city');
	    
	    $this->db->from('property_tbl');
	    
	    $this->db->group_by('city');
	    
	    $this->db->order_by('city', 'ASC');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function adverts(){
	    
	    $this->db->select('a.*');
	    
	    $this->db->from('cx_adverts as a');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}

	public function check_inspection($user_id, $property_id){
	    
	    $this->db->select('*');
	    
	    $this->db->from('inspection_tbl');
	    
	    $this->db->where('userID', $user_id);
	    
	    $this->db->where('propertyID', $property_id);
	    
	    return $this->db->count_all_results();
	    
	}
	
	public function bookInspection($propID, $inspectionDate, $userID, $inspectionType){

		$digits = 8;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;

		$this->inspectionID = $id;

		$this->propertyID = $propID;

		$this->userID = $userID;

		$this->inspectionType = $inspectionType;

		$this->inspectionDate = $inspectionDate;

		$this->platform = 'App';

		$this->dateOfEntry = date('Y-m-d H:i:s');
				

		if($this->db->insert('inspection_tbl', $this)){

			$content = "Is the property available for visitation on ".$inspectionDate."<br />Inspection Type: ".$inspectionType." ?";

			$msg = $this->db->insert('messages_tbl', array('requestID' => $id, 'sender' => $userID, 'content' => $content, 'subject' => "Inspection Request", 'status' => 'unread', 'dateOfEntry' => date('Y-m-d H:i:s')));

			if($msg){

				return 1;

			}else{

				return 0;

			}

		}

	}
	
	public function get_countries(){
	
	    $this->db->select('id, name');

		$this->db->from('countries');

		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function get_states($country){
	
	    $this->db->select('id, name');

		$this->db->from('states');
		
		$this->db->where('country_id', $country);

		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function get_cities($state){
	
	    $this->db->select('id, name');

		$this->db->from('cities');
		
		$this->db->where('state_id', $state);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function get_wallet_transactions($id) {       

		$this->db->select('*');

		$this->db->from('wallet_transactions');

		$this->db->where('user_id', $id);
		
		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();

	}
	
	/*public function insertBooking($verificationID, $userID, $propertyID, $paymentPlan, $cost, $securityDeposit, $duration, $booked_as, $move_in_date, $payment_type, $ref){

		$digits = 4;

		$randomNumber = '';

		$count = 0;
		
		$nMonth = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}		

		$id = $randomNumber;
		
		if($paymentPlan == 'Upfront'){
			if($duration == 12){
				
				$nMonths = 12;
				
			}elseif($duration == 9){
				
				$nMonths = 9;
				
			}elseif($duration == 6){
				
				$nMonths = 6;
				
			}elseif($duration == 3){
				
				$nMonths = 3;
				
			}			

		}else if($paymentPlan == 'Bi-annual'){

			$nMonths = 6;

		}else if($paymentPlan == 'Quarterly'){

			$nMonths = 3;

		}else if($paymentPlan == 'Monthly'){

			$nMonths = 1;

		}
		
		$nMonths = 12;
		
		$startdate = date("Y-m-d", strtotime($move_in_date));
		
		$expiry = $this->endCycle($startdate, $nMonths);

		if($this->db->insert('bookings', array('verification_id' => $verificationID, 'bookingID' => $id, 'reference_id' => $ref, 'propertyID' => $propertyID, 'userID' => $userID, 'booked_as' => $booked_as, 'payment_plan' => $paymentPlan, 'duration' => $duration, 'move_in_date' => $move_in_date, "rent_expiration" => $expiry, "next_rental" => $move_in_date, "rent_status" => "Vacant", 'booked_on' => date("Y-m-d")))){

			return $this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'rss', 'transaction_id' => $id, 'reference_id' => $ref, 'userID' => $userID, 'amount' => $cost, 'status' => 'pending', 'payment_type' => $payment_type, 'transaction_date' => date('Y-m-d')));

		}else{

			return 0;

		}

	}*/
	
	public function get_verification_details($user_id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('verifications as a');
	    
	    $this->db->where('a.user_id', $user_id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.user_id');
	    
	    $this->db->where('b.verified', 'yes');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function get_property_dets($propertyID){
	    
	    $this->db->select('*');
	    
	    $this->db->from('property_tbl');
	    
	    $this->db->where('propertyID', $propertyID);
	    
	    //$this->db->where('available_date <', date('Y-m-d'));
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function checkVerification($userID){
	    
	    $this->db->select('verified');
	    
	    $this->db->from('user_tbl');
	    
	    $this->db->where('userID', $userID);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function getSubscriptions($id) {       

		$this->db->select('a.id as booking_id, a.bookingID, a.verification_id, a.userID, a.booked_as, a.payment_plan, a.duration, a.move_in_date, a.rent_expiration, a.booked_on, a.updated_at, a.rent_status, a.next_rental, b.verified, b.user_type, c.propertyTitle, c.address, c.city, c.propertyID as property_id, c.price, c.securityDeposit, c.securityDepositTerm, c.serviceChargeTerm, c.serviceCharge, c.intervals, d.*, d.amount as amount_paid, d.reference_id as transactionRef');

		$this->db->from('bookings as a');

		$this->db->where('a.userID', $id);

		$this->db->where('d.userID', $id);
		
		$this->db->join('user_tbl as b', 'b.userID = a.userID');
		
		$this->db->join('property_tbl as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');
		
		$this->db->join('transaction_tbl as d', 'd.transaction_id = a.bookingID', 'LEFT OUTER');
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();

	}
	
	public function countApprovedTransactions($bookingID){
	    
	    $this->db->from('transaction_tbl');
	    
	    $this->db->where('transaction_id', $bookingID);
	    
	    $this->db->where('status', 'Approved');
	    
	    return $this->db->count_all_results();
	    
	}
	
	public function insertTransactionDets($verification_id, $reference_id, $bookingID, $user_id, $amount, $status, $type, $payment_type, $expiry){
	    
	    $this->verification_id = $verification_id;
	    
	    $this->transaction_id = $bookingID;
	    
	    $this->reference_id = $reference_id;
	    
	    $this->userID = $user_id;
	    
	    $this->amount = $amount;
	    
	    $this->status = $status;
	    
	    $this->type = $type;
	    
	    $this->payment_type = $payment_type;
	    
	    $this->transaction_date = date('Y-m-d');
	    
	    if($this->db->insert('transaction_tbl', $this)){
	        
	        //Update booking table
	        $bookingUpdate = array("next_rental" => $expiry, "rent_status" => "Occupied", "updated_at" => date('Y-m-d H:i:s'));
	        
	        $this->db->where('bookingID', $bookingID);
	        
	        return $this->db->update('bookings', $bookingUpdate);
	        
	    }else{
	        
	        return 0;
	    }
	    
	}
	
	public function get_booking_details($bookingID){
	    
	    $this->db->select('a.*, a.propertyID as property_id, b.*');
	    
	    $this->db->from('bookings as a');
	    
	    $this->db->where('a.bookingID', $bookingID);
	    
	    $this->db->join('property_tbl as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function updateTransactionDets($bookingID, $transRef, $status, $payment_type, $expiry){
	    
	    $transUpdate = array("status" => $status, "payment_type" => $payment_type);
	    
	    $this->db->where("transaction_id", $bookingID);
	    
	    $this->db->where("reference_id", $transRef);
	    
	    if($this->db->update('transaction_tbl', $transUpdate)){
	        
	        //Update booking table
	        $bookingUpdate = array("next_rental" => $expiry, "rent_status" => "Occupied", "updated_at" => date('Y-m-d H:i:s'));
	        
	        $this->db->where('bookingID', $bookingID);
	        
	        return $this->db->update('bookings', $bookingUpdate);
	        
	    }else{
	        
	        return 0;
	    }
	    
	    
	}
	public function get_user($id){

		$this->db->select('*');

		$this->db->from('user_tbl');
		
		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();

	}
	public function insertPersonalDetails($fname, $lname, $email, $phone, $gross_pay, $dob, $gender, $maritalStatus, $presentAddress, $timeAtAddress, $currentHousingStatus, $previousEviction, $presentLandlordName, $landlordAddress, $reasonForLeaving, $userID){
	    
	    $digits = 10;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		$ver_id = $randomNumber;

		$this->user_id = $userID;
		
		$this->verification_id = $ver_id;

		$this->gross_annual_income = $gross_pay;

		$this->dob = $dob;

		$this->marital_status = $marital_status;

		$this->present_address = $presentAddress;

		$this->current_renting_status = $currentHousingStatus;

		$this->present_landlord = $presentLandlordName;

		$this->landlord_address = $landlordAddress;

		$this->reason_for_living = $reasonForLeaving;

		$this->created_at = date("Y-m-d H:i:s");

		$this->updated_at = date("Y-m-d H:i:s");
		
		//return $this->db->insert('verifications', $this);

		if($this->db->insert('verifications', $this)){

			$ver_stat = array("verified" => "incomplete");
			
			$this->db->where("userID", $userID);
			
			return $this->db->update("user_tbl", $ver_stat);

		}
	}
	public function verificationDetails($id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('verifications as a');
	    
	    $this->db->where('a.user_id', $id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.user_id');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	public function getInspectionDetails($user_id){
	    
	    $this->db->select('a.inspectionDate, a.inspectionType, c.propertyTitle, c.propertyID, c.price, c.securityDeposit, c.securityDepositTerm');
	    
	    $this->db->from('inspection_tbl as a');
	    
	    $this->db->where('a.userID', $user_id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = a.propertyID');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	}
	public function getWalletDetails($id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('virtual_account as a');
	    
	    $this->db->where('a.userID', $id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	                                
	public function insertBooking($id, $verificationID, $user_id, $propertyID, $paymentPlan = 'Monthly', $duration = 12, $booked_as, $move_in_date = '0000-00-00', $payment_type = 'Transfer', $total_cost, $ref){
		
		$nMonths = 12;
		
		$startdate = date("Y-m-d", strtotime($move_in_date));
		
		$expiry = $this->endCycle($startdate, $nMonths);

		if($this->db->insert('bookings', array('verification_id' => $verificationID, 'bookingID' => $id, 'reference_id' => $ref, 'propertyID' => $propertyID, 'userID' => $user_id, 'booked_as' => $booked_as, 'payment_plan' => $paymentPlan, 'duration' => $duration, 'move_in_date' => $move_in_date, 'updated_at' => date("Y-m-d H:i:s"), "rent_expiration" => $expiry, "next_rental" => $move_in_date, "rent_status" => "Vacant", 'booked_on' => date("Y-m-d")))){

			return $this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'rss', 'transaction_id' => $id, 'reference_id' => $ref, 'userID' => $user_id, 'amount' => $total_cost, 'status' => 'pending', 'payment_type' => $payment_type, 'transaction_date' => date('Y-m-d')));
			
		}else{

			return 0;

		}
	}
	
	public function updateBooking($bookingID, $verificationID, $userID, $propertyID, $paymentPlan, $duration, $move_in_date, $payment_type, $cost){
		
		$nMonths = 12;
		
		$startdate = date("Y-m-d", strtotime($move_in_date));
		
		$expiry = $this->endCycle($startdate, $nMonths);
		
		$updates = array('payment_plan' => $paymentPlan, 'duration' => $duration, 'move_in_date' => $move_in_date, "rent_expiration" => $expiry, "next_rental" => $move_in_date, "rent_status" => "Vacant", 'updated_at' => date("Y-m-d H:i:s"));
		
		$this->db->where('propertyID', $propertyID);
	    
	    $this->db->where('userID', $userID);
	
	    $query = $this->db->update('bookings', $updates);	

		if($query){

			return $this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'rss', 'transaction_id' => $bookingID, 'reference_id' => $ref, 'userID' => $userID, 'amount' => $cost, 'status' => 'pending', 'payment_type' => $payment_type, 'transaction_date' => date('Y-m-d')));
			
		}else{

			return 0;

		}
	}
	public function count_booking_transactions($bookingID){
	    
	    $this->db->from('transaction_tbl');
	    
	    $this->db->where('transaction_id', $bookingID);
	    
	    $this->db->where('status', 'Approved');
	    
	    return $this->db->count_all_results();
	    
	}
	public function check_booking($userID, $propertyID){
	    
	    $this->db->select('*');
	    
	    $this->db->from('bookings');
	    
	    $this->db->where('propertyID', $propertyID);
	    
	    $this->db->where('userID', $userID);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	}
	public function delete_user($id){
	
	    //$update = array("status" => $action);
	    
	    $this->db->where("userID", $id);
	    
	    return $this->db->delete("user_tbl");
	     
	
	}
	public function get_all_user_notifications($userID){
	    
	    $this->db->select('*');
	    
	    $this->db->from('user_notification');
	    
	    $this->db->where('userID', $userID);
	    
	    $this->db->order_by('entry_date', 'DESC');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	}
	public function update_user_notification($notificationID, $userID){
	    
	    $status_update = array('status' => 1);
	    
	    $this->db->where('userID', $userID);
	    
	    return $this->db->update('user_notification', $status_update);
	    
	}
	
	public function updateProfile($userID, $firstname, $lastname, $phone){
	    
	    $user = array("firstName" => $firstname, "lastName" => $lastname, "phone" => $phone);
	    
	    $this->db->where('userID', $userID);
	    
	    return $this->db->update('user_tbl', $user);
	    
	}
	
	public function add_months($months, DateTime $dateObject) 
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            return $dateObject->diff($next);
        } else {
            return new DateInterval('P'.$months.'M');
        }
    }

    public function endCycle($d1, $months)
    {
        $date = new DateTime($d1);

        // call second function to add the months
        $newDate = $date->add($this->add_months($months, $date));

        // goes back 1 day from date, remove if you want same day of month
        //$newDate->sub(new DateInterval('P1D')); 

        //formats final date to Y-m-d form
        $dateReturned = $newDate->format('Y-m-d'); 

        return $dateReturned;
    }
}