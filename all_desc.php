<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Оголошення</title>
<?php include ("blocks/links.php"); ?>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<!-- JS ================================================== -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.custom.js"></script>
<script type="text/javascript">
$(document).ready(function () {
     $(window).load(function(){  
  
   
    $("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });

   document.getElementById("desc_nav").className = 'active';
   document.getElementById("main_nav").className      = '';
   document.getElementById("about_nav").className     = '';
   document.getElementById("gallery_nav").className   = '';
   document.getElementById("dijaln_nav").className    = '';
   document.getElementById("partners_nav").className  = '';
   document.getElementById("rekvisits_nav").className = '';
   document.getElementById("news_nav").className = '';
    
});

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
    });  
});
</script>
</head>

<body class="home">
    <!-- Color Bars (above header)-->
    <div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>
    
    <div class="container">
    
    <?php include ("blocks/header.php"); ?>
    <!--  <p class="lead">Змiцнення обороноздатностi, пiдтримка незалежностi та цiлостностi, турбота про соцiально-економiчний розвиток населення нашого краю. УКРАЇНА ПОНАД УСЕ!!!</p> -->
    <h5 class="title-bg" style="font-size:16px">Змiцнення обороноздатностi, пiдтримка незалежностi та цiлостностi, турбота про соцiально-економiчний розвиток населення нашого краю</h5>
     
    <div class="row headline"><!-- Begin Headline -->    
        <!-- Slider Carousel  ================================================== -->
       <?php include ("blocks/main_slider.php"); ?>        
        <!-- Headline Text ================================================== -->
       <?php include ("blocks/headline_text.php"); ?>
    </div><!-- End Headline -->

    <div class="row gallery-row"><!-- Begin News Row --> 
       <div class="span12">
                  <!--  <h5 class="title-bg">Швидкий зв'язок  -->
                       <!-- <small>That we are most proud of</small> -->
                      <!--  <button class="btn btn-mini btn-inverse hidden-phone" type="button">Надіслати</button>
                   </h5> -->
            
               <!-- News Thumbnails   ================================================== -->
               <h5 class="title-bg" style="font-size:30px">Оголошення</h5>
                   <div >
                    <ul class='popular-posts'>
                      <!-- <ul class='gallery-post-grid holder'> -->
                       <?php                  
                              $result = mysql_query("SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM news_desc order by date_ desc ",$db);
                              $myrow = mysql_fetch_array ($result);
                              do {         
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
                              while ($myrow = mysql_fetch_array($result));
                        ?> 
                      </ul>
                   </div>
       </div>
    </div><!-- End News Row -->
       
   
    
    <div class="row"><!-- Begin Bottom Section -->
        <!-- Blog Preview  ================================================== -->
        <div class="span6">
               <!-- fb share -->
               <div id="fb-root"></div>
               <script>(function(d, s, id) {
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) return;
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=1572546026360051";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
               </script>
            <h5 class="title-bg">Преса про нас    
                <small style="margin-left:20px;">Останні події</small>
                <button id="btn-blog-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
                <button id="btn-blog-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
            </h5>
        <div id="blogCarousel" class="carousel slide ">
            <!-- Carousel items -->
            <div class="carousel-inner">
               <?php include("blocks/pressa_line.php"); ?> 
            </div>
            </div>  
        </div>

                
          
                 
        <!-- Client Area
        ================================================== -->
       <?php include ("blocks/friends.php"); ?>
        
    </div><!-- End Bottom Section -->

    
    
    </div> <!-- End Container -->

    <!-- Footer Area  ================================================ -->
    <?php include ("blocks/footer.php"); ?>
    <!-- End Footer --> 
    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Вгору</div>
    
</body>
</html>
