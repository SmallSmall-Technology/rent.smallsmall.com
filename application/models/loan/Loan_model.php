<?php

class Loan_model extends CI_Model {

	public function __construct()
	{

		parent::__construct();

		$this->load->database();
		
		$this->db2 = $this->load->database('second', TRUE);

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
	
	public function check_pending_loans($user_id){
	    
	    $this->db->select('*');
	    
	    $this->db->from('loan_requests');
	    
	    $this->db->where('userID', $user_id);
	    
	}
	
	public function insert_loan_request($loan_id, $reference, $amount, $purpose, $due_date, $amount_due){
	    
	    $inserts = array("loanID" => $loan_id, "reference" => $reference, "amountBorrowed" => $amount, "purpose_of_loan" => serialize($purpose), "status" => "Approved", "amount_due" => $amount_due, "amount_paid" => 0, "date_of_request" => date('Y-m-d'), "payback_date" => $due_date);
	
	    return $this->db->insert('loan_requests', $this);
	
	}
	
	public function insert_account_details($userID, $accountID, $accountReference, $accountName, $accountNumber, $bankName, $bankCode, $platform){
	    
	    $this->userID = $userID;
	    
	    $this->accountID = $accountID;
	    
	    $this->account_name = $accountName;
	    
	    $this->account_reference = $accountReference;
	    
	    $this->account_number = $accountNumber;
	    
	    $this->bank_name = $bankName;
	    
	    $this->bank_code = $bankCode;
	    
	    $this->account_balance = 0;
	    
	    $this->credit_limit = 0;
	    
	    $this->platform = $platform;
	    
	    $this->date_created = date('Y-m-d');
	    
	    return $this->db->insert('virtual_account', $this);
	    
	}
	
	public function get_account_details($id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('virtual_account as a');
	    
	    $this->db->where('a.userID', $id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function insert_wallet_transaction($referenceID, $user_id, $amount, $transaction_type, $status, $mode_of_payment, $reason = NULL, $id = NULL){
	    
	    $this->txn_id = $referenceID;
	    
	    $this->user_id = $user_id;
	    
	    $this->amount = $amount;
	    
	    $this->transaction_type = $transaction_type;
	    
	    $this->status = $status;
	    
	    $this->mode_of_payment = $mode_of_payment;
	    
	    $this->reason = $reason;
	    
	    $this->deducted_by = $id;
	    
	    $this->transaction_date = date('Y-m-d H:i:s');
	    
	    return $this->db->insert('wallet_transactions', $this);
	    
	}
	
	public function update_wallet_transaction_status($refID, $status, $transaction_ref, $reason){
	    
	    $updates = array("status" => $status, "gateway_ref" => $transaction_ref, "reason" => $reason);
	    
	    $this->db->where("txn_id", $refID);
	    
	    return $this->db->update("wallet_transactions", $updates);
	    
	}
	
	public function get_loan_stat($user_id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('loans as a');
	    
	    $this->db->where('a.userID', $user_id);
	    
	    $this->db->join('virtual_account as b', 'b.userID = a.userID', 'LEFT OUTER');
	    
	    $this->db->order_by('a.entryDate', 'DESC');
	    
	    $this->db->limit(1);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	}
	
	public function insert_loan($userID , $reference, $principal, $payable, $amountPaid, $status, $due_date){
	    
	    $this->userID = $userID;
	    
	    $this->loanID = $reference;
	    
	    $this->principal = $principal;
	    
	    $this->payableAmount = $payable;
	    
	    $this->amountPaid = $amountPaid;
	    
	    $this->paymentStatus = $status;
	    
	    $this->paymentDate = $due_date;
	    
	    $this->entryDate = date('Y-m-d H:i:s');
	    
	    return $this->db->insert('loans', $this);
	    
	}
	
	public function edit_loan($userID , $loanID, $amount, $payable, $amountPaid, $status, $due_date){
	    
	    $updates = array("principal" => $amount, "amountPaid" => $amountPaid, "payableAmount" => $payable, "paymentStatus" => $status, "paymentDate" => $due_date);
	    
	    $this->db->where('loanID', $loanID);
	    
	    return $this->db->update('loans', $updates);
	    
	}
	
	public function update_balance($user_id, $account_balance){
	    
	    $update = array('account_balance' => $account_balance);
	    
	    $this->db->where('userID', $user_id);
	    
	    return $this->db->update('virtual_account', $update);
	    
	}
	
	public function insert_wallet_funding($user_id, $amount, $trans_type, $reference, $status, $mode_of_payment, $ref){
	    
	    $this->txn_id = $reference;
	    
	    $this->user_id = $user_id;
	    
	    $this->amount = $amount;
	    
	    $this->transaction_type = $trans_type;
	    
	    $this->status = $status;
	    
	    $this->mode_of_payment = $mode_of_payment;
	    
	    $this->gateway_ref = $ref;
	    
	    $this->transaction_date = date('Y-m-d H:i:s');
	    
	    return $this->db->insert('wallet_transactions', $this);
	    
	}
	
	public function get_account_details_using_acct_num($accountNumber){
	    
	    $this->db->select('*');
	    
	    $this->db->from('virtual_account');
	    
	    $this->db->where('accountID', $accountNumber);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function check_for_account($userID){
	    
	    $this->db->select('*');
	    
	    $this->db->from('virtual_account');
	    
	    $this->db->where('userID', $userID);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function insertSubscriptionTransaction($verification_id, $bookingID, $ref_id, $user_id, $amount, $status){
	    
	    return $this->db->insert('transaction_tbl', array('verification_id' => $verification_id, 'type' => 'rss', 'transaction_id' => $bookingID, 'reference_id' => $ref_id, 'userID' => $user_id, 'amount' => $amount, 'status' => $status, 'payment_type' => 'Wallet', 'transaction_date' => date('Y-m-d')));
	    
	}
	
}