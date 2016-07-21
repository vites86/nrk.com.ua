<div class='span12'>
           <!--  <h5 class='title-bg'>Швидкий зв'язок  -->
                <!-- <small>That we are most proud of</small> -->
               <!--  <button class='btn btn-mini btn-inverse hidden-phone' type='button'>Надіслати</button>
            </h5> -->
    	
        <!-- News Thumbnails   ================================================== -->
        <h5 class='title-bg' style='font-size:30px'>Останні статті</h5>
            <div >
             <ul class='popular-posts'>
               <!-- <ul class='gallery-post-grid holder'> -->
                <?php                  
                       $result = mysql_query("SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM articles order by date_ desc limit 3",$db);
                       $myrow = mysql_fetch_array ($result);
                       do {         
                            printf (" 
                            <li>
                            <a href='articles.php?id=%s'><img src='%s' alt='%s'></a>
                               <h5><a href='articles.php?id=%s'>%s</a></h5>
                               <span ><a style='h7' href='articles.php?id=%s'>%s</a></span><br><br>
                               <em style='margin-top:25px'>Автор: %s</em><br>
                               <em style='margin-top:25px'>Дата: %s</em>
                            </li>", $myrow['id'], $myrow['img'], $myrow['title'], $myrow['id'], $myrow['title'], $myrow['id'], $myrow['description'], 
                                   $myrow['author'], $myrow['eurodate'] );      
                           }
                       while ($myrow = mysql_fetch_array($result));
                 ?> 
               </ul>
            </div>
</div>