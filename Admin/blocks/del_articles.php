                   <br><br><form action="handler.php" method="post"> 
                   <input type="hidden" name="handler"  id="handler" value="del_article"/>
                   <?php 
                   $result = mysql_query("SELECT title, id, img FROM articles",$db);
                   $myrow = mysql_fetch_array($result);
                   do 
                   {
                   printf ("<p><input name='id' type='radio' value='%s'>
                            <lable>%s</lable></p>
                            <input name='img_src' type='hidden' value='%s'>",
                            $myrow["id"],$myrow["title"],$myrow["img"]);
                   }
                   while ($myrow = mysql_fetch_array($result));
                   ?>
                   <br>
                   <p><input name="submit" type="submit" value="Видалити"></p>
                   </form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>