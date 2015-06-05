<?php

class Login extends CI_Controller {
  function __construct(){
    parent::__construct();
  }

    public function index(){
       $this->load->library('form_validation');
     
       $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
     
       if($this->form_validation->run() == FALSE){
         //jika gagal, redirect ke login page
         $this->load->view('login');
       }else{
         //Go main page
         redirect('home', 'refresh');
       }
    }
 
    public function check_database(){
    if ($this->input->post('user')=="") {
          echo "<script>alert('username harus diisi');location='javascript:history.go(-1)';</script>";
      }elseif ($this->input->post('pass')=="") {
          echo "<script>alert('Password harus di isi');location='javascript:history.go(-1)';</script>";
      }else{
       if ($this->session->set_userdata('tbl_users')!="") {
          redirect(site_url('login/admin'));
      }else{
       $this->m_login->getLogin();
      }
    } 
    }

  	function admin(){
      session_start(); // call session
      if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['data_users'] = $this->db->get('tbl_users');
         $data['edit'] = $this->m_login->getDataUsers();
         $this->load->view('Administrator/admin', $data);
      }else{
         //Jika session kosong, maka redirect ke login page
         redirect('login','refresh');
      }
    }

    public function admin1(){
      if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $this->load->view('include/head', $data);
      }
    }

// Start User

    function users($user_id=NULL){
      session_start(); // call session
      if($this->session->userdata('logged_in')){
        $data['data_users'] = $this->db->get('tbl_users');
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['emp_id'] = $session_data['emp_id'];

        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/project/index.php/login/users';
        $config['total_rows'] = $this->db->get('tbl_users')->num_rows();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        $config['first_link'] = 'awal';
        $config['last_link'] = 'akhir';
        $config['next_link'] = 'selanjutnya';
        $config['prev_link'] = 'sebelumnya';
        $config['cur_tag_open'] = '<strong>';
        $config['cur_tag_close'] = '</strong>';
        $this->pagination->initialize($config);
        $data['paging'] = $this->pagination->create_links();

        $data['data_users'] = $this->db->get('tbl_users',$config["per_page"],$user_id);
        $data['seq'] = $this->m_login->getSequences("u");
        $this->load->view('Administrator/users',$data);
      }else{
         //Jika session kosong, maka redirect ke login page
         redirect('login','');
      }
    }

    public function user(){
      $this->m_login->addUsers();
      redirect('login/users');
    }

    public function actEditUsers(){
      $this->m_login->setUsers();
      redirect('login/users');
    }

    public function hapus($id){
      $this->m_login->delete($id);
      redirect('login/users');
    }

// End User

// Start Elearning

    public function delete($id){
      $this->m_login->hapus($id);
      redirect('login/form');
    }

     public function actEditElearning(){
      $this->m_login->setElearning();
      redirect('login/form');
    }

    function elearning(){
      $this->m_login->addelearning();
      redirect('login/form');
    }

    function form($id=NULL){
      session_start(); // call session
      if($this->session->userdata('logged_in')){
        $data['data_elearning'] = $this->db->get('register');
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['sequences'] = $this->m_login->getSequences("e");
        $this->load->view('Administrator/elearning',$data);
      }else{
         //Jika session kosong, maka redirect ke login page
         redirect('login','');
      }
    }

// End Elearning


// Start HelpDesk

    public function d_helpdesk($id_help){
      $this->m_login->d_help($id_help);
      redirect('login/l_helpdesk');
    }

   

    public function actEditHelpdesk(){
      $this->m_login->setHelpdesk();
      redirect('login/l_helpdesk');
    }

    public function l_helpdesk(){
      session_start(); // call session
      if($this->session->userdata('logged_in')){
        $data['data_helpdesk'] = $this->db->get('tran_helpdesk');
        $session_data = $this->session->userdata('logged_in');
        $empid = $session_data['emp_id'];
        $data['divisi'] = $this->m_login->getDivisi($empid);
        $data['helpdesk'] = $this->m_login->getDataHelpdesk();
        $data['helpdeskget'] = $this->m_login->getHelpdesk();
        $data['sequences'] = $this->m_login->getSequences("h");
        $data['username'] = $session_data['username'];
        $data['emp_id'] = $session_data['emp_id'];
        $this->load->view('Administrator/l_helpdesk',$data);
      }else{
         //Jika session kosong, maka redirect ke login page
         redirect('login','');
      }
    }

    function helpdesk(){
      $this->m_login->addhelpdesk();
      redirect('login/l_helpdesk');
    }

// End HelpDesk

// Start Book Meeting

    public function acteditbook(){
       $this->m_login->setBook();
      redirect('login/l_meeting');
    }

    public function d_meeting($id_book){
      $this->m_login->d_meeting($id_book);
      redirect('login/l_meeting');
    }

    public function actaddmeeting(){
      $this->m_login->addbook();
      redirect('login/l_meeting');
    }

    public function l_meeting(){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['data_meeting'] = $this->db->get('tran_metbook');
        $data['meeting'] = $this->m_login->getDataMeeting();
        $data['username'] = $session_data['username'];
        $data['emp_id'] = $session_data['emp_id'];
        $empid = $session_data['emp_id'];
        $data['div'] = $this->m_login->getDivisi($empid);
        $data['listroom'] = $this->m_login->getRoomMeeting();
        $data['seq'] = $this->m_login->getSequences("b");
        $this->load->view('Administrator/l_meeting',$data);
      }
    }
    
    public function actaddroom(){
      $this->m_login->addroom();
      redirect('login/l_meeting');
    }

// End Room Meeting

// Start Absen 
    public function absen(){
      session_start(); // call session
      if($this->session->userdata('logged_in'))
     {
       $session_data = $this->session->userdata('logged_in');
       $data['tampil'] = $this->m_login->getSearchAbsen();
       $data['username'] = $session_data['username'];
      $this->load->view('administrator/absen',$data);
    }
    }

    public function view_absen(){
       session_start(); // call session
      if($this->session->userdata('logged_in'))
     {
       $session_data = $this->session->userdata('logged_in');
       $data['tampil'] = $this->m_login->getSearchAbsen();
       $data['username'] = $session_data['username'];
      $this->load->view('Administrator/view_absen',$data);
    }
    }

// End Absen

// Start Aksi
    public function done($id_help){
      $this->m_login->u_done($id_help);
      redirect('login/l_helpdesk');
    }

    public function waiting($id_help){
      $this->m_login->u_waiting($id_help);
      redirect('login/l_helpdesk');
    }
// End Aksi

    public function cari() {
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['data_users']=$this->m_login->cariusers();
        $data['paging'] = $this->pagination->create_links();
        $this->load->view('administrator/users',$data);
       }
    }

    function logout(){
       $this->session->unset_userdata('logged_in');
       session_destroy();
       redirect('login');
    }


}
