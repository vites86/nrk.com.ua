<div class="span12">
           <!--  <h5 class="title-bg">Швидкий зв'язок  -->
                <!-- <small>That we are most proud of</small> -->
               <!--  <button class="btn btn-mini btn-inverse hidden-phone" type="button">Надіслати</button>
            </h5> -->
      
        <!-- News Thumbnails   ================================================== -->
        <h5 class="title-bg" style="font-size:30px">Останні новини</h5>
            <div class="row clearfix no-margin">
               <ul class="gallery-post-grid holder">
                <?php                  
                       $result = mysql_query("SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM news order by date_ desc limit 4",$db);
                       $myrow = mysql_fetch_array ($result);
                       do {         
                       printf (" 
                                  <li  class='span3 gallery-item' data-id='id-%' data-type='illustration'>
                                      <span class='gallery-hover-4col hidden-phone hidden-tablet'>
                                          <span class='gallery-icons'>
                                              <a target='_blank' href='%s' class='item-zoom-link lightbox' title='%s' data-rel='prettyPhoto'></a>
                                              <a target='_blank' href='news.php?id=%s' class='item-details-link'></a>
                                          </span>
                                      </span>
                                      <a href='news.php?id=%s' target='_blank'><img src='%s' alt='Gallery'></a>
                                      <span class='project-details'><a href='news.php?id=%s' target='_blank'>%s</a></span>
                                      <span class='project-details'>%s: %s</span>
                                  </li>", $myrow['id'], $myrow['img'], $myrow['title'], $myrow['id'], $myrow['id'], $myrow['img'], $myrow['id'], 
                                  $myrow['title'], $myrow['author'], $myrow['eurodate'] );      
                           }
                       while ($myrow = mysql_fetch_array($result));
                 ?> 
               </ul>
            </div>
</div>