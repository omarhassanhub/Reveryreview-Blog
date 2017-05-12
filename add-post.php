<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <title>ReveryReview</title>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
      <script type="text/javascript" src="JScripts/time.js"></script>
   </head>
   <body onload=display_ct() onload="displayResult()">
      <div id="wrapper">
         <div id="header">
            <br /><br />
            <a href="home.html"><div class="headTitle">ReveryReview</div></a>
  
         </div>
         <div id="navigation">
            <ul class="drop_menu">
               <li><a href="home.html">Home</a></li>
               <li><a href="about.html">About</a></li>
               <li><a href="blogarticle.html">Blog Articles</a></li>
               <li><a href="faq.html">FAQs</a></li>
               <li><a href="contact.html">Contact</a></li>
               <li>
                  <a href="#">Account</a>
                  <ul>
                     <li><a href='login.php'>Login</a></li>
                     <li><a href='registration.php'>Register</a></li>
                  </ul>
               </li>
            </ul>
         </div>
         <div id="content">
            <div id="grad">&nbsp;</div>
            <div id="leftcolumn">
               <br/>
               <span id='ct' ></span>
            </div>
            <div class="add-post">
               <?php
                  include 'start.php';
                  
                  
                  $grantUser = false;
                  if (isset($_SESSION['Details']) == True) {
                      $verifyUser = $_SESSION['Details'];
                      if ($verifyUser == True) {
                          $grantUser = True;
                      }
                  }
                  if ($grantUser == False) {
                      header("Location: login.php");
                      exit;
                  }
                  ?>
               <?php
                  $verifyUser = false;
                  if (isset($_SESSION['Details']) == True) {
                      $verifyUser = $_SESSION['Details'];
                      if ($verifyUser == True) {
                          $displayUserName = "";
                          
                          $displayUserName .= "Logged in as: <b>" . $_SESSION['Username'] . "</b>, <a href=\"Include_Functions/userLogout.php\">logout</a> ";
                  		$displayUserName .= " <a href=\"Include_Functions/changeColour.php\">[Change Theme]</a>";
                          echo $displayUserName;
                      }
                  }
                  if ($verifyUser == False) {
                      echo "<a href=\"login.php\">Log in</a> | <a href=\"registration.php\">Register</a>";
                  }
                  ?>	
               <?php  include_once 'add-post-process.php';  ?>  
               <div >
                  <h2>Add a New Blog Post</h2>
               </div>
               <?php if (!empty($message)) {echo '<p class="msg">' . $message . '</p>';} ?>           
               <?php if (!empty($errors)) { ?>
               <div ><?php  display_errors($errors);  ?></div>
               <?php } ?> 
               <form action="" method="post" enctype="multipart/form-data" role="form"  class="myform" >
                  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" >      
                  <div class="labelInputArea">
                     <label>ISBN:</label>
                     <input type="number" name="isbn" size="20"  value="<?php if(isset($_POST['isbn']) ) {echo $_POST['isbn']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Title:</label>
                     <input type="text" name="title" size="20"  value="<?php if(isset($_POST['title']) ) {echo $_POST['title']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Edition:</label>
                     <input type="number" name="edition" size="20"  value="<?php if(isset($_POST['edition']) ) {echo $_POST['edition']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label class="textBold">Author</label>
                  </div>
                  <div class="labelInputArea">
                     <label>First Name:</label>
                     <input type="text" name="first" size="20"  value="<?php if(isset($_POST['first']) ) {echo $_POST['first']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Middle Name:</label>
                     <input type="text" name="middle" size="20"  value="<?php if(isset($_POST['middle']) ) {echo $_POST['middle']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Last Name:</label>
                     <input type="text" name="last" size="20"  value="<?php if(isset($_POST['last']) ) {echo $_POST['last']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label class="textBold">Published Date</label>
                  </div>
                  <div class="labelInputArea">
                     <label>Day:</label>
                     <input type="number" name="day" size="20"  value="<?php if(isset($_POST['day']) ) {echo $_POST['day']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Month:</label>
                     <input type="number" name="month" size="20"  value="<?php if(isset($_POST['month']) ) {echo $_POST['month']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Year:</label>
                     <input type="number" name="year" size="20"  value="<?php if(isset($_POST['year']) ) {echo $_POST['year']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Type:</label>
                     <input type="text" name="type" size="20"  value="<?php if(isset($_POST['type']) ) {echo $_POST['type']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Price:</label>
                     <input type="number" name="price" size="20"  value="<?php if(isset($_POST['price']) ) {echo $_POST['price']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label class="textBold">Contributor</label>
                  </div>
                  <div class="labelInputArea">
                     <label>First Name:</label>
                     <input type="text" name="contFirst" size="20"  value="<?php if(isset($_POST['contFirst']) ) {echo $_POST['contFirst']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Middle Name:</label>
                     <input type="text" name="contMiddle" size="20"  value="<?php if(isset($_POST['contMiddle']) ) {echo $_POST['contMiddle']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Last Name:</label>
                     <input type="text" name="contLast" size="20"  value="<?php if(isset($_POST['contLast']) ) {echo $_POST['contLast']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Posted Date:</label>
                     <input type="text" name="postedDate" size="20"  value="<?php if(isset($_POST['postedDate']) ) {echo $_POST['postedDate']; }?>" />
                  </div>
                  <div class="labelInputArea">
                     <label>Upload new image:</label>              
                     <input  type="file" name="bookImage" value="<?php if(isset($_POST['bookImage']) ) {echo $_POST['bookImage']; } ?>"  id="bookImage">
                     <br/><span><small>Acceptable image formats: jpg and png.</small></span> 
                  </div>
                  <div class="labelInputArea">
                     <label class="textBold">Write the Content of your Article:</label>
                  </div>
                  <div class="labelInputArea"> 
                     <label>Paragraph 1:</label>
                     <textarea  rows="7"  name="first-para" value=""><?php if(isset($_POST['first-para']) ) { echo $_POST['first-para']; } ?></textarea>
                  </div>
                  <div class="labelInputArea">
                     <label>Paragraph 2:</label>
                     <textarea name="second-para" rows="7"    value=""><?php if(isset($_POST['second-para']) ) {echo $_POST['second-para']; } ?></textarea>
                  </div>
                  <br/>
                  <input type="submit" name="submit" value="Submit Post" > <br/>       
               </form>
            </div>
         </div>
         <div id="footer">
            <p>Copyright &#64 2014 by Omar Hassan</p>
         </div>
      </div>
   </body>
</html>