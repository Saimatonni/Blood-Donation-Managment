<?php
include('header/header.php');
include('header/navadmin.php');
include('header/connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
	margin: 0px;
text-align: center;
font-size: 18px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
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
h1{
  font-size: 20px;
}
</style>
</head>
<body>
	<br>
<h1 align="center">Requested Blood List</h1>

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

<br>
<h1 align="center">Patient List</h1>

<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>ID</th>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Adress</th>
		<th>Email</th>
		<th>Phone Number</th>
  </tr>
  <?php
  $q=$db->query("SELECT * FROM patient");
  while ($p=$q->fetch(PDO::FETCH_OBJ)) {
    ?>
    <tr>
      <td><?= $p->patient_id; ?></td>
      <td><?= $p->patient_name; ?></td>
      <td><?= $p->bloodtype; ?></td>
      <td><?= $p->patient_address; ?></td>
      <td><?= $p->patient_email; ?></td>
      <td><?= $p->patient_phoneno; ?></td>
    </tr>
    <?php
  }
     ?>
</table>

<br></br>

<div class="type">
  <label style="color: #032B41"><u>Proceed a Donation</u></label>
  <br><br>
<form class="" action="" method="post">
    <label style="font-size:20px">Enter ID of Blood:</label>
  <input type="text" name="did" placeholder="ID of Donor" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
  
  &nbsp;<label style="font-size:20px">  Enter ID of Patient:</label>
  <input type="text" name="pid" placeholder="ID of Patient" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
  <br><br>
  <label style="font-size:20px">Date:</label>
  <input type="date" name="blood_date" placeholder="Date" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
  
  <label style="font-size:20px">Quantity:</label>
  <input type="number" name="quantity" placeholder="Quantity" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
  <br><br>
    <input name="sub" type="submit" value="Proceed" style="font-weight:bold;font-size: 12px; width: 90px; height: 35px;border-radius:10px;background-color:#F9054B;font-size:18px;">
<br></br>
  </form>
</div>

<?php

if(isset($_POST['sub']))
{
  $did=$_POST['did'];
  $pid=$_POST['pid'];
  $blood_date=$_POST['blood_date'];
  $quantity=$_POST['quantity'];
  $count=$db->query("SELECT count(*) FROM blood WHERE blood_id='$did'")->fetchColumn();


/*$q=$db->query("SELECT date FROM donar WHERE don_id='$did'");
$d=$q->fetchColumn();
$current=date("Y/m/d");
$month=((strtotime($current) - strtotime($d))/60/60/24)/30;
if($month<3.0)
{
echo "<script>alert('Donor not Available!')</script>";
}
else {*/
if(!$count==0){
$qd=$db->query("SELECT blood.blood_id,blood.don_id,blood.event_id,blood.blood_quantity,donar.bloodtype,donar.don_name FROM blood natural join donar WHERE blood.don_id=donar.don_id and blood_id='$did'");
$pd=$qd->fetch(PDO::FETCH_OBJ);
/*$qdon=$db->query("SELECT * FROM donar WHERE blood_id='$did'");
$pdon=$qd->fetch(PDO::FETCH_OBJ);*/
$blood_id=$pd->blood_id;
$dbloodtype=$pd->bloodtype;

$qp=$db->query("SELECT * FROM patient WHERE patient_id='$pid'");
$pp=$qp->fetch(PDO::FETCH_OBJ);
$patient_id=$pp->patient_id;
$pbloodtype=$pp->bloodtype;
//$donationid=uniqid();
//$date=$current;
 if($dbloodtype==$pbloodtype){
  $t=$db->prepare("INSERT INTO bloodpatient(patient_id,blood_id,blood_date,quantity) VALUES (:patient_id,:blood_id,:blood_date,:quantity)");
  $t->bindValue('patient_id',$patient_id);
  $t->bindValue('blood_id',$blood_id);
  $t->bindValue('blood_date',$blood_date);
  $t->bindValue('quantity',$quantity);
  

//$u=$db->prepare("UPDATE `donor` SET `date`='$date' WHERE id='$did'");

  if($t->execute()){
      echo "<script>alert('Donation Succesfull')</script>";
  }
  else{
      echo "<script>alert('Donation Failed!')</script>";
  }
}
else {
  echo "<script>alert('Blood Group not matched!')</script>";
}} 
else
{
	 echo "<script>alert('Wrong ID!')</script>";
}
}
//}
 ?>
</body>
</html>
