<?php
include('header/header.php');
include('header/navuser.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

<title>Blood Donation | Welcome</title>
 <link rel="stylesheet" href="./css/style.css">

<section id="boxes" align="center">
<div class="container" align="center">
  <div class="box">
    <img src="./img/donor.jpg" ALT="some text" WIDTH=80 HEIGHT=60>

      <ul style="list-style:none;">
          <li><a href="reg.php">Register as a Donor</a></li>
        </ul>

  </div>
  <div class="box">
    <img src="./img/request.jpg" ALT="some text" WIDTH=80 HEIGHT=60>
    <ul style="list-style:none;">
    <li><a href="blood_list.php">See Blood List</a></li>
  </ul>
  </div>
  <div class="box">
    <img src="./img/patient.png" ALT="some text" WIDTH=80 HEIGHT=60>

      <ul style="list-style:none;">
          <li><a href="reg2.php">Register as a patient</a></li>
        </ul>

  </div>
  <div class="box">
    <img src="./img/search.png" ALT="some text" WIDTH=90 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="search.php">Search For Blood</a></li>
	</ul>
	  </div>
      <div class="box">
    <img src="./img/event_show.jpg" ALT="some text" WIDTH=100 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="event_list.php">See Donation Event List</a></li>
	</ul>
</div>

      <div class="box">
    <img src="./img/branch_list.jpg" ALT="some text" WIDTH=100 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="branch_list.php">See Branch list</a></li>
	</ul>
</div>
</div>
 </section>
</body>
</html>
