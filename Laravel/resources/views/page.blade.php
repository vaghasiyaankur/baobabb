@extends('layouts.app')

@section('seo')
<meta name ="title" content="{{ @$page->seo_title }}">

<meta name ="description" content="{{ @$page->seo_description }}">

<meta name ="keywords" content="{{ @$page->seo_keywords }}">

@endsection
@section('content')
    <section class="all-categoriess_">
        <div class="container">
            <div class="section-content card my-5">
                <div class="row m-4">

                    <h1 class="text-center title-1" style="color: ;"><strong>{{ @$page->title}}</strong></h1>
                    <hr class="center-block small mt-0" style="background-color: ;">

                    <div class="col-md-12 page-content">
                        <div class="inner-box relative">
                            <div class="row">
                                <div class="col-sm-12 page-content">
                                    <div class="text-content text-start from-wysiwyg">
                                        {!! @$page->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
