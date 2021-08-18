<?php

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    array(
        "IS_SET" => "Y",
        "SEF_BASE_URL" => "/products/",
        "SECTION_PAGE_URL" => "#SECTION_ID#/",
        "DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#/",
        "IBLOCK_ID" => "2",
        "DEPTH_LEVEL" => "3",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "IS_SEF" => "Y",
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "products",
        "SECTION_URL" => "#SECTION_ID#"
    ),
    false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);