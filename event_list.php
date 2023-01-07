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
<h1 align="center">Event List</h1>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>Event Id</th>
    <th>Branch No</th>
    <th>Event Date</th>
  </tr>
	<?php
  $q=$db->query("SELECT * FROM blooddonevent");
  while ($p=$q->fetch(PDO::FETCH_OBJ)) {
    ?>
    <tr>
      <td><?= $p->event_id; ?></td>
      <td><?= $p->branch_no; ?></td>
      <td><?= $p->event_date; ?></td>
    </tr>
    <?php
  }
     ?>

</table>
</body>
</html>