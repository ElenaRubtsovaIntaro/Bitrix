<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

\Bitrix\Main\Page\Asset::getInstance()->addCss(
    '/bitrix/css/main/system.auth/flat/style.css'
);
dump($arResult,false,true);
if ($arResult['AUTHORIZED']):?>
    <?= \htmlspecialcharsbx($arResult['USER_NAME']);?>
    <a href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL']; ?>?logout=yes"
       class="hd_signup">Выйти</a>
<?else:?>

<? if ($arResult['ERRORS']): ?>
    <div class="alert alert-danger">
        <? foreach ($arResult['ERRORS'] as $error) {
            echo $error;
        }
        ?>
    </div>
<? endif; ?>

<span class="hd_singin"><a id="hd_singin_but_open" href="">Войти на сайт</a>
							<div class="hd_loginform">
								<span class="hd_title_loginform">Войти на сайт</span>
<form name="<?= $arResult['FORM_ID']; ?>" method="post" target="_top"
      action="<?= POST_FORM_ACTION_URI; ?>">

            <input type="text" name="<?= $arResult['FIELDS']['login']; ?>" maxlength="255"
                   value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']); ?>"/>

            <? if ($arResult['SECURE_AUTH']): ?>
                <div class="bx-authform-psw-protected" id="bx_auth_secure" style="display:none">
                    <div class="bx-authform-psw-protected-desc"><span></span>
                        <?= Loc::getMessage('MAIN_AUTH_FORM_SECURE_NOTE'); ?>
                    </div>
                </div>
                <script type="text/javascript">
                    document.getElementById('bx_auth_secure').style.display = '';
                </script>
            <? endif ?>
            <input type="password" name="<?= $arResult['FIELDS']['password']; ?>" maxlength="255" autocomplete="off"/>

    <? if ($arResult['AUTH_FORGOT_PASSWORD_URL'] || $arResult['AUTH_REGISTER_URL']): ?>
        <noindex>
            <a href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL']; ?>?forgot_password=yes"
                class="hd_forgotpassword" rel="nofollow">Забыли пароль</a>
        </noindex>
    <? endif; ?>

    <?if (false && $arResult['CAPTCHA_CODE']):?>
        <input type="hidden" name="captcha_sid" value="<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" />
        <div class="bx-authform-formgroup-container dbg_captha">
        <div class="bx-authform-label-container">
          <?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_CAPTCHA');?>
        </div>
        <div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?= \htmlspecialcharsbx($arResult['CAPTCHA_CODE']);?>" width="180" height="40" alt="CAPTCHA" /></div>
        <div class="bx-authform-input-container">
          <input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
        </div>
      </div>
    <?endif;?>

    <div class="head_remember_me" style="margin-top: 10px">
        <input id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" type="checkbox">
        <label for="USER_REMEMBER_frm" title="Запомнить меня на этом компьютере">Запомнить меня</label>
    </div>

    <input type="submit" style="margin-top: 20px;" name="<?= $arResult['FIELDS']['action']; ?>"
           value="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_SUBMIT'); ?>"/>
</form>

<span class="hd_close_loginform">Закрыть</span>
</div></span><br>


<? if ($arResult['AUTH_REGISTER_URL']): ?>
    <a href="<?= $arResult['AUTH_REGISTER_URL']; ?>" class="hd_signup" rel="nofollow">
        <?= Loc::getMessage('MAIN_AUTH_FORM_URL_REGISTER_URL'); ?>
    </a>
<? endif; ?>

<? endif; ?>

<script type="text/javascript">
    <?if ($arResult['LAST_LOGIN'] != ''):?>
    try {
        document.<?= $arResult['FORM_ID'];?>.USER_PASSWORD.focus();
    } catch (e) {
    }
    <?else:?>
    try {
        document.<?= $arResult['FORM_ID'];?>.USER_LOGIN.focus();
    } catch (e) {
    }
    <?endif?>
</script>