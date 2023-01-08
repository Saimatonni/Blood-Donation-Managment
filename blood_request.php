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



<h1 align="center">Add Blood</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733" method="post"> 
<div class="reg">
   
	<label for="don_id" >Donation Id:</label>
	<select name="don_id" style="border-radius: 10px">
		<option>Select Donation Id</option>
          <?php
                $get_don = "select don_id from donar";
                $run_don = mysqli_query($con, $get_don);
            
                while($row_don=mysqli_fetch_array($run_don)){
                    $don_id = $row_don['don_id'];
                   // $street= $row_branch['street'];
                    //$city = $row_branch['city'];
                   // $postcode= $row_branch['postcode'];
            
                    echo "<option value='$don_id'>$don_id</option>";
                }
                ?> 
		</select>
        <br /><br />
        <label for="event_id" >Event Id:</label>
	    <select name="event_id" style="border-radius: 10px">
		<option>Select Event Id</option>
          <?php
                $get_event = "select event_id from blooddonevent";
                $run_event = mysqli_query($con, $get_event);
            
                while($row_event=mysqli_fetch_array($run_event)){
                    $event_id = $row_event['event_id'];
                   // $street= $row_branch['street'];
                    //$city = $row_branch['city'];
                   // $postcode= $row_branch['postcode'];
            
                    echo "<option value='$event_id'>$event_id</option>";
                }
                ?> 
		</select>
        <br /><br />

    <label for="blood_quantity" >Blood Quantity:</label>
	<input id="blood_quantity" type="number" name="blood_quantity" placeholder="******"  autofocus required />


	<br /><br />
	<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
		<br /><br />

</div>

	</form>
	

    <?php
    if(isset($_POST['sub'])){
		$don_id=$_POST['don_id'];
        $event_id=$_POST['event_id'];
        $blood_quantity=$_POST['blood_quantity'];
				$blood_id=uniqid();

        $q=$db->prepare("INSERT INTO blood(blood_id,don_id,event_id,blood_quantity) VALUES (:blood_id,:don_id,:event_id,:blood_quantity)");

        $q->bindValue('blood_id',$blood_id);
        $q->bindValue('don_id',$don_id);
        $q->bindValue('event_id',$event_id);
        $q->bindValue('blood_quantity',$blood_quantity);

        if($q->execute()){

	          echo "<script>alert('Requested Succesfull!')</script>";
              //}
        }
        else{
            echo "<script>alert('Request Failed!')</script>";
        }
    }

    ?>

</body>
</html>