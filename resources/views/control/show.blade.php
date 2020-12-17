@extends('layouts.control')
@section('title', 'Advertise List')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9.5">
                <div class="card">
                    <table class="table table-striped" style="width: 100px">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">USER</th>
                            <th scope="col">SUMMARY</th>
                            <th scope="col">WEBSITE</th>
                            <th scope="col">INDEX</th>
                            <th scope="col">CREATED AT</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($advertises as $adv)
                            <tr>
                                <th scope="row">
                                    <div class="row-cols-md-5">
                                        <a class="link-dark alert-link btn-outline-dark"
                                           href="{{ route('control.details', ['advertise' => $adv]) }}">{{ $adv->id }}</a>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{route('control.details',['advertise'=>$adv])}}"
                                       class="link-dark alert-link btn-outline-dark"> {{ $adv->title }}</a>
                                </td>
                                <td>
                                    <div class=" row-cols-md-5"><a href="{{route('users.show')}}"
                                                                   class="link-dark alert-link btn-outline-dark">  {{ $adv->user->name }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d3 row-cols-md-5">{{ $adv->summary }}</div>
                                </td>

                                <td>
                                    {{ $adv->website->name }}
                                </td>
                                @if ($adv->photos)
                                    <th>
                                        <div class="col-md-5"><a
                                                href="{{ route('control.details', ['advertise' => $adv]) }}"><img
                                                    src="{{ asset('storage/' . $adv->photos) }}" alt=""
                                                    style="width: 140px"></a></div>
                                    </th>
                                @endif
                                @if ($adv->videos)
                                    <th>
                                        <a href="{{ route('control.details', ['advertise' => $adv]) }}">
                                            <video width="200px" controls>
                                                <source src="{{ asset('storage/' . $adv->videos) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </a>
                                    </th>
                                @endif
                                @if ($adv->audios)
                                    <th><a href="{{ route('control.details', ['advertise' => $adv]) }}">
                                            <div class="audio-wrap">

                                                <audio id="player" src="{{ asset('storage/' . $adv->audios) }}"
                                                       width="100%"
                                                       height="42"
                                                       controls="controls"></audio>
                                            </div>
                                        </a>
                                    </th>
                                @endif
                                <td>
                                    <div class="" style="width:100px">{{ $adv->created_at }}</div>
                                </td>

                                <th><a href="{{ route('control.edit', ['advertise' => $adv]) }}"
                                       class="btn btn-outline-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                        </svg>
                                    </a></th>
                                <th>
                                    <form action="{{ route('control.destroy', ['advertise' => $adv]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
