<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_job extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model("Crud_model");
        $this->load->helper('general_helper');
        $this->load->library('user_agent');
        $this->load->helper('smiley');
         $this->load->library('table');
    }

    function checkOffer(){
    	$offeraData = $this->Crud_model->get_data("","offerdata");
    	if(!empty($offeraData)){
    		foreach ($offeraData as $data) {
    			if($data->offerStatus == "pending"){
	    			$offerTime = strtotime(date("Y-m-d H:i:s", strtotime($data->offerTime . " + 2 day")));
	    			$currentDate = strtotime(date("Y-m-d H:i:s"));
	    			if($currentDate >= $offerTime){
	    				$this->Crud_model->update_data(["offerId"=>$data->offerId],["offerStatus"=>"declined"],"offerdata");
	    			}
    			}
    		}
    	}
    }

    function checkItem(){
        $itemData = $this->Crud_model->get_data("","items");
        if(!empty($itemData)){
            foreach ($itemData as $items) {
               $expectedDate =  strtotime($items->expectedDate);
               $currentDate =  strtotime(date("Y-m-d"));
               if($currentDate > $expectedDate){
                    $this->Crud_model->update_data(["id"=>$items->id],["item_status"=>0],"items");
               }
            }
        }
    }
}