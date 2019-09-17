@csrf
<div class="form-group">
  <label for="first_name" class="label-admin">First Name</label>
  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"
    aria-describedby="first_name" placeholder="Enter first name" value="{{ old('first_name') ?? $user->first_name }}" autocomplete="on">
  

  @error('first_name')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group">
  <label for="last_name" class="label-admin">Last Name</label>
  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"
    aria-describedby="last_name" placeholder="Enter last name" value="{{ old('last_name') ?? $user->last_name }}" autocomplete="on">
  

  @error('last_name')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group">
  <label for="email" class="label-admin">Email Address</label>
  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
    aria-describedby="email" placeholder="Enter email address" value="{{ old('email') ?? $user->email }}" autocomplete="on">
  <small id="email" class="form-text text-muted">Must be unique email address</small>

  @error('email')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group">
  <label for="username" class="label-admin">Username</label>
  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
    aria-describedby="username" placeholder="Enter username" value="{{ old('username') ?? $user->username }}" autocomplete="on">
  

  @error('username')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group">
  <label for="password" class="label-admin">Password</label>
  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
    aria-describedby="password" placeholder="Enter password" autocomplete="on">
  

  @error('password')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group">
  <label for="password_confirmation" class="label-admin">Confirm Password</label>
  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
    aria-describedby="password_confirmation" placeholder="Enter password again" autocomplete="on">
  

  @error('password_confirmation')
  <span class="invalid-feedback admin" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
