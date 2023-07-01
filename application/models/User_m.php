<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	//Login
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', md5($post['password']));
		return $this->db->get();
	}
	// Ambil Data User
	public function get($id = null) {
		$this->db->from('user');
		if($id != null) {
			$this->db->where('user_id', $id);
		}
		return $query = $this->db->get();
	}
	//Tambah User
	public function add($post) {
		$params['nama_peg'] = $post['nama_peg'];
		$params['username'] = $post['username'];
		$params['password'] = md5($post['password']);
		$params['alamat_peg'] = $post['alamat_peg'];
		$params['level'] = $post['level'];
		$params['hp_peg'] = $post['hp_peg'];
		$params['email'] = $post['email'];
		$params['lhr_peg'] = $post['lhr_peg'];
		$params['jk_peg'] = $post['jk_peg'];
		$params['foto_peg'] = $this->upload();
		$this->db->insert('user',$params);
	}
	//Fungsi Upload Foto
	function upload() {
		$config['upload_path']      = './assets/images/';
		$config['allowed_types']    = 'png|img|jpg|jpeg';
		$config['max_size']         = 5024;
		$config['overwrite']		= true;
		$this->load->library('upload', $config);
		if (empty($_FILES["foto_peg"]["name"])) {
			return $this->input->post('foto_lama');
		}else {
			if (!$this->upload->do_upload('foto_peg')) {
				return "foto.png";
			}else {
				return $this->upload->data("file_name");
			}
		}
	}
	//Edit User
	public function edit($post)
	{
		$params['nama_peg'] 	= $post['nama_peg'];
		$params['username'] = $post['username'];
		if(!empty($post['password'])) {
			$params['password'] = md5($post['password']);
		}
		$params['alamat_peg'] 	= $post['alamat_peg'];
		$params['level'] 	= $post['level'];
		$params['hp_peg'] 	= $post['hp_peg'];
		$params['email'] 	= $post['email'];
		$params['lhr_peg'] = $post['lhr_peg'];
		$params['jk_peg'] 	= $post['jk_peg'];
		$params['foto_peg'] 	= $this->upload();
		$this->db->where('user_id',$post['user_id']);
		$this->db->update('user',$params);
	}
	//Delete User
	public function del($id) {
		$this->db->where('user_id',$id);
		$this->db->delete('user');
	}

}
/* End of file User_m.php */
/* Location: ./application/Models/User_m.php*/