<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_websitemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    public function getTypeWebsiteById($idWebsite){
        $this->db->select('uet_website.name');
        $this->db->from('uet_website');
        $this->db->join('uet_header', 'uet_website.id = uet_header.id_website');
        $this->db->where('uet_website.id', $idWebsite);
        $q= $this->db->get();
        return $q->first_row();
    }

    public function getTypeWebsiteById_LEFTRIGHT($idWebsite, $table){
        $this->db->select('uet_content_left.name');
        $this->db->from('uet_content_left');
        $this->db->join($table, "uet_content_left.id = $table.id_left");
        $this->db->where('uet_content_left.id', $idWebsite);
        $q= $this->db->get();
        return $q->first_row();
    }

    public function getDataById($table, $id){
       $q = $this->db->where('id',$id)->from($table)->count_all_results();
       return $q;
    }

    function select_maxlibrary($table){
        $this->db->select_max("number");
        $reuslt = $this->db->get($table);
        return $reuslt->first_row();
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

    public function getListFooter(){
        $query = $this->db->select('uet_footer.id,
                                    uet_footer.name,
                                    uet_footer.url,
                                    uet_footer.number,
                                    uet_footer.status,
                                    uet_website.name as web_name,
                                    uet_website.code,
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