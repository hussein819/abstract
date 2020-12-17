@extends('layouts.layout_abstract')
@section('title', 'Searching')
@section('content')
    <section id="bricks">

        <div class="row masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper">

                <div class="grid-sizer"></div>
                @if (isset($details))
                    {{-- <p> The Search results for your query <b> {{ $query }} </b> are :</p>--}}
                    @foreach ($details as $advertise)

                        @if ($advertise->photos)
                            <article class="brick entry animate-this">

                                <div class="entry-thumb">
                                    <a href="{{ route('advertise.standard',['advertise'=>$advertise]) }}"
                                       class="thumb-link">
                                        <img src="{{ asset('storage/' . $advertise->photos) }}" alt="Shutterbug">
                                    </a>
                                </div>

                                <div class="entry-text">
                                    <div class="entry-header">

                                        <div class="entry-meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $advertise->website->name }}</a>
                                            {{--<a
                                                href="#">html</a>--}}
                                        </span>
                                        </div>

                                        <h1 class="entry-title"><a
                                                href="{{ route('advertise.standard',['advertise'=>$advertise]) }}">{{ $advertise->title }}
                                                .</a>
                                        </h1>

                                    </div>
                                    <div class="entry-excerpt">
                                        {{ $advertise->summary }}.
                                    </div>
                                </div>

                            </article> <!-- end article -->
                        @endif
                        @if ($advertise->videos)
                            <article class="brick entry format-video animate-this">

                                <div class=" video-image">
                                    <a href="{{ route('advertise.video',['advertise'=>$advertise]) }}" {{--data-lity--}} >
                                        <video width="500px" controls>
                                            <source src="{{ asset('storage/' . $advertise->videos) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </a>
                                </div>

                                <div class="entry-text">
                                    <div class="entry-header">

                                        <div class="entry-meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $advertise->website->name }}</a>
                                            {{--<a
                                                href="#">Branding</a>--}}
                                        </span>
                                        </div>

                                        <h1 class="entry-title"><a
                                                href="{{ route('advertise.video',['advertise'=>$advertise]) }}">{{ $advertise->title }}
                                                .</a>
                                        </h1>

                                    </div>
                                    <div class="entry-excerpt">
                                        {{ $advertise->summary }}.
                                    </div>
                                </div>

                            </article> <!-- end article -->

                        @endif
                        @if ($advertise->audios)

                            <article class="brick entry format-audio animate-this">

                                <div class="entry-thumb">
                                    <a href="{{ route('advertise.audio',['advertise'=>$advertise]) }}"
                                       class="thumb-link">
                                        <img src="{{ asset('storage/' . $advertise->photo_audio) }}" alt="concert">
                                    </a>

                                    <div class="audio-wrap">
                                        <audio id="player2" src="{{ asset('storage/' . $advertise->audios) }}"
                                               width="100%"
                                               height="42" controls="controls"></audio>
                                    </div>
                                </div>

                                <div class="entry-text">
                                    <div class="entry-header">

                                        <div class="entry-meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $advertise->website->name }}</a>
                                            {{-- <a
                                                href="#">Music</a>--}}
                                        </span>
                                        </div>

                                        <h1 class="entry-title"><a
                                                href="{{ route('advertise.audio',['advertise'=>$advertise]) }}">{{ $advertise->title }}
                                                .</a>
                                        </h1>

                                    </div>
                                    <div class="entry-excerpt">
                                        {{ $advertise->summary }}.
                                    </div>
                                </div>

                            </article> <!-- /article -->

                        @endif
                    @endforeach
                @endif
            </div>
        </div>

@endsection
