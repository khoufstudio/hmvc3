<?php 
    class M_transaksi extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function read($user = NULL)
        {
            $hasil = $this->db->query('SELECT transaksi_tbl.*, users.username AS kasir_users FROM transaksi_tbl INNER JOIN users ON transaksi_tbl.kasir = users.id');
            return $hasil->result();
        }

        public function barang_list()
        {
            $hasil = $this->db->get('barang_tbl');
            return $hasil->result();
        }

        public function new_resi()
        {
            $hasil = $this->db->query('SELECT MAX(no_resi) AS max_resi FROM transaksi_tbl');
            return $hasil->result();
        }

        public function save_resi($data)
        {
            $hasil = $this->db->insert('transaksi_tbl', $data);
            return $hasil;
        }

        public function save_resi_detail($data)
        {
            $hasil = $this->db->insert('transaksi_detail_tbl', $data);
            return $hasil;
        }

        public function detail_list($data)
        {
            // $hasil = $this->db->get_where('transaksi_detail_tbl', array('no_resi' => $data));
            $hasil = $this->db->query('
                SELECT 
                    transaksi_detail_tbl.no_resi AS no_resi, 
                    transaksi_detail_tbl.barang_kode AS barkod, 
                    barang_tbl.barang_nama AS barang, 
                    transaksi_detail_tbl.quantity AS jumlah, 
                    barang_tbl.barang_harga AS harga, 
                    (transaksi_detail_tbl.quantity * barang_tbl.barang_harga) AS total 
                FROM transaksi_detail_tbl LEFT JOIN barang_tbl ON transaksi_detail_tbl.barang_kode = barang_tbl.barang_kode
                WHERE transaksi_detail_tbl.no_resi = '.$data.'
            ');
            return $hasil->result();
        }

        // delete detail
        public function delete_detail($no_resi, $barkod)
        {
            $hasil = $this->db->delete('transaksi_detail_tbl', array('no_resi' => $no_resi, 'barang_kode' => $barkod));
            return $hasil;
        }

        // delete master
        public function delete_master($no_resi)
        {
            $hasil = $this->db->delete('transaksi_tbl', array('no_resi' => $no_resi));
            return $hasil;
        }

        public function save_resi_final($no_resi, $total)
        {
            // $hasil = $this->db->set('final', 1, FALSE);
            // $this->db->where('no_resi', $no_resi);
            // $this->db->update('transaksi_tbl');

            $data = array(
                'final' => 1,
                'jumlah' => $total
            );

            $hasil = $this->db->where('no_resi', $no_resi);
            $this->db->update('transaksi_tbl', $data);

            return $hasil;
        }








    }
    
?>