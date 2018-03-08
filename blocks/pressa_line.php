                <?php                  
                $result = mysqli_query($db,"SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM pressa order by date_ desc limit 1");
                while( $myrow = mysqli_fetch_assoc($result) )
		            {  
                 $id = $myrow['id'];    
                 printf (" 
                   <div class='active item'>
                     <a href='%s'><img src='%s' alt='' class='align-left blog-thumb-preview' /></a>
                     <div class='post-info clearfix'>
                       <h4><a href='%s'>%s</a></h4>
                       <ul class='blog-details-preview'>
                         <li><i class='icon-calendar'></i><strong>Дата:</strong> %s<li>
                           <li><i class='icon-user'></i><strong>Опубліковано:</strong> <a href='%s' title='Link'>%s</a><li>
                             <li><i class='icon-comment'></i><strong>Коментарі:</strong> <a href='%s' title='Link'>12</a><li>
                               <li><i class='icon-tags'></i> <a href='#'>%s</a>
                                 <li><div class='fb-share-button' data-href='".$myrow['url']."' data-layout='button'></div></li>
                               </ul>
                             </div>
                             <p class='blog-summary'>%s... <a href='%s'>Переглянути</a><p>
                             </div>",$myrow['url'], $myrow['img'], $myrow['url'], $myrow['title'], $myrow['eurodate'], $myrow['url'], 
                             $myrow['organisation'], $myrow['url'],$myrow['meta_t'],$myrow['text_'],$myrow['url']);
               }
               mysqli_free_result($result); 

               $result = mysqli_query($db,"SELECT *, DATE_FORMAT(date_,'%d.%m.%Y') as eurodate FROM pressa where id != $id order by date_ desc");
               while( $myrow = mysqli_fetch_assoc($result) )
		           {          
                 printf (" 
                   <div class='item'>
                     <a href='%s'><img src='%s' alt='' class='align-left blog-thumb-preview' /></a>
                     <div class='post-info clearfix'>
                       <h4><a href='%s'>%s</a></h4>
                       <ul class='blog-details-preview'>
                         <li><i class='icon-calendar'></i><strong>Дата:</strong> %s<li>
                           <li><i class='icon-user'></i><strong>Опубліковано:</strong> <a href='%s' title='Link'>%s</a><li>
                             <li><i class='icon-comment'></i><strong>Коментарі:</strong> <a href='%s' title='Link'>12</a><li>
                               <li><i class='icon-tags'></i> <a href='#'>%s</a>
                                 <li><div class='fb-share-button' data-href='".$myrow['url']."' data-layout='button'></div></li>
                               </ul>
                             </div>
                             <p class='blog-summary'>%s... <a href='%s'>Переглянути</a><p>
                             </div>",$myrow1['url'], $myrow1['img'], $myrow1['url'], $myrow1['title'], $myrow1['eurodate'], $myrow1['url'], 
                             $myrow1['organisation'], $myrow1['url'],$myrow1['meta_t'],$myrow1['text_'],$myrow1['url']);
               }
               mysqli_free_result($result); 
               ?>
