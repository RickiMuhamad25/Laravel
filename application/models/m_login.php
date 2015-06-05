<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_Login extends CI_Model{

	public function getLogin(){
		$dataLog = array('username' => $this->input->post('user'),
						  'password' => md5($this->input->post('pass')),
						  'user_status' => 1
		 );
		$this->db->where($dataLog);
		$query = $this->db->get_where('tbl_users');

			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
				$dataSessi=array(
					'user_id'=>$row->user_id,
					'username'=>$row->username,
					'password'=>$row->password,
					'emp_id'=>$row->emp_id,
					'user_level'=>$row->user_lavel,
					'bad_login'=>$row->bad_login,
					'active_date'=>$row->active_date,
					'update_date'=>$row->update_date,
					'logs_id'=>$row->logs_id,
					'user_status'=>$row->user_status
					);				
					$this->session->set_userdata('logged_in',$dataSessi);
				}
				redirect(site_url('login/admin'));
			}else{
				echo "<script>alert('Username atau password salah !');location='javascript:history.go(-1)';</script>";
			}
			return false;
	}

// Start Delete Users
	public function delete($id){
		$q="DELETE FROM tbl_users WHERE user_id='$id'";
		return $this->db->query($q);
	}
// End Delete Users

// Start Delete Elearning
	public function hapus($id){
		$q="DELETE FROM register WHERE id='$id'";
		return $this->db->query($q);
	}
// End Delete Elearning

// Start Delete HelpDesk
	public function d_help($id_help){
		$q="DELETE FROM tran_helpdesk WHERE id_help='$id_help'";
		return $this->db->query($q);
	}
// End Delete HelpDesk

// Start Delete Book Meeting
	public function d_meeting($id_book){
		$q="DELETE FROM tran_metbook WHERE id_book='$id_book'";
		return $this->db->query($q);
	}
// End Delete Book Meeting

// Start Data Users
	public function getDataUsers(){
		$data = array('user_id' => $this->uri->segment(3), );
		$q = $this->db->get_where('tbl_users',$data);

		return $q;
	}
// End Data Users

// Start Data Elearning
	public function getDataElearning(){
		$data = array('id' => $this->uri->segment(3), );
		$q = $this->db->get_where('register',$data);

		return $q;
	}
// End Data Elearning

// Start Data HelpDesk
	public function getDataHelpdesk(){
		// $data = array('id_help' => $this->uri->segment(3), );
		$q = $this->db->get('tran_helpdesk');

		return $q;
	}
// End Data HelpDesk

// Start Data Book Meeting 
	public function getDataMeeting(){
		$data = array('id_book' => $this->uri->segment(3), );
		$q = $this->db->get_where('tran_metbook',$data);

		return $q;
	}


// Start Helpdesk
	public function getHelpdesk(){
		$data = array('id_help' => $this->uri->segment(3), );
		$q = $this->db->get_where('tran_helpdesk',$data);

		return $q;
	}
// End Helpdesk

// Start Absen
	public function getSearchAbsen(){
		$emp_id = $this->input->post('emp_id');
		$thn = $this->input->post('thn');
		$bln = $this->input->post('bln');
		$sql = "SELECT date_format(scan_date,'%H:%i:%s') as masuk, date_format(scan_date,'%H:%i:%s') as keluar, date_format(scan_date,'%Y-%m-%d') as tgl from att_log where date_format(scan_date,'%Y')='$thn' and date_format(scan_date,'%m')='$bln' and pin='$emp_id'";
		return $this->db->query($sql);
	}
// End Absen

// Start Data Sequences
	public function getSequences($sID){

		$q="SELECT MAX(seq_id) as seq_id FROM tbl_sequences WHERE seq_alias='$sID'";
		return $this->db->query($q);
	}
// End Data Sequences

// Start Data Divisi
	public function getDivisi($empid){

		$q="SELECT b.level_id as dept from tbl_employee a,tbl_dept b WHERE a.dept_id_auto = b.dept_id_auto and a.nik='$empid' ";
		return $this->db->query($q);
	}
// End Data Divisi

	function gethelpbyid($id_help){
		$sql="SELECT id_help, ticket_help FROM tran_helpdesk WHERE id_help='".$id_help."'";
		$result=$this->db->query($sql)->result_array();
		return $result;
	}

	public function getRoomMeeting(){
		$q = $this->db->get('para_room');
		return $q;
		//$q = "SELECT room_name,id_room FROM para_room WHERE room_status = '".$room_status."'";
		//return $this->db->query($q);
	}

