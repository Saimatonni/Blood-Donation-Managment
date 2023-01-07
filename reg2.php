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

<head>
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
			text-align:center;
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
			margin-left:530px;
		}
	</style>
</head>
<body>


	</ul>



<h1 align="center">Patient Registration</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733 "class="reg" method="post"> <!--Registration Form-->
		
		<label for="patient_name" >Full Name:</label>
	<input id="patient_name" type="text" name="patient_name" placeholder="Full Name"  autofocus required />

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
	<label for="patient_address">Address:</label>
	<textarea name="patient_address" id="patient_address" placeholder="Please include your Division & City" cols="35" rows="2"></textarea>
	<br /><br />

	<label for="patient_email">Email:</label>
	<textarea name="patient_email" id="patient_email" placeholder="*******@gmail.com" cols="35" rows="2"></textarea>
	<br /><br />

	<label for="patient_phoneno">Phone Number:</label>
	<input id="patient_phoneno" type="tel" name="patient_phoneno"placeholder="+8801********" required />


	<br /><br />
	<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
		<br /><br />

	</form>


    <?php
	if(isset($_POST['sub'])){
        $patient_name=$_POST['patient_name'];
        $bloodtype=$_POST['bloodtype'];
		$patient_address=$_POST['patient_address'];
        $patient_email=$_POST['patient_email'];
        $patient_phoneno=$_POST['patient_phoneno'];
				$patient_id=uniqid();

        $q=$db->prepare("INSERT INTO patient(patient_id,patient_name,bloodtype,patient_address,patient_email,patient_phoneno) VALUES (:patient_id,:patient_name,:bloodtype,:patient_address,:patient_email,:patient_phoneno)");

        $q->bindValue('patient_id',$patient_id);
        $q->bindValue('patient_name',$patient_name);
        $q->bindValue('bloodtype',$bloodtype);
        $q->bindValue('patient_address',$patient_address);
        $q->bindValue('patient_email',$patient_email);
        $q->bindValue('patient_phoneno',$patient_phoneno);

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
