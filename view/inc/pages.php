<?php
if(isset($_GET['page'])){
	switch($_GET['page']){
		case "homepage";
			include("module/home/view/home.html");
			break;

		case "ctrl_home";
			include("module/home/ctrl/".$_GET['page'].".php");
			break;

		case "ctrl_shop";
			include("module/shop/ctrl/".$_GET['page'].".php");
			break;
		case "ctrl_login";
			include("module/login/ctrl/".$_GET['page'].".php");
			break;

		case "ctrl_cart";
			include("module/cart/ctrl/".$_GET['page'].".php");
			break;

		// case "ctrl_cart";
		// include("module/home/ctrl/".$_GET['page'].".php");
		// 	// include("module/cart/ctrl/".$_GET['page'].".php");
		// 	break;

			
		case "services";
			include("module/services/".$_GET['page'].".php");
			break;

		case "aboutus";
			include("module/aboutus/".$_GET['page'].".html");
			break;

		case "contact";
			include("module/contact/".$_GET['page'].".html");
			break;

		case "blog";
			include("module/blog/".$_GET['page'].".html");
			break;

		case "property";
			include("module/property/".$_GET['page'].".html");
			break;

		case "blog-single";
			include("module/blog-single/".$_GET['page'].".html");
			break;

		case "agent-single";
			include("module/agent-single/".$_GET['page'].".html");
			break;

		case "agents-grid";
			include("module/agents-grid/".$_GET['page'].".html");
			break;
			
		case "property-grid";
			include("module/property-grid/".$_GET['page'].".html");
			break;

		case "404";
			include("view/inc/error".$_GET['page'].".php");
			break;
		case "503";
			include("view/inc/error".$_GET['page'].".php");
			break;
			
		// default;
		// 	include("module/home/ctrl/index.php");
		// 	break;
	}
}else{
	include("module/home/ctrl/ctrl_home.php");
}
?>