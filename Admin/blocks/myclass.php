<?php 
/*include ("blocks/php.php");*/

class Adminka 
{	
	var $count_animators;   

public function addAnimator($title, $meta_d, $meta_k, $description)
{	

if($_FILES["myfile"]['size'] > 0)
 {

    $myfile_name = $_FILES["myfile"]["name"];
    if ($myfile_name=='') return "<p style='color:red;'>   Вы ввели не полностью информацию!!!</p>";
    $count_animators  =Adminka::getAnimatorsCount()+1;
    $file_path1 = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/animators/$count_animators/" . time() . "_" . basename($_FILES["myfile"]["name"]);
    $file_path2 = $_SERVER['DOCUMENT_ROOT'] . "/images/slider_content/$count_animators.png";
    $file_path3 = $_SERVER['DOCUMENT_ROOT'] .  "/images/gallery/other/" . time() . "_" . basename($_FILES["myfile"]["name"]);
    $directory1 = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/animators/$count_animators/";
    
    if (!is_dir($directory1)) mkdir($directory1,0777);    
    move_uploaded_file($_FILES['myfile']['tmp_name'], $file_path2);
    copy($file_path2, $file_path3);
    copy($file_path2, $file_path1);
 }
else
 {
	 return "<p style='color:red;'>   Вы ввели не полностью информацию!!!</p>";
 }

if (isset($title) && isset($meta_d) && isset($meta_k) && isset($description))
 { 
      $result= mysqli_query($db, "INSERT INTO mane_page_animators_slider(id, title, meta_d, meta_k, description, img_src) VALUES ($count_animators, '$title','$meta_d','$meta_k', '$description','images/slider_content/$count_animators.png')");
          if ($result == 'true') 
          	{
          		return "<img src='../images/slider_content/$count_animators.png' alt=''><p style='color:blue;'>    Добавлено успешно!</p>";
          	}
          else 
            {
 	            return "<p style='color:red;'>   Не Добавлено!</p>";
 	        } 
 }
 else 
 {
  return "<p style='color:red;'>    Вы ввели не полностью информацию!!!</p>";
 }

}


public function getAnimatorsCount()
{
	    include ("blocks/php.php");
      $result = mysqli_query($db, "SELECT MAX(id) as id FROM mane_page_animators_slider");	
      while( $myrow = mysqli_fetch_assoc($result) )
		  { 
      	$count_animators= $myrow['id'];
      }
      mysqli_free_result($result);      
      return $count_animators;
}

public function delAnimator($id)
{
 include ("blocks/php.php");
 if (isset($id))
 { 
    $result= mysqli_query($db, "DELETE FROM mane_page_animators_slider WHERE id='$id'");
    if ($result == 'true') 
    {
      $directory = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/animators/$id/";
      $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/slider_content/$id.png";
      Adminka::fullRemove_ff($directory, 1);
      if(file_exists($file_path)) @unlink($file_path);
      return "<p style='color:blue;'>        Программа удалена!</p>";
    }
    else {return "<p style='color:red;'>       Программа не удалена!</p>";}
 }
 else 
 {
 return "<p style='color:red;'>       Вы не указали программу для удаления!</p>";
 } 
}





public function addFotoAnimator($id)
{             
      $file_path1 = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/animators/$id/" . time() . "_" . basename($_FILES["newFotoAnimator"]["name"]); 
      $myfile_name = basename($file_path1);  
      if(move_uploaded_file($_FILES['newFotoAnimator']['tmp_name'], $file_path1)){ return "<img src='../images/gallery/animators/$id/$myfile_name' alt=''><p style='color:blue;'>        Фото добалено успешно!</p>";}
      else {return "<p style='color:red;'>       Фото не добавлено!</p>";}
   
}
/*function DeleteDir($path){ 
 return is_file($path) ? @unlink($path) : array_map('DeleteDir',glob('/*')) == @rmdir($path); 
 }*/
 

