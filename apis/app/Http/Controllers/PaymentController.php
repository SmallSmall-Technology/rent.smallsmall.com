<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paystack;
use Illuminate\Support\Facades\Validator;
use App\Rules\PropertyTypes;
use App\Residential;
use App\Coworking;
use App\Storage;
use App\Furnisure;
use App\User;
use App\UserPayments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paystack;

    public function __construct()
    {
        $this->paystack = new Paystack;
    }
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        $params = (object)request()->validate([
            'user_id' => ['required'],
            'item_type' => ['required', 'string', new PropertyTypes],
            'item_id' => 'required',
            'months' => 'required|integer|max:12'
        ]);

        $response = '';

        $user = User::findOrFail($params->user_id);
        $property = $this->get_property_type($params->item_type, $params->item_id);
        $data = (object)[
            'user_id' => $user->id,
            'months' => $params->months
        ];
        $checks = $property->pre_payment_checks($data);
        if ($checks === null) {
            $pay_data = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'amount' => $property->cost_per_month * $params->months,
                'reference' => strtoupper("RSS-" . md5(time() . $user->email)),
            ];

            $this->paystack->initializeTransaction($pay_data);
            $response = $this->paystack->getResponse();
            if ($response->status !== false) {
                $expires_at = Carbon::now()->addMonths($params->months)->toDateTimeString();
                UserPayments::create([
                    'user_id' => $user->id,
                    'property_id' => $property->id,
                    'property_type' => $params->item_type,
                    'status' => 'initiated',
                    'txn_reference' => $response->data->reference,
                    'amount' => $property->cost_per_month * $params->months,
                    'months' => $params->months,
                    'expires_at' => $expires_at
                ]);

            }

        } else {
            $response = $checks;
        }

        return response()->json(['data' => $response], 200);
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = $this->paystack->getPaymentData();
        if ($paymentDetails->data->status === 'success') {
            UserPayments::where('txn_reference', $paymentDetails->data->reference)->update(['status' => 'success']);
            $user_payments = UserPayments::where('txn_reference', $paymentDetails->data->reference)->first();
            $property = $this->get_property_type($user_payments->property_type, $user_payments->property_id);
            $property->handle_payments($user_payments);
        }
        return response()->json(['data' => $paymentDetails->data->status]);
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayWebhook()
    {
        Log::info('WEBHOOK CALLED...');
        // // only a post with paystack signature header gets our attention
        // if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') || !array_key_exists('x-paystack-signature', $_SERVER))
        //     exit();
        //     // validate event do all at once to avoid timing attack
        // if ($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, env('PAYSTACK_SECRET_KEY')))
        //     exit();
        
        // Retrieve the request's body
        $input = @file_get_contents("php://input");
        $event = json_decode($input);

        Log::info('EVENT->EVENT:: ' . $event->event);
        Log::info('EVENT->DATA->STATUS:: ' . $event->data->status);
        Log::info('EVENT->DATA->REFERENCE:: ' . $event->data->reference);

        if (($event->event == 'charge.success') && ($event->data->status == 'success')) {
            UserPayments::where('txn_reference', $event->data->reference)->update(['status' => 'success']);
            $user_payments = UserPayments::where('txn_reference', $event->data->reference)->first();
            $property = $this->get_property_type($user_payments->property_type, $user_payments->property_id);
            $property->handle_payments($user_payments);
        }
        http_response_code(200);
    }

    private function get_property_type($property_type, $property_id)
    {
        switch ($property_type) {
            case 'Residential':
                return Residential::findOrFail($property_id);
                break;

            case 'Storage':
                return Storage::findOrFail($property_id);
                break;

            case 'Coworking':
                return Coworking::findOrFail($property_id);
                break;

            case 'Furnisure':
                return Furnisure::findOrFail($property_id);
                break;

            default:
                fail('Could not get valid property type.');
                break;
        }
    }
}
