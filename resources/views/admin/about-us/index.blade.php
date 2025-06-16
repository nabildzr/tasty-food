@extends('admin.layouts.layout')

@section('title', 'About Us')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="info"></i></div>
                    <span>About Us</span>
                </h1>
                <div class="page-header-subtitle">
                    Manage your about us content from this page.
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <p class="mb-0">About Us Datatables</p>

            </div>

            <div class="mr-4 ml-4 mt-4 mb-0">

                @include('admin.layouts.feedback')
            </div>
            <div class="card-body">
                <div class="datatable table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"
                        style="min-width: 1200px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Position</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Left Photo</th>
                                <th>Right Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Position</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Left Photo</th>
                                <th>Right Photo</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($aboutUs as $about)
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td>{{ $about->position }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{!! $about->content !!}</td>
                                    <td>
                                        @if ($about->photo_left)
                                            <img src="{{ asset('storage/' . $about->photo_left) }}"
                                                alt="about Preview - {{ $about->id }}"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Left Photo </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($about->photo_right)
                                            <img src="{{ asset('storage/' . $about->photo_right) }}"
                                                alt="about Preview - {{ $about->id }}"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Right Photo </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('about-us.edit', $about->id) }}">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                title="Edit"><i data-feather="edit-2"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No galleries found.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-icon mb-4">
            <div class="row no-gutters">
                <div class="col-auto card-icon-aside bg-primary"><i class="mr-1 text-white-50"
                        data-feather="alert-triangle"></i></div>
                <div class="col">
                    <div class="card-body py-5">
                        <h5 class="card-title">Third-Party Documentation Available</h5>
                        <p class="card-text">DataTables is a third party plugin that is used to generate the demo table
                            above. For more information about how to use DataTables with your project, please visit the
                            official DataTables documentation.</p>
                        <a class="btn btn-primary btn-sm" href="https://datatables.net/" target="_blank"><i class="mr-1"
                                data-feather="external-link"></i>Visit DataTables Docs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/asset/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
@endpush
