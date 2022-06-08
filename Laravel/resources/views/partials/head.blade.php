<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baobabb</title>
    @yield('seo')
    <!-- JQ JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!------ BOOTSTRAP CSS LINK ------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!------SLICK SLIDER LINK--------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">

    <!-- FONT-AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!------ FONT-FAMILEY ------>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    {{--  flag  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon-css/flag-icon.min.css') }}">


    <!------ CUSTOM CSS ----->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- RESPONSIV CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsiv.css') }}">

    {{-- JAVASCTIPT CODE FROM DATABASE --}}
    {{jsCode()}}
</head>

{{-- @dd(getAllStyle()) --}}
<style>
    .all-body{
        background-color: {{ getBodyBGSkin() }} !important ;
        color: {{getBodyTextSkin()}} !important ;
        background-image: url('{{getBodyBGImg()}}') !important ;
        background-attachment: {{getBodyImgFixed()}} !important ;
    }
    .title{
        color: {{getTitleSkin()}} !important ;
    }
    a{
        color: {{getLinkcolor()}} !important ;
    }
    a:hover{
        color: {{getLinkHovercolor()}} !important ;
    }
/* ------------------------- HEADER -------------------------------- */
    .header{
        height: {{headerHeight()}} !important ;
        background-color: {{headerBGColor()}} !important ;
        border-bottom: {{headerBorderBottom()}} !important ;
        border-color: {{headerBorderBottomColor()}} !important ;
    }

    .header a{
        color: {{headerLinkColor()}} !important ;
    }
    .header a:hover{
        color: {{headerLinkHoverColor()}} !important;
    }
/* -------------------------- LOGO ----------------------------------- */
    #logo{
        width: {{getHeaderWidth()}} !important;
        height: {{getHeaderHeight()}} !important;
    }
/* ------------------------- FOOTER ---------------------------------- */
    footer{
        background-color: {{footerBGcolor()}} !important;
        color: {{footerTextColor()}} !important;
    }
    footer .title{
        color: {{footerTitleColor()}} !important;
    }
    footer a{
        color: {{footerLinkColor()}} !important;
    }
    footer a:hover{
        color: {{footerLinkHoverColor()}} !important;
    }
    footer .payment-icon{
        border-top: {{paymentTopBorderWidth()}} {{paymentTopBorderColor()}} !important;
        border-bottom: {{paymentBottomBorderWidth()}} {{paymentBottomBorderColor()}} !important;
    }
/* -------------------------- BUTTON ---------------------------------- */
    .btn{
        background-image: linear-gradient(to bottom, {{btnBGTop()}} 0,{{btnBGBottom()}} 100%) !important;
        border-color: {{btnBorderColor()}} !important;
        color: {{btnTextColor()}} !important;
    }
    .btn:hover{
        background-image: linear-gradient(to bottom, {{btnBGTophover()}} 0,{{btnBGBottomhover()}} 100%) !important;
        border-color: {{btnBorderColorhover()}} !important;
        color: {{btnTextColorhover()}} !important;
    }

    {{customCSS()}}
    
</style>

<body>
