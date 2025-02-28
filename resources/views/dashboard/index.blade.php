@extends('dashboard.layouts.app')

@section('content')
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="card">
					<div class="d-flex align-items-end row">
						<div class="col-sm-9">
							<div class="card-body">
								<h5 class="card-title text-primary">Welcome back, {{ session('account')['name'] }}!</h5>
								<p class="mb-4">
									This is your dashboard, here you can manage your account, manage your posts, and many more!
								</p>
							</div>
						</div>
						<div class="col-sm-3 text-center text-sm-left">
							<div class="card-body pb-0 px-0 px-md-4">
								<img
									src="{{ asset('/assets/img/illustrations/man-with-laptop-light.png') }}"
									height="140"
									alt="View Badge User"
									data-app-dark-img="illustrations/man-with-laptop-dark.png"
									data-app-light-img="illustrations/man-with-laptop-light.png"
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- Statistik Cards --}}
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="card text-center">
					<div class="card-body">
						<span class="badge bg-label-primary p-2 mb-3 rounded-circle">
							<i class="bx bx-pencil bx-sm"></i>
						</span>
						<h3 class="card-title mb-2">{{ $totalPosts }}</h3>
						<p class="mb-0">Total Posts</p>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6">
				<div class="card text-center">
					<div class="card-body">
						<span class="badge bg-label-success p-2 mb-3 rounded-circle">
							<i class="bx bx-user bx-sm"></i>
						</span>
						<h3 class="card-title mb-2">{{ $totalAccounts }}</h3>
						<p class="mb-0">Total Users</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
