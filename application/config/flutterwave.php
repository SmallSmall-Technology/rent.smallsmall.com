<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * Flutter Wave Library for CodeIgniter 3.X.X
     *
     * Library for Flutter Wave payment gateway. It helps to integrate Flutter Wave payment gateway's Standard Method
     * in the CodeIgniter application.
     *
     * It requires Flutterwave configuration file and it should be placed in the config directory.
     *
     * @package     CodeIgniter
     * @category    Libraries
     * @author      Jaydeep Goswami
     * @link        https://infinitietech.com
     * @GITHUB link https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library
     * @license     https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library/blob/master/LICENSE
     * @version     1.0
     */
    
    
    // ------------------------------------------------------------------------
    // Flutter Wave library configuration
    // ------------------------------------------------------------------------
    
    // Flutter Wave environment, Sandbox or Live
    
    $config['sandbox'] = TRUE; //TRUE for Sandbox - FALSE for live environment
    
    // Flutter Wave API endpoints for Sandbox & Live
    $config['payment_endpoint'] = ($config['sandbox']) ? 'https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/hosted/pay' : 'https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay';
    $config['verify_endpoint'] = ($config['sandbox']) ? 'https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify' : 'https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify';
    
    /* Configuration stars from here */
    // Flutter Wave Credentials 
    $config['PBFPubKey'] = ($config['sandbox']) ? 'FLWPUBK_TEST-eea55b1af31552476b031bb7d08e84a5-X' : 'FLWPUBK-4df8e45920d354aaf4569e6c0a33e0dc-X'; /* Public Key for Sandbox : Live */
    $config['SECKEY'] = ($config['sandbox']) ? 'FLWSECK_TEST-012031f32cc5e6b2d0bd144c69ab90bd-X' : 'FLWSECK-ae7212c05c53381c905ebb5ac73495cc-X'; /* Secret Key for Sandbox : Live */
    $config['encryption_key'] = ($config['sandbox']) ? 'FLWSECK_TESTd35790a106e8' : 'ae7212c05c53ad327050f2ac'; /* Encryption Key for Sandbox : Live */
    
    // Webhook Secret Hash 
    $config['secret_hash'] = ($config['sandbox']) ? 'TEST_SECRET_HASH' : 'LIVE_SECRET_HASH$'; /* Secret HASH for Sandbox : Live */
    
    // What is the default currency?
    // $config['currency'] = 'USD';  /* Store Currency Code */
    $config['currency'] = 'NGN';  /* Store Currency Code */
    
    // Transaction Prefix if any
    $config['txn_prefix'] = 'TXN_PREFIX';  /* Transaction ID Prefix if any */