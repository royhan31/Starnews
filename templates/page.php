<?php

$news = '';
if (isset($_GET['news'])) {
		$news = $_GET['news'];
}
$current_page = $news;
switch ($news) {

	case 'home':
		$news = "include 'home.php';";
		break;
	case 'contact':
		$news = "include 'contact.php';";
		break;
	default:
    header('Location: ?news=home');
		break;
}

$content = $news;
?>
