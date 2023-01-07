<?php
include('header/header.php');
include('header/navadmin.php');?>
<!DOCTYPE html>
<html>
<section id="boxes">
<div class="container">
  <div class="box">
    <img src="./img/donor.jpg" ALT="some text" WIDTH=80 HEIGHT=60>

      <ul style="list-style:none;">
          <li><a href="reg.php">Add Donor</a></li>
        </ul>

  </div>
  <div class="box">
    <img src="./img/request.jpg" ALT="some text" WIDTH=80 HEIGHT=60>
    <ul style="list-style:none;">
    <li><a href="blood_request.php">Request for Blood</a></li>
  </ul>
  </div>
  <div class="box">
    <img src="./img/delete.png" ALT="some text" WIDTH=80 HEIGHT=60>
    <ul style="list-style:none;">
  <li><a href="delete.php">Delete Donor/Patient</a></li>
</ul>
  </div>
<br><br><br>
<div class="box">
  <img src="./img/patient.png" ALT="some text" WIDTH=90 HEIGHT=70>
  <ul style="list-style:none;">
<li><a href="reg2.php">Add Patient</a></li>
</ul>
  </div>
	<div class="box">
    <img src="./img/donorlist.png" ALT="some text" WIDTH=90 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="donorlist.php">Donor List</a></li>
	</ul>
	  </div>
    <div class="box">
  		<img src="./img/patientlist.png" ALT="some text" WIDTH=90 HEIGHT=70>
  		<ul style="list-style:none;">
  	<li><a href="patientlist.php">Patient List</a></li>
  	</ul>
  	  </div>
      <div class="box">
    <img src="./img/branch.png" ALT="some text" WIDTH=100 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="add_branch.php">Add Branch</a></li>
	</ul>
</div>
</div>
      <div class="box">
    <img src="./img/branch_list.jpg" ALT="some text" WIDTH=100 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="branch_list.php">Branch list</a></li>
	</ul>
</div>
</div>
      <div class="box">
    <img src="./img/event.jpg" ALT="some text" WIDTH=100 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="add_event.php">Add Blood Donation Event</a></li>
	</ul>
</div>
</div>
      <div class="box">
    <img src="./img/search.png" ALT="some text" WIDTH=100 HEIGHT=70>
  	<ul style="list-style:none;">
  <li><a href="event_list.php">See Donation Event List</a></li>
	</ul>
</div>
      <br><br>
</div>
</section>
</html>
