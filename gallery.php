<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Галерея</title>
<?php include ("blocks/links.php"); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<!-- JS ================================================== -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.custom.js"></script>
<script type="text/javascript">
 $(window).load(function(){
   document.getElementById("main_nav").className      = '';
   document.getElementById("about_nav").className     = '';
   document.getElementById("gallery_nav").className   = 'active';
   document.getElementById("dijaln_nav").className    = '';
   document.getElementById("partners_nav").className  = '';
   document.getElementById("rekvisits_nav").className = '';    
});
</script>

</head>

<body class="home">
    <!-- Color Bars (above header)-->
  <div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>    
    <div class="container">    
       <?php include ("blocks/header.php"); ?>
       <div class="row"><!-- Begin Headline -->     
          <div class="span12">
             <h5 class="title-bg" style="font-size:30px">Галерея</h5>
             <div class="row clearfix">
                <ul class="gallery-post-grid holder">
                
                    <?php                  
                       $result = mysqli_query($db,"SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM news order by date_ desc");
                       while( $myrow = mysqli_fetch_assoc($result) )
		               {          
                         printf (" 
                                  <li  class='span3 gallery-item' data-id='id-%' data-type='illustration'>
                                      <span class='gallery-hover-4col hidden-phone hidden-tablet'>
                                          <span class='gallery-icons'>
                                              <a href='%s' class='item-zoom-link lightbox' title='%s' data-rel='prettyPhoto'></a>
                                              <a href='photo.php?id=%s' class='item-details-link'></a>
                                          </span>
                                      </span>
                                      <a href='photo.php?id=%s'><img src='%s' alt='Gallery'></a>
                                      <span class='project-details'><a href='photo.php?id=%s'>%s</a></span>
                                      <span class='project-details'>%s: </a>%s</span>
                                  </li>", $myrow['id'], $myrow['img'], $myrow['title'], $myrow['id'], $myrow['id'], $myrow['img'], $myrow['id'], 
                                  $myrow['title'], $myrow['author'], $myrow['eurodate'] );      
                       }
                       mysqli_free_result($result);
                 ?> 
                    <!-- Gallery Item 12 -->
                   <!--  <li class="span3 gallery-item" data-id="id-12" data-type="illustration video">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet">
                            <span class="gallery-icons">
                                <a href="img/gallery/gallery-img-1-full.jpg" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                                <a href="gallery-single.htm" class="item-details-link"></a>
                            </span>
                        </span>
                        <a href="gallery-single.htm"><img src="img/gallery/gallery-img-1-4col.jpg" alt="Gallery"></a>
                        <span class="project-details"><a href="gallery-single.htm">Branding Design</a>For an international add campaign.</span>
                    </li> -->

                </ul>
              </div>

              <!-- Pagination -->
              <div class="pagination">
                <ul>
                <li class="active"><a href="#">Prev</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
                </ul>
              </div>


             
          </div>        
       </div><!-- End Headline -->
    </div> <!-- End Container -->

    <!-- Footer Area  ================================================ -->
    <?php include ("blocks/footer.php"); ?>
  <!-- End Footer --> 





    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Вгору</div>
    
</body>
</html>
