<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct($page_format)
    {
      parent::__construct();
        $format = (!isset($page_format['format']) )? PDF_PAGE_FORMAT: $page_format['format'];
        $title  = (!isset($page_format['title'] ) )? PDF_HEADER_TITLE: $page_format['title'];
        $string = (!isset($page_format['string']) )? PDF_HEADER_STRING: $page_format['string'];
        $header = (!isset($page_format['header']) )? true :$page_format['header'];
        $footer = (!isset($page_format['footer']) )? true :$page_format['footer'];
        
        $this-> pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $format, true, 'UTF-8', false);

        $this-> pdf->SetCreator(PDF_CREATOR);
        //$this-> pdf->SetAuthor('Club21 Cafe & Restaurant');
        //$this-> pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        
        // set default header data
        $this-> pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $string);
        
        // set header and footer fonts
        $this-> pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this-> pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // set default monospaced font
        $this-> pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // set margins
        $this-> pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this-> pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        //$this-> pdf->SetHeaderMargin(2);
        $this-> pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // set auto page breaks
        $this-> pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $this-> pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set some language dependent data:
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        
        // set some language-dependent strings (optional)
        $this->pdf->setLanguageArray($lg);
        
        // set font
        $this->pdf->SetFont('dejavusans', '', 18);

        //hide footer
        $this->pdf->SetPrintHeader($header);
        $this->pdf->SetPrintFooter($footer);
        
        // add a page
        $this->pdf->AddPage();
$this->pdf->Cell(0, 10,"page format is [ $format ]", 1, 1, 'R');
//echo 'margin is ' .$this->pdf->getHeaderMargin();
    }
    public function changePageFormat($format){
    $this->pdf->setPageFormat($format);
    }
/*
    public function html($htmlcontent, $file_name, $header){
      $this-> pdf->Cell(0, 20, $header, 1, 1, 'C');

        $this->pdf->WriteHTML($htmlcontent, true, 0, true, 0);


        $this->pdf->setRTL(false);
      
        $this-> pdf->setPrintFooter(false);
        // set auto page breaks
        $this-> pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //$f_name = base_url() .'invoice/' .$file_name;
        $f_name = APPPATH .'invoice/' .$file_name;
        $this->pdf->Output($f_name, 'F');
        return $f_name;
    }
 */
    public function create_pdf(){
    
    }

    public function lib_writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=false, $reseth=true, $align='', $autopadding=true){
		  return $this->pdf->MultiCell($w, $h,$html, $border, $align, $fill, $ln, $x, $y, $reseth, 0, true, $autopadding, 0, 'T', false);
    }

    public function lib_writeHTML($html){
       $this->pdf->WriteHTML($html, true, 0, true, 0);
    }

    public function lib_output($f_name){
      $this->pdf->output($f_name, 'F');
    }

    public function lib_Cell($a, $b, $c, $d, $e, $f){
       $this->pdf->Cell($a, $b, $c, $d, $e, $f);
    }

    public function lib_setTitle($title){
      $this->pdf->setTitle($title);
    }
    public function lib_setSubject($subject){
      $this-> pdf->SetSubject($subject);
    }
    public function lib_setHeaderMargin($margin){
      $this->pdf->SetHeaderMargin($margin);
    }
    public function lib_getHeaderMargin(){
      return $this->pdf->getHeaderMargin();
    }
    public function lib_getY(){
      return $this->pdf->getY();
    }
    public function lib_getLastH(){
		  return $this->pdf->lasth;
    }

}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
