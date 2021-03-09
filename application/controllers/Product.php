<?php

class Product extends MY_Controller
{
    public $product = [];

    function __construct()
    {
        parent::__construct();

        $this->load->model('Variant_model', 'vapi', TRUE);
        $this->load->model('Product_model', 'papi', TRUE);
    }

    function index()
    {

        $this->products = $this->papi->getProductList();
        echo _success('success', 'data', $this->products, 200);
    }

    function remove($id)
    {

        if (!empty($id)) {
            $p = $this->papi->getProductById($id);
            //  removeFolder(str_replace(base_url(),'./', $p['product_image']));
            $this->papi->delProduct($p['product_id']);
            echo _success('success', '', "", 200);
        }
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = file_get_contents("php://input");
            if (!empty($post)) {
                $raw = (array)json_decode($post);
                $pdata = [];
                if (!empty($raw)) {
                    $product_name = !empty($raw["product_name"]) ? trim($raw["product_name"]) : "";
                    $product_image = !empty($raw["product_image"]) ? trim($raw["product_image"]) : "";
                    $path_slug = slugify($product_name);
                    $target = "./uploads/products/" . $path_slug;
                    $img = explode(',', $product_image)[1];
                    $return_img = base64ToImg($img, $target, $path_slug, 'png');  // Replaces
                    $pdata["product_name"] = $product_name;
                    $pdata["product_image"] = base_url() . str_replace('./', '', $return_img);
                    $last_id = $this->papi->addProduct($pdata);
                    if ($last_id) {
                        $data = $this->papi->getProductById($last_id);
                        echo _success('success', 'data', $data, 200);
                    }
                }
            }
        }
    }

    function variants_for_order_contents()
    {
        $variants = $this->vapi->getVariantsForOrderContents();
        echo _success('success', 'data', $variants, 200);
    }

    function variants()
    {
        $variants = $this->vapi->getVariantList();
        $products = $this->papi->getProductsForDropdown();
        echo _success('success', 'data', ["variants" => $variants, "products" => $products], 200);

    }

    function variant_add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = file_get_contents("php://input");
            if (!empty($post)) {
                $raw = (array)json_decode($post);
                $pdata = [];
                if (!empty($raw)) {
                    $pdata['product_id'] = !empty($raw["product_id"]) ? trim($raw["product_id"]) : "";
                    $pdata['variant_name'] = !empty($raw["variant_name"]) ? trim($raw["variant_name"]) : "";
                    $pdata['per_case'] = !empty($raw["per_case"]) ? trim($raw["per_case"]) : "";
                    $pdata['case_price'] = !empty($raw["case_price"]) ? trim($raw["case_price"]) : "";
                    $pdata['unit_price'] = !empty($raw["unit_price"]) ? trim($raw["unit_price"]) : "";
                    $pdata['cgst_percentage'] = !empty($raw["cgst_percentage"]) ? trim($raw["cgst_percentage"]) : "";
                    $pdata['sgst_percentage'] = !empty($raw["sgst_percentage"]) ? trim($raw["sgst_percentage"]) : "";
                    $pdata['cess'] = !empty($raw["cess"]) ? trim($raw["cess"]) : "";
                    $pdata['margin_amount'] = !empty($raw["margin_amount"]) ? trim($raw["margin_amount"]) : "";
                    $pdata['transport_amount'] = !empty($raw["transport_amount"]) ? trim($raw["transport_amount"]) : "";
                    $pdata['incentive_amount'] = !empty($raw["incentive_amount"]) ? trim($raw["incentive_amount"]) : "";
                    $last_id = $this->vapi->addVariant($pdata);
                    if ($last_id) {
                        $data = $this->vapi->getVariantById($last_id);
                        echo _success('success', 'data', $data, 200);
                    }
                }
            }
        }
    }
}