<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<script type="text/javascript" >
    $().ready(function(){
        $(function(){
            $('#slides').slides({
                preload: true,
                generateNextPrev: false,
                autoHeight: true,
                play: 4000,
                effect: 'fade'
            });
        });
    });
</script>

<div class="sl_slider" id="slides">
    <div class="slides_container">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <div>
            <div>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" />
                <h2><a href=""><?echo $arItem["NAME"]?></a></h2>
                <p><?= $arItem["DETAIL_TEXT"]?></p>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="sl_more">Подробнее &rarr;</a>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>
