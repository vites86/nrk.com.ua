<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Наш Рідний Край</title>
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

   document.getElementById("main_nav").className      = 'active';
   document.getElementById("about_nav").className     = '';
   document.getElementById("gallery_nav").className   = '';
   document.getElementById("dijaln_nav").className    = '';
   document.getElementById("partners_nav").className  = '';
   document.getElementById("rekvisits_nav").className = '';
   document.getElementById("news_nav").className = '';
   document.getElementById("desc_nav").className = '';
    
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
        <?php include ("blocks/news_desk.php"); ?>
    </div><!-- End News Row -->
       
    <div class="row gallery-row"><!-- Begin News Row --> 
    	<?php include ("blocks/news_line.php"); ?>
    </div><!-- End News Row -->

    <div class="row gallery-row"><!-- Begin Articles Row -->
        <?php include ("blocks/articles_line.php"); ?>
    </div><!-- End Articles Row -->
    
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
        <div class="span6">

            <h5 class="title-bg">Відгуки друзів
               <!--  <small>That love us</small> -->
                <button id="btn-client-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
                <button id="btn-client-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
            </h5>

            <!-- Client Testimonial Slider-->
            <div id="clientCarousel" class="carousel slide no-margin">
            <!-- Carousel items -->
            <div class="carousel-inner">

                <div class="active item">
                    <p class="quote-text">"У цей нелегкий для нашої країни час знаходяться ось такі хороші люди як колектив 'Нашого рідного краю'. 
                    Дякую вам, друзі, за те що ви робите! "<cite>- Віктор Дубровін, 
                    <a href="http://www.vdstudio.net.ua">VDStudio</a></cite></p>
                </div>

                <div class="item">
                    <p class="quote-text">"Adipiscing elit. In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. 
                    Morbi blandit ultricies ultrices. Vivamus nec lectus sed orci molestie molestie."<
                        cite>- Another Client Name, Company Name</cite></p>
                </div>

                <div class="item">
                    <p class="quote-text">"Mauris eget tellus sem. Cras sollicitudin sem eu elit aliquam quis condimentum nulla suscipit. 
                    Nam sed magna ante. Ut eget suscipit mauris."<cite>- On More Client, The Company</cite></p>
                </div>
                
            </div>
            <p>Надсилайте Ваші відгуки на адерсу <span style="color:blue">vites@outlook.com</span></p>
            </div>

            <!-- Client Logo Thumbs-->
            <br>
            <h1>Дякуємо за співпрацю друзям</h1>
            <ul class="client-logos">
                <li><a href="http://vdstudio.net.ua" class="client-link"><img src="img/friends/1.png" alt="vdstudio"></a></li>
                <li><a href="http://profi-trade.kiev.ua/" class="client-link"><img src="img/friends/2.png" alt="profi-trade"></a></li>
                <li><a href="http://www.soviart.com.ua/" class="client-link"><img src="img/friends/3.png" alt="soviart"></a></li>
                <li><a href="http://3cm.com.ua/" class="client-link"><img src="img/friends/4.png" alt="3cm.com.ua"></a></li>
                <li><a href="#" class="client-link"><img src="img/gallery/client-img-5.png" alt="Client"></a></li>
            </ul>

        </div>
        
    </div><!-- End Bottom Section -->

    
    
    </div> <!-- End Container -->

    <!-- Footer Area  ================================================ -->
    <?php include ("blocks/footer.php"); ?>
	<!-- End Footer --> 
    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Вгору</div>
    
</body>
</html>
