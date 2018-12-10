<?php
$dbc = mysqli_connect('localhost', 'root', '', 'site');
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
				header('Location: '. $home_url);
			}
			else {
				echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
			}
		}
		else {
			echo 'Извините вы должны заполнить поля правильно';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style/style.css" rel="stylesheet">
</head>
<body>
<header>
<ul>
	<li><a href="/">ГЛАВНАЯ</a></li>
	<li><a href="admin/index1.php">ВСЕ ТОВАРЫ</a></li>
	<li><a href="admin/cart.html">КОРЗИНА</a></li>
	<li><a href="mes.php">КАК С НАМИ СВЯЗАТЬСЯ</a></li>
</ul>
</header>
<content>
	<div class="articles">
		<img src="images/3.jpg">
		<h2>О книжном интернет магазине Books </h2>
		<p>Добро пожаловать в наш эксклюзивный книжный магазин! Нашим покупателям мы всегда предлагаем лучшие книги по оптимальным ценам.

Ассортимент магазина - более 30 000 наименований книг, и он постоянно пополняется лучшими изданиями. В каталоге нашего сайта без проблем можно найти:

    прозу (современную и классическую);
    лучшие образцы мировой поэзии;
    фэнтези и научную фантастику;
    захватывающие детективы и триллеры;
    всевозможную эзотерику;
    бестселлеры научно-популярного содержания;
    специализированные и узкопрофессиональные издания;
    учебно-методическую литературу;
    книги для детей;
    подарочные издания;

Наши преимущества:

    с Вами работают внимательные, отзывчивые и профессиональные сотрудники;
    Мы отправляем заказы в любую точку мира ;
    Вы можете оставить заказ, если издания еще к нам не поступило;
    Вы можете сделать подарок Вашим близким, друзьям, коллегам и партнерам, выбрав книги из нашего каталога. Мы доставим его по указанному Вами адресу.
</p>
		<a href="/">Читать полностью</a>
	</div>
	<div class="articles">
		<img src="images/3.jpg">
		<h2>Уникальные книги только для Вас!</h2>
		<p>
		Традиционная книга будет актуальной всегда. Современные гаджеты, планшеты и «читалки» не заменят настоящую книгу, которую приятно держать в руках, осторожно листая страницы и ощущая не сравнимый ни с чем запах. И главное, что читающих людей сегодня в нашей стране не становится меньше. Поэтому мы приглашаем вас посетить наш книжный интернет-магазин Books.

		Во все времена считалось, что лучше подарка, чем книга, быть не может. Мы полностью разделяем это мнение. Поэтому предлагаем вам не только купить подарочные книжные наборы, но и празднично оформить и доставить книги в Киев, Одессу, Днепр, Львов, Харьков и другие города Украины. Заходите в книжный интернет-магазин Букс, выбирайте и покупайте литературные шедевры авторов, которые не оставят вас равнодушными. Большой ассортимент никого не оставит равнодушным!

		Делайте подарки своим коллегам, партнерам, детям и внукам и просто наслаждайтесь чтением!
	Надеемся, Вам у нас очень понравится)))</p>
		<a href="/">Читать полностью</a>
	</div>
	
</content>
<section>
<?php
	if(empty($_COOKIE['username'])) {
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label for="username">Логин:</label>
	<input type="text" name="username">
	<label for="password">Пароль:</label>
	<input type="password" name="password">
	<button type="submit" name="submit">Вход</button>
	<a href="signup.php">Регистрация</a>
	</form>
<?php
}
else {
	?>
	<p><a href="myprofile.php">Мой профиль</a></p>
	<p><a href="exit.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></p>
<?php	
}
?>
</section>


<footer class="clear">
	<p>Все права защищены</p>
</footer>

</body>

</html>