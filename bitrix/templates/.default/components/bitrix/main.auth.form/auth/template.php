<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
    die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

\Bitrix\Main\Page\Asset::getInstance()->addCss(
    '/bitrix/css/main/system.auth/flat/style.css'
);
print_r($arResult);
if ($arResult['AUTHORIZED']):?>
    <span class="hd_sing">
        Иван Иванов [admin]
    </span>
    <a href="?logout=yes" class="hd_signup">Выйти</a>
<?return;?>
<?endif;?>

<span class="hd_singin">
    <a id="hd_singin_but_open" href="">Войти на сайт</a>
    <div class="hd_loginform">
        <span class="hd_title_loginform">Войти на сайт</span>
        <form name="<?= $arResult['FORM_ID'];?>" method="post" action="<?= POST_FORM_ACTION_URI;?>">

            <input placeholder="Логин" type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>">
            <input placeholder="Пароль"  type="password" name="<?= $arResult['FIELDS']['password'];?>" maxlength="255" autocomplete="off">

            <noindex>
            <a href="<?=$arResult['AUTH_FORGOT_PASSWORD_URL']?>" class="hd_forgotpassword">Забыли пароль</a>
            </noindex>

            <div class="head_remember_me" style="margin-top: 10px">
                <input id="USER_REMEMBER" name="<?= $arResult['FIELDS']['remember'];?>" value="Y" type="checkbox">
                <label for="USER_REMEMBER_frm" title="Запомнить меня на этом компьютере">Запомнить меня</label>
            </div>

            <input value="Войти" type="submit" class="btn btn-primary" name="<?= $arResult['FIELDS']['action'];?>" style="margin-top: 20px;">
            </form>
        <span class="hd_close_loginform">Закрыть</span>
    </div>
    </span><br>
<a href="<?=$arResult['AUTH_REGISTER_URL']?>" class="hd_signup">Зарегистрироваться</a>
