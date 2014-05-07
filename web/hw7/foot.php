<!-- foot.php - include for a footer -->

<p>
Things you can do with the movie database: <br>
<a href="./add.php">Add</a>
<a href="./delete.php">Remove</a>
<a href="./search.php">Search</a>
<a href="./movies.php">Show Movies</a>
<a href="./players.php">Show Actors</a>
</p>

<hr>
This file ("<?php echo basename($_SERVER["PHP_SELF"]) ?>") was last modified at:<i>
<?php
    echo strftime("%A, %e %B %Y, %I:%M:%S %p",
                  filemtime ( basename ($_SERVER["PHP_SELF"])));
?>
<br>
<br>
 Valid:
      <a href="http://validator.w3.org/check/referer">HTML5</a>
      <a
      
href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
      CSS3</a>


  Tests:
         <a href =" ./opera1.png">Opera</a>
          <a href="./safari1.png">Safari</a>
          <a href="./w3m1.png">W3M</a>
          <a href="./lynx1.png">Lynx</a>


</i>
