      <br><br><form action="handler.php" method="post"> 
                   <input type="hidden" name="handler"  id="handler" value="del_desc"/>
                   <?php 
                   $result = mysqli_query($db, "SELECT title, id, img FROM news_desc");
                   while( $myrow = mysqli_fetch_assoc($result) )
		       { 
                   printf ("<p><input name='id' type='radio' value='%s'>
                            <lable>%s</lable></p>
                            <input name='img_src' type='hidden' value='%s'>",
                            $myrow["id"],$myrow["title"],$myrow["img"]);
                   } 
                   mysqli_free_result($result); 
                   ?>
                   <br>
                   <p><input name="submit" type="submit" value="Видалити"></p>
                   </form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>