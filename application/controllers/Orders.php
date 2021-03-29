<?php

class Orders extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'oapi', TRUE);
        $this->load->model('Variant_model', 'vapi', TRUE);
    }

    public function index()
    {
        $data = array();
        echo _error("Bad Request !", 400);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = file_get_contents("php://input");
            if (!empty($post)) {
                $raw = (array)json_decode($post);
                $pdata = [];
                {
                    $pdata["order_type"] = !empty($raw["order_type"]) ? trim($raw["order_type"]) : "";
                    $pdata["customer_name"] = !empty($raw["customer_name"]) ? trim($raw["customer_name"]) : "";
                    $pdata["customer_mobile"] = !empty($raw["customer_mobile"]) ? trim($raw["customer_mobile"]) : "";
                    $pdata["customer_gst"] = !empty($raw["customer_gst"]) ? trim($raw["customer_gst"]) : "";
                    $pdata["allow_free_items"] = !empty($raw["allow_free_items"]) ? trim($raw["allow_free_items"]) : "";
                    $pdata["payment_status"] = !empty($raw["payment_status"]) ? trim($raw["payment_status"]) : "";
                    $pdata["payment_type"] = !empty($raw["payment_type"]) ? trim($raw["payment_type"]) : "";
                    $discount_amount = !empty($raw["discount_amount"]) ? trim($raw["discount_amount"]) : "";
                    $order_contents = !empty($raw["order_contents"]) ? $raw["order_contents"] : "";
                    $pdata['created_by'] = $this->curretnUser()->tokenId;
                    $pdata['created_at'] = date('Y-m-d H:i:s');
                    $order_id = $this->oapi->addOrder($pdata);
                    $total_amount = 0;
                    if (count($order_contents) > 0 && $order_id) {
                        foreach ($order_contents as $oc) {
                            $ocpdata = [];
                            $ocpdata["variant_id"] = !empty($oc->variant_id) ? trim($oc->variant_id) : "";
                            $ocpdata["cases"] = !empty($oc->cases) ? trim($oc->cases) : "";
                            $ocpdata["bottles"] = !empty($oc->bottles) ? trim($oc->bottles) : "";
                            $ocpdata["order_id"] = $order_id;

                            $variant = $this->vapi->getVariantById($oc->variant_id);
                            if (!empty($variant)) {
                                $case_amount = $oc->cases * $variant['unit_price'];
                                $bottle_amount = ($oc->bottles != 0) ?
                                    $oc->bottles * ($variant['unit_price'] / $variant['per_case']) : 0;
                                $ocpdata["amount"] = $case_amount + $bottle_amount;
                                $total_amount += $ocpdata["amount"];
                            }
                            $this->oapi->addOrderContents($ocpdata);
                        }

                    }
                    $final_amount = $total_amount - $discount_amount;
                    $ucodata['discount_amount'] = $discount_amount;
                    $ucodata['total_amount'] = $total_amount;
                    $ucodata['final_amount'] = $final_amount;
                    $order_no_type = "";
                    if ($pdata["order_type"] === 'COUNTER') {
                        $order_no_type = "C";
                    } else {
                        $order_no_type = "D";
                    }

                    $ucodata['order_no'] = createTransId($order_no_type, $order_id);
                    $this->oapi->updateOrder($ucodata, $order_id);
                    $co = $this->oapi->getOrderById($order_id);
                    $co["order_contents"] = $this->oapi->getOrderContentsByOrderId($order_id);
                    echo _success("success", "data", $co, 200);
                }
            }
        }
    }

    public function all($order_id = null)
    {
        $orders = $this->oapi->getOrders();  // fetchng all orders
        foreach ($orders as $order) {

            $order_contents = $this->oapi->getOrderContentsByOrderId($order["order_id"]);

            if (!empty($order_contents)) {
                $order["order_contents"] = $order_contents;
                //array_push($order["order_contents"], $order_contents);
            }
            $order['order_contents'] = $order_contents;
        }
        echo _success("success", "data", $orders, 200);
    }

    public function unpaid()
    {
        $unpaid_orders = $this->oapi->getOrders([], ["payment_status" => "CREDIT"]);
        echo _success("success", "data", $unpaid_orders, 200);
    }

    public function vehicle($vehicle = "")
    {
        $unpaid_orders = $this->oapi->getOrders([], ["payment_status" => ""]);
        echo _success("success", "data", $unpaid_orders, 200);
    }


    public function order($order_id)
    {
        if ($order_id) {
            $co = $this->oapi->getOrderById($order_id);
            $co["order_contents"] = $this->oapi->getOrderContentsByOrderId($order_id);
            echo _success("success", "data", $co, 200);
        }
    }
}