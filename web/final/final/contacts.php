<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

 // Connects to your Database

 mysql_connect("127.0.0.1", "hughes72", "fenway25") or die(mysql_error());

 mysql_select_db("hughes72") or die(mysql_error());


 //checks cookies to make sure they are logged in

 if(isset($_COOKIE['ID_my_site']))

 {

   $username = $_COOKIE['ID_my_site'];

   $pass = $_COOKIE['Key_my_site'];

         $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

         while($info = mysql_fetch_array( $check ))

                     {

 //if the cookie has the wrong password, they are taken to the login page

if ($pass != $info['password']) {
      header("Location: login.php");
}



 //otherwise they are shown the admin area

             else

                        { ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Sports Management System</title>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml; charset=UTF-8" />
  <meta name="Author" content="Eric Dijamco, Kyle Hughes, Michael Vivona" />

  <link rel="stylesheet" type="text/css"
        href="./layout1.css"/>

</head>

<body>
<!-- if logged in this page runs instead of the html-->
<div id="wrapper">

<div id="titlebar">
<h1 id="title_bar">Sports Management System</h1>
</div>

<div id="status_bar">
</div>

<div id="navbar">
   <ul>

     <li><a href=welcome.php>Home</a></li>
     <li><a href="http://elvis.rowan.edu/~vivona70/web/final/roster.php">
                  Roster</a></li>
     <li><a href="http://elvis.rowan.edu/~vivona70/web/final/schedule.php">
                 Schedule</a></li>
     <li><a href="http://elvis.rowan.edu/~vivona70/web/final/contacts.php">
                 Contacts</a></li>
     <li><a href="http://elvis.rowan.edu/~vivona70/web/final/tickets.php">
                  Tickets</a></li>
     <li><a href="http://elvis.rowan.edu/~vivona70/web/final/logout.php">
                  Log Out</a></li>
   </ul>

</div>
<!-- information for coaches and other important people
<div id="content">
<ul>
  <li>Eric Dijamco     - dijamc24@elvis.rowan.edu</li>
  <li>Kyle Hughes      - hughes72@elvis.rowan.edu</li>
  <li>Michael Vivona   - vivona70@elvis.rowan.edu</li>
  <li>Babe Ruth        - greatBambino@sandlot.com</li>
  <li>Wilt Chamberlain - wiltStilt@hoops.com</li>
  <li>Johnny Unitas    - JUN@football.edu</li>
  <li>Derek Boogaard   - goon@puck.com</li>

</ul>
</div>

</div>

</body>

</html>

<?php

                                       }

                                         }

                                           }

 else



 //if the cookie does not exist, they are taken to the login screen

 {

 header("Location: openContacts.html");

 }

 ?>
