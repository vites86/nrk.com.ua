<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новини</title>
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
   
   document.getElementById("news_nav").className = 'active';
   document.getElementById("main_nav").className      = '';
   document.getElementById("about_nav").className     = '';
   document.getElementById("gallery_nav").className   = '';
   document.getElementById("dijaln_nav").className    = '';
   document.getElementById("partners_nav").className  = '';
   document.getElementById("rekvisits_nav").className = '';
   document.getElementById("desc_nav").className = '';  
});
</script>
<!-- fb share -->
<div id="fb-root"></div>
<!-- <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=1572546026360051";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
<!--  end vk share -->

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="imagetoolbar" content="no" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script>
    !window.jQuery && document.write('<script src="Gallery/jquery-1.4.3.min.js"><\/script>');
  </script>
  <script type="text/javascript" src="Gallery/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
  <script type="text/javascript" src="Gallery/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="Gallery/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  <link rel="stylesheet" href="Gallery/style.css" />
  <script type="text/javascript">
    $(document).ready(function() {
      /*
      *   Examples - images
      */

      $("a#example1").fancybox();

      $("a#example2").fancybox({
        'overlayShow' : false,
        'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic'
      });

      $("a#example3").fancybox({
        'transitionIn'  : 'none',
        'transitionOut' : 'none'  
      });

      $("a#example4").fancybox({
        'opacity'   : true,
        'overlayShow' : false,
        'transitionIn'  : 'elastic',
        'transitionOut' : 'none'
      });

      $("a#example5").fancybox();

      $("a#example6").fancybox({
        'titlePosition'   : 'outside',
        'overlayColor'    : '#000',
        'overlayOpacity'  : 0.9
      });

      $("a#example7").fancybox({
        'titlePosition' : 'inside'
      });

      $("a#example8").fancybox({
        'titlePosition' : 'over'
      });

      $("a[rel=example_group]").fancybox({
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'titlePosition'   : 'over',
        'titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {
          return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
      });

      /*
      *   Examples - various
      */

      $("#various1").fancybox({
        'titlePosition'   : 'inside',
        'transitionIn'    : 'none',
        'transitionOut'   : 'none'
      });

      $("#various2").fancybox();

      $("#various3").fancybox({
        'width'       : '75%',
        'height'      : '75%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'
      });

      $("#various4").fancybox({
        'padding'     : 0,
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none'
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
        <div class="row"><!-- Begin Headline -->     
           <div class="span12">
               <div class="span12 gallery-single">
                   <?php         
                        $id=$_GET["id"];         
                        $result = mysql_query("SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM news WHERE id=$id",$db);
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

        <div class="row" style="margin-top:-130px;"><!-- Begin Headline -->    
         <div class="span12"><h5 class="title-bg" style="font-size:30px">Фото додаток</h5></div> 

 
        

           <div class="span12">
              <div class="span12 gallery">
                  <div class="row clearfix">         
     

                    <ul class="gallery-post-grid holder">
                            
                            <?php 
                                   $dir = "img/news/".$id."/"; // Папка с изображениями  
                                   $files = scandir($dir); // Берём всё содержимое директории
                                   $k = 1; // Вспомогательный счётчик для перехода на новые строки
                                   for ($i = 0; $i < count($files); $i++) { // Перебираем все файлы
                                     if (($files[$i] != ".") && ($files[$i] != "..")) { // Текущий каталог и родительский пропускаем
                                       $path = $dir.$files[$i]; // Получаем путь к картинке        
                                     printf("
                                                <li>
                                                <a rel='example_group' href='$path' title='$k'>
                                                <img alt='' style='height:140px;width:170px;' src='%s' /></a>
                                                </li>", $path);
                                       $k++; // Увеличиваем вспомогательный счётчик
                                     }
                                   }                              
                            ?>    
                                 
                                  
                    </ul>    

              </div>
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
                  </div>     
           </div>
        </div>         
    </div> <!-- End Container -->

 

    <!-- Footer Area  ================================================ -->
    <?php include ("blocks/footer.php"); ?>
  <!-- End Footer --> 
    
    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Вгору</div>
    
</body>
</html>
