<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_websitemodel extends MY_Model{
    public function __construct() {
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

    public function getTypeWebsiteById_MID($idWebsite, $table){
        $this->db->select('uet_content_mid.name');
        $this->db->from('uet_content_mid');
        $this->db->join($table, "uet_content_mid.id = $table.id_mid");
        $this->db->where('uet_content_mid.id', $idWebsite);
        $q= $this->db->get();
        return $q->first_row();
    }

    public function getDataById($table, $id){
       $q = $this->db->where('id',$id)->from($table)->count_all_results();
       return $q;
    }

    public function select_maxlibrary($table){
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


    public function getContentWebsite($id){
        $this->db->select('uet_content_detail.type, uet_content_detail.url,uet_createwebsite_content.id');
        $this->db->from('uet_content_detail');
        $this->db->join('uet_createwebsite_content', 'uet_createwebsite_content.id_content_detail = uet_content_detail.id');
        $this->db->where('uet_createwebsite_content.id_website', $id);
        $kq = $this->db->get();
        return $kq->result();
    }

    public function getListModuleLeft($id,$location){
        $this->db->select('uet_content_left_module.name,uet_createwebsite_content_module_detail.id, uet_content_left_module.table,uet_createwebsite_content_module_detail.location,uet_createwebsite_content_module_detail.id_library,uet_createwebsite_content_module_detail.id_module');
        $this->db->from('uet_content_left_module');
        $this->db->join('uet_createwebsite_content_module_detail', 'uet_createwebsite_content_module_detail.id_module = uet_content_left_module.id');
        $this->db->where('uet_createwebsite_content_module_detail.id_content_child', $id);
        $this->db->where('uet_createwebsite_content_module_detail.location', $location);
        $kq = $this->db->get();
        return $kq->result();
    }
    public function getListModuleMid($id,$location){
        $this->db->select('uet_content_mid_module.name,uet_createwebsite_content_module_detail.id, uet_content_mid_module.table,uet_createwebsite_content_module_detail.location,uet_createwebsite_content_module_detail.id_library,uet_createwebsite_content_module_detail.id_module');
        $this->db->from('uet_content_mid_module');
        $this->db->join('uet_createwebsite_content_module_detail', 'uet_createwebsite_content_module_detail.id_module = uet_content_mid_module.id');
        $this->db->where('uet_createwebsite_content_module_detail.id_content_child', $id);
        $this->db->where('uet_createwebsite_content_module_detail.location', $location);
        $kq = $this->db->get();
        return $kq->result();
    }

}