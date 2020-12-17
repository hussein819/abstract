<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $advertise->title }}" class="form-control">
    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="website_id">Website</label>
    <select name="website_id" class="form-control">
        @foreach ($websites as $website)
            <option
                value="{{ $website->id }}" {{ $website->id == $advertise->website_id ? 'selected' : '' }}>{{ $website->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="summary">Summary</label>
    <input type="text" name="summary" value="{{ old('summary') ?? $advertise->summary }}" class="form-control">
    @error('summary')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="details">Details</label>
    <textarea class="form-control" id="details" rows="3"
              name="details">{{ old('details') ?? $advertise->details }}</textarea>
    @error('details')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
{{--<div class="form-group">
    <label for="videos">video link</label>
    <input type="text" name="videos" value="{{ old('videos') ?? $advertis->videos }}" class="form-control">
    @error('videos')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>--}}
<div class="form-group d-flex flex-column">
    <label for="photos"> Image</label>
    <input type="file" name="photos" class="py-2">
    @error('photos')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group d-flex flex-column">
    <label for="photo_audio"> Audio Photo</label>
    <input type="file" name="photo_audio" class="py-2">
    @error('photo_audio')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group d-flex flex-column">
    <label for="audios"> Audio</label>
    <input type="file" name="audios" class="py-2">
    @error('audios')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group d-flex flex-column">
    <label for="videos"> Videos</label>
    <input type="file" name="videos" class="py-2">
    @error('videos')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


@csrf
