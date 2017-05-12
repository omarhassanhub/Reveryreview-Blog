<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <title>ReveryReview</title>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
      <script type="text/javascript" src="JScripts/login.js"></script>
   </head>
   <body onload="displayResult()">
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
            </div>
            <div id="loginForm">
               <div class="textAlign">
                  <p><a href="registration.php">Register</a> | <a href="login.php">Login</a></p>
                  <h2>Login Form</h2>
               </div>
               <form name="loginform" id = "login" method="post" action="Include_Functions/login.php" onsubmit="return validateform()" >
                  <div class="labelInputArea">
                     <label for="Username" class="lable">Username:</label>
                     <input name="logUsername" type="text" value="" />
                  </div>
                  <div class="labelInputArea">
                     <label for="Password" class="lable">Password:</label>
                     <input name="logPassword" type="password" value="" />
                  </div>
                  <br />
                  <input type="submit" value="Login" name="submit" />
               </form>
            </div>
         </div>
         <div id="footer">
            <p>Copyright &#64 2014 by Omar Hassan</p>
         </div>
      </div>
   </body>
</html>