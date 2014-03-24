<?php
require 'con_config.php' ;
require '                         ' ;
$result = mysqli_query("SELECT * FROM pwdreset");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Batch</th>
 <th>Branch</th>
<th>Programme</th>
<th>Sex</th>
<th>DOB</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['batch'] . "</td>";
  echo "<td>" . $row['programme'] . "</td>";
echo "<td>" . $row['branch'] . "</td>";
  echo "<td>" . $row['sex'] . "</td>";
echo "<td>" . $row['dob'] . "</td>";
 
  echo "</tr>";
  }
echo "</table>";

$result1 = mysqli_query("SELECT * FROM alumni");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Batch</th>
 <th>Branch</th>
<th>Programme</th>
<th>Sex</th>
<th>DOB</th>
</tr>";

while($row = mysqli_fetch_array($result1))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['batch'] . "</td>";
  echo "<td>" . $row['programme'] . "</td>";
echo "<td>" . $row['branch'] . "</td>";
  echo "<td>" . $row['sex'] . "</td>";
echo "<td>" . $row['dob'] . "</td>";
 
  echo "</tr>";
  }
echo "</table>";
echo "Allow Reset Password ? " ;
$var = GET[$var] ;
if($var==true) { $row[approval] = true ; }
?>