<?php
 function arr_search($arr,  $value, $field='id'){
    foreach ($arr as $key=>$val) {
      if($value == $val->$field){
        return $arr[$key];
      }
    }
    return null;
 }
 function array_object($arr){
  
   $o_arr = array();
   foreach ($arr as $key=>$val) {
   $o = new stdclass();

     $o->$key = $val->value;
     $o_arr[] = $o;
   }
   return $o_arr;
 }

function cmp_cat_id($a, $b)
{
    return strcmp($a->cat_id, $b->cat_id);
}
/*
  function _db_debug($string=''){
      $ci =& get_instance();
      $debug_query = 'insert into lk9v6_debug(query) values ("'.$string .$ci->db->last_query() .'")';
      $ci->db->query($debug_query);
  }*/
  function _remove_items($items, $source){
    foreach ($items as $i) {
      if(isset($source[$i]))
        unset($source[$i]);
    }
    return $source;
  }
  function list_items2($arr, $el = 'li', $sep = 'sep')
  {
    $ci =& get_instance(); 

    $ret = '';
    foreach($arr as $u=>$v){
      (isset($v['display']))? $name = $v['display']: '';
      (isset($v['method']))? $method = $v['method']: '';
      (isset($v['controller']))? $controller = $v['controller']:'';
      $class='';
      if( $method == $ci->router->fetch_method() &&  $controller == $ci->router->fetch_class()){
            $class = ' active-tab';
      }
      if(isset($v['sep']) )
        $ret .= "<$el class='$sep'></$el>";    
      else
        $ret .= "<$el class=$class>" .anchor($u, $name, "class='$class'") ."</$el>";    
    }
    return $ret;

  }

  function list_items1($arr, $el='li')
  {
    $ret = '';
    foreach($arr as $u=>$v){
      $name = $v['display'];
      $controller = $v['controller'];
      $class=$v['class'];
      $ci =& get_instance(); 
      if( $controller == $ci->router->fetch_class()){

            $class = ' active-tab';
      }
      $ret .= "<$el class='$class'>" .anchor($u, $name, "class='$class'") ."</$el>";    
    }
    return $ret;
  }
  
  function list_items($arr, $el='li'){
    //lists an array using the specified element
    //ex listing an array to links
    $ret = '';
    foreach($arr as $u=>$v){
      if(is_array($v)){
          $name = $v[0];
          $class = $v[1];
      }else{
        $name = $v;
        $class='';
      }
/*
      $ci =& get_instance(); 
      $controller = $ci->router->fetch_class();
      $method = $ci->router->fetch_method();
      $url_arr = explode('/', uri_string());
 */    //var_dump($url_arr);
          if (uri_string() == $u ){ 

            $class .= ' active-tab';
          }


          $ret .= "<$el>" .anchor($u, $name, "class='$class'") ."</$el>";
    }
    return $ret;
  }

  function simple_array_comp($array,  $field_name='name', $concat='name',$id_field='id'){
    $ret = array();
    foreach ($array as $key) {
      $ret[$key->id] = $key->$field_name .' -  ' .$key->$id_field .':'.$key->$concat; 
    }
    return $ret;
  }
  function simple_array_cnt($array, $fields = array() ){
    $ret = array();
    foreach ($array as $key=>$value) {
      $ret[$value->id] = '';
      $i = 1;
      foreach ($fields as $field) {
        $ret[$value->id] .= $value->$field;
        if($i != count($fields)){
          $ret[$value->id] .= ' - ';
          $i++;
        }
      }   
    }
    return $ret;
  }
/*
  function simple_array_concat($array, $fields=array()){
    $ret = array();
    foreach ($array as $key) {
      $ret[$key->id]='';
      foreach ($fields as $f) {
        $ret[$key->id] .= $fields->$f .' - '; 
      }
    }
    return $ret;
  }
 */
  function very_simple_array($array, $field_name='name'){
    if($array){
      $ret = array();
      foreach ($array as $key=>$value) {
        $ret[$key] = $key->$field_name; 
      }
      return $ret;
    }
  }

  

function simple_array($array, $field_name='name', $fields = array() ){
  if($array){
    $ret = array(''=>'...');
    foreach ($array as $key) {
      if($field_name == '*'  ){
        $ret_rec = '';
        $i = 1;
        foreach ($fields as $sub_key) {
          $ret_rec .= $key->$sub_key;
          if($i != count($fields))
            $ret_rec .= ' | ';       
          $i++;   
        }
        $ret[$key->id] = $ret_rec;
      } else {
        $ret[$key->id] = $key->$field_name; 
        //echo 'ret(' .$ret[$key->id] .') '  .'is =' .$key->$field_name; 
      }
    }
    return $ret;
  }
}
function simple_array1($array, $key_name='name'){
  $ret = array();
  foreach ($array as $key=>$value) {
    $ret[$value->$key_name] = $value;
  }
  return $ret;
}
function create_urls($array, $separator='>'){
    $ret = '';
    foreach ($array as $k=>$v) {
      $ret .= anchor($v, $k) ." $separator ";
    }
    return $ret;
}

  function to_table($array){
    $ci =& get_instance();
    return $ci->table->generate($array);
  }

  function my_round($x){
    $ret = $x - floor($x); 
    
    if($ret - 1 < 0.5)
      return ceil($x)- 0.05;
    else
    return floor($x) -0.05;
  }




function mg_round($num, $approx=approximation){
  $ret = floor($num*$approx);
  return round($ret/$approx, 2);
}
    function concat($key){
      return "t1.$key";
    }
 
 ?>
