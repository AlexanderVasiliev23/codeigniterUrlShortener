<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddShortLinkController extends CI_Controller {

    /**
     * AddShortLinkController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ShortLinkModel');
    }

    /**
     * Добавить новую ссылку в базу данных, возвращает ответ для AJAX-запроса
     */
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

    /**
     * Создание рандомного ключа для короткой ссылки (+ проверка на существование в БД)
     *
     * @return bool|string
     */
    public function createShortLink()
    {
        $h = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890";

        $isUnique = FALSE;

        do {
            $shortLink = substr(str_shuffle($h), 0, 5);
            $query = $this->ShortLinkModel->getFullUrl($shortLink);
            if(empty($query)) {
                $isUnique = TRUE;
            }
        } while ( ! $isUnique);

        return $shortLink;
    }
}
