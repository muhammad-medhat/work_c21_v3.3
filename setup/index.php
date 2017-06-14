<form action='index.php' method='post'>
    <table>
      <tr>
        <td>db user</td>  <td><input type='text' name='user' /></td>
      </tr>
      <tr>
        <td>db pass</td>  <td><input type='text' name='pass' /></td>
      </tr>
      <tr>
        <td>db name</td>  <td><input type='text' name='db_name' /></td>
      </tr>
      <tr>
        <td colspan='2'><input type="submit" name="submit" id="" value="Submit" /></td>
      </tr>
    </table>
</form>
<?php
if(isset($_POST['submit'])){
  //var_dump($_POST);
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $db_name = $_POST['db_name'];

  mysql_connect('localhost',$username,$password);
  
  $sql = "CREATE SCHEMA $db_name;";
  mysql_query($sql);
  echo"db $db_name has been created<br>";
  
  $sql_string = file_get_contents('work_c21.sql');
  $sql_arr = explode(';', $sql_string);

  mysql_select_db($db_name) or die( "Unable to select database");
  foreach ($sql_arr as $sql) {
    mysql_query($sql);
  }
  echo 'genetrated';
}
?>
