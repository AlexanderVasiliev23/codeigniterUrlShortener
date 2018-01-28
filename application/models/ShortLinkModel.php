<?php

class ShortLinkModel extends CI_Model {

    /**
     * Получить все сокращенные ссылки
     *
     * @return mixed
     */
    public function getLinks()
    {
        $query = $this->db->get('links');
        return $query->result_array();
    }

    /**
     * Получить адрес для редиректа
     *
     * @param $shortKey
     * @return mixed
     */
    public function getFullUrl($shortKey)
    {
        $query = $this->db->get_where('links', ['short_key' => $shortKey]);
        return $query->result();
    }

    /**
     * Создать новую запись с сокращенной ссылкой
     *
     * @param $data
     */
    public function create($data)
    {
        $this->db->insert('links', $data);
    }
}