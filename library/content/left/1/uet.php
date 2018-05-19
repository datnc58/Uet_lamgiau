<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Attribute extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_productmodel');
        $this->load->library('pagination');
    }

}