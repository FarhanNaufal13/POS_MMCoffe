<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kasir_m');
    }

    public function kasir()
    {
        $data['row'] = $this->kasir_m->get_kasir();
        $this->template->load('template','report/kasir_report', $data);
    }

    public function kasir_produk($kasir_id = null)
    {
        $detail = $this->kasir_m->get_kasir_detail($kasir_id)->result();
        echo json_encode($detail);
    }

}