@extends('master')
@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>{{ $data["title"] }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="anime__details__episodes">
                    <div class="section-title">
                        <h5>Daftar Episode</h5>
                    </div>
                    @foreach (array_reverse($data["list_episode"]) as $index => $item)
                        <a href="/stream/{{ $item["list_episode_endpoint"] }}">Ep {{ $index + 1 }}</a>
                    @endforeach
                </div>
                <div class="anime__video__player">
                    <div class="section-title">
                        <h5>Nonton Langsung</h5>
                    </div>
                    <iframe id="player" height="650px" width="100%" frameBorder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" src="{{ $data["streamLink"] }}"></iframe>
                    {{-- <div class="episode__navigations">
                        @foreach ($data["relative"] as $item)
                        @if ($item["title_ref"] == "Previous Eps.")
                            <a href="https://kuramanime.net/anime/1895/kono-subarashii-sekai-ni-bakuen-wo/episode/10" class="before__nav ep-button" type="episode"><i class="fa fa-caret-left"></i> {{ $item["title_ref"] }}</a>
                        @elseif($item["title_ref"] == "See All Episodes")
                            <a href="https://kuramanime.net/anime/1895/kono-subarashii-sekai-ni-bakuen-wo" target="_blank" class="center__nav"> {{ $item["title_ref"] }}</a>
                        @elseif($item["title_ref"] == "Next Eps.")
                            <a href="https://kuramanime.net/anime/1895/kono-subarashii-sekai-ni-bakuen-wo/episode/10" class="before__nav after__nav" type="episode"><i class="fa fa-caret-left"></i> {{ $item["title_ref"] }}</a>
                        @else
                            <a href="https://kuramanime.net/anime/1895/kono-subarashii-sekai-ni-bakuen-wo/episode/10" class="before__nav after__nav disabled__nav bg-dark" style="cursor: not-allowed" type="episode"><i class="fas fa-caret-left"></i> {{ $item["title_ref"] }}</a>
                        @endif
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="anime__details__episodes">
            <div class="section-title">
                <h5>Tautan Unduh</h5>
            </div>
            @foreach ($data["quality"] as $item)
                <h6 class="text-white mt-3">{{ $item["quality"] . ' — (' . $item["size"] . ')'}}</h6>
                <hr class="bg-white my-2">
                @foreach ($item["download_links"] as $link)
                    <a href="{{ $link["link"] }}" target="_blank" rel="nofollow" class="mt-2">{{ $link["host"] }}</a>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection