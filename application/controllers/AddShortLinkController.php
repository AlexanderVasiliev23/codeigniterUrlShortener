<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddShortLinkController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ShortLinkModel');
    }

    public function store()
    {
        $full_url = $_POST['full_url'];

        if (filter_var($full_url, FILTER_VALIDATE_URL) === false) {
            die('url_error');
        }

        $shortLink = $this->createShortLink();

        $data = [
            'full_url' => $full_url,
            'short_key' => $shortLink
        ];

        $this->ShortLinkModel->create($data);

        echo $shortLink;
    }

    public function createShortLink()
    {
        $h = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890";

        $isUnique = FALSE;

        do {
            $shortLink = substr(str_shuffle($h), 0, 5);
            $query = $this->ShortLinkModel->getShortLink($shortLink);
            if(empty($query)) {
                $isUnique = TRUE;
            }
        } while ( ! $isUnique);

        return $shortLink;
    }
}
