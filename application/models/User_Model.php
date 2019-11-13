<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

	public $table = 'user';
	public $id = 'id_user';

	//-------------------------- CREATE ----------------------

	public function ID_User() //sudah  (get id user)
	{ 
		$tahun=date('dmyhis');
		$cari="-USER-$tahun";
		$nomer = "SELECT MAX(SUBSTRING_INDEX(ID_user, '-',1)*1)as a FROM user WHERE ID_user like '%$cari'";
		$baris = $this->db->query($nomer);
		$akhir =  $baris->row()->a;
		$akhir++;
		$nota =str_pad($akhir, 3, "0", STR_PAD_LEFT);
		$nota .= "-USER-$tahun";
		return $nota;
	}
	
	public function cek_by_email($id) //sudah  (cek email for create and login)
	{ 
		$this->db->where('email', $id);
		return $this->db->get($this->table)->row();
	}

	public function insert($data) //sudah  (create user)
	{ 
		$this->db->insert($this->table, $data);
	}

	//-------------------------- END CREATE ----------------------

	//------------------------ GET ALL USER -------------------------

	public function get_all() //FIX (get all user)
	{ 
		return $this->db->get($this->table)->result();
	}

	
	public function get_by_id($id) //FIX (get detail user)
	{ 
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	function update($id, $data) //FIX   (oleh admin)
    { 
    	$this->db->where($this->id, $id);
    	$this->db->update($this->table, $data);
    }

    public function Aktivasi($id_user, $status) //FIX (oleh admin)
    {
    	$this->db->query("UPDATE user SET status='$status' WHERE id_user='$id_user'");
    }
 
    function delete($id) //sudah  (oleh admin)
    { 
    	$this->db->where($this->id, $id);
    	$this->db->delete($this->table);
    }

	//---------------------- END GET ALL USER -----------------------

    //=========================== PROJECT MAKER =============================

    //get all project maker
    public function get_all_project_maker() // FIX (oleh admin)
    { 
    	return $this->db->query("SELECT a.id_user as id_user, a.nama as nama, a.foto as foto, a.email as email, a.tanggal_join as tanggal_join FROM user a join project b ON a.id_user=b.id_user WHERE b.id_user IS NOT null AND b.status='selesai' OR b.status='berjalan' GROUP BY b.id_user")->result();
    }

    //get detail project maker
    public function detailUser($id) //FIX (oleh admin)
    { 
    	return $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
    }

    //get projects by a project maker
    public function project_maker_by_id($id) //FIX (oleh admin)
    { 
    	return $this->db->query("SELECT a.* FROM project a JOIN user b ON a.id_user=b.id_user WHERE a.id_user='$id'")->result();
    }

    //=========================== END PROJECT MAKER ===========================

    //================================ DONASI =================================

    public function getDonatur() // FIX (oleh admin)
    { 
    	return $this->db->query("SELECT user.nama, user.id_user, user.foto, user.email, user.tanggal_join FROM donasi JOIN user ON donasi.id_user=user.id_user JOIN project ON donasi.id_project=project.id_project GROUP BY user.id_user")->result();
    }

    public function donaturById($id_user) // FIX (oleh admin)
    { 
    	return $this->db->query("SELECT user.nama, user.id_user, user.foto, user.email, user.tanggal_join, project.nama as nama_project, project.foto as foto_project, donasi.nominal, donasi.tanggal_donasi, donasi.status, donasi.status_benefit FROM donasi JOIN user ON donasi.id_user=user.id_user JOIN project ON donasi.id_project=project.id_project WHERE donasi.id_user='$id_user'")->result();
    }

    //============================== END DONASI ===============================

}

?>