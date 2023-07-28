<?php
class Data{

	protected $connect = "";
	protected $result = "";


	public function __construct(){
		$this->connect = mysqli_connect(Config::HOST, Config::USER, Config::PASS, Config::DATA);
		mysqli_set_charset($this->connect,"utf8");
	}

	public function query($sql){//thực thi truy vấn sql và gán kết quả thu được vào biến result
		if ($this->connect) {
			$this->result = mysqli_query($this->connect,$sql);
		}
	}

	public function getResult(){
		return $this->result;
	}

	public function num_row(){//trả về số lượng kết quả truy vấn
		$rows = 0;
		if($this->result){
     		$rows = mysqli_num_rows($this->result);
     	}
     	return $rows;
	}

	public function getOneFirst(){//lấy bản ghi đầu tiên của kết quả
		$data = array();
		if($this->result){
     		$data = mysqli_fetch_assoc($this->result);// là 1 mảng có key là tên cột valua là nội dung cột
	    }
     	return $data;
	}

	public function getAll(){//lấy tất cả các bản ghi
		$arr = array();//tạo 1 mảng lớn chứa tất cả các mảng khác
		$row = array();//mảng con chứa dữ liệu 1 bản ghi
		if ($this->result) {
			while ($row = mysqli_fetch_assoc($this->result)) {
				$arr[] = $row;//arr = array(array('id'=>'HB1', 'name' = 'Hoa bó 1'), array('id'=>'HB2','name'=>'Hoa bó 2'))
			}
		}
		return $arr;
	}

	public function close(){
		mysqli_close($this->connect);
	}
}
?>