@extends('layouts.control')
@section('title','Advertise')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">About <b>: {{ $advertise->title }}</b></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="alert-header"><strong>Name:</strong>
                                    <p style="color: olive"> {{ $advertise->title }}</p>
                                </h1>
                                <p><strong>Website:</strong> {{ $advertise->website->name }}</p>
                                <p><strong>Summary:</strong> {{ $advertise->summary }}</p>
                                <p><strong>Details:</strong> {{ $advertise->details }}</p>
                            </div>
                        </div>

                        @if ($advertise->photos)
                            <p><strong>Photo:</strong>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('storage/' . $advertise->photos) }}" alt=""
                                         class="img-thumbnail">
                                </div>
                            </div>
                        @endif
                        @if ($advertise->videos)
                            <p><strong>Video:</strong>
                            <div class="embed-responsive embed-responsive-16by9 " style="width:100%">

                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/' . $advertise->videos) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                        @if ($advertise->audios)
                            <p><strong>Audio:</strong>
                                <article class="brick entry format-audio animate-this">

                                    <div class="entry-thumb">
                                        <a href="" class="thumb-link">
                                            <img src="{{ asset('storage/' . $advertise->photo_audio) }}" alt="concert"
                                                 width="300">
                                        </a>

                                        <div class="audio-wrap">
                                            <audio id="player" src="{{ asset('storage/' . $advertise->audios) }}"
                                                   width="100%" height="42"
                                                   controls="controls"></audio>
                                        </div>
                                    </div>


                                </article> <!-- /article -->

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
