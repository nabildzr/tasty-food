@extends('layouts.layout')

@section('title', 'News')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="image"></i></div>
                    <span>News</span>
                </h1>
                <div class="page-header-subtitle">An extended version of the DataTables library, customized for SB Admin Pro
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <p class="mb-0">News Datatables</p>
                <a href="{{ route('news.create') }}" class="d-block">
                    <button class="btn btn-primary ml-auto">Create new News</button>
                </a>
            </div>

            <div class="mr-4 ml-4 mt-4 mb-0">

                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <div class="datatable table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"
                        style="min-width: 1200px;">
                        <thead>
                            <tr>
                                <th>Banner</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Banner</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($news as $news)
                                <tr>
                                    <td>
                                        @if ($news->banner)
                                            <img src="{{ asset('storage/' . $news->banner) }}"
                                                alt="Banner Preview - {{ $news->title }}"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Banner </span>
                                        @endif
                                    </td>
                                    <td>{{ $news->title }}</td>
                                    <td>{{ $news->slug }}</td>
                                    <td>{!! $news->content !!}</td>
                                    <td>{{ $news->user->name }}</td>
                                    <td>
                                        <a href="{{ route('news.edit', $news->id) }}">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                title="Edit"><i data-feather="edit-2"></i></button>
                                        </a>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete"
                                            data-toggle="modal" data-target="#deleteNewsModal{{ $news->id }}"><i
                                                data-feather="trash-2"></i></button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteNewsModal{{ $news->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteNewsModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteNewsModalTitle">Delete
                                                    {{ $news->name }} News</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">Are you sure for deleting this News?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Close</button>

                                                <form action="{{ route('news.delete', $news->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary" type="submit">I'm Sure</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No news found.</td>
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
