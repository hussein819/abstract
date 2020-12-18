@extends('layouts.layout_abstract')
@section('title','Edit Advertise')
@section('content')
    <section id="content-wrap" class="blog-single">
        <div class="comments-wrap">
            <div id="comments" class="row">


                <div class="respond">
                    <h3>update comment</h3>

                    <form name="contactForm" id="contactForm" method="post"
                          action="{{ route('advertise.update', ['contact' => $contact]) }}">
                        <fieldset>
                            @method('PATCH')
                            <div class="form-group">
                                <label for="website_id">Website</label>
                                <select name="website_id" class="full-width">
                                    @foreach ($websites as $website)
                                        <option
                                            value="{{ $website->id }}" {{ $website->id == $advertise->website_id ? 'selected' : '' }}>{{ $website->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class=" message form-field">
                                <label for="comment">Comment</label>

                                <textarea class="full-width" id="comment" rows="3"
                                          name="comment">{{ old('comment') ?? $contact->comment }}</textarea>
                                @error('comment')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-outline-success">
                                Update
                            </button>
                        </fieldset>
                    </form> <!-- Form End -->

                </div> <!-- Respond End -->

            </div>
        </div>



@endsection
