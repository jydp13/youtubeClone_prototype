<?php $l=20;
       $m=50;?>
<!doctype html>
  <html>
    <head>
      <title>Youtube</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    
      <table>
         <tr>
          <td><a href="public_html/index.php"><img src="icon/logo.png" alt="logo" width="40" height="40"></img></a></td><?php for ($i=1;$i<=$m;$i++){echo '<td></td>';}?>
          <td><a href="public_html/index.php?category=educational"><h3>Educational</h3></a></td><?php for ($i=1;$i<=$l;$i++){echo '<td></td>';}?>
          <td><a href="public_html/index.php?category=entertainment"><h3>Entertainment</h3></a></td><?php for ($i=1;$i<=$l;$i++){echo '<td></td>';}?>
          <td><a href="public_html/index.php?category=live"><h3>Live</h3></a></td><?php for ($i=1;$i<=$l;$i++){echo '<td></td>';}?>
          <td><a href="public_html/index.php?category=account"><h3>Account</h3></a></td><?php for ($i=1;$i<=2*$m+10;$i++){echo '<td></td>';};?>
          <td><a href="public_html/index.php?category=search"><img src="../icon/search.png" alt="search_logo" width="30" height="30"></img></a></td>
          </div>
        </tr>
      </table>
