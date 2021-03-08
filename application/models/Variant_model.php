<?php

class Variant_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*Variant CRUD Funcs*/
    function addVariant($pdata)
    {
        $this->db->insert("tbl_variants", $pdata);
        return $this->db->insert_id();
    }

    function updateVariant($data, $variant_id)
    {
        $this->db->where("variant_id", $variant_id);
        return $this->db->update("tbl_variants", $data);
    }

    function getVariantsForOrderContents()
    {
        $this->db->select("v.variant_id, v.variant_name, v.unit_price, v.per_case,v.case_price");
        $query = $this->db->get("tbl_variants v");
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }
        return false;
    }

    function getVariantList($s = array(), $mode = 'DATA')
    {
        if ($mode == "CNT") {
            $this->db->select("COUNT(1) as CNT");
        } else {
            $this->db->select("v.*, p.product_name");
        }
        if (isset($s['limit']) && isset($s['offset'])) {
            $this->db->limit($s['limit'], $s['offset']);
        }
        $this->db->join("tbl_products p", "p.product_id=v.product_id");
        $this->db->order_by("v.variant_id DESC");
        $query = $this->db->get("tbl_variants v");
        if ($query->num_rows() > 0) {
            if ($mode == "CNT") {
                $row = $query->row_array();
                return $row['CNT'];
            }
            return $query->result_array();
        }
        return false;
    }

    function getVariantById($variant_id)
    {
        $this->db->select("v.*");
        $this->db->where("v.variant_id", $variant_id);
        $query = $this->db->get("tbl_variants v");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    function delVariant($variant_id)
    {
        $this->db->where("variant_id", $variant_id);
        return $this->db->delete("tbl_variants");
    }
} ?>