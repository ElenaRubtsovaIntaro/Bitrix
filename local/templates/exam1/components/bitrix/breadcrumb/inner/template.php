<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = ' <!-- breadcrumbs -->
        1<div class="breadcrumbs-box">
            3<div class="inner-wrap">
                <a href="">Главная</a>
                <a href="">Мебель</a>
                <span>Выставки и события</span>
            </div>4
        </div>2
        <!-- /breadcrumbs -->';

$strReturn .= '<div class="breadcrumbs-box" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><div class="inner-wrap">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
        $strReturn .= '<a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="url">' . $title . '</a>';
	}
	else
	{
        $strReturn .= '<span>' . $title . '</span>';
	}
}

$strReturn .= '</div></div>';

return $strReturn;