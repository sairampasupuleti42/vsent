<?php

class Order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addCounterOrder($pdata)
    {
        $this->db->insert("tbl_counter_orders", $pdata);
        return $this->db->insert_id();
    }

    function addCounterOrderContents($pdata)
    {
        $this->db->insert("tbl_co_contents", $pdata);
        return $this->db->insert_id();
    }

    function updateCounterOrder($data, $counter_id)
    {
        $this->db->where("counter_id", $counter_id);
        return $this->db->update("tbl_counter_orders", $data);
    }

    function getCounterOrderById($counter_id)
    {
        $this->db->select("co.*");
        $this->db->where("co.counter_id", $counter_id);
        $query = $this->db->get("tbl_counter_orders co");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    function getCounterOrderContentsByCounterId($counter_id)
    {
        $this->db->select("coc.*");
        $this->db->where("coc.counter_id", $counter_id);
        $query = $this->db->get("tbl_co_contents coc");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    public function getCounterOrders($mode = "", $s = [])
    {
        if ($mode == "CNT") {
            $this->db->select("COUNT(1) as CNT");
        } else {
            $this->db->select("co.*");
        }
        if (isset($s['limit']) && isset($s['offset'])) {
            $this->db->limit($s['limit'], $s['offset']);
        }
        $this->db->order_by("co.counter_id DESC");
        $query = $this->db->get("tbl_counter_orders  co");
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