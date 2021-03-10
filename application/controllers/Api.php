<?php

class Api extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Variant_model', 'vapi', TRUE);
        $this->load->model('Product_model', 'papi', TRUE);
        $this->load->model('Order_model', 'oapi', TRUE);
    }

    public function index()
    {
        $data = array();
        echo _error("Bad Request !", 400);
    }
    function config() {

    }

    function dashboard()
    {
        $products = $this->papi->getProductList("CNT", []);
        $variants = $this->vapi->getVariantList("CNT", []);
        $counter_orders = $this->oapi->getOrders("CNT", ["order_type" => "COUNTER"]);
        $delivery_orders = $this->oapi->getOrders("CNT", ["order_type" => "DELIVERY"]);
        $unpaid_orders = $this->oapi->getOrders("CNT", ["payment_status" => "CREDIT"]);
        echo _success("success", "data", [
            "products" => !empty($products) ? $products : "0",
            "variants" => !empty($variants) ? $variants : "0",
            "counter_orders" => !empty($counter_orders) ? $counter_orders : "0",
            "delivery_orders" => !empty($delivery_orders) ? $delivery_orders : "0",
            "unpaid_orders" => !empty($unpaid_orders) ? $unpaid_orders : "0",
            "users" => "0"], 200);
    }


}
