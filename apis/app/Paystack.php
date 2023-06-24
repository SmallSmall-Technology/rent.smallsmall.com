<?php

namespace App;

class Paystack
{
    protected $BASE_URL;
    protected $headers;
    protected $authorization_url;
    /**
     * Transaction Verification Successful
     */
    const VS = 'Verification successful';

    /**
     *  Invalid Transaction reference
     */
    const ITF = "Invalid transaction reference";

    /**
     * Issue Secret Key from your Paystack Dashboard
     * @var string
     */

    /**
     *  Response from requests made to Paystack
     * @var mixed
     */
    protected $response;

    public function __construct()
    {
        $this->BASE_URL = env('PAYSTACK_PAYMENT_URL');
        $this->headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$this->getSecretKey(),
            'Cache-Control: no-cache',
            'Accept: application/json'
        ];
    }

    private function getSecretKey()
    {
        return env('PAYSTACK_SECRET_KEY');
    }
    private function getPublicKey()
    {
        return env('PAYSTACK_PUBLIC_KEY');
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getAuthorizationURL()
    {
        return $this->authorization_url;
    }

    public function initializeTransaction($data = [])
    {
        $data['key'] = $this->getPublicKey();
        $response = $this->doPostRequest($this->BASE_URL.'/transaction/initialize',$data, $this->headers);
        $this->response = json_decode($response);
    }

    /**
     * Hit Paystack Gateway to Verify that the transaction is valid
     */
    private function verifyTransactionAtGateway()
    {
        $transactionRef = request()->query('trxref');
        $relativeUrl = "/transaction/verify/{$transactionRef}";
        $response = $this->doGetRequest($this->BASE_URL. $relativeUrl, [], $this->headers);
        $this->response = json_decode($response);
    }

    /**
     * True or false condition whether the transaction is verified
     * @return boolean
     */
    public function isTransactionVerificationValid()
    {
        $this->verifyTransactionAtGateway();
        $result = $this->getResponse()->message;

        switch ($result) {
            case self::VS:
                $validate = true;
                break;
            case self::ITF:
                $validate = false;
                break;
            default:
                $validate = false;
                break;
        }

        return $validate;
    }

    /**
     * Get Payment details if the transaction was verified successfully
     * @return json
     * @throws PaymentVerificationFailedException
     */
    public function getPaymentData()
    {
        if ($this->isTransactionVerificationValid()) {
            return $this->getResponse();
        } else {
            throw new PaymentVerificationFailedException("Invalid Transaction Reference");
        }
    }

    // Utility function to make HTTP GET request to server
    private function doGetRequest($url, $arr_params, $headers = array('Content-Type: application/x-www-form-urlencoded'))
    {
        $response = array();
        $final_url_data = $arr_params;
        if (is_array($arr_params)) {
            $final_url_data = http_build_query($arr_params, '', '&');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response['body'] = curl_exec($ch);
        $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response['body'];
    }

    // Utility function to make HTTP POST request to server
    private function doPostRequest($url, $arr_params, $headers = array('Content-Type: application/x-www-form-urlencoded'))
    {
        $response = array();
        $final_url_data = $arr_params;
        if (is_array($arr_params)) {
            $final_url_data = http_build_query($arr_params, '', '&');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response['body'] = curl_exec($ch);
        $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // echo curl_error($ch);
        curl_close($ch);
        return $response['body'];
    }
}

class PaymentVerificationFailedException extends \Exception
{

}
