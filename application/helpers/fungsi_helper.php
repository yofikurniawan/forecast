<?php defined('BASEPATH') OR exit('No direct script access allowed');
//chek login
function check_login() {
	$ci = & get_instance();
	$user_session = $ci->session->userdata('user_id');
	if($user_session) {
		redirect('dashboard');
	}
}
// check tidak login
function check_not_login() {
	$ci = & get_instance();
	$user_session = $ci->session->userdata('user_id');
	if(!$user_session) {
		redirect('auth/login');
	}
}
// check level admin
function check_admin() {
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 1 AND $ci->fungsi->user_login()->level != 2) {
		echo "<script>
				alert('Mohon Maaf anda tidak mempunyai akses tersebut!!!');
				window.location=' ".site_url('dashboard')."'; </script>";
	}
}
// check tomboltambah jika bukan level admin, redirect ke hamalam user
function tambah_user() {
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 1 ) {
		echo "<script>
				alert('Mohon maaf untuk mengakses ini diperlukan level Admin!!!');
				window.location=' ".site_url('user')."'; 
				</script>";
	}


}
