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

    public function counter_order()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = file_get_contents("php://input");
            if (!empty($post)) {
                $raw = (array)json_decode($post);
                $pdata = [];
                {
                    $pdata["customer_name"] = !empty($raw["customer_name"]) ? trim($raw["customer_name"]) : "";
                    $pdata["customer_mobile"] = !empty($raw["customer_mobile"]) ? trim($raw["customer_mobile"]) : "";
                    $pdata["customer_gst"] = !empty($raw["customer_gst"]) ? trim($raw["customer_gst"]) : "";
                    $pdata["allow_free_items"] = !empty($raw["allow_free_items"]) ? trim($raw["allow_free_items"]) : "";
                    $pdata["payment_status"] = !empty($raw["payment_status"]) ? trim($raw["payment_status"]) : "";
                    $pdata["payment_type"] = !empty($raw["payment_type"]) ? trim($raw["payment_type"]) : "";
                    $discount_amount = !empty($raw["discount_amount"]) ? trim($raw["discount_amount"]) : "";
                    $order_contents = !empty($raw["order_contents"]) ? $raw["order_contents"] : "";
                    $counter_id = $this->oapi->addCounterOrder($pdata);
                    $total_amount = 0;
                    if (count($order_contents) > 0 && $counter_id) {
                        foreach ($order_contents as $oc) {
                            $ocpdata = [];
                            $ocpdata["variant_id"] = !empty($oc->variant_id) ? trim($oc->variant_id) : "";
                            $ocpdata["cases"] = !empty($oc->cases) ? trim($oc->cases) : "";
                            $ocpdata["bottles"] = !empty($oc->bottles) ? trim($oc->bottles) : "";
                            $ocpdata["counter_id"] = $counter_id;
                            $variant = $this->vapi->getVariantById($oc->variant_id);
                            if (!empty($variant)) {
                                $case_amount = $oc->cases * $variant['unit_price'];
                                $bottle_amount = ($oc->bottles != 0) ?
                                    $oc->bottles * ($variant['unit_price'] / $variant['per_case']) : 0;
                                $ocpdata["amount"] = $case_amount + $bottle_amount;
                                $total_amount += $ocpdata["amount"];
                            }
                            $this->oapi->addCounterOrderContents($ocpdata);
                        }

                    }
                    $final_amount = $total_amount - $discount_amount;
                    $ucodata['discount_amount'] = $discount_amount;
                    $ucodata['total_amount'] = $total_amount;
                    $ucodata['final_amount'] = $final_amount;
                    $this->oapi->updateCounterOrder($ucodata, $counter_id);
                    $co = $this->oapi->getCounterOrderById($counter_id);
                    $co["order_contents"] = $this->oapi->getCounterOrderContentsByCounterId($counter_id);
                    echo _success("success", "data", $co, 200);
                }
            }
        }
    }

    public function counter_orders($counter_id = null)
    {
        if ($counter_id) {
            $co = $this->oapi->getCounterOrderById($counter_id);
            $co["order_contents"] = $this->oapi->getCounterOrderContentsByCounterId($counter_id);
            echo _success("success", "data", $co, 200);
        } else {
            $co = $this->oapi->getCounterOrders();
            foreach ($co as $c) {
                $cco = $this->oapi->getCounterOrderContentsByCounterId($c["counter_id"]);
                array_push($c["order_contents"], $cco);
            }
            echo _success("success", "data", $co, 200);
        }
    }
}