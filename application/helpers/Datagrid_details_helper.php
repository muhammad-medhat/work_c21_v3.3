<?php


class Datagrid_details extends Datagrid{
    private $hide_pk_col = true;
    private $hide_cols = array();
    private $_table_name1 = '';
    private $_table_name2 = '';
    private $_fk1='';
    private $_fk2='';
    private $pk_col = 'id';
    private $headings = array();
    private $tbl_fields = array();
    private $tbl_fields2 = array();



    public function __construct($_table_name1, $_table_name2, $_fk1, $_fk2){
      $this->CI =& get_instance();
      $this->CI->load->database();
      $this->_table_name1 = $_table_name1;
      $this->_table_name2 = $_table_name2;
      $this->_fk1 = $_fk1;
      $this->_fk2 = $_fk2;
      $this->tbl_fields = $this->CI->db->list_fields($_table_name1);
      $this->CI->load->library('table'); 
    }

    public function generate(){
      $this->_selectFields();

        $rows = $this->CI->db
          ->from("$this->_table_name1 t1")
          ->join("$this->_table_name2 t2", "t1.$this->_fk1=t2.id")
                ->get()
                ->result_array();

    echo "<div class='query'>" .$this->CI->db->last_query() ."</div>";
      foreach($rows as &$row){
            $id = $row[$this->pk_col];
             
            // prepend a checkbox to enable selection of items/rows
            array_unshift($row, "<input class='dg_check_item' type='checkbox' name='dg_item[]' value='$id' />");
             
            // hide pk column cell?
            if($this->hide_pk_col){
                unset($row[$this->pk_col]);
            }
        }
         
        return $this->CI->table->generate($rows);
    }

    private function _selectFields(){

      //array_walk($this->tbl_fields, 'concat');
      foreach ($this->tbl_fields as $key) {
        $key = "t1.$key";
        $this->tbl_fields2[] = $key;
      }
      var_dump($this->tbl_fields2);
        foreach($this->tbl_fields2 as $field){
            if(!in_array($field,$this->hide_cols)){
                $this->CI->db->select($field);
                // hide pk column heading?
                if($field==$this->pk_col && $this->hide_pk_col) continue;
                    $headings[]= isset($this->headings[$field]) ? $this->headings[$field] : ucfirst($field);
            }
        }
        if(!empty($headings)){
            // prepend a checkbox for toggling 
            array_unshift($headings,"<input type='checkbox' class='check_toggler'>");
            $this->CI->table->set_heading($headings);
        }
         
    }

    

}
?>
