@extends('layouts.layout_abstract')
@section('title','Single_Video')
@section('content')
    <!-- content
   ================================================== -->
    <section id="content-wrap" class="blog-single">
        <div class="row">
            <div class="col-twelve">

                <article class="format-video">

                    <div class="content-media">
                        <div class="fluid-video-wrapper">
                            {{--  <iframe src="{!! $advertise->video_html !!}" width="640" height="360" frameborder="0"
                                      webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> --}}
                            <video width="1000" height="360" controls webkitallowfullscreen mozallowfullscreen
                                   allowfullscreen>
                                <source src="{{ asset('storage/' . $advertise->videos) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>

                    <div class="primary-content">

                        <h1 class="entry-title">{{$advertise->title}}.</h1>

                        <ul class="entry-meta">
                            <li class="date">{{$advertise->created_at}}</li>
                            {{--
                                                        <li class="cat"><a href="">Wordpress</a><a href="">{{$advertise->website->name}}</a></li>
                            --}}
                        </ul>

                        <p class="lead">{{$advertise->summary}}.</p>

                        <p><img src="{{asset('storage/'.$advertise->photos)}}" alt=""></p>

                        <h2>{{$advertise->title}}</h2>

                        <p>{{$advertise->summary}} <a href="http://#">omnis voluptas assumenda est</a>

                            <blockquote>
                        <p>This is a simple example of a styled blockquote. A blockquote tag typically specifies a
                            section that is quoted from another source of some sort, or highlighting text in your
                            post.</p></blockquote>

                        <p>{{$advertise->details}}</p>
                        <h3>Smaller Heading</h3>

                        <p>Quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
                            eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis
                            voluptas assumenda est, omnis dolor repellendus.</p>

                        <p>Quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
                            eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis
                            voluptas assumenda est, omnis dolor repellendus.</p>

                        <pre><code>
code {
   font-size: 1.4rem;
   margin: 0 .2rem;
   padding: .2rem .6rem;
   white-space: nowrap;
   background: #F1F1F1;
   border: 1px solid #E1E1E1;
   border-radius: 3px;
}
</code></pre>

                        <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                            dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt
                            in culpa.</p>

                        <ul>
                            <li>Donec nulla non metus auctor fringilla.
                                <ul>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                </ul>
                            </li>
                            <li>Donec nulla non metus auctor fringilla.</li>
                            <li>Donec nulla non metus auctor fringilla.</li>
                        </ul>

                        <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                            dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt
                            in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.
                            Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate
                            enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim
                            aliqua laborum mollit quis nostrud sed sed..</p>

                        <p class="tags">
                            <span>Tagged in :</span>
                            <a href="#">orci</a><a href="#">lectus</a><a href="#">varius</a><a href="#">turpis</a>
                        </p>

                        <div class="author-profile">
                            <img src="images/avatars/user-05.jpg" alt="">

                            <div class="about">
                                <h4><a href="#">Jonathan Smith</a></h4>

                                <p>Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat impedit
                                    laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas voluptatum.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </p>

                                <ul class="author-social">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">GooglePlus</a></li>
                                    <li><a href="#">Instagram</i></a></li>
                                </ul>
                            </div>
                        </div> <!-- end author-profile -->

                    </div> <!-- end entry-primary -->

                    <div class="pagenav group">
                        <div class="prev-nav">
                            <a href="#" rel="prev">
                                <span>Previous</span>
                                Tips on Minimalist Design
                            </a>
                        </div>
                        <div class="next-nav">
                            <a href="#" rel="next">
                                <span>Next</span>
                                Less Is More
                            </a>
                        </div>
                    </div>

                </article>


            </div> <!-- end col-twelve -->
        </div> <!-- end row -->

        <div class="comments-wrap">
            <div id="comments" class="row">
                <div class="col-full">

                    <h3>{{$count}} Comments</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">
                        @foreach ($contacts as $contact)
                            <li class="depth-1">

                                <div class="avatar">
                                    <img width="50" height="50" class="avatar"
                                         src="{{asset('users/profile_image/'.$contact->user->avatar)}}" alt="">
                                </div>

                                <div class="comment-content">

                                    <div class="comment-info">
                                        <cite>{{$contact->user->name}}</cite>

                                        <div class="comment-meta">
                                            <time class="comment-time"
                                                  datetime="2014-07-12T23:05">{{$contact->user->created_at}}</time>
                                            <span class="sep">/</span><a class="reply" href="#">Reply</a>
                                        </div>
                                    </div>

                                    <div class="comment-text">
                                        <p>{{$contact->comment}}.</p>
                                    </div>
                                    <div>
                                        <form action="{{ route('advertise.destroy', ['contact' => $contact]) }}"
                                              method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button>
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                </div>

                            </li>
                        @endforeach


                    </ol> <!-- Commentlist End -->

                    <!-- respond -->
                    <div class="respond">

                        <h3>Leave a Comment</h3>

                        <form name="contactForm" id="contactForm" method="post" action="{{route('advertise.store')}}">
                            <fieldset>
                                <div class="form-field">
                                    <select name="website_id" class="form-control" class="full-width"
                                            placeholder="Website" value="" style="width:100%">
                                        @foreach ($website as $web)
                                            <option
                                                value="{{ $web->id }}" {{ $web->id == $contact->website_id ? 'selected' : '' }}>{{ $web->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="message form-field">
                                    <textarea name="comment" id="comment" class="full-width"
                                              placeholder="Your Message"></textarea>
                                    @error('comment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @csrf

                                <button type="submit" class="submit button-primary">Submit</button>

                            </fieldset>
                        </form> <!-- Form End -->

                    </div> <!-- Respond End -->


                </div> <!-- end col-full -->
            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- end content -->
@endsection
