<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://qts.com             #
# * @Copyright: 2017 - 2018              #
#****************************************#

class User_model extends  MY_Model
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('model');
	}
	function get($select = "*", $where = "")
	{

		$this->db->select($select);
		if($where && $where != "")
		{
			$this->db->where($where);
		}
		#Query
		$query = $this->db->get("users");
		$result = $query->row();
		$query->free_result();
		return $result;
	}
	function fetch($select = "*", $where = "", $order = "id", $by = "DESC", $start = -1, $limit = 0)
	{
        $this->db->cache_off();
		$this->db->select($select);
		if($where && $where != "")
		{
			$this->db->where($where, NULL, false);
		}
		if($order && $order != "" && $by && ($by == "DESC" || $by == "ASC"))
		{
            $this->db->order_by($order, $by);
		}
		if((int)$start >= 0 && $limit && (int)$limit > 0)
		{
			$this->db->limit($limit, $start);
		}
		#Query
		$query = $this->db->get("users");
		$result = $query->result();
		$query->free_result();
		return $result;
	}
	
	function fetch_join($select = "*", $join, $table, $on, $where = "", $order = "id", $by = "DESC", $start = -1, $limit = 0, $distinct = false)
	{
        $this->db->cache_off();
		$this->db->select($select);
		if($join && ($join == "INNER" || $join == "LEFT" || $join == "RIGHT") && $table && $table != "" && $on && $on != "")
		{
			$this->db->join($table, $on, $join);
		}
		if($where && $where != "")
		{
			$this->db->where($where, NULL, false);
		}
		if($order && $order != "" && $by && ($by == "DESC" || $by == "ASC"))
		{
            $this->db->order_by($order, $by);
		}
		if((int)$start >= 0 && $limit && (int)$limit > 0)
		{
			$this->db->limit($limit, $start);
		}
		if($distinct && $distinct == true)
		{
			$this->db->distinct();
		}
		#Query
		$query = $this->db->get("users");
		$result = $query->result();
		$query->free_result();
		return $result;
	}

	function delete($value, $field = "id", $in = true)
    {
		if($in == true)
		{
			$this->db->where_in($field, $value);
		}
		else
		{
            $this->db->where($field, $value);
		}
		return $this->db->delete("users");
    }
}