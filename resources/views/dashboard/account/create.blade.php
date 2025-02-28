@extends('dashboard.layouts.app')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Account</h4>
  <div class="row">
    <div class="col-xl">
      @include('dashboard.layouts.messages')
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Add Account</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('account.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required value="{{ old('username') }}" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="role" required>Role</label>
              <select class="form-select" id="role" name="role">
                @foreach ($roles as $role)
                  <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required />
              <div class="form-text">Password must be at least 8 characters</div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection