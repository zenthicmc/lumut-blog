@extends('dashboard.layouts.app')

@section('content')									
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Accounts /</span> All Accounts</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card p-3">
    <div class="d-flex justify-content-between align-items-center">
			<h5 class="card-header">All Accounts</h5>
			<a href="{{ route('account.create') }}" class="btn btn-primary">Add Account</a>
		</div>
    <div class="table-responsive text-nowrap">
      @include('dashboard.layouts.messages')
      <table class="table" id="datatable">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Name</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($accounts as $account)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $account->username }}</td>
              <td>{{ $account->name }}</td>
              <td>
                @if ($account->role == 'admin')
                  <span class="badge bg-label-danger">{{ $account->role }}</span>
                @else
                  <span class="badge bg-label-primary">{{ $account->role }}</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('account.edit', $account->username) }}">
                        <i class="bx bx-edit-alt me-2"></i> Edit
                      </a>

                      <form action="{{ route('account.destroy', $account->username) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="dropdown-item delete-btn">
                            <i class="bx bx-trash me-2"></i> Delete
                        </button>
                      </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
<!-- / Content -->
@endsection
