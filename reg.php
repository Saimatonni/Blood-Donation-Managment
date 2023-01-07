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



<h1 align="center">Donor Registration</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733" method="post"> 
<div class="reg">
   
	<label for="don_name" >Full Name:</label>
	<input id="don_name" type="text" name="don_name" placeholder="Full Name"  autofocus required />

	<br /><br />

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
	<label for="don_address">Address:</label>
	<textarea name="don_address" id="don_address" placeholder="Please include your Division & City" cols="35" rows="2"></textarea>
	<br /><br />

	<label for="don_email">Email:</label>
	<textarea name="don_email" id="don_email" placeholder="*******@gmail.com" cols="35" rows="2"></textarea>
	<br /><br />

	<label for="don_phoneno">Phone Number:</label>
	<input id="don_phoneno" type="tel" name="don_phoneno"placeholder="+8801********" required />


	<br /><br />
	<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
		<br /><br />

</div>

	</form>
	

    <?php
    if(isset($_POST['sub'])){
        $don_name=$_POST['don_name'];
        $bloodtype=$_POST['bloodtype'];
		$don_address=$_POST['don_address'];
        $don_email=$_POST['don_email'];
        $don_phoneno=$_POST['don_phoneno'];
				$don_id=uniqid();

        $q=$db->prepare("INSERT INTO donar(don_id,don_name,bloodtype,don_address,don_email,don_phoneno) VALUES (:don_id,:don_name,:bloodtype,:don_address,:don_email,:don_phoneno)");

        $q->bindValue('don_id',$don_id);
        $q->bindValue('don_name',$don_name);
        $q->bindValue('bloodtype',$bloodtype);
        $q->bindValue('don_address',$don_address);
        $q->bindValue('don_email',$don_email);
        $q->bindValue('don_phoneno',$don_phoneno);

        if($q->execute()){

	          echo "<script>alert('Registration Succesfull!')</script>";
              //}
        }
        else{
            echo "<script>alert('Registration Failed!')</script>";
        }
    }

    ?>

</body>
</html>
