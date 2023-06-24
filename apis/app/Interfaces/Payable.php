<?php 

namespace App\Interfaces;

interface Payable {
    public function pre_payment_checks($params);
    public function handle_payments($params);
}