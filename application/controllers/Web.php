<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//todo 4
//buat file baru
class Web extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		//todo 5
		//echo 'Web.php di panggil';
		//end todo

		//todo 14
			echo base_url();
		//end todo

		//todo 6 harus nya manggil nya gini
		//http://localhost/codeigniter/index.php/web
		//default route yang diset di todo2 atau tod4 adalah default nya
		//jik yang dipanggil adalah http://localhost/codeigniter/ maka yang keluar adalah default rout pada file route.php
		//http://localhost/codeigniter/index.php/welcome

		//todo 7 jika kita akses index dengan cara 		//http://localhost/codeigniter/index.php/web/index
		//maka yang dipanggil adalah public function index ini
	}

	//todo 8 buat function cetak
	public function cetak(){
		echo 'Function cetak dari Web.php';
		//todo 9 test di browser //http://localhost/codeigniter/index.php/web/cetak
	}

	//todo 10 buat function dengan parameter
	public function cetakParam($param){
		echo '1 param ' .$param;
		//todo 11 test di browser //http://localhost/codeigniter/index.php/web/cetakParam/1
		//todo 11 test di browser //http://localhost/codeigniter/index.php/web/cetakParam/zein
	}
	//contoh 2 param
	public function cetakParam2($param, $param2){
		echo '2 param ' .$param." ".$param2;
		//todo 12 test di browser //http://localhost/codeigniter/index.php/web/cetakParam2/1/zein
	}
	//contoh 2 param lansung dalam param
	public function cetakParam2Inside($param = "1", $param2 = "zein"){
		echo '2 param inside' .$param." ".$param2;
		//todo 13 test di browser //http://localhost/codeigniter/index.php/web/cetakParam2Inside/
	}
}
