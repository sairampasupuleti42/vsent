<?php

class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*Product CRUD Funcs*/
    function addProduct($pdata)
    {
        $this->db->insert("tbl_products", $pdata);
        return $this->db->insert_id();
    }

    function updateProduct($data, $Product_id)
    {
        $this->db->where("product_id", $Product_id);
        return $this->db->update("tbl_products", $data);
    }

    function getProductList($mode = 'DATA', $s = array())
    {
        if ($mode == "CNT") {
            $this->db->select("COUNT(1) as CNT");
        } else {
            $this->db->select("p.*");
        }
        if (isset($s['limit']) && isset($s['offset'])) {
            $this->db->limit($s['limit'], $s['offset']);
        }
        //  $this->db->where_not_in('p.Product_id', ['1']);
        $this->db->order_by("p.product_id DESC");
        $query = $this->db->get("tbl_products p");
        if ($query->num_rows() > 0) {
            if ($mode == "CNT") {
                $row = $query->row_array();
                return $row['CNT'];
            }
            return $query->result_array();
        }
        return false;
    }

    function getProductsForDropdown()
    {

        $this->db->select("p.product_id, p.product_name");
        $this->db->order_by("p.product_id DESC");
        $query = $this->db->get("tbl_products p");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    function getProductById($product_id)
    {
        $this->db->select("p.*");
        $this->db->where("p.product_id", $product_id);
        $query = $this->db->get("tbl_products p");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    function delProduct($product_id)
    {
        $this->db->where("product_id", $product_id);
        return $this->db->delete("tbl_products");
    }
} ?>