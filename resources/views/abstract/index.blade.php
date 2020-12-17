@extends('layouts.layout_abstract')
@section('title','Home')
@section('content')


    <!-- masonry
                           ================================================== -->
    <section id="bricks">

        <div class="row masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper">

                <div class="grid-sizer"></div>

                <div class="brick entry featured-grid animate-this">
                    <div class="entry-content">
                        <div id="featured-post-slider" class="flexslider">
                            <ul class="slides">
                                @foreach ($advertise as $item)
                                    @if ($item->photos)
                                        <li>
                                            <div class="featured-post-slide">

                                                <a href="{{ route('advertise.standard',['advertise'=>$item]) }}"
                                                    title="">
                                                    <div class="post-background"
                                                         style="background-image:url('{{ asset('storage/' . $item->photos) }}');">
                                                    </div>
                                                </a>


                                                <div class="overlay"></div>

                                                <div class="post-content">
                                                    <ul class="entry-meta">
                                                        <li>{{ $item->created_at }}</li>
                                                    </ul>

                                                    <h1 class="slide-title"><a
                                                            href="{{ route('advertise.standard',['advertise'=>$item]) }}"
                                                            title="">{{ $item->title }}</a></h1>
                                                </div>
                                            </div>

                                        </li> <!-- /slide -->
                                    @endif

                                @endforeach

                            </ul> <!-- end slides -->
                        </div> <!-- end featured-post-slider -->
                    </div> <!-- end entry content -->
                </div>


                <!-- format audio here -->

                @foreach ($advertise as $item)
                    @if ($item->audios)
                        <article class="brick entry format-audio animate-this">

                            <div class="entry-thumb">
                                <a href="{{ route('advertise.audio',['advertise'=>$item]) }}" class="thumb-link">
                                    <img src="{{ asset('storage/' . $item->photo_audio) }}" alt="concert">
                                </a>

                                <div class="audio-wrap">
                                    <audio id="player2" src="{{ asset('storage/' . $item->audios) }}" width="100%"
                                           height="42" controls="controls"></audio>
                                </div>
                            </div>

                            <div class="entry-text">
                                <div class="entry-header">

                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $item->website->name }}</a>
                                            {{-- <a
                                                href="#">Music</a>--}}
                                        </span>
                                    </div>

                                    <h1 class="entry-title"><a
                                            href="{{ route('advertise.audio',['advertise'=>$item]) }}">{{ $item->title }}
                                            .</a>
                                    </h1>

                                </div>
                                <div class="entry-excerpt">
                                    {{ $item->summary }}.
                                </div>
                            </div>

                        </article> <!-- /article -->
                    @endif
                @endforeach

                @foreach ($advertise as $item)
                    @if ($item->photos)
                        <article class="brick entry animate-this">

                            <div class="entry-thumb">
                                <a href="{{ route('advertise.standard',['advertise'=>$item]) }}" class="thumb-link">
                                    <img src="{{ asset('storage/' . $item->photos) }}" alt="Shutterbug">
                                </a>
                            </div>

                            <div class="entry-text">
                                <div class="entry-header">

                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $item->website->name }}</a>
                                            {{--<a
                                                href="#">html</a>--}}
                                        </span>
                                    </div>

                                    <h1 class="entry-title"><a
                                            href="{{ route('advertise.standard',['advertise'=>$item]) }}">{{ $item->title }}
                                            .</a>
                                    </h1>

                                </div>
                                <div class="entry-excerpt">
                                    {{ $item->summary }}.
                                </div>
                            </div>

                        </article> <!-- end article -->
                    @endif
                @endforeach


                <article class="brick entry format-link animate-this">

                    <div class="entry-thumb">
                        <div class="link-wrap">
                            <p>Looking for affordable &amp; reliable web hosting? We recommend Dreamhost.</p>
                            <cite>
                                <a target="_blank"
                                   href="http://www.dreamhost.com/r.cgi?287326">http://www.dreamhost.com</a>
                            </cite>
                        </div>
                    </div>

                </article> <!-- end article -->


                @foreach ($advertise as $item)
                    @if ($item->videos)
                        <article class="brick entry format-video animate-this">

                            <div class=" video-image">
                                <a href="{{ route('advertise.video',['advertise'=>$item]) }}" {{--data-lity--}} >
                                    <video width="500px" controls>
                                        <source src="{{ asset('storage/' . $item->videos) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </a>
                            </div>

                            <div class="entry-text">
                                <div class="entry-header">

                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <a href="#">{{ $item->website->name }}</a>
                                            {{--<a
                                                href="#">Branding</a>--}}
                                        </span>
                                    </div>

                                    <h1 class="entry-title"><a
                                            href="{{ route('advertise.video',['advertise'=>$item]) }}">{{ $item->title }}
                                            .</a>
                                    </h1>

                                </div>
                                <div class="entry-excerpt">
                                    {{ $item->summary }}.
                                </div>
                            </div>

                        </article> <!-- end article -->
                    @endif
                @endforeach
                {{--  @foreach ($advertise as $item)
                      <article class="brick entry format-quote animate-this">

                          <div class="entry-thumb col-md-5">
                              <blockquote>
                                  <p>{{ $item->title }}.</p>

                                  <cite>{{ $item->user->name }}</cite>
                              </blockquote>
                          </div>

                      </article> <!-- end article -->
                  @endforeach--}}


            </div> <!-- end brick-wrapper -->

        </div> <!-- end row -->

        <div class="row">

            <nav class="pagination">
                {{ $advertise->links() }}

            </nav>

        </div>
    </section> <!-- end bricks -->

@endsection
