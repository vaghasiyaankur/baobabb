<?php
use App\Models\Setting;

function getAllStyle()
{
    return json_decode(Setting::where('name','style')->pluck('value')->first());
}

// ----------------------BODY------------------------//
function getBodyBGSkin()
{
    if(getAllStyle())
    {
        return getAllStyle()->body_background_color;
    }
}

function getBodyTextSkin()
{
    if(getAllStyle())
    {
        return getAllStyle()->body_text_color;
    }
}

function getBodyBGImg()
{
    if(getAllStyle())
    {
        return getAllStyle()->body_background_image;
    }
}

function getBodyImgFixed()
{
    if(getAllStyle())
    {
        if(getAllStyle()->body_background_image_fixed == '1')
        {
            return 'fixed';
        }
        else
        {
            return 'unset';
        }
    }
}
//------------------ TITLE COLOR ------------------//
function getTitleSkin()
{
    if(getAllStyle())
    {
        return getAllStyle()->title_color;
    }
}

//------------------ LINK COLOR ------------------//
function getLinkcolor(){
    if(getAllStyle())
    {
        return getAllStyle()->link_color;
    }
}
//------------------ TITLE HOVER COLOR ------------------//
function getLinkHovercolor(){
    if(getAllStyle())
    {
        return getAllStyle()->link_color_hover;
    }
}

//------------------ HEADER ------------------//
function headerHeight(){
    if(getAllStyle())
    {
        return getAllStyle()->header_height.'px';
    }
}

function headerBGColor(){
    if(getAllStyle())
    {
        return getAllStyle()->header_background_color;
    }
}

function headerLinkColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->header_link_color;
    }
}

function headerLinkHoverColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->header_link_color_hover;
    }
}

function headerBorderBottom()
{
    if(getAllStyle())
    {
        return getAllStyle()->header_bottom_border_width.'px solid';
    }
}

function headerBorderBottomColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->header_bottom_border_color;
    }
}

//------------------ LOGO ------------------//
function getHeaderHeight()
{
    if(getAllStyle())
    {
        return getAllStyle()->logo_height.'px';
    }
}
function getHeaderwidth()
{
    if(getAllStyle())
    {
        return getAllStyle()->logo_width.'px';
    }
}

//------------------ FOOTER ------------------//
function footerBGColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->footer_background_color;
    }
}
function footerTextColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->footer_text_color;
    }
}
function footerTitleColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->footer_title_color;
    }
}
function footerLinkColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->footer_link_color;
    }
}
function footerLinkHoverColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->footer_link_color_hover;
    }
}

function paymentTopBorderWidth()
{
    if(getAllStyle())
    {
        return getAllStyle()->payment_icon_top_border_width.'px solid';
    }
}
function paymentTopBorderColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->payment_icon_top_border_color;
    }
}
function paymentbottomBorderWidth()
{
    if(getAllStyle())
    {
        return getAllStyle()->payment_icon_bottom_border_width.'px solid';
    }
}
function paymentbottomBorderColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->payment_icon_bottom_border_color;
    }
}

//----------------------- BUTTON COLOR ------------------------//
function btnBGTop()
{
    if(getAllStyle())
    {
        if(getAllStyle()->btn_listing_bg_top_color == null || getAllStyle()->btn_listing_bg_top_color == '')
        {
            return '#364b5a';
        }
        else
        {
            return getAllStyle()->btn_listing_bg_top_color;
        }
    }
}
function btnBGBottom()
{
    if(getAllStyle())
    {
        if(getAllStyle()->btn_listing_bg_bottom_color == null || getAllStyle()->btn_listing_bg_bottom_color == '')
        {
            return '#364b5a';
        }
        else
        {
            return getAllStyle()->btn_listing_bg_bottom_color;
        }
    }
}

function btnBorderColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->btn_listing_border_color;
    }
}
function btnTextColor()
{
    if(getAllStyle())
    {
        return getAllStyle()->btn_listing_text_color;
    }
}

//----------------------- BUTTON:HOVER COLOR ------------------------//
function btnBGTophover()
{
    if(getAllStyle())
    {
        if(getAllStyle()->btn_listing_bg_top_color_hover == null || getAllStyle()->btn_listing_bg_top_color_hover == '')
        {
            return '#364b5a';
        }
        else
        {
            return getAllStyle()->btn_listing_bg_top_color_hover;
        }
    }
}
function btnBGBottomhover()
{
    if(getAllStyle())
    {
        if(getAllStyle()->btn_listing_bg_bottom_color_hover == null || getAllStyle()->btn_listing_bg_bottom_color_hover == '')
        {
            return '#364b5a';
        }
        else
        {
            return getAllStyle()->btn_listing_bg_bottom_color_hover;
        }
    }
}

function btnBorderColorhover()
{
    if(getAllStyle())
    {
        return getAllStyle()->btn_listing_border_color_hover;
    }
}
function btnTextColorhover()
{
    if(getAllStyle())
    {
        return getAllStyle()->btn_listing_text_color_hover;
    }
}

//----------------------- CUSTOM CSS ------------------------//
function customCSS()
{
    if(getAllStyle())
    {
        return getAllStyle()->custom_css;
    }
}