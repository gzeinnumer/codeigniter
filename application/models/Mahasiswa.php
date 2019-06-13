<!--todo 36-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Model {

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

	//todo 37 test browser http://localhost/codeigniter/index.php/trydatabase/
	//todo 39
	public function getMahasiswa(){
		$data = $this->db->query('select * from mahasiswa');
		$data = $this->db->get('mahasiswa');
		return $data->result_array();

		//todo 60 kita bisa lihat doc nya di https://www.codeigniter.com/userguide2/database/active_record.html
	}


	//todo 45 membuat 3 function untuk memproses table
	public function insertMahasiswa($tableName, $data){
		//todo 46
		$res = $this->db->insert($tableName, $data);
		return $res;
	}

	//todo 45 membuat 3 function untuk memproses table
	public function updateMahasiswa($tableName, $data, $where){
		//todo 50
		$res = $this->db->update($tableName, $data, $where);
		return $res;
	}

	//todo 45 membuat 3 function untuk memproses table
	public function deleteMahasiswa($tableName, $where){
		$res = $this->db->delete($tableName, $where);
		return $res;
	}

	//todo 98
	public function getMahasiswaWhere($where){
		$data = $this->db->query('select * from mahasiswa '.$where);
		return $data->result_array();
	}

}
