<?php

$get = '';
if (isset($_GET['page'])) {
		$get = $_GET['page'];
}
$current_page = $get;
switch ($get) {
	case 'dashboard':
		$get = "include 'pages/dashboard.php';";
		break;
	case 'news':
		$get = "include 'pages/news.php';";
		break;
	case 'create_news':
		$get = "include 'pages/create_news.php';";
		break;
	case 'update_news':
		$get = "include 'pages/update_news.php';";
		break;
	case 'category':
		$get = "include 'pages/category.php';";
		break;
	default:
		header('Location: ?page=dashboard');
		break;
}

$content = $get;
?>
