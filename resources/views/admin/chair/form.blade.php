@csrf
<div class="form-group">
  <label for="name" class="label-admin">Name</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
    aria-describedby="name" placeholder="Enter name" value="{{ old('name') ?? $chair->name }}" autocomplete="on">
  <small id="name" class="form-text text-muted">Must be unique chair name</small>

  @error('name')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="category_id" class="label-admin">Category</label>
    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
      <option value="">Choose category...</option>
      @foreach($categories as $category)
        @if(Str::contains($category->name, 'chairs'))
          <option value="{{ $category->id }}" @if( old('category_id') == $category->id) selected @elseif($chair->category_id == $category->id) selected @endif>{{ $category->name }} </option>
        @endif
      @endforeach
    </select>

    @error('category_id')
    <span class="invalid-feedback d-block admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group col-md-6">
    <label for="price" class="label-admin">Price</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
      aria-describedby="price" placeholder="Enter price" value="{{ old('price') ?? $chair->price }}" autocomplete="on">

    @error('price')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="width" class="label-admin">Width</label>
    <input type="text" class="form-control @error('width') is-invalid @enderror" id="width" name="width"
      aria-describedby="width" placeholder="Enter width" value="{{ old('width') ?? $chair->width }}" autocomplete="on">

    @error('width')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label for="height" class="label-admin">Height</label>
    <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height"
      aria-describedby="height" placeholder="Enter height" value="{{ old('height') ?? $chair->height }}" autocomplete="on">


    @error('height')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label for="depth" class="label-admin">Depth</label>
    <input type="text" class="form-control @error('depth') is-invalid @enderror" id="depth" name="depth"
      aria-describedby="depth" placeholder="Enter depth" value="{{ old('depth') ?? $chair->depth }}" autocomplete="on">

    @error('depth')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group col-md-6 p-0">
  <label for="description" class="label-admin">Description</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
    rows="10">{{ old('description') ?? $chair->description }}</textarea>

  @error('description')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="custom-file mt-3 mb-1">
  <input type="file" id="validatedCustomFile" class="custom-file-input @error('images') is-invalid @enderror" id="validatedCustomFile"
    name="images[]" multiple>
  <label for="validatedCustomFile" class="custom-file-label"><span class="custom-text-label">Select images</span></label>

  @error('images.*')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
