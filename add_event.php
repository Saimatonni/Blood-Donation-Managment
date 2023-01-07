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
   
	<label for="branch_no" >Brach No:</label>
	<select name="branch_no" style="border-radius: 10px">
		<option>Select Branch No</option>
        <?php
           /*$q=$db->query("SELECT * FROM branch");
           while ($p=$q->fetch(PDO::FETCH_OBJ)) {
              $p->branch_no;
               $p->street; 
               $p->city; 
               $p->postcode;
              echo "<option value='$branch_no'>$branch_no</option>";
           }*/
         ?>
          <?php
                $get_branch = "select * from branch";
                $run_branch = mysqli_query($con, $get_branch);
            
                while($row_branch=mysqli_fetch_array($run_branch)){
                    $branch_no = $row_branch['branch_no'];
                    $street= $row_branch['street'];
                    $city = $row_branch['city'];
                    $postcode= $row_branch['postcode'];
            
                    echo "<option value='$branch_no'>$branch_no</option>";
                }
                ?> 
		</select>
        <br /><br />

    <label for="event_date" >Event Date:</label>
	<input id="event_date" type="date" name="event_date" placeholder="******"  autofocus required />


	<br /><br />
	<input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
		<br /><br />

</div>

	</form>
	

    <?php
    if(isset($_POST['sub'])){
		$branch_no=$_POST['branch_no'];
        $event_date=$_POST['event_date'];
				$event_id=uniqid();

        $q=$db->prepare("INSERT INTO blooddonevent(event_id,branch_no,event_date) VALUES (:event_id,:branch_no,:event_date)");

        $q->bindValue('event_id',$event_id);
        $q->bindValue('branch_no',$branch_no);
        $q->bindValue('event_date',$event_date);

        if($q->execute()){

	          echo "<script>alert('Event Added Succesfull!')</script>";
              //}
        }
        else{
            echo "<script>alert('Addition Failed!')</script>";
        }
    }

    ?>

</body>
</html>