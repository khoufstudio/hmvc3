<?php

class Auth extends MY_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('model_user'); // load model_user
    }

    public function index() {
        $this->load->view('v_login');
    }

    public function cek_login() {
        $data = array(
            'username' => $this->input->post('username', TRUE), 
            'password' => md5($this->input->post('password', TRUE))
        );

        
        $hasil = $this->model_user->cek_user($data);

        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id'] = $sess->id;
                $sess_data['username'] = $sess->username;
                $sess_data['level'] = $sess->level;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level') != '') {
                redirect('home');
            } 
            // elseif ($this->session->userdata('level') == 'member') {
            //     redirect('dashboard');
            // }
        } else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
            // echo $data["username"] . "-" . $data["password"];
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('Auth');
    }


}
