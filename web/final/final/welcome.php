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

<div id="wrapper">

<div id="titlebar">
<h1 id="title_bar">Sports Management System</h1>
</div>

<div id="navbar">
   <ul>

     <li><a href="welcome.php">Home</a></li>
     <li><a href="roster.php">Roster</a></li>
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
<div id="content">
<div id="picture">
<p style="color:#fff"> Welcome to the Sports Management System.</p>
<p style="color:#fff">Need a place to manage your sports team? This is the
place to go!</p>
<p style="color:#fff"> Managers must be logged in to edit the teams
information.<br>
However
anyone may view the schedule, search for a certain player,<br> and view
the
teams roster </p><br>
 <p style="color:#fff"> Keep track of your teams schedule by using google
calendar.<br> Also add your players to your roster and remove if
necessary.<br>
Tickets may be purchased as well!</p>
<img
src="http://www.westlionsroar.com/wp-content/uploads/2012/11/sports-matter.jpg"
alt="Sports" width="380" height="285">
</div>

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

 header("Location: index.html");

 }

 ?> 
