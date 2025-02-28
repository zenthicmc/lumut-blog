@extends('dashboard.layouts.app')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Post</h4>
  <div class="row">
    <div class="col-xl">
      @include('dashboard.layouts.messages')
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Add Post</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('post.update', $post->idpost) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter your post title" required value="{{ $post->title }}" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="content">Content</label>
              <div id="editor" style="height: 200px">
                {!! $post->content !!}
              </div>
              <input type="hidden" name="content" value="{{ $post->content }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection

@section('scripts')
  <script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });

		// on change
		quill.on('text-change', function() {
			const html = quill.root.innerHTML;
			document.querySelector('input[name=content]').value = html;
		});
  </script>
@endsection
