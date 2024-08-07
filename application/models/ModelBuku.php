<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBuku extends CI_Model
{
    // Manajemen Buku
    public function getBuku()
    {
        return $this->db->get('buku');
    }

    public function bukuWhere($where)
    {
        return $this->db->get_where('buku', $where);
    }

    public function simpanBuku($data = null)
    {
        $this->db->insert('buku', $data);
    }

    public function updateBuku($data = null, $where = null)
    {
        $this->db->update('buku', $data, $where);
    }

    public function hapusBuku($where = null)
    {
        $this->db->delete('buku', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }

        $this->db->from('buku');
        return $this->db->get()->row($field);
    }

    // Manajemen Kategori
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    public function updateKategori($data = null, $where = null)
    {
        $this->db->update('kategori', $data, $where);
    }

    // Join
    public function joinKategoriBuku()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.id_kategori = kategori.id_kategori');
        return $this->db->get()->result();
    }
}
