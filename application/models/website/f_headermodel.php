<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_headermodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }


    public function getListHeader(){
        $query = $this->db->select('uet_header.id,
                                    uet_header.name,
                                    uet_header.url,
                                    uet_header.number,
                                    uet_header.status,
                                    uet_website.name as web_name,
                                    uet_website.code,
                                    ')
            ->from('uet_header')
            ->join('uet_website', 'uet_header.id_website = uet_website.id')
            ->where('uet_header.status', 1)
            ->order_by('uet_header.id','desc')
            ->group_by('uet_header.id')
            ->get('');

        return $query->result();
    }

}