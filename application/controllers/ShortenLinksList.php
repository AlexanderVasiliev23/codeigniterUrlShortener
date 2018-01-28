<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShortenLinksList extends CI_Controller {

    public function index()
    {
        $this->load->model('ShortLinkModel');
        $data = $this->ShortLinkModel->getLinks();

        $data = [
            'data' => $data
        ];

        $this->load->helper('url');

        $this->load->view('layouts/header');
        $this->load->view('layouts/navigation');
        $this->load->view('shorten_links_list', $data);
    }
}
