<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Go extends CI_Controller
{
    public function to($shortKey)
    {
        $this->load->model('ShortLinkModel');
        $full_url = $this->ShortLinkModel->getFullUrl($shortKey);

        $this->load->helper('url');

        if($full_url) {
            redirect($full_url[0]->full_url);
        }
        else {
            $this->load->helper('url');
            $this->load->view('layouts/header');
            $this->load->view('errors/short_link_error', ['error' => 'Коротой ссылки не существует']);
        }
    }


}
