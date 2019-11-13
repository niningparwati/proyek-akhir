<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi_model extends CI_Model {

	public $table = 'donasi';
    public $id = 'id_donasi';
    public $order = 'DESC';

	public function get_id()
	{
		$tahun=date('dmyhis');
        $cari="-DNS-$tahun";
        $nomer = "SELECT MAX(SUBSTRING_INDEX(id_donasi, '-',1)*1)as a FROM donasi WHERE id_donasi like '%$cari'";
        $baris = $this->db->query($nomer);
        $akhir =  $baris->row()->a;
        $akhir++;
        $nota =str_pad($akhir, 3, "0", STR_PAD_LEFT);
        $nota .= "-DNS-$tahun";
        return $nota;
	}

	public function donasiByProject($id) //FIX (oleh admin)
	{
		return $this->db->query("SELECT a.*, b.*, c.* FROM donasi a JOIN user b ON a.id_user=b.id_user JOIN benefit c ON a.id_benefit=c.id_benefit WHERE a.id_project='$id'")->result();
	}

	public function donasiMasuk($id) //FIX (oleh admin)
	{
		return $this->db->query("SELECT SUM(nominal) as jumlah FROM donasi WHERE id_project='$id' AND status='Selesai'")->row()->jumlah;
	}

	public function donasi_by_project($id)
	{
		return $this->db->query("SELECT a.*, b.*, c.* FROM donasi a JOIN user b ON a.id_user=b.id_user JOIN benefit c ON a.id_benefit=c.id_benefit WHERE a.id_project='$id'")->result();
	}

	public function donasi_masuk($id)
	{
		return $this->db->query("SELECT SUM(nominal) as jumlah FROM donasi WHERE id_project='$id' AND status='Selesai'")->row()->jumlah;
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function data_donatur($id)
	{
		return $this->db->query("SELECT b.nama as nama_user, a.*, b.*, c.* from donasi a join user b on a.id_user=b.id_user join benefit c on a.id_benefit=c.id_benefit where a.id_project='$id'")->result();
	}

	public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function get_donasi($id_user)
    {
        return $this->db->query("SELECT a.*, b.*, c.isi from donasi a JOIN project b on a.id_project=b.id_project join benefit c on a.id_benefit=c.id_benefit where a.id_user='$id_user'")->result();
    }

}

/* End of file Donasi_model.php */
/* Location: ./application/models/Donasi_model.php */
 ?>