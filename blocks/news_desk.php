<div class="span12">
           <!--  <h5 class="title-bg">Швидкий зв'язок  -->
                <!-- <small>That we are most proud of</small> -->
               <!--  <button class="btn btn-mini btn-inverse hidden-phone" type="button">Надіслати</button>
            </h5> -->
    	
        <!-- News Thumbnails   ================================================== -->
        <h5 class="title-bg" style="font-size:30px">Дошка оголошень</h5>
            <div >
             <ul class='popular-posts'>
               <!-- <ul class='gallery-post-grid holder'> -->
                <?php                  
                       $result = mysqli_query($db,"SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM news_desc order by date_ desc limit 2");
                       while( $myrow = mysqli_fetch_assoc($result) )
		               {          
                            printf (" 
                            <li>
                            <a href='news_desc.php?id=%s' target='_blank'><img src='%s' alt='%s'></a>
                               <h5><a href='news_desc.php?id=%s' target='_blank'>%s</a></h5>
                               <span ><a style='h7' href='articles.php?id=%s' target='_blank'>%s</a></span><br><br>
                               <em style='margin-top:25px'>Автор: %s</em><br>
                               <em style='margin-top:25px'>Дата: %s</em>
                            </li>", $myrow['id'], $myrow['img'], $myrow['title'], $myrow['id'], $myrow['title'], $myrow['id'], $myrow['description'], 
                                   $myrow['author'], $myrow['eurodate'] );      
                       }
                       mysqli_free_result($result); 
                 ?> 
               </ul>
            </div>
</div>