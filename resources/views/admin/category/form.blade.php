@csrf
<div class="form-group pb-2">

  <label for="category" class="label-admin">Category</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="category" name="name" aria-describedby="category" placeholder="Enter name" value="{{ old('name') ?? $category->name }}" autocomplete="name">
  <small id="category" class="form-text text-muted">Must be unique category name</small>

  @error('name')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror

</div>