// Start Edit users
	public function setUsers(){
		$tgl = "%Y %m %d - %h:%i:%a";
		$u = $this->input->post('name');
		$p = $this->input->post('pass');
		$e = $this->input->post('emp');
		$l = $this->input->post('user_level');
		$d = mdate($tgl);
		$uri = $this->input->post('id');
		$sql = $this->db->query("UPDATE tbl_users SET username='$u',password=md5('$p'),emp_id='$e' , updated_date=NOW() , user_level='$l' WHERE user_id='$uri' ");
		return $sql;
	}
// End Edit users

// Start Edit Book
	public function setBook(){
		$b = $this->input->post('ticket_book');
    	$n = $this->input->post('emp_id');
    	$d = $this->input->post('emp_div');
    	$e = $this->input->post('id_room');
    	$div = $this->input->post('date_book');
    	$r = $this->input->post('end_book');
    	$m = $this->input->post('emp_email');
    	$uri = $this->input->post('id_book');
    	$sql = $this->db->query("UPDATE tran_metbook SET ticket_book='$b' ,emp_id='$n',emp_div='$d',id_room='$e',date_book='$div',end_book='$r',emp_email='$m' WHERE id_book='$uri' ");
    	return $sql;
	}
// End Edit Book

// Start Edit Elearning
	public function setElearning(){
		$fn = $this->input->post('fn');
		$mn = $this->input->post('mn');
		$ln = $this->input->post('ln');
		$email = $this->input->post('email');
		$tlp = $this->input->post('tlp');
		$divisi = $this->input->post('divisi');
		$job_area = $this->input->post('job_area');
		$job_title = $this->input->post('job_title');
		$mgr_name = $this->input->post('mgr_name');
		$mgr_email = $this->input->post('mgr_email');

		$uri = $this->input->post('id');
		
		$sql = $this->db->query("UPDATE register SET fn='$fn' , mn='$mn' , ln='$ln' , email='$email', tlp='$tlp' , divisi='$divisi' , job_area='$job_area' , job_title='$job_title' , mgr_name='$mgr_name' , mgr_email='$mgr_email' WHERE id='$uri' ");
		return $sql;
	}
// End Edit Elearning

// Start Edit Helpdesk
	public function setHelpdesk(){
		$th = $this->input->post('ticket_help');
		$ei = $this->input->post('emp_id');
		$en = $this->input->post('emp_name');
		$ed = $this->input->post('emp_div');
		$ee = $this->input->post('emp_email');
		$nh = $this->input->post('note_help');
		$uri = $this->input->post('id_help');
		$sql = $this->db->query("UPDATE tran_helpdesk SET ticket_help='$th', emp_id='$ei' , emp_name='$en', emp_div='$ed', emp_email='$ee', note_help='$nh' WHERE id_help='$uri'"); 
		return $sql;
	}
// End Edit Helpdesk

// Start Done 
	public function u_done($idhelp)
	{
		$status = "Done";
		$tgl = "%Y %m %d - %h:%i:%a";
		$solve_date = mdate($tgl);
		$sql = $this->db->query("UPDATE tran_helpdesk SET help_status=1 , solve_date=NOW() WHERE id_help='$idhelp' ");
		return $sql;
	}
// End Done 

// Start Waiting
	public function u_waiting($idhelp){
		$status = "Waiting";
		$solve_date = mdate($tgl);
		$sql = $this->db->query("UPDATE tran_helpdesk SET help_status=0 , solve_date='$solve_date' WHERE id_help='$idhelp' ");
		return $sql;
	}
// End Waiting

