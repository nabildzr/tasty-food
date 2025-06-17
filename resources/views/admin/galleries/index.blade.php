@extends('admin.layouts.layout')

@section('title', 'Galleries')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="image"></i></div>
                    <span>Galleries</span>
                </h1>
                <div class="page-header-subtitle">
                    Manage your galleries and their images from this page.
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <p class="mb-0">Galleries Datatables</p>
                <a href="{{ route('galleries.create') }}" class="d-block">
                    <button class="btn btn-primary ml-auto">Create new Gallery</button>
                </a>
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
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}
                                    </td>
                                    <td>
                                        @if ($gallery->photo)
                                            <img src="{{ asset('storage/' . $gallery->photo) }}"
                                                alt="Gallery Preview - {{ $gallery->id }}"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Gallery Photo </span>
                                        @endif
                                    </td>
                                    <td>{!! $gallery->created_at->format('d M Y') !!}</td>
                                    <td>{{ $gallery->user->name }}</td>
                                    <td>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                title="Edit"><i data-feather="edit-2"></i></button>
                                        </a>
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete"
                                            data-toggle="modal" data-target="#deleteGallery{{ $gallery->id }}"><i
                                                data-feather="trash-2"></i></button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteGallery{{ $gallery->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteGalleryTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteGalleryTitle">Delete
                                                    Gallery</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">Are you sure for deleting this Gallery?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Close</button>

                                                <form action="{{ route('news.delete', $gallery->id) }}" method="POST">
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
                                    <td colspan="4" class="text-center">No galleries found.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
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
