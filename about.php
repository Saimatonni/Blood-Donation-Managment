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

<section id="">
<div class="">
  <div class=""align="center">
    <img src="./img/about.jpg" ALT="some text" WIDTH=180 HEIGHT=160>
      <ul style="list-style:none;">
          <li><a href=""><u>Blood Donation Management</u></a></li>
        </ul>
<p>Blood Donation Management  is a web based application that is designed to store, process, retrieve and analyze information concerned with the administrative and inventory management within a blood bank..</p>
  </div>

  
  <br><br>
  <div class=""align="center">
     <!-- contact section start -->
     <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact Us</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Contact Us to get in touch</div>
                    <p>To get in touch with Us mail Us through given gmail account</p>
                    <br><br>
                    
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email :</div>
                                <div class="sub-title">abcd@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="column right">
                    <div class="text">Send Us a Message</div>
                    <form action="#">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>
</div>
</section>
</html>
