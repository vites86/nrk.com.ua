<div class="footer-container"><!-- Begin Footer -->
    	<div class="container">
        	<div class="row footer-row">
                <div class="span3 footer-col">
                    <h5>Про нас</h5>
                   <img src="img/logo.png" alt="nrk" /><br /><br />
                    <address>
                        <strong>Адреса:</strong><br/>
                         02140, м. Київ,<br/>
                         вул. Бориса Гмирі, буд. 9-в, кв. 116<br/>
                         тел. (044)575 03 51
                    </address>
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/Благодiйний-Фонд-Наш-Рiдний-Край-403426539822845" class="social-icon facebook"></a></li>
                        <li><a href="https://twitter.com/NashRidnyuKray" class="social-icon twitter"></a></li>
                        <li><a href="https://goo.gl/Pm8q4v" class="social-icon dribble"></a></li>
                        <li><a href="#" class="social-icon rss"></a></li>
                        <li><a href="#" class="social-icon forrst"></a></li>
                    </ul>
                </div>
                <div class="span3 footer-col">
                    <h5>Рахунки</h5>
                    <ul>
                        <li><a href="#">Гривневий рахунок</a> Р/р 26002052745800 МФО:300711 ОКПО:39504347</li>
                        <li><a href="#">Доллари</a> ВБФ НАШ РIДНИЙ КРАЙ БО SWIFT <br>
                            Счет в банке-корреспонденте 04182358 <br>
                            Code банка-корреспондента CHASUS33 <br>
                            Банк-корреспондент JP Morgan Chase Bank,New York,USA
                        </li>
                        <li><a href="#">Євро</a> CO “ACF “OUR NATIVE LAND” 
                            Счет в банке-корреспонденте 400886700401 <br>
                            SWIFT Code банка-корреспондента COBADEFF <br>
                            Банк-корреспондент Commerzbank AG ,Frankfurt am Main, Germany
                        </li>
                    </ul>
                </div>
                <div class="span3 footer-col">
                    <h5>Останні новини</h5>
                       <ul class="post-list">
                                   <?php                  
                                    $result = mysql_query("SELECT * FROM news order by date_ desc LIMIT 5",$db);
                                    $myrow = mysql_fetch_array ($result);
                                    do {         
                                    printf (" 
                                             <li><a href='news.php?id=%s'>%s</a></li>
                                            ", $myrow['id'], $myrow['title'] );      
                                        }
                                    while ($myrow = mysql_fetch_array($result));
                                    ?> 
                      </ul>
                </div>
                <div class="span3 footer-col">
                    <h5>Галерея фотографій</h5>
                    <ul class="img-feed">
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/1.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/2.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/3.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/4.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/5.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/6.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/7.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/8.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/9.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/10.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/11.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/12.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/13.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/14.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/15.jpg" alt="Image Feed"></a></li>
                        <li><a href="gallery.php"><img style="height:60px; width:60px" src="img/gallery/16.jpg" alt="Image Feed"></a></li>
                    </ul>
                </div>
            </div>
 <!-- <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div> -->
 <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1001622006550427',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

            <div class="row"><!-- Begin Sub Footer -->
                <div class="span12 footer-col footer-sub">
                    <div class="row no-margin">
                        <div class="span6"><span class="left">Copyright 2012 VDStudio Theme. All rights reserved.</span></div>
                        <div class="span6">
                            <span class="right">
                            <a href="./index.php">Головна</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="./about.php">Про фонд</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="./rekvisits.php">Реквізити</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="./about.php">Галерея</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            <a href="./partners.php">Партнери</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- End Sub Footer -->

        </div>
    </div><!-- End Footer --> 