<?php
 $sql = 'SELECT id,user_id,content FROM gallery ORDER BY id';
 $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
 
 echo "<div id='wrapper'>";
 while($data = mysql_fetch_assoc($req))
 {
 // on affiche les informations de l'enregistrement en cours
 echo "<div class='img'>";
 echo '<h2><a title="'.$data['id'].'" href="page.php?id='.$data['id'].'">'.$data['nom'].'</a></h2>';
 echo "<img src='".$dir.$data['content']."'width=200 height=150/>";
 echo "<br> <br>";
 echo "</div>";
 
 } ;
 echo "<div class='spacer'></div>";
 echo "</div>";
 mysql_close($link);