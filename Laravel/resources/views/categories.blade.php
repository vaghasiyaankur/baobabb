@extends('layouts.app')

@section('content')
    <!-- ALL-CATEGORY SECTION START -->
    <section class="all-categories py_5 all-categoriess_">
        <h3 class="fw-bold pt-4 ">
            {{ __('messages.all_categories') }}</h3>
        <h6 class="pb-4 ">{{ __('messages.home') }} > {{ __('messages.all_categories') }}</h6>
        <div class="row bg-white pt-5">
            @foreach ($categories as $category)
                <div class="col-12 col-lg-4">
                    <div class="categories-box ps-4 pe-4 mb-5">
                        <div class="categorie-inner border_bottom">
                            <a href="{{ route('category', $category->slug) }}">
                            <div class="row">
                                    <div class="col-4 text-center">
                                        <div class="categorie-img pb-4 ">
                                            <img src="{{ asset($category->icon) }}" class="categ-img"
                                                alt="categoires-img">
                                        </div>
                                    </div>
                                    <div class="col-8 text-start">
                                        <div class="categorie-text align-self-center">
                                            <h5 class="fw-bold">{{ $category->name }}</h5>
                                            @if (countListing() == '1')
                                                <?php
                                                if (auth()->user()) {
                                                    $country = App\Models\Country::find(auth()->user()->country);
                                                    if ($country) {
                                                        $countryName = $country->name;
                                                    } else {
                                                        $countryName = $_COOKIE['country'];
                                                    }
                                                } else {
                                                    $countryName = $_COOKIE['country'];
                                                }
                                                $count = App\Models\Product::where('country', $countryName)
                                                    ->where('category_id', $category->id)
                                                    ->count(); ?>
                                                <p>{{ $count }} {{ __('messages.announce_publee') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ALL-CATEGORY SECTION END -->
@endsection
