<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eshop";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>eshop</title>
    <link rel="stylesheet" href="style/mess.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<header>
<ul>
	<li><a href="/">ГЛАВНАЯ</a></li>
	<li><a href="admin/index1.php">ВСЕ ТОВАРЫ</a></li>
	<li><a href="/">КОРЗИНА</a></li>
	<li><a href="/">КАК С НАМИ СВЯЗАТЬСЯ</a></li>
</ul>

</header>
<div id="contact-page" class="container">
      <div class="bg">
        <div class="row">        
          <div class="col-sm-12">                   
          <h2 class="title text-center">Как с нами связаться?<strong></strong></h2>                                  
          <div id="gmap" class="contact-map">
          </div>
        </div>           
      </div>      
        <div class="row">    
          <div class="col-sm-8">
            <div class="contact-form">
              <h2 class="title text-center">Заполняйте форму!</h2>
              <div class="status alert alert-success" </div>
              <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                    </div>                        
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Отправить">
                    </div>
                </form>
            </div>
          </div>
         <div class="contact">
	<h2><ins>Контакты</ins></h2>
    <h3><p>Адрес: Украина, г.Харьков, ул.Пушкинская, 79/1 </p></h3>
	<h3><p>Электронная почта: oooks98.a.a@gmail.com </p></h3>
	<h3><p>Номер телефона : +380958091326 </p></h3>
	<a href="https://www.facebook.com/profile.php?id=100023675714810&ref=bookmarks" target="_blank"><img src="images/f.png" title=" Я в Facebook" width="60" height="65"></a>
	<a href="https://www.instagram.com/oks_adamenko/" target="_blank"><img src="images/in.jpg" title=" Я в Instagram"  width="65" height="65"></a>
	<a href="https://www.instagram.com/oks_adamenko/" target="_blank"><img src="images/vk.png" title=" Я в Instagram"  width="70" height="65"></a>
	</div>        
        </div>  
      </div>  
    </div><!--/#contact-page-->