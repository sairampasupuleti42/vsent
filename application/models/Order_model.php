<?php

class Order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addOrder($pdata)
    {
        $this->db->insert("tbl_orders", $pdata);
        return $this->db->insert_id();
    }


    function updateOrder($data, $order_id)
    {
        $this->db->where("order_id", $order_id);
        return $this->db->update("tbl_orders", $data);
    }

    function getOrderById($order_id)
    {
        $this->db->select("o.*");
        $this->db->where("o.order_id", $order_id);
        $query = $this->db->get("tbl_orders o");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    function addOrderContents($pdata)
    {
        $this->db->insert("tbl_order_contents", $pdata);
        return $this->db->insert_id();
    }

    function getOrderContentsByOrderId($order_id)
    {
        $this->db->select("oc.*");
        $this->db->where("oc.order_id", $order_id);
        $query = $this->db->get("tbl_order_contents oc");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    function getOrderByTypeAndId($order_id, $order_type)
    {
        $this->db->select("o.*");
        $this->db->where("o.order_id", $order_id);
        $this->db->where("o.order_type", $order_type);
        $query = $this->db->get("tbl_orders o");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    public function getOrders($mode = "", $s = [])
    {
        if ($mode == "CNT") {
            $this->db->select("COUNT(1) as CNT");
        } else {
            $this->db->select("o.*");
        }
        if (isset($s['limit']) && isset($s['offset'])) {
            $this->db->limit($s['limit'], $s['offset']);
        }
        if (isset($s['order_type'])) {
            $this->db->where("o.order_type", $s['order_type']);
        }
        if (isset($s['payment_status'])) {
            $this->db->where("o.payment_status", $s['payment_status']);
        }
        $this->db->order_by("o.order_id DESC");
        $query = $this->db->get("tbl_orders  o");
        if ($query->num_rows() > 0) {
            if ($mode == "CNT") {
                $row = $query->row_array();
                return $row['CNT'];
            }
            return $query->result_array();
        }
        return false;
    }

} ?>