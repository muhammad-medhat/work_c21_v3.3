<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// IMPORTANT - Replace the following line with your path to the escpos-php autoload script
require_once __DIR__ . '\escpos\autoload.php';
 // require(__DIR__ .'\escpos\src\Mike42\Escpos\Printer.php');
 // require(__DIR__ .'\escpos\src\Mike42\Escpos\ImagickEscposImage.php');
 // require(__DIR__ .'\escpos\src\Mike42\Escpos\PrintConnectors\FilePrintConnector.php');
 // require(__DIR__ .'\escpos\src\Mike42\Escpos\PrintConnectors\WindowsPrintConnector.php');;
use Mike42\Escpos;
use Mike42\Escpos\Printer;
use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

class ReceiptPrint {
  private $CI;
  private $connector;
  private $printer;
  // TODO: printer settings
  // Make this configurable by printer (32 or 48 probably)
  private $printer_width = 48;
  function __construct()
  {
    //$device = $printer['device'];
    $this->CI =& get_instance(); // This allows you to call models or other CI objects with $this->CI->... 
    
    $this->connector = new WindowsPrintConnector("EPSON TM-T88IV ReceiptE4");
    //$this->connector = new WindowsPrintConnector($devic);
    $this->printer = new Printer($this->connector);}
  
  function connect($device, $asdf)
  {
    //$this->connector = new NetworkPrintConnector($ip_address, $port);
   // $this->connector = new WindowsPrintConnector($ip_address, $port);
    $this->connector = new WindowsPrintConnector("EPSON TM-T88IV ReceiptE4");
    //$this->connector = new WindowsPrintConnector($device);
    $this->printer = new Printer($this->connector);
  }
  private function check_connection()
  {
    if (!$this->connector OR !$this->printer OR !is_a($this->printer, 'Mike42\Escpos\Printer')) {
      throw new Exception("Tried to create receipt without being connected to a printer.");
    }
  }
  public function close_after_exception()
  {
    if (isset($this->printer) && is_a($this->printer, 'Mike42\Escpos\Printer')) {
      $this->printer->close();
    }
    $this->connector = null;
    $this->printer = null;
    $this->emc_printer = null;
  }
  // Calls printer->text and adds new line
  private function add_line($text = "", $should_wordwrap = true)
  {
    
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width) : $text;
    //echo"text is $text";
    $this->printer->text($text);
    $this-> printer -> feed();    
  }
  public function print_test_receipt($text = "")
  {
    $this->check_connection();
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $this->add_line("TESTING");
    $this->add_line("Receipt Print");
    $this->printer->selectPrintMode();
    $this->add_line(); // blank line
    $this->add_line($text);
    $this->add_line(); // blank line
    $this->add_line(date('Y-m-d H:i:s'));
    $this->printer->cut(Printer::CUT_PARTIAL);
    $this->printer->close();
  }
  public function print_receipt($header='', $text = ""){
//header('Content-type: text/plain; charset=utf-8');
    $this->check_connection();
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $this->add_line($header);
    $this->printer->selectPrintMode();
    $this->add_line(); // blank line
    $this->add_line($text);
    $this->add_line(); // blank line
    $this->add_line(date('Y-m-d H:i:s'));
    $this->printer->cut(Printer::CUT_PARTIAL);
    $this->printer->close();
  }
function title(Printer $printer, $str)
{
  $printer -> selectPrintMode(
    Printer::MODE_DOUBLE_HEIGHT | 
    Printer::MODE_DOUBLE_WIDTH |
    //Printer::JUSTIFY_RIGHT |
    //Printer::BARCODE_UPCA |
   Printer::MODE_FONT_B 
  );
    $printer -> text($str ."\n");
    $printer -> selectPrintMode();
}



  function print_image($path){
    $tux = EscposImage::load($path, false);
    //var_dump($tux);
      $this->printer -> bitImage($tux);
    $this-> printer -> cut();
    $this-> printer -> close();
  }

  function print_pdf($_pdf){
    /*NOT USED*/
    $pages = ImagickEscposImage::loadPdf($_pdf);
    foreach ($pages as $page) {
      $printer -> graphics($page, Printer::IMG_DOUBLE_HEIGHT | Printer::IMG_DOUBLE_WIDTH);
    }
    $this-> printer -> cut();
    $this-> printer -> close();
  }

  function close_printer(){
      $this-> printer -> cut();
    $this-> printer -> close();

  }

  function rprint($data){
    /*NOT USED*/
    $this->printer -> setJustification(Printer::JUSTIFY_CENTER);

    $this->title($this->printer, 'Table ' .$data['order']->customer_id);
      $this->printer -> setJustification(Printer::JUSTIFY_LEFT);
 
        $this-> printer -> pdf417Code('#' , /*size*/2);
        $this->add_line('# Date: ' .date(date_format));
        $this->add_line('# Time: ' .date(time_format));
        $this-> printer -> pdf417Code('#' , /*size*/2);


        ######################################
        foreach ($data['items_table'] as $item){
          $this->add_line( ($item['eng']) .' == ' .$item['price'].' == ' .$item['qty']   .' == ' .$item['total_line']);
        
        } 
    
               $this->add_line("total " .$data['total']);      
                  $this->add_line($data['ratio'] ."% SERVICE  " .$data['service_value'] );
              $this->add_line("*******************************");
              $this->add_line("GRAND TOTAL ".$data['grand_total']);
              
      
            $this->printer->cut(Printer::CUT_FULL);
              $this->printer->close();

  
  }
     
}


