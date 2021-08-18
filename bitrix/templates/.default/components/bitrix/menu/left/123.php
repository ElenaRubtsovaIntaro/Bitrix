<div class="sb_nav">
    <ul>
        <li class="close"><a href=""><span>Каталог</span></a></li>
        <li class="close"><a href=""><span>Кухни</span></a></li>
        <li class="close"><a href=""><span>Гарнитуры</span></a></li>
        <li class="open current">
            <span class="sb_showchild"></span>
            <a href=""><span>Спальни</span></a>
            <ul>
                <li><a href="">Одноместрые</a></li>
                <li><a href="">Двухместные</a></li>
                <li><a href="">Детские</a></li>
            </ul>
        </li>
        <li class="close"><a href=""><span>Кухни</span></a></li>
        <li class="close"><a href=""><span>Гарнитуры</span></a></li>
        <li class="close">
            <span class="sb_showchild"></span>
            <a href=""><span>Спальни</span></a>
            <ul>
                <li><a href="">Одноместрые</a></li>
                <li><a href="">Двухместные</a></li>
                <li><a href="">Детские</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="sb_nav">
    <ul>
        <?
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <?if($arItem["SELECTED"]):?>
            <li class="open current"><span class="sb_showchild"><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></span></li>
        <?else:?>
            <li class="close"><span><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></span></li>
        <?endif?>

        <?endforeach?>
    </ul>
</div>


<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <div class="sb_nav">
        <ul>
    <?
    $previousLevel = 0;
foreach($arResult as $arItem):?>

    <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
        <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
    <?endif?>

    <?if ($arItem["IS_PARENT"]):?>

    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
    <li class="<?if ($arItem["SELECTED"]):?>close<?else:?>open current<?endif?>"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a>
    <ul class="root-item">
    <?else:?>
    <div><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><span><?=$arItem["TEXT"]?></span></a>
    <ul>
    <?endif?>

    <?else:?>

        <?if ($arItem["PERMISSION"] > "D"):?>

            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                <li class="<?if ($arItem["SELECTED"]):?>close<?else:?>open current<?endif?>"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
            <?else:?>
                <li class="<?if ($arItem["SELECTED"]):?>close<?else:?>open current<?endif?>"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
            <?endif?>

        <?else:?>

            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                <li class="<?if ($arItem["SELECTED"]):?>close<?else:?>open current<?endif?>"><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
            <?else:?>
                <li class="<?if ($arItem["SELECTED"]):?>close<?else:?>open current<?endif?>"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
            <?endif?>

        <?endif?>

    <?endif?>

    <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

    <?if ($previousLevel > 1)://close last item tags?>
        <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
    <?endif?>

    </ul>
    </div>
<?endif?>



<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

    <div class="news-list">
        <?if($arParams["DISPLAY_TOP_PAGER"]):?>
            <?=$arResult["NAV_STRING"]?><br />
        <?endif;?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
        <p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
                                class="preview_picture"
                                border="0"
                                src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                                height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                style="float:left"
                        /></a>
                <?else:?>
                    <img
                            class="preview_picture"
                            border="0"
                            src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                            width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                            height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                            style="float:left"
                    />
                <?endif;?>
            <?endif?>
            <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                <span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
            <?endif?>
            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
                <?else:?>
                    <b><?echo $arItem["NAME"]?></b><br />
                <?endif;?>
            <?endif;?>
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                <?echo $arItem["PREVIEW_TEXT"];?>
            <?endif;?>
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <div style="clear:both"></div>
            <?endif?>
            <?foreach($arItem["FIELDS"] as $code=>$value):?>
                <small>
                    <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
                </small><br />
            <?endforeach;?>
            <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                <small>
                    <?=$arProperty["NAME"]?>:&nbsp;
                    <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                        <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                    <?else:?>
                        <?=$arProperty["DISPLAY_VALUE"];?>
                    <?endif?>
                </small><br />
            <?endforeach;?>
            </p>
        <?endforeach;?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>


<?endif?>