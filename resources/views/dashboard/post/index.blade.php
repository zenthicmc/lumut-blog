@extends('dashboard.layouts.app')

@section('content')									
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Posts /</span> All Posts</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card p-3">
    <div class="d-flex justify-content-between align-items-center">
			<h5 class="card-header">All Posts</h5>
			<a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a>
		</div>
    <div class="table-responsive text-nowrap">
      @include('dashboard.layouts.messages')
      <table class="table" id="datatable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Author</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($posts as $post)
            <tr>
              <td>{{ $post->idpost }}</td>
              <td>{{ $post->title }}</td>
              <td>
                {{ Str::limit(strip_tags($post->content), 50) }}
              </td>
              <td>
                <span class="badge bg-success">{{ \Carbon\Carbon::parse($post->date)->locale('id')->isoFormat('D MMMM Y HH:mm') }}</span>
              </td>
              <td>
                <span class="badge bg-primary">{{ $post->username }}</span>
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('post.edit', $post->idpost) }}">
                        <i class="bx bx-edit-alt me-2"></i> Edit
                      </a>

                      <form action="{{ route('post.destroy', $post->idpost) }}" method="POST" class="d-inline delete-form">
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
