<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	// Chek Login
	public function login() {
		check_login();
		$this->load->view('login');
	}
	// Login Process
	public function process() {
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$query = $this->user_m->login($post);
			?>
			<script src="<?php echo base_url(); ?>assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
			<style>
			body {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 1.4rem !important;
				font-weight: normal; 
			}
			</style>
			<body></body>
			<?php
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'user_id' => $row->user_id,
					'level'  => $row->level
				);
				$this->session->set_userdata($params);
				?>
				<script>
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Login berhasil, Selamat datang <?= $this->fungsi->user_login()->nama_peg ?>',
					}).then((result) => {
						window.location='<?=site_url('dashboard')?>';
					})
				</script>	
				<?php
			} else {
				?>
				<script>
					Swal.fire({
						icon: 'error',
						title: 'Failure',
						text: 'Login gagal, username / password salah'
					}).then((result) => {
						window.location='<?=site_url('auth/login')?>';
					})
				</script>	
				<?php
			}
		} 
	}
	// Logout
	public function logout() {
		$params = array('user_id', 'level');
		$this->session->unset_userdata($params);
		// redirect('auth/login');
	}

}