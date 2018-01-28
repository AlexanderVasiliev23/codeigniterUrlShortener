<?php

class ShortLinkModel extends CI_Model {

    public function getLinks()
    {
        $query = $this->db->get('links');
        return $query->result_array();
    }

    public function getFullUrl($shortKey)
    {
        $query = $this->db->get_where('links', ['short_key' => $shortKey]);
        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('links', $data);
    }

    public function getShortLink($shortLink)
    {
        $query = $this->db->get_where('links', ['short_key' => $shortLink]);
        return $query->result();
    }
}