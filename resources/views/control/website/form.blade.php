<div class="form-group">
    <label for="name">Name Of Website </label>
    <input type="text" name="name" value="{{ old('name') ?? $website->name }}" class="form-control">
    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
@csrf
