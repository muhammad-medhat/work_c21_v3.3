<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  
  function get_service($order_id)
  {
    $CI =& get_instance();
    //var_dump($CI->data['settings']);
    switch ($order_id) {  
      case '1': //dine in
        $s = (int)$CI->data['settings']['service'];
        break;
      
      case '3': //delivery
        $s = (int)$CI->data['settings']['delivery_service'];
        break;
      default:// take away
        $s = 0;
    }
    return $s;
  }

  function get_service_value($total, $service){
    return $total * $service / 100;
  }

  function takeaway(){}
  function delivery(){}
  function station(){}

?>
