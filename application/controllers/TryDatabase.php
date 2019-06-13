<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//todo 26 buat controllerbaru
class TryDatabase extends CI_Controller {

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
		//todo 27 buat view baru di folder views dengan nama try_database.php
		//todo 29 hubungkan ke view
		//$this->load->view('try_database');

		//todo 30 select all data form mahasiswa
		//$this->db->query('select * from mahasiswa');
		//todo 31 test ke bowser http://localhost/codeigniter/index.php/trydatabase/ atau http://localhost/codeigniter/index.php/trydatabase/index
		//todo 32 pada todo 30 kita tampung dalam variable $data
//			$data = $this->db->query('select * from mahasiswa');
//			// kata dalam [''] sesuaikan dengan fild yang ada dalam database
//			foreach ($data->result_array() as $key){
//				echo "<p>Nim : ".$key['nim']."</p>";
//				echo "<p>Nama : ".$key['nama']."</p>";
//				echo "<p>Alamat : ".$key['alamat']."</p><hr/>";
//			}
		//todo 33 test browser http://localhost/codeigniter/index.php/trydatabase/
		//todo 34 pakai function dalam database
//				$data = $this->db->get('mahasiswa');
//				// kata dalam [''] sesuaikan dengan fild yang ada dalam database
//				foreach ($data->result_array() as $key){
//					echo "<p>Nim : ".$key['nim']."</p>";
//					echo "<p>Nama : ".$key['nama']."</p>";
//					echo "<p>Alamat : ".$key['alamat']."</p><hr/>";
//				}
		//todo 35 test browser http://localhost/codeigniter/index.php/trydatabase/

		//todo 40 panggil fungtion tadi yang kita buat di todo39
		$data=$this->Mahasiswa->getMahasiswa();
		//todo 41 test browser http://localhost/codeigniter/index.php/trydatabase/
		//todo 42 masukan data ke foreach

		//todo 58 komentarkan ini data ini
//		foreach ($data as $key){
//			echo "<p>Nim : ".$key['nim']."</p>";
//			echo "<p>Nama : ".$key['nama']."</p>";
//			echo "<p>Alamat : ".$key['alamat']."</p><hr/>";
//		}
		//end todo

		//todo 58 http://localhost/codeigniter/index.php/trydatabase/


		//todo 56
		$this->load->view('try_database');
		//todo 57 http://localhost/codeigniter/index.php/trydatabase/

		//todo 58 kita coba kirim data dari kcontroller ini ke view dengan cara masukan ke parameter
		$this->load->view('try_database', array('data'=>$data));


	}

	//todo 43 buat function insert delete update
	public function insert(){
		//echo "Ini function insert";
		//todo 44 test di browser http://localhost/codeigniter/index.php/trydatabase/insert
		//todo 47 panggil function insert data menggunakan array
		$res = $this->Mahasiswa->insertMahasiswa('mahasiswa',array(
			"nim"=>"1601081032",
			"nama"=>"Aulia Rahmi",
			"alamat"=>"Jati"
		));
		//todo 48 kondisi
		if($res >= 1){
			echo "<h2>insert Sukses!!</h2>";
		}else{
			echo "<h2>Insert Gagal!!</h2>";
		}
		//todo 49 test di browser http://localhost/codeigniter/index.php/trydatabase/insert dan liat browser

	}

	//todo 43 buat function insert delete update
	public function update(){
		//echo "Ini function update";
		//todo 44 test di browser http://localhost/codeigniter/index.php/trydatabase/update
		//todo 51
		$res = $this->Mahasiswa->updateMahasiswa('mahasiswa',array(
			"alamat"=>"Jati Padang"
		), array("nim" => "1601081032"));
		if($res >= 1){
			echo "<h2>update Sukses!!</h2>";
		}else{
			echo "<h2>update Gagal!!</h2>";
		}
		//todo 52 test di browser http://localhost/codeigniter/index.php/trydatabase/update
	}

	//todo 43 buat function insert delete update
	public function delete(){
		//echo "Ini function delete";
		//todo 44 test di browser http://localhost/codeigniter/index.php/trydatabase/delete

		//todo 53 pakau model delete
		$res = $this->Mahasiswa->deleteMahasiswa('mahasiswa', array("nim" => "1601081032"));
		if($res >= 1){
			echo "<h2>delete Sukses!!</h2>";
		}else{
			echo "<h2>delete Gagal!!</h2>";
		}

		//todo 54 test di browser http://localhost/codeigniter/index.php/trydatabase/delete cek db
	}

	//todo 61 kita akan coba result dari todo60
	public function panggil(){
		//kalau query ada pada Model, panggil model dulu contohnya 	$data=$this->Mahasiswa->getMahasiswa();
		//tapi jika lansuna gpada controller,seperti berikut
		$data = $this->db->query("select * from mahasiswa");

		echo "<pre>";
		print_r($data);
		echo "</pre>";
		//todo 62 test browser http://localhost/codeigniter/index.php/trydatabase/panggil
	}

	//todo 63 kita akan coba result dari todo60
	public function panggil1(){
		$data = $this->db->query("select * from mahasiswa")->result();

		echo "<pre>";
		print_r($data);
		echo "</pre>";
		//todo 64 test browser http://localhost/codeigniter/index.php/trydatabase/panggil1
	}

	//todo 65 kita akan coba result dari todo60
	public function panggil2(){
		$data = $this->db->query("select * from mahasiswa")->result();
		foreach ($data as $d){
			echo "<p>Nim = "	.$d->nim	."<p/>";
			echo "<p>Nama = "	.$d->nama	."<p />";
			echo "<p>Alamat = ". $d->alamat."<p />";
			echo "<hr/>";
		}
		//todo 66 test browser http://localhost/codeigniter/index.php/trydatabase/panggil2
	}

	//todo 67 kita akan coba result dari todo60
	public function panggil3(){
		$data = $this->db->query("select * from mahasiswa");
		echo  "<p>Jumlah Data = ". $data->num_rows()."</p></br>";

		foreach ($data->result() as $d){
			echo "<p>Nim = "	.$d->nim	."</p>";
			echo "<p>Nama = "	.$d->nama	."</p >";
			echo "<p>Alamat = ". $d->alamat."</p >";
			echo "<hr/>";
		}
		//todo 68 test browser http://localhost/codeigniter/index.php/trydatabase/panggil3
	}

	//todo 69 kita akan coba result dari todo60
	public function panggil4(){
		$data = $this->db->query("select * from mahasiswa");

		//beda cara penggilan result dan result_array
		foreach ($data->result_array() as $d){
			echo "<p>Nim = "	.$d['nim']	."</p>";
			echo "<p>Nama = "	.$d['nama']	."</p >";
			echo "<p>Alamat = ". $d['alamat']."</p >";
			echo "<hr/>";
		}
		//todo 70 test browser http://localhost/codeigniter/index.php/trydatabase/panggil4
	}

	//todo 71 kita akan coba result dari todo60
	public function panggil5(){
		$data = $this->db->query("select * from mahasiswa");

		echo  "<p>Row = ". $data->num_rows()."</p></br>";
		$row = $data->row();
		echo  "<p>No induk = ". $row->nim."</p></br>";

		$row = $data->row(1);
		echo  "<p>No induk = ". $row->nim."</p></br>";

		//todo 72 test browser http://localhost/codeigniter/index.php/trydatabase/panggil5
	}

}
