<?php
session_start();
include('header/header.php');
include('header/connection.php');
include('header/navadmin.php');

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



<h1 align="center">Add a Brach</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733" method="post"> 
<div class="reg">
   
	<label for="street">Street:</label>
	<textarea name="street" id="street" placeholder="............." cols="35" rows="1"></textarea>
	<br /><br />

	<label for="city">City:</label>
	<textarea name="city" id="city" placeholder="..............." cols="35" rows="1"></textarea>
	<br /><br />

	<label for="postcode" >Postcode:</label>
	<input id="postcode" type="text" name="postcode" placeholder="******"  autofocus required />


	<br /><br />
	<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
		<br /><br />

</div>

	</form>
	

    <?php
    if(isset($_POST['sub'])){
		$street=$_POST['street'];
        $city=$_POST['city'];
        $postcode=$_POST['postcode'];
				$branch_no=uniqid();

        $q=$db->prepare("INSERT INTO branch (branch_no,street,city,postcode) VALUES (:branch_no,:street,:city,:postcode)");

        $q->bindValue('branch_no',$branch_no);
        $q->bindValue('street',$street);
        $q->bindValue('city',$city);
        $q->bindValue('postcode',$postcode);

        if($q->execute()){

	          echo "<script>alert('Branch Added Succesfull!')</script>";
              //}
        }
        else{
            echo "<script>alert('Addition Failed!')</script>";
        }
    }

    ?>

</body>
</html>