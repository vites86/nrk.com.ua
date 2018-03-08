<?php include ("blocks/php.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новини</title>
<?php include ("blocks/links.php"); ?>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<!-- JS ================================================== -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.custom.js"></script>
<script type="text/javascript">
$(document).ready(function () {
     $(window).load(function(){
    
   document.getElementById("main_nav").className      = 'active';
   document.getElementById("about_nav").className     = '';
   document.getElementById("gallery_nav").className   = '';
   document.getElementById("dijaln_nav").className    = '';
   document.getElementById("partners_nav").className  = '';
   document.getElementById("rekvisits_nav").className = '';
   
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

<body>
	<div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>
    
    <div class="container main-container">
    
    <?php include ("blocks/header.php"); ?>
     
    <!-- Page Content   ================================================== --> 
    <div class="row">
        <!-- News Items   ================================================== --> 
        <div class="span12 gallery-single">
             <?php         
                       $id=$_GET["id"];         
                       $result = mysqli_query($db,"SELECT * FROM Articles WHERE id=$id");
                       while( $myrow = mysqli_fetch_assoc($result) )
		               {          
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
                                         </ul>
                                     </div>
                                 </div>", $myrow['img'], $myrow['title'], $myrow['description'], $myrow['text_'], $myrow['date_'], $myrow['author'] );      
                        }
                        mysqli_free_result($result); 
                 ?> 
        </div><!-- End gallery-single-->
    </div><!-- End container row -->  

    <div class="row" style="margin-top:-85px;">
        <div class="span12"><h5 class="title-bg" style="font-size:30px">Фото додаток</h5></div>
        <!-- Gallery Items  ================================================== --> 
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
                                 printf("<li  class='span2 gallery-item' data-id='id-%s' data-type='illustration'>
                                             <span class='gallery-hover-6col hidden-phone hidden-tablet'>
                                                 <span class='gallery-icons'>                                                    
                                                     <a href='$path' class='item-zoom-link2 lightbox' title='$k' data-rel='prettyPhoto'></a>
                                                 </span>
                                             </span>
                                             <a href='#'><img style='height:140px;width:170px;' src='%s' alt='Gallery'></a>
                                         </li>", $k, $path);
                                   $k++; // Увеличиваем вспомогательный счётчик
                                 }
                               }                              
                        ?>      
                </ul>   
            </div>     
        </div>
     </div>

     </div>   <!-- End Container -->




    <!-- Footer Area    ================================================== -->
	  <?php include ("blocks/footer.php"); ?>
    <!-- End Footer -->

    <!-- Scroll to Top -->  
    <div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>
    
</body>
</html>
