<?php 
  require_once("blocks/myclass.php");
  if (isset($_POST['handler'])) { 
  	    $handler = $_POST['handler']; 
        if($handler ==''){
  	      header("HTTP/1.1 301 Moved Permanently");                    
          header('Location: error.php?error=Помилка файлу handlers!');
          exit;
        }
    }
    else{
    	  header("HTTP/1.1 301 Moved Permanently");                    
          header('Location: error.php?error=Помилка файлу handlers!');
         exit;
    }

switch ($handler) {

    case add_news:         
        if (isset($_POST['title']))      { $title = $_POST['title'];      if($title ==''){unset($title);}   }
        if (isset($_POST['meta_d']))     { $meta_d = $_POST['meta_d'];    if($meta_d ==''){unset($meta_d);} }
        if (isset($_POST['meta_k']))     { $meta_k = $_POST['meta_k'];    if($meta_k ==''){unset($meta_k);} }
        if (isset($_POST['author']))     { $author = $_POST['author'];    if($author ==''){unset($author);} }
        if (isset($_POST['text']))       { $text = $_POST['text'];        if($text ==''){unset($text);}     }
        if (isset($_POST['description'])){ $descr = $_POST['description'];if($descr ==''){unset($descr);}   }
        if (isset($title) && isset($meta_d) && isset($meta_k) && isset($descr) && isset($author) && isset($text) && $_FILES["myfile"]['size'] > 0)
        {
                $news_count = Adminka::getNewsCount()+1;        
                // echo "$news_count, $title, $meta_d, $meta_k, $descr, $author, $text";exit;        
                $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                $fileName = $news_count.".".$ext;                 
                $news_directory = $_SERVER['DOCUMENT_ROOT'] . "/img/news/$news_count/";
                if (!is_dir($news_directory)) mkdir($news_directory,0777);           
                $path_to_file_tmp = $news_directory . $fileName;
                if (file_exists($path_to_file_tmp)) unlink($path_to_file_tmp);
                move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_file_tmp);                  
                $path_to_newsIcon = $_SERVER['DOCUMENT_ROOT'] ."/img/news/" . $fileName;  
                move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_newsIcon);                 
                Adminka::imgResize($path_to_file_tmp, $path_to_newsIcon, 370, 300, $ext);              
                
                $result = Adminka::addNews($news_count, $title, $meta_d, $meta_k, $descr, $author, $text, $ext); 
                if($result =="good") {
                    Adminka::postInSocNetworks($news_count);
                    $res_text = urlencode ( "Новину №$news_count <em>$title</em><br><br> <img src='../img/news/$news_count.$ext' alt=''><br><p>Добавлено успешно!</p>");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
                }else{
                    $res_text = urlencode ("Новину Не Добавлено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
                }            
        }else{
            $res_text = urlencode ("Не всі параметри заповнені!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }                
        break;

    case admin_error_message:
        if (mail("vites@i.ua","admin_error_message", isset($_POST['error']) ? $_POST['error'] : "Empty message!"))
        {
            $res_text = urlencode ("Повідомлення надіслане адміністратору сайту!".$result);
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: result.php?result=$res_text");
            exit;
        }else{
            $res_text = urlencode ("Повідомлення не надіслано!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }        
        break;
        
    case del_news:
        if (isset($_POST['id'])) {$id = $_POST['id']; if($id ==''){unset($id);}}
        if (isset($_POST['img_src'])) {$img_src = $_POST['img_src']; if($img_src ==''){unset($img_src);}}       
        if (isset($img_src) && isset($id) )
        {
            $result = Adminka::delNews($id, $img_src);
            if($result=="good") 
            {
                    $res_text = urlencode ( "Новину Видалено успiшно!");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
            }else{
                    $res_text = urlencode ("Новину Не Видалено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
            }           
        }else{
            $res_text = urlencode ("Не вибрана жодна новина для видалення!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }       
        break;

    case edit_news:
        if (isset($_POST['id']))         { $id = $_POST['id'];            if($id ==''){unset($id);}         }
        if (isset($_POST['img_src']))    { $img_src = $_POST['img_src'];  if($img_src ==''){unset($img_src);}}
        if (isset($_POST['title']))      { $title = $_POST['title'];      if($title ==''){unset($title);}   }
        if (isset($_POST['meta_d']))     { $meta_d = $_POST['meta_d'];    if($meta_d ==''){unset($meta_d);} }
        if (isset($_POST['meta_k']))     { $meta_k = $_POST['meta_k'];    if($meta_k ==''){unset($meta_k);} }
        if (isset($_POST['author']))     { $author = $_POST['author'];    if($author ==''){unset($author);} }
        if (isset($_POST['text']))       { $text = $_POST['text'];        if($text =='') {unset($text);}     }
        if (isset($_POST['description'])){ $descr = $_POST['description'];if($descr ==''){unset($descr);}   }
        if (isset($_POST['date_']))       { $date = $_POST['date_'];        if($date =='') {unset($date);}     }
        if (isset($title) && isset($meta_d) && isset($meta_k) && isset($descr) && isset($author) && isset($text) && isset($date) && isset($img_src))
        {
            if( $_FILES["myfile"]['size'] > 0)
            {
                    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                    $fileName = $id.".".$ext; 
                    $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua". "/img/news/$id/";
                    $path_to_file_tmp = $news_directory . $fileName;
                    if (file_exists($path_to_file_tmp)) unlink($path_to_file_tmp);
                    move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_file_tmp);                  
                    $path_to_newsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua"."/img/news/" . $fileName; 
                    $path_to_oldNewsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua/".$img_src;
                    $img_src = "img/news/".$fileName;
                    if (file_exists($path_to_newsIcon)) unlink($path_to_newsIcon); 
                    if (file_exists($path_to_oldNewsIcon)) unlink($path_to_oldNewsIcon); 
                    move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_newsIcon);                 
                    Adminka::imgResize($path_to_file_tmp, $path_to_newsIcon, 370, 300, $ext); 
            }        
            $result = Adminka::updateNews($id, $title, $meta_d, $meta_k, $descr, $author, $date, $text, $img_src);
            if($result=="good") 
            {
                    $res_text = urlencode ( "Новину Обновлено успiшно!");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
            }else{
                    $res_text = urlencode ("Новину Не Обновлено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
            }       
        }else{
            //echo "$title,$meta_d,$meta_k,$descr,$author,$text,$date,$img_src";exit;
            $res_text = urlencode ("Не всі параметри заповнені!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }
    break;
    case add_newsPhoto:
        if (isset($_POST['id'])) { $id = $_POST['id']; if($id ==''){unset($id);}}
        if (isset($_POST['id']))
        { 
            $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua". "/img/news/$id/";
            if( $_FILES["myfile1"]['size'] > 0)
            {
                $path_to_file = $news_directory . $_FILES["myfile1"]['name'];
                if (file_exists($path_to_file)) unlink($path_to_file);
                move_uploaded_file($_FILES["myfile1"]['tmp_name'], $path_to_file); 
            }
            if( $_FILES["myfile2"]['size'] > 0)
            {
                $path_to_file = $news_directory . $_FILES["myfile2"]['name'];
                if (file_exists($path_to_file)) unlink($path_to_file);
                move_uploaded_file($_FILES["myfile2"]['tmp_name'], $path_to_file); 
            }
            if( $_FILES["myfile3"]['size'] > 0)
            {
                $path_to_file = $news_directory . $_FILES["myfile3"]['name'];
                if (file_exists($path_to_file)) unlink($path_to_file);
                move_uploaded_file($_FILES["myfile3"]['tmp_name'], $path_to_file); 
            }
            if( $_FILES["myfile4"]['size'] > 0)
            {
                $path_to_file = $news_directory . $_FILES["myfile4"]['name'];
                if (file_exists($path_to_file)) unlink($path_to_file);
                move_uploaded_file($_FILES["myfile4"]['tmp_name'], $path_to_file); 
            }
            if( $_FILES["myfile5"]['size'] > 0)
            {
                $path_to_file = $news_directory . $_FILES["myfile5"]['name'];
                if (file_exists($path_to_file)) unlink($path_to_file);
                move_uploaded_file($_FILES["myfile5"]['tmp_name'], $path_to_file); 
            }
            $res_text = urlencode ( "Фото добалено!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: result.php?result=$res_text");
            exit;
        }else{
            //echo "$title,$meta_d,$meta_k,$descr,$author,$text,$date,$img_src";exit;
            $res_text = urlencode ("Не всі параметри заповнені!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }
    break;
    case del_newsPhoto:
            $result = Adminka::delFotoNews();
            if($result=="good") 
            {
                    $res_text = urlencode ( "Фотографії видалено успiшно!");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
            }else{
                    $res_text = urlencode ("Фотографії не видалено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
            }       
    break;

     case add_article:         
        if (isset($_POST['title']))      { $title = $_POST['title'];      if($title ==''){unset($title);}   }
        if (isset($_POST['meta_d']))     { $meta_d = $_POST['meta_d'];    if($meta_d ==''){unset($meta_d);} }
        if (isset($_POST['meta_k']))     { $meta_k = $_POST['meta_k'];    if($meta_k ==''){unset($meta_k);} }
        if (isset($_POST['author']))     { $author = $_POST['author'];    if($author ==''){unset($author);} }
        if (isset($_POST['text']))       { $text = $_POST['text'];        if($text ==''){unset($text);}     }
        if (isset($_POST['description'])){ $descr = $_POST['description'];if($descr ==''){unset($descr);}   }
        if (isset($title) && isset($meta_d) && isset($meta_k) && isset($descr) && isset($author) && isset($text) && $_FILES["myfile"]['size'] > 0)
        {
                $news_count = Adminka::getArticlesCount()+1;        
                // echo "$news_count, $title, $meta_d, $meta_k, $descr, $author, $text";exit;        
                $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                $fileName = $news_count.".".$ext;                 
                $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua". "/img/articles/$news_count/";
                if (!is_dir($news_directory)) mkdir($news_directory,0777);           
                $path_to_file_tmp = $news_directory . $fileName;
                if (file_exists($path_to_file_tmp)) unlink($path_to_file_tmp);
                move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_file_tmp);                  
                $path_to_newsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua"."/img/articles/" . $fileName;  
                move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_newsIcon);                 
                Adminka::imgResize($path_to_file_tmp, $path_to_newsIcon, 370, 300, $ext);              
                
                $result = Adminka::addArticle($news_count, $title, $meta_d, $meta_k, $descr, $author, $text, $ext); 
                if($result =="good") {
                    // Adminka::postInSocNetworks($news_count);
                    $res_text = urlencode ( "Статтю <em>$title</em><br><br> <img src='../img/articles/$news_count.$ext' alt=''><br><p>Добавлено успешно!</p>");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
                }else{
                    $res_text = urlencode ("Статтю Не Добавлено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
                }            
        }else{
            $res_text = urlencode ("Не всі параметри заповнені!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }                
        break;

        case edit_article:
        if (isset($_POST['id']))         { $id = $_POST['id'];            if($id ==''){unset($id);}         }
        if (isset($_POST['img_src']))    { $img_src = $_POST['img_src'];  if($img_src ==''){unset($img_src);}}
        if (isset($_POST['title']))      { $title = $_POST['title'];      if($title ==''){unset($title);}   }
        if (isset($_POST['meta_d']))     { $meta_d = $_POST['meta_d'];    if($meta_d ==''){unset($meta_d);} }
        if (isset($_POST['meta_k']))     { $meta_k = $_POST['meta_k'];    if($meta_k ==''){unset($meta_k);} }
        if (isset($_POST['author']))     { $author = $_POST['author'];    if($author ==''){unset($author);} }
        if (isset($_POST['text']))       { $text = $_POST['text'];        if($text =='') {unset($text);}     }
        if (isset($_POST['description'])){ $descr = $_POST['description'];if($descr ==''){unset($descr);}   }
        if (isset($_POST['date_']))       { $date = $_POST['date_'];        if($date =='') {unset($date);}     }
        if (isset($title) && isset($meta_d) && isset($meta_k) && isset($descr) && isset($author) && isset($text) && isset($date) && isset($img_src))
        {
            if( $_FILES["myfile"]['size'] > 0)
            {
                    $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                    $fileName = $id.".".$ext; 
                    $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua". "/img/articles/$id/";
                    $path_to_file_tmp = $news_directory . $fileName;
                    if (file_exists($path_to_file_tmp)) unlink($path_to_file_tmp);
                    move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_file_tmp);                  
                    $path_to_newsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua"."/img/articles/" . $fileName; 
                    $path_to_oldNewsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua/".$img_src;
                    $img_src = "img/news/".$fileName;
                    if (file_exists($path_to_newsIcon)) unlink($path_to_newsIcon); 
                    if (file_exists($path_to_oldNewsIcon)) unlink($path_to_oldNewsIcon); 
                    move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_newsIcon);                 
                    Adminka::imgResize($path_to_file_tmp, $path_to_newsIcon, 370, 300, $ext); 
            }        
            $result = Adminka::updateArticle($id, $title, $meta_d, $meta_k, $descr, $author, $date, $text, $img_src);
            if($result=="good") 
            {
                    $res_text = urlencode ( "Статтю Обновлено успiшно!");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
            }else{
                    $res_text = urlencode ("Статтю Не Обновлено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
            }       
        }else{
            //echo "$title,$meta_d,$meta_k,$descr,$author,$text,$date,$img_src";exit;
            $res_text = urlencode ("Не всі параметри заповнені!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }
    break;

    case del_article:
        if (isset($_POST['id'])) {$id = $_POST['id']; if($id ==''){unset($id);}}
        if (isset($_POST['img_src'])) {$img_src = $_POST['img_src']; if($img_src ==''){unset($img_src);}}       
        if (isset($img_src) && isset($id) )
        {
            $result = Adminka::delArticle($id, $img_src);
            if($result=="good") 
            {
                    $res_text = urlencode ( "Статтю Видалено успiшно!");
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: result.php?result=$res_text");
                    exit;
            }else{
                    $res_text = urlencode ("Статтю Не Видалено! -  ".$result);
                    header("HTTP/1.1 301 Moved Permanently");                    
                    header("Location: error.php?error=$res_text");
                    exit;
            }           
        }else{
            $res_text = urlencode ("Не вибрана жодна Стаття для видалення!");
            header("HTTP/1.1 301 Moved Permanently");                    
            header("Location: error.php?error=$res_text");
            exit;
        }       
        break;

        case add_desc:         
           if (isset($_POST['title']))      { $title = $_POST['title'];      if($title ==''){unset($title);}   }
           if (isset($_POST['meta_d']))     { $meta_d = $_POST['meta_d'];    if($meta_d ==''){unset($meta_d);} }
           if (isset($_POST['meta_k']))     { $meta_k = $_POST['meta_k'];    if($meta_k ==''){unset($meta_k);} }
           if (isset($_POST['author']))     { $author = $_POST['author'];    if($author ==''){unset($author);} }
           if (isset($_POST['text']))       { $text = $_POST['text'];        if($text ==''){unset($text);}     }
           if (isset($_POST['description'])){ $descr = $_POST['description'];if($descr ==''){unset($descr);}   }
           if (isset($title) && isset($meta_d) && isset($meta_k) && isset($descr) && isset($author) && isset($text) && $_FILES["myfile"]['size'] > 0)
           {
                   $news_count = Adminka::getDescCount()+1;        
                   // echo "$news_count, $title, $meta_d, $meta_k, $descr, $author, $text";exit;        
                   $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                   $fileName = $news_count.".".$ext;                 
                   $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua". "/img/desc/$news_count/";
                   if (!is_dir($news_directory)) mkdir($news_directory,0777);           
                   $path_to_file_tmp = $news_directory . $fileName;
                   if (file_exists($path_to_file_tmp)) unlink($path_to_file_tmp);
                   move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_file_tmp);                  
                   $path_to_newsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua"."/img/desc/" . $fileName;  
                   move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_newsIcon);                 
                   Adminka::imgResize($path_to_file_tmp, $path_to_newsIcon, 370, 300, $ext);              
                   
                   $result = Adminka::addDesc($news_count, $title, $meta_d, $meta_k, $descr, $author, $text, $ext); 
                   if($result =="good") {
                       // Adminka::postInSocNetworks($news_count);
                       $res_text = urlencode ( "Оголошення <em>$title</em><br><br> <img src='../img/desc/$news_count.$ext' alt=''><br><p>Добавлено успешно!</p>");
                       header("HTTP/1.1 301 Moved Permanently");                    
                       header("Location: result.php?result=$res_text");
                       exit;
                   }else{
                       $res_text = urlencode ("Оголошення Не Добавлено! -  ".$result);
                       header("HTTP/1.1 301 Moved Permanently");                    
                       header("Location: error.php?error=$res_text");
                       exit;
                   }            
           }else{
               $res_text = urlencode ("Не всі параметри заповнені!");
               header("HTTP/1.1 301 Moved Permanently");                    
               header("Location: error.php?error=$res_text");
               exit;
           }                
           break;

               case edit_desc:
               if (isset($_POST['id']))         { $id = $_POST['id'];            if($id ==''){unset($id);}         }
               if (isset($_POST['img_src']))    { $img_src = $_POST['img_src'];  if($img_src ==''){unset($img_src);}}
               if (isset($_POST['title']))      { $title = $_POST['title'];      if($title ==''){unset($title);}   }
               if (isset($_POST['meta_d']))     { $meta_d = $_POST['meta_d'];    if($meta_d ==''){unset($meta_d);} }
               if (isset($_POST['meta_k']))     { $meta_k = $_POST['meta_k'];    if($meta_k ==''){unset($meta_k);} }
               if (isset($_POST['author']))     { $author = $_POST['author'];    if($author ==''){unset($author);} }
               if (isset($_POST['text']))       { $text = $_POST['text'];        if($text =='') {unset($text);}     }
               if (isset($_POST['description'])){ $descr = $_POST['description'];if($descr ==''){unset($descr);}   }
               if (isset($_POST['date_']))       { $date = $_POST['date_'];        if($date =='') {unset($date);}     }
               if (isset($title) && isset($meta_d) && isset($meta_k) && isset($descr) && isset($author) && isset($text) && isset($date) && isset($img_src))
               {
                   if( $_FILES["myfile"]['size'] > 0)
                   {
                           $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
                           $fileName = $id.".".$ext; 
                           $news_directory = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua". "/img/desc/$id/";
                           $path_to_file_tmp = $news_directory . $fileName;
                           if (file_exists($path_to_file_tmp)) unlink($path_to_file_tmp);
                           move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_file_tmp);                  
                           $path_to_newsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua"."/img/desc/" . $fileName; 
                           $path_to_oldNewsIcon = $_SERVER['DOCUMENT_ROOT'] ."/nrk.com.ua/".$img_src;
                           $img_src = "img/desc/".$fileName;
                           if (file_exists($path_to_newsIcon)) unlink($path_to_newsIcon); 
                           if (file_exists($path_to_oldNewsIcon)) unlink($path_to_oldNewsIcon); 
                           move_uploaded_file($_FILES["myfile"]['tmp_name'], $path_to_newsIcon);                 
                           Adminka::imgResize($path_to_file_tmp, $path_to_newsIcon, 370, 300, $ext); 
                   }        
                   $result = Adminka::updateDesc($id, $title, $meta_d, $meta_k, $descr, $author, $date, $text, $img_src);
                   if($result=="good") 
                   {
                           $res_text = urlencode ( "Оголошення Обновлено успiшно!");
                           header("HTTP/1.1 301 Moved Permanently");                    
                           header("Location: result.php?result=$res_text");
                           exit;
                   }else{
                           $res_text = urlencode ("Оголошення Не Обновлено! -  ".$result);
                           header("HTTP/1.1 301 Moved Permanently");                    
                           header("Location: error.php?error=$res_text");
                           exit;
                   }       
               }else{
                   //echo "$title,$meta_d,$meta_k,$descr,$author,$text,$date,$img_src";exit;
                   $res_text = urlencode ("Не всі параметри заповнені!");
                   header("HTTP/1.1 301 Moved Permanently");                    
                   header("Location: error.php?error=$res_text");
                   exit;
               }
           break;

           case del_desc:
               if (isset($_POST['id'])) {$id = $_POST['id']; if($id ==''){unset($id);}}
               if (isset($_POST['img_src'])) {$img_src = $_POST['img_src']; if($img_src ==''){unset($img_src);}}       
               if (isset($img_src) && isset($id) )
               {
                   $result = Adminka::delDesc($id, $img_src);
                   if($result=="good") 
                   {
                           $res_text = urlencode ( "Оголошення Видалено успiшно!");
                           header("HTTP/1.1 301 Moved Permanently");                    
                           header("Location: result.php?result=$res_text");
                           exit;
                   }else{
                           $res_text = urlencode ("Оголошення Не Видалено! -  ".$result);
                           header("HTTP/1.1 301 Moved Permanently");                    
                           header("Location: error.php?error=$res_text");
                           exit;
                   }           
               }else{
                   $res_text = urlencode ("Не вибрана жоднe Оголошення для видалення!");
                   header("HTTP/1.1 301 Moved Permanently");                    
                   header("Location: error.php?error=$res_text");
                   exit;
               }       
               break;


}




     
  
  ?>