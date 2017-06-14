<ul>
<?php
$i = 0;
echo "<table id='main_table'>";
foreach ($products as $c) {
  $class=($i%2 == 0)?'even':'odd';
  echo "<tr class='$class'>";
  echo "  <td>$c->name</td>";
  echo "  <td>$c->price</td>";
  echo "</tr>";
  $i++;
}
echo "</table>";
?>
</ul>
