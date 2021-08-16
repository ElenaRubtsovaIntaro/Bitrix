<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>

<div class="hd_header">
    <table>
        <tr>
            <td rowspan="2" class="hd_companyname">
                <h1><a href="">Мебельный магазин</a></h1>
            </td>
            <td rowspan="2" class="hd_txarea">
                <span class="tel">8 (495) 212-85-06</span>	<br/>
                <?= GetMessage("WORKING_TIME")?> <span class="workhours">ежедневно с 9-00 до 18-00</span>
            </td>
            <td style="width:232px">
                <form action="">
                    <div class="hd_search_form" style="float:right;">
                        <input placeholder="Поиск" type="text"/>
                        <input type="submit" value=""/>
                    </div>
                </form>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 11px;">
                <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"auth", 
	array(
		"AUTH_FORGOT_PASSWORD_URL" => "/user/",
		"AUTH_REGISTER_URL" => "/user/registartion.php",
		"AUTH_SUCCESS_URL" => "/user/profile.php",
		"COMPONENT_TEMPLATE" => "auth",
		"REGISTER_URL" => "",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
	),
	false
);?>
            </td>
        </tr>
    </table>
    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "top_multi",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y"
	),
	false
);?>
</div>
