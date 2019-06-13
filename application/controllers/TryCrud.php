<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//todo 73 buat controllerbaru
class TryCrud extends CI_Controller {

	public function index(){
		$data = $this->Mahasiswa->getMahasiswa();
		$this->load->view('table', array('data'=>$data));
	}

//	todo 78
	public function add_Data(){
		//echo "add_data";
		//todo 83
		$this->load->view('form_add');
	}

	//todo 84
	public function do_insert(){
//		echo "<pre>";
//		print_r($_POST);
//		echo "</pre>";
		//todo 85 isi form add data dan simpan
		//todo 86
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		//sesuai name pada input form

		$data_insert=array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
		);
//		$res = $this->db->insert('mahasiswa', $data_insert);
//			if($res>=1){
//			echo "sukses";
//		} else{
//			echo "gagal";
//		}
		//todo 87 test isi form dan simpan
		//todo 88 check db

		//todo 89
		$res = $this->Mahasiswa->insertMahasiswa('mahasiswa', $data_insert);
//		if($res>=1){
//			//echo "sukses";
////			todo 92
//			redirect('trycrud/index');
////			end todo
//		} else{
//			echo "gagal";
//		}
		//todo 90 test isi form dan simpan
		//todo 91 check db

		if($res>=1){
			//todo 108
			$this->session->set_flashdata('pesan','Tambah Data Sukses');
			//end todo
			redirect('trycrud/index');
		} else{
			echo "gagal";
		}
	}

	//todo 93
	public function do_delete($nim){
		//echo "delete nim = ".$nim;
		$where = array('nim'=>$nim);
		$res = $this->Mahasiswa->deleteMahasiswa('mahasiswa',$where);
		if($res>=1){
			//todo 109
			$this->session->set_flashdata('pesan','Tambah Data Sukses');
			//end todo
			redirect('trycrud/index');
		} else{
			echo "gagal";
		}
	}


	//todo 97
	public function do_editdata($nim){
		//todo 99
		$data = $this->Mahasiswa->getMahasiswaWhere("where nim='$nim'");
//		echo "<pre>";
//		print_r($data);
//		echo "</pre>";
		//todo 103
		$mhs = array(
			"nim"=> $data[0]['nim'],
			"nama"=> $data[0]['nama'],
			"alamat"=> $data[0]['alamat'],
		);
		$this->load->view('form_edit',$mhs);
	}

	//todo 104
	public function do_update(){
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];

		$data_update=array(
			'nim'=> $nim,
			'nama'=> $nama,
			'alamat'=> $alamat
		);
		$where = array('nim' => $nim);
		$res = $this->Mahasiswa->updateMahasiswa('mahasiswa',$data_update, $where);
		if($res>=1){
			//todo 110
			$this->session->set_flashdata('pesan','Tambah Data Sukses');
			//end todo
			redirect('trycrud/index');
		} else{
			echo "gagal";
		}
	}
	//todo 111 test browser
}
