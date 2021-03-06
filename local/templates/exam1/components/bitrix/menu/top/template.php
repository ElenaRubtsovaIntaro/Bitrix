<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

    <nav class="nav">
    <div class="inner-wrap">
    <div class="menu-block popup-wrap">
    <a href="" class="btn-menu btn-toggle"></a>
    <div class="menu popup-block">

<ul>
    <li class="main-page">
        <a href="/">Главная</a>
    </li>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

    <?
    //print_r($arItem);
    //<Цвет> ?>
    <? if ($arItem["PARAMS"]["MENU_COLOR"]):?>
        <? $sMenuColor = $arItem["PARAMS"]["MENU_COLOR"]; ?>
    <? else: ?>
        <? $sMenuColor = ""; ?>
    <? endif; ?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" class="<?= $sMenuColor ?> <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="<?= $sMenuColor ?> item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

        <? //<Текст перед пунктами под-меню> ?>
        <? if (!$arItem["PARAMS"]["MENU_TEXT"]):?>
            <? $arItem["PARAMS"]["MENU_TEXT"] = 'Этот текст для пункта "'.$arItem["TEXT"].'"';?>
        <? endif; ?>
            <div class="menu-text">
                <?= $arItem["PARAMS"]["MENU_TEXT"] ?>
            </div>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?= $sMenuColor ?> <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="<?= $sMenuColor ?> item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>
            <? //<Cтраницы и разделы не доступные пользователю - не должны отображаться в меню> ?>
            <!--
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
            -->
		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
                <a href="" class="btn-close"></a>
    </div>
        <div class="menu-overlay"></div>
    </div>
    </div>
    </nav>
<?endif?>