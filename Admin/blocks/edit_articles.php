<?php 
if (isset($_GET['article_id'])) {$article_id = $_GET['article_id'];} 
if (!isset($article_id))
{
echo "<br><br>";
$result = mysql_query("SELECT title, id, img FROM articles order by id desc");
$myrow = mysql_fetch_array($result); 
do 
{
printf ("<p><img src='../$myrow[img]' style='height:50px;' />
         <a href='index.php?id=9&article_id=%s'>%s</a></p><br>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));
echo "<br><br><br><br><br><br><br><br>";
}
else
{
$result = mysql_query("SELECT * FROM articles WHERE id = $article_id order by id desc");
$myrow = mysql_fetch_array($result); 
$img_src = $_SERVER['DOCUMENT_ROOT'] . "/nrk.com.ua/" . $myrow['img'];
$title = str_replace("\"", "''", $myrow['title']);
$text = str_replace("\"", "''", $myrow['text_']);
$description = str_replace("\"", "''", $myrow['description']);
//$title = str_replace("`", "'", $myrow['title']);
//$text = str_replace("`", "'", $myrow['text']);
//$description = str_replace("`", "'", $myrow['description']);


print <<<HERE
<h1>$myrow[title]</h1>
<div style="width:50%; text-align:center"><img style='width:150px' src='../$myrow[img]' alt='../$myrow[img]' /></div><br><br>
<form name="form1" method="post" action="handler.php" enctype='multipart/form-data'>
    <input type="hidden" name="handler"  id="handler" value="edit_article"/>
    <p>
      <label>Назва</label> <br>
      <input value="$title" type="text" name="title" id="title" size="100" maxlength="90" required>       
               
    </p>
    <p>
      <label>Ключовий опис</label><br>
      <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" size="100" required>
      
    </p>
    <p>
      <label>Ключові слова</label><br>
      <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" size="100" required>
      
    </p>   
    <p>
      <label>Короткий опис</label><br>
        <input value="$description" name="description" type="text" id="description" size="100" required>       
    </p>
    <p>
      <label>Автор </label><br>
        <input value="$myrow[author]" name="author" type="text" id="author" size="100" required>       
    </p>
    <p>
      <label>Дата</label><br>
        <input value="$myrow[date_]"  name="date_" type="text" id="date_" size="100" required>        
    </p>
    <p>
      <label>Текст новини </label><br>   
        <textarea name="text" id="text" cols="100" rows="20" required>$text</textarea>       
    </p>    
    <p>
      <label>Картинка (370x300)&nbsp; бажано формат .png  </label>   
      <input type='file' name='myfile' id='myfile' />        
    </p>
    <input name="id" type="hidden" value="$myrow[id]"><br>
    <input name="img_src" type="hidden" value="$myrow[img]"><br>
     <p>
      <label>
      <input type="submit" name="submit" id="submit" value="Зберегти зміни">
      </label>
    </p>
  </form>

HERE;
}
?>