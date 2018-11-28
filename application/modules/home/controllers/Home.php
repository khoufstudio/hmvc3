<?php 
    class Home extends MY_Controller 
    {

        function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->model('M_transaksi');

            if ($this->session->userdata('level') == '') {
                redirect('Auth');
            }


        }

        public function index()
        {
            $data["transaksi"] = $this->M_transaksi->read();
            $data["content"] = "home/v_home";
            $this->template->admin_template($data);

        }

        // halaman add transaksi
        public function add($data = NULL)
        {
            $no_resi = $this->M_transaksi->new_resi();
            $no_resi = $no_resi[0]->max_resi;
            $no_resi = (int) $no_resi;

            if ($data == NULL) {
                $no_resi = $no_resi + 1;
                $target = 'home/save_resi';
            } else {
                $target = 'home/save_resi_detail/';
            }
            $data = array(
                'content' => 'home/v_add_transaksi',
                'no_resi' => $no_resi, 
                'target' => $target 
            );

            $this->template->admin_template($data);
            $this->load->view('js_page/add_transaksi_js'); 
        }

        public function add_detail()
        {
            $this->add("dummy");
        }

        // halaman add transaksi detail
        public function detail()
        {
            $no_resi = $this->uri->segment(3, 0);

            $detail_list = $this->M_transaksi->detail_list($no_resi);

            $total = 0;
            foreach ($detail_list as $item => $key) {
                $total += $key->total;
            }


            $data = array(
                'content' => 'home/v_add_transaksi_detail', 
                'no_resi' => $no_resi , 
                'target' => 'home/add_detail',
                'detail_list' => $detail_list,
                'total' => $total
            );

            $this->template->admin_template($data);

        }

        public function data_barang()
        {
            $data = $this->M_transaksi->barang_list();
            echo json_encode($data);
        }

        public function barang()
        {
            $this->load->view('v_barang');
        }
      

        // fungsi untuk save resi
        public function save_resi()
        {
            // data resi
            $data = array(
                'no_resi' => $this->input->post('no_resi'),
                'tanggal' => $this->input->post('tanggal'),
                'jumlah' => $this->input->post('jumlah'),
                'kasir' => $this->input->post('kasir')
            );

            // data resi detail 
            $data1 = array(
                'no_resi' => $this->input->post('no_resi'),
                'barang_kode' => $this->input->post('barang_kode'),
                'quantity' => $this->input->post('quantity')
            );

            $hasil = $this->M_transaksi->save_resi($data);
            if ($hasil) {
                $this->save_resi_detail($data1);
                //$this->index();
            } else {
                echo "something wrong";
            }
        }

        // fungsi untuk save resi detail
        public function save_resi_detail($data = NULL)
        {
            if ($data == NULL) {
                // data resi detail 
                $data = array(
                    'no_resi' => $this->input->post('no_resi'),
                    'barang_kode' => $this->input->post('barang_kode'),
                    'quantity' => $this->input->post('quantity')
                );
            }
            
            $hasil = $this->M_transaksi->save_resi_detail($data);
            if ($hasil) {
                redirect('/home/detail/'.$data['no_resi']);
            } else {
                echo "something wrong";
            }
        }

        public function del_resi_detail()
        {
            $no_resi = $this->uri->segment(3, 0);
            $barkod = $this->uri->segment(4, 0);
            
            $hasil = $this->M_transaksi->delete_detail($no_resi, $barkod);

            if ($hasil) {
                redirect('/home/detail/'.$no_resi);
            } else {
                echo "something wrong";
            }
        }

        public function del_resi_master()
        {
            $no_resi = $this->uri->segment(3, 0);
            
            $hasil = $this->M_transaksi->delete_master($no_resi);

            if ($hasil) {
                redirect('/home');
            } else {
                echo "something wrong";
            }
        }

        public function save_resi_final()
        {
            $no_resi = $this->uri->segment(3, 0);
            
            $detail_list = $this->M_transaksi->detail_list($no_resi);

            // jumlah total transaksi
            $total = 0;
            foreach ($detail_list as $item => $key) {
                $total += $key->total;
            }

            $hasil = $this->M_transaksi->save_resi_final($no_resi, $total);

            if ($hasil) {
                redirect('/home');
            } else {
                echo "something wrong";
            }
        }

        public function laporan()
        {
            $no_resi = $this->uri->segment(3, 0);

            $detail_list = $this->M_transaksi->detail_list($no_resi);

            $total = 0;
            foreach ($detail_list as $item => $key) {
                $total += $key->total;
            }

            $data = array(
                'content' => 'home/v_add_transaksi_detail', 
                'no_resi' => $no_resi , 
                'target' => 'home/add_detail',
                'detail_list' => $detail_list,
                'total' => $total
            );

            // view biasa    
            // $this->load->view('v_laporan', $data);
            
            // function print pdf petani kode
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-kuitansi.pdf";
            $this->pdf->load_view('v_laporan', $data); 
            // redirect('/home');

            // agung setiawan
            // $this->load->library('pdf');
            // $html = $this->load->view('v_laporan', $data, true);
	    
	        // $this->pdf->generate($html,'contoh');


            
        }

        public function print()
        {
            $no_resi = $this->uri->segment(3, 0);

            $detail_list = $this->M_transaksi->detail_list($no_resi);

            $total = 0;
            foreach ($detail_list as $item => $key) {
                $total += $key->total;
            }

            $data = array(
                'content' => 'home/v_add_transaksi_detail', 
                'no_resi' => $no_resi , 
                'target' => 'home/add_detail',
                'detail_list' => $detail_list,
                'total' => $total
            );

            // view biasa    
            $this->load->view('v_print', $data);
            $this->load->view('js_page/print_js'); 

            
        }
    }
    
    
?>