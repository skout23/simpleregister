 <?php include('function.php');?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
   <head>

         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
         <title>Registration Page</title>
         <link href="style/style.css" rel="stylesheet" type="text/css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script  type='text/javascript'>
   $(document).ready(function(){    
   $(".submit").hover(       
   function() {
      $(this).attr("src","img/submithover.png");},        
   function() {
      $(this).attr("src","img/submit.png");   
 });
});
 </script>

 
   </head>
 <body>
        <!-- Start of logo div -->

           <div id="logo">
                <p> SERVERNAME </p>
                   </div>
                 <!-- End of logo div -->


           <!-- Start of content div -->

             <div id="content">
                
                 <h1> ATTENTION USERS </h1> 
               <p>&copy; Copyright SERVERNAME.  Images and Trademarks belong to their respective owners. All Rights Reserved.</p>
           <p>Coded and designed by <a href="http://www.ac-web.org/forums/member.php?u=215792">Napoleon</a>.</p>
		   <p>Edited by <a href="http://www.ac-web.org/forums/member.php?u=202557">Joorkataa</a></p>
       <p>SRP6 added by <a href="http://www.ac-web.org/forums/member.php?u=339907">SegaFan</a></p>
       <p>How to set your <a href="https://www.wikihow.com/Set-a-Realmlist-for-World-of-Warcraft">Realmlist and get Connected</a></p>
             </div>
            <!-- End of content div -->

           <!-- Start of registration_boxes div -->
  
                <div id="registration_boxes">
				<div style="position:absolute; margin-top:-80px; margin-left:50px;"><?php if($_GET['do']=="register") { Register();}elseif($_GET['error']) { Error("".$_GET['error']."");}else{ ?></div>
				
				
                <FORM ACTION="?do=register" METHOD="POST">
                 <p CLASS="Username"> Desired Username </p> 
                  <div class="usernameform"> <INPUT name="user" type="text" value="Username" id="login" onFocus="this.value=''" /> </div>
                   <p CLASS="Username"> Desired Password </p>
                    <div class="usernameform"> <INPUT name="password" type="password" value="Passwords" onFocus="this.value=''" /> </div>
                      

<p CLASS="Username"> Expansion: </p> 
<div class="usernameform"><select style="margin-left:5px; margin-top:5px; height:30px; width:230px; color:#000000;  -moz-border-radius: 5px; border-radius: 5px;" id="sales" name="flags">
<option value="0">Vanilla</option>
<option value="8">Burning Crusade</option>
<option value="24">Lich King</option>
</select></div>
					  

<p CLASS="Username"> Core: </p> 
<div class="usernameform"><select style="margin-left:5px; margin-top:5px; height:30px; width:230px; color:#000000;  -moz-border-radius: 5px; border-radius: 5px;" id="sales" name="account_table">
<option value="srp">CMaNGOS after July 2019</option>
<option value="sha">ANYTHING ELSE!... that I know of</option>
</select></div>
                        <INPUT TYPE="image" SRC="img/submit.png" type="submit" value=" " id="button" ALT="Create your in-game account" CLASS="submit" STYLE="margin-left:25px;">
                    </FORM>
					
					<?php }?>
					</div>

             <!-- End of registration_boxes div -->
  </body>
 </html>