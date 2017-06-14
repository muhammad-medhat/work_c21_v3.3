<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orders{
  function __construct(){
    $this->CI =& get_instance(); // This allows you to call models or other CI objects with $this->CI->... 
    $this->orders_table = orders_table;
  }
  
  public function get_service($order_id)
  {
    switch ($order_id) {  
      case '1': //dine in
        $s = (int)$this->data['settings']['service'];
        break;
      
      case '3': //delivery
        $s = (int)$this->data['settings']['delivery_service'];
        break;
      default:// take away
        $s = 0;
    }

  }

  public static function get_service_value($total, $service){
    return $total * $service / 100;
  }

  function takeaway(){}
  function delivery(){}
  function station(){}
}
?>