 public function delGalleryFoto()
{
   if(!empty($_POST['gallery_list']))
   {
      $check_list=$_POST['gallery_list'];  
      $n = count($check_list);
      foreach ($_POST['gallery_list'] as $selected) {
             if (file_exists($selected)) @unlink($selected);  
           }        
   }
   else
   {
      return "<p style='color:red;'>   Вы не указали файлы для удаления!!!</p>";
   }
   return "<p style='color:blue;'>      Удалено $n фотографий</p>";
}

public function addFotoGallery()
{
     $fileName = time() . "_" . basename($_FILES["newFotoGallery"]["name"]);
     $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/other/" . $fileName;
     if(move_uploaded_file($_FILES['newFotoGallery']['tmp_name'], $file_path)){ return "<img style='margin:30px;' src='../images/gallery/other/$fileName' alt=''/><p style='color:blue;'>        Фото добалено успешно!</p>";}
     else {return "<p style='color:red;'>       Фото не добавлено!</p>";}
}



public function addVideo()
{ 
    $fileName = time() . "_" . basename($_FILES["videofileImg"]["name"]);  
    $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/video/" . $fileName;
    $directory = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/video/";    
    if (!is_dir($directory)) mkdir($directory,0777);    
    move_uploaded_file($_FILES['videofileImg']['tmp_name'], $file_path);
   
    $fileName1 = time() . "_" . basename($_FILES["videofile"]["name"]);  
    $file_path1 = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/video/" . $fileName1;
    $directory1 = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/video/";    
    if (!is_dir($directory1)) mkdir($directory1,0777);    
    move_uploaded_file($_FILES['videofile']['tmp_name'], $file_path1);
 
          $file_path_forBD1 = 'images/gallery/video/' . $fileName;
          $file_path_forBD2 = 'images/gallery/video/' . $fileName1;
          $result= mysqli_query($db, "INSERT INTO video(img_src, video_src) VALUES ($file_path_forBD1, $file_path_forBD2)");
          if ($result == 'true') 
            {
              return "<img style='margin:30px;' src='../images/gallery/other/$fileName' alt=''/><p style='color:blue;'>    Добавлено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не Добавлено!</p>";
          } 
}


public function delVideo($id,$img_src,$video_src)
{
 include ("blocks/php.php");
 if (isset($id) && isset($img_src) && isset($video_src))
 { 
    $result= mysqli_query($db, "DELETE FROM video WHERE id='$id'");
    if ($result == 'true') 
    {
      $file_path1 = $_SERVER['DOCUMENT_ROOT'] . "/" . $img_src;
      $file_path2 = $_SERVER['DOCUMENT_ROOT'] . "/" . $video_src;        
      if(file_exists($file_path1)) @unlink($file_path1);
      if(file_exists($file_path2)) @unlink($file_path2);
      return "<p style='color:blue;'>        Программа удалена!</p>";
    }
    else {return "<p style='color:red;'>       Программа не удалена!</p>";}
 }
 else 
 {
 return "<p style='color:red;'>       Вы не указали программу для удаления!</p>";
 } 
}

public function addShou($title, $meta_d, $meta_k, $description, $text)
{ 
    $myfile_name = basename($_FILES["shoufile"]["name"]);    
    $count_shou  =Adminka::getShouCount()+1;
    $file_path1 = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/shou/$count_shou.png"; 
    $fileName="$count_shou.png";
    $file_path2 = $_SERVER['DOCUMENT_ROOT'] .  "/images/gallery/other/" . time() . "_" . $myfile_name;     
   try {
         move_uploaded_file($_FILES['shoufile']['tmp_name'], $file_path1);
         copy($file_path1, $file_path2);   
         $file_path_forBD = 'images/gallery/shou/' . $fileName;
         $result= mysqli_query($db, "INSERT INTO shou (id, title, meta_d, meta_k, description, img_src, text_) VALUES ($count_shou, '$title', '$meta_d', '$meta_k', '$description', '$file_path_forBD', '$text')");
          if ($result == 'true') 
            {
              return "<img style='margin:30px;' src='../images/gallery/shou/$fileName' alt=''/><p style='color:blue;'>    Добавлено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не Добавлено!</p>";
            } 
       }
    catch (Exception $e) 
       {
          return "<p style='color:red'>Ошибка:</p> " . $e->getMessage();
       }
}


public function updateShou($id, $title, $meta_d, $meta_k, $description, $text)
{ 
    if ($_FILES['newshoufile']['size'] == 0)
    { 
        $result= mysqli_query($db, "UPDATE  shou SET title='$title', meta_d='$meta_d', meta_k='$meta_k', description='$description', text_='$text' WHERE id='$id' ");
        if ($result == 'true') {return "<p style='color:blue;'>        Программа успешно изменена!</p>";}
        else {return "<p style='color:red;'>       Программа не изменена!</p>";}
    }
    else if ($_FILES['newshoufile']['size'] > 0)
    {       
      $file_path_forDelete = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/shou/" . $id . ".png";
      if (file_exists($file_path_forDelete)) @unlink($file_path_forDelete);
      $file_path_forBD = 'images/gallery/shou/$id.png';
      move_uploaded_file($_FILES['newshoufile']['tmp_name'], $file_path_forDelete);   
     
      $result= mysqli_query($db, "UPDATE  shou SET title='$title', meta_d='$meta_d', meta_k='$meta_k', description='$description', text_='$text' WHERE id='$id' ");
        if ($result == 'true') {return "<img style='margin:30px;' src='../images/gallery/shou/$id.png' alt='../images/gallery/shou/$id.png'/><p style='color:blue;'>        Программа успешно изменена!</p>";}
        else {return "<p style='color:red;'>       Программа не изменена!</p>";}
    }     
}


public function delShou($id)
{
 include ("blocks/php.php");
 if (isset($id))
 { 
    $result= mysqli_query($db, "DELETE FROM shou WHERE id='$id'");
    if ($result == 'true') 
    {      
      $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/gallery/shou/$id.png";     
      if(file_exists($file_path)) @unlink($file_path);
      return "<p style='color:blue;'>        Программа удалена!</p>";
    }
    else {return "<p style='color:red;'>       Программа не удалена!</p>";}
 }
 else 
 {
 return "<p style='color:red;'>       Вы не указали программу для удаления!</p>";
 } 
}

public function addService($title, $meta_d, $meta_k, $description, $text)
{        
   try {
         $myfile_name = basename($_FILES["newServiceFile"]["name"]);    
         $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/services/$myfile_name";    
         move_uploaded_file($_FILES['newServiceFile']['tmp_name'], $file_path);        
         $file_path_forBD = 'images/services/' . $myfile_name;
         $result= mysqli_query($db, "INSERT INTO services (title, meta_d, meta_k, description, img_src, text_) VALUES ('$title', '$meta_d', '$meta_k', '$description', '$file_path_forBD', '$text')");
          if ($result == 'true') 
            {
              return "<img style='margin:30px;' src='../images/services/$myfile_name' alt=''/><p style='color:blue;'>    Добавлено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не Добавлено!</p>";
            } 
       }
    catch (Exception $e) 
       {
          return "<p style='color:red'>Ошибка:</p> " . $e->getMessage();
       }
}


public function updateService($id, $title, $meta_d, $meta_k, $description, $text, $img_src)
{ 
    if ($_FILES['changeServiceFoto']['size'] == 0)
    { 
        $result= mysqli_query($db, "UPDATE  services SET title='$title', meta_d='$meta_d', meta_k='$meta_k', description='$description', text_='$text' WHERE id='$id' ");
        if ($result == 'true') {return "<p style='color:blue;'>        Услуга успешно изменена!</p>";}
        else {return "<p style='color:red;'>       Услуга не изменена!</p>";}
    }
    else if ($_FILES['changeServiceFoto']['size'] > 0)
    { 
      $fileName = basename($img_src);
      $fileToDel = $_SERVER['DOCUMENT_ROOT'] . "/images/services/" . $fileName;
      if (file_exists($fileToDel)) @unlink($fileToDel);   

      $newfileName = basename($_FILES["changeServiceFoto"]["name"]); 
      $fileToCopy = $_SERVER['DOCUMENT_ROOT'] . "/images/services/" . $newfileName;     
      $file_path_forBD = 'images/services/' . $newfileName; 
      move_uploaded_file($_FILES['changeServiceFoto']['tmp_name'], $newfileName);            
     
      $result= mysqli_query($db, "UPDATE services SET title='$title', meta_d='$meta_d', meta_k='$meta_k', description='$description', text_='$text', img_src='$file_path_forBD' WHERE id='$id' ");
        if ($result == 'true') {return "<img style='margin:30px;' src='../$file_path_forBD' alt='../$file_path_forBD'/><p style='color:blue;'>        Услуга успешно изменена!</p>";}
        else {return "<p style='color:red;'>       Услуга не изменена!</p>";}
    }  
}

public function delService($id, $img_src)
{
 include ("blocks/php.php");
 if (isset($id) && isset($img_src))
 { 
    $result= mysqli_query($db, "DELETE FROM services WHERE id='$id'");
    if ($result == 'true') 
    {     
      $fileToDel = $_SERVER['DOCUMENT_ROOT'] . "/" . $img_src;  
      if(file_exists($fileToDel)) @unlink($fileToDel);
      return "<p style='color:blue;'>        Услуга удалена!</p>";
    }
    else {return "<p style='color:red;'>       Услуга не удалена!</p>";}
 }
 else 
 {
 return "<p style='color:red;'>       Вы не указали Услугу для удаления!</p>";
 } 
}

public function getHeaderSliderPicturCount()
{
    include ("blocks/php.php");
      $result = mysqli_query($db, "SELECT MAX(id) as id FROM mane_page_header_slider");  
      while( $myrow = mysqli_fetch_assoc($result) )
      { 
        $count_shou= $myrow['id'];
      }
      mysqli_free_result($result);      
      return $count_shou;
}

public function addHeaderSliderPicture()
{      

   try {
         $id = Adminka::getHeaderSliderPicturCount()+1;    
         $file_path = $_SERVER['DOCUMENT_ROOT'] . "/images/slider_header/" . $id . ".png";    
         move_uploaded_file($_FILES['new_headerSliderPicture']['tmp_name'], $file_path);        
         $file_path_forBD = 'images/slider_header/' . $id . ".png";
         $result= mysqli_query($db, "INSERT INTO mane_page_header_slider (id, img_src) VALUES ($id, '$file_path_forBD')");
          if ($result == 'true') 
            {              
              return "<img style='margin:30px; height:100px;' src='../images/slider_header/$myfile_name' alt=''/><p style='color:blue;'>    Добавлено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не Добавлено!</p>";
            } 
       }
    catch (Exception $e) 
       {
          return "<p style='color:red'>Ошибка:</p> " . $e->getMessage();
       }
}


