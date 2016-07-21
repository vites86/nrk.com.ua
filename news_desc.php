<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Oголошення</title>
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
   document.getElementById("desc_nav").className = 'active';
   document.getElementById("main_nav").className      = '';
   document.getElementById("about_nav").className     = '';
   document.getElementById("gallery_nav").className   = '';
   document.getElementById("dijaln_nav").className    = '';
   document.getElementById("partners_nav").className  = '';
   document.getElementById("rekvisits_nav").className = '';
   document.getElementById("news_nav").className = '';  
});
</script>
<!-- fb share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=1572546026360051";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--  end vk share -->
</head>

<body class="home">
    <!-- Color Bars (above header)-->
  <div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>    
    <div class="container">    
        <?php include ("blocks/header.php"); ?>
        <div class="row"><!-- Begin Headline -->     
           <div class="span12">
               <div class="span12 gallery-single">
                   <?php         
                        $id=$_GET["id"];         
                        $result = mysql_query("SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM news_desc WHERE id=$id",$db);
                        if (!$result) { die('Неверный запрос: ' . mysql_error());}
                        $myrow = mysql_fetch_array ($result);
                        $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        do {         
                        printf (" <div class='row'>
                                      <div class='span12'>
                                          <img src='%s' class='align-left thumbnail' alt='image'>                                    
                                          <h2>%s</h2>
                                          <p class='lead'>%s</p>
                                          <p style='font-size:22px; text-align: justify'>%s</p>
                                          <ul class='project-info'>
                                              <li><h6></h6></li>
                                              <li><h6><em>Дата:</em></h6> <strong>%s</strong></li>
                                              <li><h6><em>Автор:</em></h6> <strong>%s</strong></li>
                                              <li>
                                                  <div class='fb-share-button' data-href='$current_link' data-layout='button'></div>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>", $myrow['img'], $myrow['title'], $myrow['description'], $myrow['text_'], $myrow['eurodate'], $myrow['author'] );      
                            }
                        while ($myrow = mysql_fetch_array($result));
                    ?> 
               </div>
           </div>        
        </div><!-- End Headline -->

        
                                    <!-- fb like --> 
                                    <!-- <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                      var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.5&appId=1572546026360051";
                                      fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                   <div class='fb-like' data-href='$current_link' data-layout='button' data-action='like' data-show-faces='true' data-share='false'></div> -->
                
          
    </div> <!-- End Container -->

    <!-- Footer Area  ================================================ -->
    <?php include ("blocks/footer.php"); ?>
  <!-- End Footer --> 
    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Вгору</div>
    
</body>
</html>
