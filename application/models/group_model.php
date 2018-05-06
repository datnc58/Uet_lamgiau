<?php
#****************************************#
# * @Author: tshopdn                     #
# * @Email: lvcuong2@gmail.com           #
# * @Website: http://tshopdn.com         #
# * @Copyright: 2010 - 2012              #
#****************************************#
class Group_model extends MY_Model
{
	function __construct()
	{
        parent::__construct();
	}

	function get($select = "*", $where = "")
	{
		$this->db->select($select);
		if($where && $where != "")
		{
			$this->db->where($where);
		}
		#Query
		$query = $this->db->get("tbtt_group");
		$result = $query->row();
		$query->free_result();
		return $result;
	}

	function fetch($select = "*", $where = "", $order = "gro_id", $by = "DESC", $start = -1, $limit = 0)
	{
        $this->db->cache_off();
		$this->db->select($select);
		if($where && $where != "")
		{
			$this->db->where($where);
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
		$query = $this->db->get("tbtt_group");
		$result = $query->result();
		$query->free_result();
		return $result;
	}

	/*function add($data)
	{
		return $this->db->insert("tbtt_group", $data);
	}*/

	/*function update($data, $where = "")
	{
    	if($where && $where != "")
    	{
			$this->db->where($where);
    	}
		return $this->db->update("tbtt_group", $data);
	}*/

	function delete($value, $field = "gro_id", $in = true)
    {
		if($in == true)
		{
			$this->db->where_in($field, $value);
		}
		else
		{
            $this->db->where($field, $value);
		}
		return $this->db->delete("tbtt_group");
    }
}