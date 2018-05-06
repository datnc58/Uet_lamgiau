<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_websitemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }

}