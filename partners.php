<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Партнери</title>
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
   document.getElementById("gallery_nav").className   = '';  
   document.getElementById("partners_nav").className  = 'active';
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
       <h5 class="title-bg" style="font-size:30px">Наші друзі та партнери</h5> 
       <div class="row"><!-- Begin Headline -->    
       <br><br><br>
          <div class="span6">            
            <ul class="popular-posts">
                <li>
                    <a href="http://vdstudio.net.ua"><img style='height:65px;' src="img/friends/1.png" alt="vdstudio"></a>
                    <h6 style="font-size:23px"><a href="http://vdstudio.net.ua">VD Studio</a></h6>
                    <em style="font-size:15px">Студія веб-дизайну</em><br>
                </li><br>
                <li>
                    <a href="http://www.soviart.com.ua/"><img style='height:65px;' src="img/friends/3.png" alt="soviart"></a>
                    <h6 style="font-size:23px"> <a href="http://www.soviart.com.ua/">АРТ</a></h6>
                    <em style="font-size:15px">Асоціація артгалерей України</em><br>            
                </li><br>
            </ul>
          </div>  
          <div class="span6"> 
            <ul class="popular-posts">
                <li>
                    <a href="http://profi-trade.kiev.ua"><img style='height:65px;' src="img/friends/2.png" alt="profi-trade"></a>
                    <h6 style="font-size:23px"><a href="http://profi-trade.kiev.ua">Profi Trade</a></h6>
                    <em style="font-size:15px">Інструменти та розхідні матеріали</em><br>
                </li><br>
                <li>
                    <a href="http://3cm.com.ua/"><img style='height:65px;' src="img/friends/4.png" alt="3С МАРКЕТ"></a>
                    <h6 style="font-size:23px"><a href="http://3cm.com.ua/">3С МАРКЕТ</a></h6>
                    <em style="font-size:15px">Сучасна робоча одежа, спецвзуття та засоби індивідуальног захисту</em><br>
                </li><br>
            </ul>
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



