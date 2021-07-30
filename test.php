<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?$APPLICATION->IncludeComponent("bitrix:main.auth.form", "auth", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"AUTH_FORGOT_PASSWORD_URL" => "/user/",	// Страница для восстановления пароля
		"AUTH_REGISTER_URL" => "/user/registartion.php",	// Страница для регистрации
		"AUTH_SUCCESS_URL" => "/user/profile.php",	// Страница после успешной авторизации
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>