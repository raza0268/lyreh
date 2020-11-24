<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stripe_core
{
    protected $ci;

    protected $secretKey;

    protected $publishableKey;

    protected $apiVersion = '2019-02-19';

    public function __construct()
    {
        require_once('application/third_party/stripe-php/init.php');
        $this->ci             = &get_instance();
        $query = $this->db->get("stripeSettings");
        $ret = $query->row();
        $publicKey = "";
        $secretKey = "";
        if(!empty($ret)){
            $publicKey = $ret->publicKey;
            $secretKey = $ret->privateKey;
        }
        $this->secretKey      = $secretKey;
        $this->publishableKey = $publicKey;

        // \Stripe\Stripe::setApiVersion($this->apiVersion);
        \Stripe\Stripe::setApiKey($this->secretKey);
    }

    public function create_customer($data)
    {
        return \Stripe\Customer::create($data);
    }

    public function get_customer($id)
    {
        return \Stripe\Customer::retrieve($id);
    }

    public function all_customers()
    {
        return \Stripe\Customer::all();
    }

    public function delete_customer($cus_id='')
    {
        $customer = \Stripe\Customer::retrieve($cus_id);
        $customer->delete();
    }

    public function update_customer_source($customer_id, $token)
    {
        \Stripe\Customer::update($customer_id, [
            'source' => $token,
        ]);
    }

    public function get_customer_with_default_source($id)
    {
        return \Stripe\Customer::retrieve(['id' => $id, 'expand' => ['default_source']]);
    }

    public function create_charge($data)
    {
        return \Stripe\Charge::create($data);
    }

    public function create_source($data)
    {
        return \Stripe\Source::create($data);
    }

    public function get_source($source)
    {
        return \Stripe\Source::retrieve($source);
    }

    public function get_publishable_key()
    {
        return $this->publishableKey;
    }

    public function retrieve_token($token_id)
    {
        return \Stripe\Token::retrieve($token_id);
    }

    public function has_api_key()
    {
        return $this->secretKey != '';
    }


    public function create_plan($data)
    {
        return \Stripe\Plan::create($data);
    }

    public function create_subscription($data)
    {
        return \Stripe\Subscription::create($data);
    }

    public function get_subscriptions($customer_id)
    {
       return  \Stripe\Customer::retrieve($customer_id)->subscriptions->all();
    }

    public function delete_subscriptions($sub_id='')
    {
        return \Stripe\Subscription::retrieve($sub_id);
    }

    public function update_subscriptions($subscriptionId,$data)
    {
        return \Stripe\Subscription::update($subscriptionId,$data);
    }

    public function delete_plan($planId)
    {
        return \Stripe\Plan::retrieve($planId); 
    }

    public function customer_all_cards($customer_id)
    {   

        return \Stripe\Customer::retrieve($customer_id)->sources->all(['limit'=>10, 'object' => 'card']);
    }


    public function delete_card($customer_id,$card)
    {
        $customer = \Stripe\Customer::retrieve($customer_id);
        return $customer->sources->retrieve($card)->delete();

    }

    public function getNextInvoice($customer_id)
    {
    
      return \Stripe\Invoice::upcoming(["customer" => $customer_id]);
    }

    public function allinvoices($data)
    {
        return \Stripe\Invoice::all($data);
    }


    public function invoiceStats($data='')
    {
        return \Stripe\Invoice::retrieve($data);
    }



    public function bank_token($data='')
    {
        $back_token = \Stripe\Token::create(array(
            "bank_account" => array(
                "country" => "US",
                "currency" => "USD",
                "account_holder_name" => $data['name'],
                "account_holder_type" => "individual",
                // "routing_number" => "110000000",
                // "account_number" => "000123456789",
                "routing_number" => $data['routing_number'],
                "account_number" => $data['account_number'],

            )
        ));

        $bank_tok = json_encode($back_token,true);
        return $bank_tok;
    }


    public function verify_bank($stripeCustomer,$bankToken)
    {
        $customer = \Stripe\Customer::retrieve($stripeCustomer);
        $bank_account = $customer->sources->retrieve($bankToken);
        $bank_account->verify(['amounts' => [32, 45]]);
        if($bank_account){
            $msg = $bank_account;
        }else{
             $msg = false;
        }
        return $msg;


        // $bank_account = \Stripe\Customer::retrieveSource($stripeToken,$bankToken);
        // $bank_account->verify(['amounts' => [32, 45]]);

    }

}
