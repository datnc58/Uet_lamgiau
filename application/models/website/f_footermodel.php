<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_footermodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }


    public function getListFooter(){
        $query = $this->db->select('uet_footer.id,
                                    uet_footer.name,
                                    uet_footer.url,
                                    uet_footer.infor,
                                    uet_footer.status,
                                    uet_website.name as web_name,
                                    ')
            ->from('uet_footer')
            ->join('uet_website', 'uet_footer.id_website = uet_website.id')
            ->where('uet_footer.status', 1)
            ->order_by('uet_footer.id','desc')
            ->group_by('uet_footer.id')
            ->get('');

        return $query->result();
    }

}