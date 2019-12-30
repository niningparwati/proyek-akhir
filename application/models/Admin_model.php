<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public $table = 'admin';
    public $id = 'id_admin';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get id admin
    function id_admin() //FIX
    {
        $admin = "ADM";
        $kode = "SELECT MAX(TRIM(REPLACE(id_admin,'ADM', ''))) as a FROM admin WHERE id_admin LIKE '$admin%'";
        $baris = $this->db->query($kode);
        $akhir =  $baris->row()->a;
        $akhir++;
        $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
        $id = "ADM".$id;
        return $id;  
    }

    // cek account by email
    function cek_by_email($email, $password) // FIX
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data) // FIX
    {
        $this->db->insert($this->table, $data);
    }

    public function cekNama($email) //FIX
    {
        return $this->db->query("SELECT id_admin, foto as foto_admin, email as email_admin, password, nama as nama_admin, tangal_lahir as tanggal_lahir_admin, alamat as alamat_admin, telepon as telepon_admin, tanggal_join as tanggal_join_admin FROM admin WHERE email='$email'")->row();
    }

}