 public function delHeaderSliderPicture()
{
   if(!empty($_POST['check_sliderHeader']))
   {
      $check_list=$_POST['check_sliderHeader'];  
      $n = count($check_list);
      foreach ($_POST['check_sliderHeader'] as $selected) 
      {
        $result= mysqli_query($db, "DELETE FROM mane_page_header_slider WHERE id='$selected'");
        if ($result == 'true') 
        { 
           $fileToDel = $_SERVER['DOCUMENT_ROOT'] . "/images/slider_header/" . $selected . ".png";  
           if(file_exists($fileToDel)) @unlink($fileToDel);
           return "<p style='color:blue;'>        Удалено успешно!</p>";
        }          
      }        
   }
   else
   {
      return "<p style='color:red;'>   Вы не указали файлы для удаления!!!</p>";
   }   
}


public function updateFotoTelephone()
{ 
     if ($_FILES['new_FotoTelephone']['size'] > 0)
    { 
      $fileToDel = $_SERVER['DOCUMENT_ROOT'] . "/images/menu_header/telephones.png";
      if(file_exists($fileToDel)) @unlink($fileToDel);      
      if(move_uploaded_file($_FILES['new_FotoTelephone']['tmp_name'], $fileToDel)) 
        return "<img style='margin:30px; height:100px;' src='../images/menu_header/telephones.png' alt=''/><p style='color:blue;'>        Обновление прошло успешно!</p>";;  
    }  
    return "<p style='color:red;'>   Произошля ошибка!!!</p>";
}

public function updateFotoLogo()
{ 
     if ($_FILES['new_FotoLogo']['size'] > 0)
    { 
      $fileToDel = $_SERVER['DOCUMENT_ROOT'] . "/images/menu_header/logo_pic.png";
      if(file_exists($fileToDel)) @unlink($fileToDel);      
      if(move_uploaded_file($_FILES['new_FotoLogo']['tmp_name'], $fileToDel))  
        return "<img style='margin:30px; height:100px;' src='../images/menu_header/logo_pic.png' alt=''/><p style='color:blue;'>        Обновление прошло успешно!</p>";
    }  
    return "<p style='color:red;'>   Произошля ошибка!!!</p>";
}

public function updateFotoDescribe()
{ 
     if ($_FILES['new_FotoDescribe']['size'] > 0)
    { 
      $fileToDel = $_SERVER['DOCUMENT_ROOT'] . "/images/menu_header/logo_text.png";
      if(file_exists($fileToDel)) @unlink($fileToDel);      
      if(move_uploaded_file($_FILES['new_FotoDescribe']['tmp_name'], $fileToDel)) 
        return "<img style='margin:30px; height:100px;' src='../images/menu_header/logo_text.png' alt=''/><p style='color:blue;'>        Обновление прошло успешно!</p>";
    }
    return "<p style='color:red;'>   Произошля ошибка!!!</p>";
}


public function updateTexts($id, $text)
{            
          $result= mysqli_query($db, "UPDATE texts set  text_='$text' where id='$id'");
          if ($result == 'true') 
            {              
              return "<p style='color:blue;'>    Добавлено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не Добавлено!</p>";
            }    
}


public function updateTelephones($id, $value)
{            
          $result= mysqli_query($db, "UPDATE contacts set value='$value' where id='$id'");
          if ($result == 'true') 
            {              
              return "<p style='color:blue;'>    Изменено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не изменено!</p>";
            }    
}

public function updateKassy($id, $adress, $value)
{            
          $result= mysqli_query($db, "UPDATE contacts set value='$value', cat_name='$adress' where id='$id'");
          if ($result == 'true') 
            {              
              return "<p style='color:blue;'>    Изменено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не изменено!</p>";
            }    
}

public function updateOtherPrices($id, $price_true, $price_false)
{     
        $result= mysqli_query($db, "UPDATE prices_other SET price_true='$price_true', price_false='$price_false' WHERE id='$id' ");
        if ($result == 'true') {return "<p style='color:blue;'>        Цена успешно изменена!</p>";}
        else {return "<p style='color:red;'>       Цена не изменена!</p>";}       
}

public function updateAnimatorsPrices($id, $price_true_1animator, $price_false_1animator,$price_true_2animator, $price_false_2animator)
{     
        $result= mysqli_query($db, "UPDATE prices_animators SET 
          price_true_1animator='$price_true_1animator', 
          price_false_1animator='$price_false_1animator',
          price_true_2animator='$price_true_2animator',
          price_false_2animator='$price_false_2animator'
          WHERE id='$id' ");
        if ($result == 'true') {return "<p style='color:blue;'>        Цена успешно изменена!</p>";}
        else {return "<p style='color:red;'>       Цена не изменена!</p>";}       
}



public function addPrice($name, $cat_descr, $time, $description, $price_true, $price_false)
{      

   try {       
          $result= mysqli_query($db, "INSERT INTO prices_other (name,cat_descr,time,description,price_true,price_false) 
            VALUES ('$name', '$cat_descr', '$time', '$description', '$price_true', '$price_false')");
          if ($result == 'true') 
            {              
              return "<p> Добавлено успешно!</p>";
            }
          else 
            {
              return "<p style='color:red;'>   Не Добавлено!</p>";
            } 
       }
    catch (Exception $e) 
       {
          return "<p style='color:red'>Ошибка:</p> " . $e->getMessage();
       }
}


public function delPrice($cat_descr, $name)
{
 include ("blocks/php.php");
 try { 
    $result= mysqli_query($db, "DELETE FROM prices_other WHERE cat_descr like '$cat_descr' and id>8");
    if ($result == 'true') 
    {     
      return "<p style='color:blue;'>        Программа удалена из прайса!</p>";
    }
    else {return "<p style='color:red;'>       Программа не удалена из прайса!</p>";}
 }
 catch (Exception $e) 
       {
          return "<p style='color:red'>Ошибка:</p> " . $e->getMessage();
       }
}


          public function getPageTitle($id)
          {       
              include ("php.php");
              $result = mysqli_query($db, "SELECT * FROM pages WHERE id=$id");
              if (!$result) { die('Неверный запрос: ' . mysqli_error());}
              while( $myrow = mysqli_fetch_assoc($result) )
              { $pageTitle = $myrow['title']; }
              mysqli_free_result($result);
              return $pageTitle;
          }

          public function pageSrc($id)
          {
                include ("blocks/php.php");
                $result = mysqli_query($db, "SELECT src as src FROM pages where id like '$id'");  
                // if (!$result) {die('Ошибка выполнения запроса:' . mysqli_error());}
                while( $myrow = mysqli_fetch_assoc($result) )
                { $id= $myrow['id'];}
                mysqli_free_result($result);      
                return $count_shou;
          }

          public function addNews($news_count, $title, $meta_d, $meta_k, $description, $author, $text, $ext)
          {      
                include ("blocks/php.php");   
                $query = "INSERT INTO news(id, title, meta_d, meta_k, description, author, img, text_, date_ ) 
                  VALUES ($news_count, '$title','$meta_d','$meta_k', '$description', '$author', 'img/news/$news_count.$ext', '$text', NOW())";
                //return "addNews() - ".$query;                 
                $result= mysqli_query($db, $query);
                if (!$result)                   
                    return "addNews(): bad mysqli_query($db, ".mysqli_error().")";
                else 
                    return "good";         
          }

          public function getNewsCount()
          {
                include ("blocks/php.php");
                $result = mysqli_query($db, "SELECT MAX(id) as id FROM news");  
                while( $myrow = mysqli_fetch_assoc($result) )
                { 
                  $count_news= $myrow['id'];
                }
                mysqli_free_result($result);      
                return $count_news;
          }

          public function addArticle($news_count, $title, $meta_d, $meta_k, $description, $author, $text, $ext)
          {      
                include ("blocks/php.php");   
                $query = "INSERT INTO articles(id, title, meta_d, meta_k, description, author, img, text_, date_ ) 
                  VALUES ($news_count, '$title','$meta_d','$meta_k', '$description', '$author', 'img/articles/$news_count.$ext', '$text', NOW())";
                //return "addNews() - ".$query;                 
                $result= mysqli_query($db, $query);
                if (!$result)                   
                    return "addNews(): bad mysqli_query($db, ".mysqli_error().")";
                else 
                    return "good";         
          }
          
          public function addDesc($news_count, $title, $meta_d, $meta_k, $description, $author, $text, $ext)
          {      
                include ("blocks/php.php");   
                $query = "INSERT INTO news_desc(id, title, meta_d, meta_k, description, author, img, text_, date_ ) 
                  VALUES ($news_count, '$title','$meta_d','$meta_k', '$description', '$author', 'img/desc/$news_count.$ext', '$text', NOW())";
                //return "addNews() - ".$query;                 
                $result= mysqli_query($db, $query);
                if (!$result)                   
                    return "addDesc(): bad mysqli_query($db, ".mysqli_error().")";
                else 
                    return "good";         
          }
          public function getArticlesCount()
          {
                include ("blocks/php.php");
                $result = mysqli_query($db, "SELECT MAX(id) as id FROM articles");  
                while( $myrow = mysqli_fetch_assoc($result) )
                { 
                  $count_news= $myrow['id'];
                }
                mysqli_free_result($result);      
                return $count_news;
          }

          public function getDescCount()
          {
                include ("blocks/php.php");
                $result = mysqli_query($db, "SELECT MAX(id) as id FROM news_desc");  
                while( $myrow = mysqli_fetch_assoc($result) )
                { 
                  $count_news= $myrow['id'];
                }
                mysqli_free_result($result);      
                return $count_news;
          }

         public function imgResize($target, $newcopy, $w, $h, $ext) 
         {
               list($w_orig, $h_orig) = getimagesize($target);
               // $scale_ratio = $w_orig / $h_orig;
               // if (($w / $h) > $scale_ratio) {
               //        $w = $h * $scale_ratio;
               // } else {
               //        $h = $w / $scale_ratio;
               // }
               $img = "";
               $ext = strtolower($ext);
               if ($ext == "gif"){ 
               $img = imagecreatefromgif($target);
               } else if($ext =="png"){ 
               $img = imagecreatefrompng($target);
               } else { 
               $img = imagecreatefromjpeg($target);
               }
               $tci = imagecreatetruecolor($w, $h);
               // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
               imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
               if ($ext == "gif"){ 
                   imagegif($tci, $newcopy);
               } else if($ext =="png"){ 
                   imagepng($tci, $newcopy);
               } else { 
                   imagejpeg($tci, $newcopy, 84);
               }
          }
          public function delNews($id,$img_src)
          {
           include ("blocks/php.php");
           if (isset($id) && isset($img_src))
           { 
              $result= mysqli_query($db, "DELETE FROM news WHERE id='$id'");
              if ($result == 'true') 
              {
                 $file_newsIcon = $_SERVER['DOCUMENT_ROOT'] . "/" . $img_src;
                 $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/img/news/$id/";
                 Adminka::fullRemove_ff($news_directory, 1);
                 if(file_exists($file_newsIcon)) @unlink($file_newsIcon);                
                 return "good";
              }
              else {
                return "bad";
              }
           }
           else 
           {
              return "Вы не вказали новину для видалення!</p>";
           } 
          }

          function fullRemove_ff($path, $t="1") 
          {
            $rtrn="1";
            if (file_exists($path) && is_dir($path)) {
                $dirHandle = opendir($path);
                while (false !== ($file = readdir($dirHandle))) {
                    if ($file!='.' && $file!='..') {
                        $tmpPath=$path.'/'.$file;
                        chmod($tmpPath, 0777);
                        if (is_dir($tmpPath)) {
                            fullRemove_ff($tmpPath);
                        } else {
                            if (file_exists($tmpPath)) {
                                unlink($tmpPath);
                            }
                        }
                    }
                }
                closedir($dirHandle);
                if ($t=="1") {
                    if (file_exists($path)) {
                        rmdir($path);
                    }
                }
            } else {
                $rtrn="0";
            }
            return $rtrn;
          }          

        
public function updateNews($id, $title, $meta_d, $meta_k, $description, $author, $date, $text, $img_src)
{ 
   include ("blocks/php.php");
   if (isset($title) && isset($meta_d) && isset($meta_k) && isset($description) && isset($date) && isset($author) && isset($text))
    {      
        $text = str_replace("'", "`", $text);
        $description = str_replace("'", "`", $description);
        $title = str_replace("'", "`", $title);
        $text = str_replace("``", "\"", $text);
        $description = str_replace("``", "\"", $description);
        $title = str_replace("``", "\"", $title);
        $result= mysqli_query($db, "UPDATE news SET `title`='$title', `meta_d`='$meta_d', `meta_k`='$meta_k', `description`='$description',
          `author` = '$author', `date_`='$date', `text_`='$text', `img`='$img_src' WHERE id='$id' ");
        if ($result) {
            return "good";
        }
        else{
            return "updateNews(): bad mysqli_query($db, ".mysqli_error().")";;
        }
    }   
    else
    {
       return "Введена неповна інформація!!!";
    } 
}



public function delFotoNews()
{
   if(!empty($_POST['check_list']))
   {
      $check_list=$_POST['check_list'];  
      $n = count($check_list);
      foreach ($_POST['check_list'] as $selected) {
             if (file_exists($selected)) @unlink($selected);  
           }        
   }
   else
   {
      return "Ви не вказали жодного файлу для видалення!</p>";
   }
   return "good";
}
/*2016-02-11*/

public function updateArticle($id, $title, $meta_d, $meta_k, $description, $author, $date, $text, $img_src)
{ 
   include ("blocks/php.php");
   if (isset($title) && isset($meta_d) && isset($meta_k) && isset($description) && isset($date) && isset($author) && isset($text))
    {      
        $text = str_replace("'", "`", $text);
        $description = str_replace("'", "`", $description);
        $title = str_replace("'", "`", $title);
        $text = str_replace("``", "\"", $text);
        $description = str_replace("``", "\"", $description);
        $title = str_replace("``", "\"", $title);
        $result= mysqli_query($db, "UPDATE articles SET `title`='$title', `meta_d`='$meta_d', `meta_k`='$meta_k', `description`='$description',
          `author` = '$author', `date_`='$date', `text_`='$text', `img`='$img_src' WHERE id='$id' ");
        if ($result) {
            return "good";
        }
        else{
            return "updateArticles(): bad mysqli_query($db, ".mysqli_error().")";;
        }
    }   
    else
    {
       return "Введена неповна інформація!!!";
    } 
}

public function updateDesc($id, $title, $meta_d, $meta_k, $description, $author, $date, $text, $img_src)
{ 
   include ("blocks/php.php");
   if (isset($title) && isset($meta_d) && isset($meta_k) && isset($description) && isset($date) && isset($author) && isset($text))
    {      
        $text = str_replace("'", "`", $text);
        $description = str_replace("'", "`", $description);
        $title = str_replace("'", "`", $title);
        $text = str_replace("``", "\"", $text);
        $description = str_replace("``", "\"", $description);
        $title = str_replace("``", "\"", $title);
        $result= mysqli_query($db, "UPDATE news_desc SET `title`='$title', `meta_d`='$meta_d', `meta_k`='$meta_k', `description`='$description',
          `author` = '$author', `date_`='$date', `text_`='$text', `img`='$img_src' WHERE id='$id' ");
        if ($result) {
            return "good";
        }
        else{
            return "updateDesc(): bad mysqli_query($db, ".mysqli_error().")";;
        }
    }   
    else
    {
       return "Введена неповна інформація!!!";
    } 
}

public function delDesc($id,$img_src)
{
 include ("blocks/php.php");
 if (isset($id) && isset($img_src))
 { 
  $result= mysqli_query($db, "DELETE FROM news_desc WHERE id='$id'");
  if ($result == 'true') 
  {
   $file_newsIcon = $_SERVER['DOCUMENT_ROOT'] .  $img_src;
   $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/img/desc/$id/";
   Adminka::fullRemove_ff($news_directory, 1);
   if(file_exists($file_newsIcon)) @unlink($file_newsIcon);                
   return "good";
 }
 else {
  return "bad";
}
}
else 
{
  return "Вы не вказали оголошення для видалення!
</p>
";
} 
}



public function delArticle($id,$img_src)
{
 include ("blocks/php.php");
 if (isset($id) && isset($img_src))
 { 
  $result= mysqli_query($db, "DELETE FROM articles WHERE id='$id'");
  if ($result == 'true') 
  {
   $file_newsIcon = $_SERVER['DOCUMENT_ROOT'] . "/" . $img_src;
   $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/img/articles/$id/";
   Adminka::fullRemove_ff($news_directory, 1);
   if(file_exists($file_newsIcon)) @unlink($file_newsIcon);                
   return "good";
 }
 else {
  return "bad";
}
}
else 
{
  return "Вы не вказали новину для видалення!
</p>
";
} 
}

public function postInSocNetworks($news_count)
{
  $result = Adminka::putDataInBuffer($news_count,'news_id');
      //echo "result=$result";exit;
  if( $result=="bad") return "bad";
  if(!empty($_POST['soc_list']))
  {
    foreach ($_POST['soc_list'] as $selected) 
    {
      if($selected == "facebook")
      {
        Adminka::postInFacebook();
      }
      if($selected == "twitter")
      {
        Adminka::postInTwitter();
      }
    }
  }

}

public function putDataInBuffer($data,$category)
{
        include ("php.php");
        $result= mysqli_query($db, "UPDATE buffer SET value='$data' WHERE description like '$category' ");
        if ($result == 'true') {return "good";}
        else {return "bad";}   
   
}

public function getDataFromBuffer($category)
{
    include ("php.php");
    $result = mysqli_query($db, "SELECT value as value FROM buffer WHERE description like '$category'");  
    while( $myrow = mysqli_fetch_assoc($result) )
    { $news_id = $myrow['value']; }
    mysqli_free_result($result);     
    return $news_id;
}



public function postInFacebook()
{  
   require_once 'soc_config.php';
   $news_id = Adminka::getDataFromBuffer('news_id');        

               $news_param = Adminka::getNewsInfo($news_id);
               $long_access_token = Adminka::getUserAccessToken();
               // var_dump($news_param);
               $post_title="Тестування постингу повідомлень";
               $post_img_src_view = 'http://goo.gl/4XNU4c';
               $post_img_src_post = $post_img_src_view;
               $share_url = 'http://nrk.com.ua/index.php';
               $post_url ="https://graph.facebook.com/403426539822845/feed";
               $message = $news_param["text"];
               $params_fb = array(
                          'access_token'     =>  $long_access_token,
                          'message'          =>  strip_tags($message),
                          // 'from'             =>  $nrk_group_id,
                          // 'to'               =>  $nrk_group_id,
                          'caption'          =>  $news_param["title"],
                          'method'           =>  "post",                    
                          // 'display'          => 'popup',                    
                          'name'             =>  $news_param["title"],               
                          'picture'          =>  "http://nrk.com.ua/".$news_param["img"],
                          'link'             =>  "http://nrk.com.ua/news.php?id=".$news_id,
                          'redirect_uri'     =>  $my_url.'fb.php',
                          // 'post_id'          =>  9,
                          // 'value'            => 'EVERYONE',
                          'description'      => $news_param["descr"]
                          );                
               //echo "<br><br><br>params_fb:<br>access_token=$access_token<br>".var_dump($params_fb);exit;
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, $post_url);
               curl_setopt($ch, CURLOPT_POST, 1);
               curl_setopt($ch, CURLOPT_POSTFIELDS, $params_fb);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
               $return = curl_exec($ch);
               curl_close($ch);
               $json = json_decode($return);
               //echo $json->id;
               $fb_id = $json->id;
               Adminka::updateNewsFbId($news_id, $fb_id);

               $res_text = urlencode ( "Новину №$news_id <em>".$news_param["title"]."</em><br><br> <img src='../".$news_param["img"]."' alt=''><br><p>Добавлено успішно!</p>");
               header("HTTP/1.1 301 Moved Permanently");                    
               header("Location: ./tw.php?message=".$news_param["title"]."&img_path=../".$news_param["img"]."&result=$res_text");
               exit;
   // header("HTTP/1.1 301 Moved Permanently");                    
   // header("Location: $url_fb". urldecode(http_build_query($params_fb)));
   // exit;
}

public function postInTwitter()
{

}

public function getNewsInfo($id)
          {       
              include ("php.php");
              $result = mysqli_query($db, "SELECT * FROM news WHERE id=$id");
              if (!$result) { die('Невірний запит: ' . mysqli_error());}
              while( $myrow = mysqli_fetch_assoc($result) )
              { 
                    $news_param = array(  
                      'news_count' => $id,
                      'title' => $myrow['title'],
                      'descr' => $myrow['description'],
                      'text' => $myrow['text_'],
                      'img' => $myrow['img']
                        );              
              }
              mysqli_free_result($result);
              return $news_param;
              exit;
          }


public function updateNewsFbId($news_id, $fb_id)
{ 
   include ("php.php");
   $result= mysqli_query($db, "UPDATE news SET `fb_id`='$fb_id' WHERE id='$news_id' ");
        if ($result) 
        {
            return "good";
        }
        else
        {
            return "updateNews(): bad mysqli_query($db, ".mysqli_error().")";;
        }
}      

public function  getUserAccessToken()
{
  include ("php.php");
  session_start();
  $login = $_SESSION["login"];
  $login = "vites";
  $result= mysqli_query($db, "SELECT a.value as access_token FROM access_tokens as a 
                         LEFT OUTER JOIN userlist as b 
                         ON a.user_id = b.id WHERE b.login like '$login'");
  while( $myrow = mysqli_fetch_assoc($result) )
  {$access_token =  $myrow['access_token']; }
  mysqli_free_result($result);
  return $access_token;
  exit;
}
}

?>