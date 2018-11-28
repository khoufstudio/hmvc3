<?php 
    class Template extends MY_Controller 
    {

        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            echo "This is home";
        }

        public function sample_template($data = NULL)
        {
            $this->load->view('Template/v_sample_template', $data);
        }

        public function admin_template($data = NULL)
        {
            $this->load->view('Template/v_template', $data);
        }

        public function add_transaksi()
        {
            $this->load->view('Template/v_template');
        }
    }
    
?>