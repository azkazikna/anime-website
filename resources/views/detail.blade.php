@extends('master')

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./categories.html">Categories</a>
                    <span>Romance</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ $data["anime_detail"]["thumb"] }}">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3>{{ $data["anime_detail"]["title"] }}</h3>
                            <span>{{ explode(': ', $data["anime_detail"]["detail"][1])[1] }}</span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <span>{{ explode(': ', $data["anime_detail"]["detail"][2])[1] }}</span>
                        </div>
                        @foreach ($data["anime_detail"]["sinopsis"] as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $exploded = explode(': ', $data["anime_detail"]["detail"][$i]);
                                            @endphp
                                            <li><span>{{ $exploded[0] . ': ' }}</span>{{ $exploded[1] }}</li>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        @for ($i = 6; $i <= 10; $i++)
                                        @php
                                            $exploded = explode(': ', $data["anime_detail"]["detail"][$i]);
                                        @endphp
                                        <li><span>{{ $exploded[0] . ': ' }}</span>{{ $exploded[1] }}</li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Daftar Episode</h5>
                        </div>
                        <ul style="list-style: none">
                            @foreach ($data["episode_list"] as $item)
                            <li class="anime__details__btn"><a href="/stream/{{ $item["episode_endpoint"] }}" class="follow-btn"><i class="fa fa-film"></i> {{ $item["episode_title"] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="/img/sidebar/tv-1.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="/img/sidebar/tv-2.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="/img/sidebar/tv-3.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="/img/sidebar/tv-4.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection