<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Ardianta Pargo
 * @license			MIT License
 * @link			https://github.com/ardianta/codeigniter-dompdf
 */


// Petani Kode dompdf 0.8.2 (The latest version 27/11/2018)
use Dompdf\Dompdf;
class Pdf extends Dompdf{
	/**
	 * PDF filename
	 * @var String
	 */
	public $filename;
	public function __construct(){
		parent::__construct();
		$this->filename = "laporan.pdf";
	}
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function ci()
	{
		return get_instance();
	}
	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access	public
	 * @param	string	$view The view to load
	 * @param	array	$data The view data
	 * @return	void
	 */
	public function load_view($view, $data = array()){
		$html = $this->ci()->load->view($view, $data, TRUE);
		$this->load_html($html);
		// Render the PDF
		$this->render();
        // Output the generated PDF to Browser
        // $this->stream($this->filename, array("Attachment" => 0));
        $this->stream($this->filename, array("Attachment" => 0));
	}
}


// Agung Setiawan dompdf 0.6.2
// class Pdf
// {
//   public function generate($html,$filename)
//   {
//     define('DOMPDF_ENABLE_AUTOLOAD', false);
//     require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
 
//     $dompdf = new DOMPDF();
//     $dompdf->load_html($html);
//     $dompdf->render();
//     $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
//   }
// }


?>