 <!-- Main Navigation
        ================================================== -->
        <div class="span7 navigation">
            <div class="navbar hidden-phone">
                 <ul class="nav">
                     <li id='main_nav'      name='main_nav'     ><a href="index.php">       Головна    </a></li>
                     <li id='about_nav'     name='about_nav'    ><a href="about.php">       Про фонд   </a></li>
                     <li id='gallery_nav'   name='gallery_nav'  ><a href="gallery.php">     Галерея    </a></li>
                   <!--   <li id='dijaln_nav'    name='dijaln_nav'   ><a href="dijaln.php">      Діяльність </a></li> -->
                     <li id='partners_nav'  name='partners_nav' ><a href="partners.php">    Партнери   </a></li>
                     <li id='rekvisits_nav' name='rekvisits_nav'><a href="rekvisits.php">   Реквізити  </a></li>
                     <li id='news_nav'      name='news_nav'>     <a href="all_news.php">    Новини     </a></li> 
                     <li id='desc_nav'      name='desc_nav'>     <a href="all_desc.php">    Оголошення </a></li> 
                 </ul>           
            </div>

            <!-- Mobile Nav
            ================================================== -->
            <form action="#" id="mobile-nav" class="visible-phone">
                <div class="mobile-nav-select">
                <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                    <option value="index.php">Головна</option>
                    <option value="about.php">Про фонд</option>                       
                    <option value="gallery.php">Галерея</option>
                    <option value="partners.php">Партнери</option>                       
                    <option value="rekvisits.php">Реквізити</option>   
                    <option value="all_news.php">Новини</option>                       
                    <option value="all_desc.php">Оголошення</option>
                </select>
                </div>
                </form>

        </div>
        