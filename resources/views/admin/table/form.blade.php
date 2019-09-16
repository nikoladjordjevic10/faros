@csrf
<div class="form-group">
  <label for="name" class="label-admin">Name</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
    aria-describedby="name" placeholder="Enter name" value="{{ old('name') ?? $table->name }}" autocomplete="on">
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
        @if(strtolower($category->name) == 'tables'))
          <option value="{{ $category->id }}" @if( old('category_id') == $category->id) selected @elseif($table->category_id == $category->id) selected @endif>{{ $category->name }} </option>
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
      aria-describedby="price" placeholder="Enter price" value="{{ old('price') ?? $table->price }}" autocomplete="on">

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
      aria-describedby="width" placeholder="Enter width" value="{{ old('width') ?? $table->width }}" autocomplete="on">

    @error('width')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label for="height" class="label-admin">Height</label>
    <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height"
      aria-describedby="height" placeholder="Enter height" value="{{ old('height') ?? $table->height }}" autocomplete="on">


    @error('height')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label for="length" class="label-admin">Length</label>
    <input type="text" class="form-control @error('length') is-invalid @enderror" id="length" name="length"
      aria-describedby="length" placeholder="Enter length" value="{{ old('length') ?? $table->length }}" autocomplete="on">

    @error('length')
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group col-md-6 p-0">
  <label for="description" class="label-admin">Description</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
    rows="10">{{ old('description') ?? $table->description }}</textarea>

  @error('description')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="custom-file mt-3 mb-1">
  <input type="file" class="custom-file-input @if($errors->has('image.*')) is-invalid @endif" id="image" name="image[]" multiple>
  <label for="image" class="custom-file-label"><span class="custom-text-label">Select images</span></label>

  
  @if($errors->has('image.*'))
    <span class="invalid-feedback admin" role="alert">
      <strong>{{ $errors->first('image.*') }}</strong>
    </span>
  @endif
</div>