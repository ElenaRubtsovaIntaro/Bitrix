<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.form", 
	"auth2", 
	array(
		"AUTH_FORGOT_PASSWORD_URL" => "/user/",
		"AUTH_REGISTER_URL" => "/user/registartion.php",
		"AUTH_SUCCESS_URL" => "/user/profile.php",
		"COMPONENT_TEMPLATE" => "auth2"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>