// Start Add Users
	public function addusers(){
		$tgl = "%Y %m %d - %h:%i:%a";

		$user_id = $this->input->post('user_id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$emp_id = $this->input->post('emp_id');
		$user_level = $this->input->post('user_level');
		$bad_login = "0";
		$active_date = mdate($tgl);
		$updated_date = mdate($tgl);
		$logs_id = "0";
		$user_status = "1";

		$seqid = $this->input->post('seqid');
		$seqnew = $seqid +1;


		$addusers = $this->db->query("INSERT INTO  tbl_users VALUES('$user_id','$username',md5('$password'),'$emp_id','$user_level','$bad_login',NOW(),'$updated_date','$logs_id','$user_status')");
		$this->db->query("UPDATE tbl_sequences SET seq_id='$seqnew' WHERE seq_alias='u'");
		return $addusers;
	}
// End Add Users

// Start Add Elearning
	public function addelearning(){

		$id = $this->input->post('id');
		$id_emp = $this->input->post('id_emp');
		$fn = $this->input->post('fn');
		$mn = $this->input->post('mn');
		$ln = $this->input->post('ln');
		$email = $this->input->post('email');
		$tlp = $this->input->post('tlp');
		$divisi = $this->input->post('divisi');
		$job_area = $this->input->post('job_area');
		$job_title = $this->input->post('job_title');
		$mgr_name = $this->input->post('mgr_name');
		$mgr_email = $this->input->post('mgr_email');
		$pro_prim = "Rosemount Group";
		$pro_sec = "0";
		$flag = "1";

		$seqid = $this->input->post('seqid');
		$seqnew = $seqid +1;

		$addelearning = $this->db->query("INSERT INTO  register VALUES('$id','$id_emp','$fn','$mn','$ln','$email','$tlp','$divisi','$job_title','$job_area','$mgr_name','$mgr_email','$pro_prim','$pro_sec','$flag')");
	
		$this->db->query("UPDATE tbl_sequences SET seq_id='$seqnew' WHERE seq_alias='e'");
		return $addelearning;
	}
// End Add Elearning

// Start Add Helpdesk
	public function addhelpdesk(){

		$tgl = "%Y %m %d - %h:%i:%a";

		$id_help = $this->input->post('id_help');
		$ticket_help = $this->input->post('ticket_help');
		$emp_id = $this->input->post('emp_id');
		$emp_name = $this->input->post('emp_name');
		$emp_div = $this->input->post('emp_div');
		$emp_email = $this->input->post('emp_email');
		$type_help = $this->input->post('type_help');
		$req_date = mdate($tgl);
		$solve_date = mdate('Y-d-m');
		$note_help = $this->input->post('note_help');
		$help_status = "0";
		$logs_id = random_string('alnum',50);

		$seqid = $this->input->post('seqid');
		$seqnew = $seqid +1;

		$addhelpdesk = $this->db->query("INSERT INTO  tran_helpdesk VALUES('$id_help','$ticket_help','$emp_id','$emp_name','$emp_div','$emp_email','$type_help',NOW(),'$solve_date','$note_help','$help_status','$logs_id')");
		$this->db->query("UPDATE tbl_sequences SET seq_id='$seqnew' WHERE seq_alias='h'");
		return $addhelpdesk;
	}
// End Add Helpdesk

// Start Book Meeting

	public function addbook(){
		$tgl = "%Y %m %d - %h:%i:%a";

		$ticket_book = $this->input->post('ticket_book');
		$emp_id = $this->input->post('emp_id');
		$emp_div = $this->input->post('emp_div');
		$id_room = $this->input->post('id_room');
		$date_book = $this->input->post('date_book');
		$end_book = $this->input->post('end_book');
		$emp_email = $this->input->post('emp_email');
		$logs_id = random_string('alnum',10); 

		$seqid = $this->input->post('seqid');
		$seqnew = $seqid -1;

		$addmeeting = $this->db->query("INSERT INTO  tran_metbook VALUES('','$ticket_book','$emp_id','$emp_div','$id_room','$date_book','$end_book','$emp_email','$logs_id')");
		$this->db->query("UPDATE tbl_sequences SET seq_id='$seqnew' WHERE seq_alias='b'");
		return $addmeeting;
	}

// End Add Book Meeting

// Strat Add Room
	public function addroom(){
		$tgl = "%Y %m %d - %h:%i:%a";
		$id_room = $this->input->post('id_room');
		$room_name = $this->input->post('room_name');
		$room_floor = $this->input->post('room_floor');
		$room_projector = $this->input->post('room_projector');
		$room_status = $this->input->post('room_status');
		$room_create = mdate($tgl); 
		$logs_id = random_string('alnum',10); 

		$setRoom = $this->db->query("INSERT INTO  para_room VALUES('$id_room','$room_name','$room_floor','$room_projector','$room_status',NOW(),'$logs_id')");
		return $setRoom;
	}
// End Add Room

// Start Search User
	public function cariusers(){
		$key = $this->input->post('cari');
		$q = $this->db->query("SELECT * FROM tbl_users WHERE username LIKE '%$key%'");
		return $q;
	}
// End Search Users

}