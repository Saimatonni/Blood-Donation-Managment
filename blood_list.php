<?php
session_start();
include('header/header.php');
include('header/connection.php');
if(isset($_SESSION['loggedin'])==true){
	include('header/navadmin.php');
}
else {
	include('header/navuser.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
	margin: 5px;
text-align: center;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 18px;

}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #FF5733;
  color: white;
}
</style>
</head>
<body>
	<br>
    <h1 align="center">Blood List</h1>

<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>Blood Id</th>
    <th>Donar Id</th>
    <th>Event Id</th>
    <th>Blood Quantity</th>
    <th>Blood Type</th>
  </tr>
	<?php
$q=$db->query("SELECT blood.blood_id,blood.don_id,blood.event_id,blood.blood_quantity,donar.bloodtype FROM blood natural join donar where blood.don_id=donar.don_id");
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
	?>
  <tr>
      <td><?= $p->blood_id; ?></td>
      <td><?= $p->don_id; ?></td>
      <td><?= $p->event_id; ?></td>
      <td><?= $p->blood_quantity; ?></td>
      <td><?= $p->bloodtype; ?></td>
    </tr>
    <?php
}
	 ?>
</table>
</body>
</html>