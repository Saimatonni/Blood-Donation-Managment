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

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="icon" href="icon/reg.png" />
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
	<style type="text/css">

        label { display: inline-block; width: 130px; text-align: center; }

		ul{
			margin:0px;
			padding:0px;
			list-style: none;
		}
		ul li{
			float:left;
			width:220px;
			height:40px;
			background-color:#27ae60;
			opacity:.8;
			line-height: 40px;

			font-size:20px;
			margin-right:2px;
		}

		ul li a{
			text-decoration: none;
			color:black;
			text-transform: uppercase;
			font-weight: bold;
			display:block;
		}
		ul li a:hover{
			background-color:red;
		}
		ul li ul li{
			display:none;
		}
		ul li:hover ul li{
			display:block;
		}

		.reg{
			margin-left: 500px;;
		}


	</style>
</head>
<body>


	</ul>



<h1 align="center">Search For Blood:</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733" method="post"> 
<div class="reg">
   
	<label>Blood Group:</label>

<select name="bloodtype" style="border-radius: 10px">
    <option>Select</option>
    <option>A+</option>
    <option>A-</option>
    <option>B+</option>
    <option>B-</option>
    <option>AB+</option>
    <option>AB-</option>
    <option>O+</option>
    <option>O-</option>

    </select>

<br /><br />
	<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		

</div>

	</form>
	

    <?php
    if(isset($_POST['sub'])){
        ?>
        <br>
        <h1 align="center"a>Blood List</h1>
    
         <table id="customers" style="margin: 0px auto;">
         <tr>
        <th>Blood Id</th>
        <th>Donar Id</th>
        <th>Event Id</th>
        <th>Blood Quantity</th>
        <th>Blood Type</th>
        </tr>
        <?php
		$bloodtype=$_POST['bloodtype'];
        $sql="SELECT blood.blood_id,blood.don_id,blood.event_id,blood.blood_quantity,donar.bloodtype FROM blood natural join donar where blood.don_id=donar.don_id AND bloodtype='{$bloodtype}' order by rand() limit 10";
        $result=mysqli_query($con,$sql) or die("query unsuccessful.");
        if(mysqli_num_rows($result)>0)   {
        while($row = mysqli_fetch_assoc($result)) {
            ?>
   
    <?php
//$q=$db->query("SELECT blood.blood_id,blood.don_id,blood.event_id,blood.blood_quantity,donar.bloodtype FROM blood natural join donar where blood.don_id=donar.don_id AND bloodtype='{$bloodtype}' order by rand() limit 10");
   //while ($p=$q->fetch(PDO::FETCH_OBJ)) {
   // while($row = mysqli_fetch_assoc($result)) {
	?>
  <tr>
      <td><?php  echo $row['blood_id']; ?></td>
      <td><?php  echo $row['don_id']; ?></td>
      <td><?php  echo $row['event_id']; ?></td>
      <td><?php  echo $row['blood_quantity']; ?></td>
      <td><?php  echo $row['bloodtype']; ?></td>
    </tr>
    <?php
       // }
    }
    }
    else
{

    echo '<h3 align="center"a>No Donor Found For your search Blood group</h3>';

}
}

    ?>

</body>
</html>