@extends('admin.layouts.layout')

@section('title', isset($result) ? 'See Contact Mail' : '-')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="edit-3"></i>
                    </div>
                    <span>{{ isset($result) ? 'See Contact Mail' : '-' }}</span>
                </h1>
                <div class="page-header-subtitle">
                    Dynamic form component to make it easier for admin to {{ isset($result) ? 'See' : '-' }} contact mail data
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ isset($result) ? "See Mail from $result->name" : '-' }}
                        </div>

                        <div class="mr-4 ml-4 mt-4 mb-0">
                            @include('admin.layouts.feedback')

                        </div>

                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">


                                    <div class="form-group">
                                        <label for="subject" class="text-black">Subject</label>
                                        <p class="form-control-plaintext " id="subject">
                                            {{ $result->subject ?? '-' }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="text-black">Name</label>
                                        <p class="form-control-plaintext" id="name">
                                            {{ $result->name ?? '-' }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="text-black">Email</label>
                                        <p class="form-control-plaintext" id="email">
                                            {{ $result->email ?? '-' }}
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="message" class="text-black">Message</label>
                                        <p class="form-control-plaintext" id="message">
                                            {{ $result->message ?? '-' }}
                                        </p>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            {{-- static navigation --}}
            {{-- <div class="col-lg-3">
                <div class="nav-sticky">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav flex-column" id="stickyNav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#default"> Form Controls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#solid">Solid Form Controls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#checkbox">Default Checkboxes &amp; Radio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#checkboxSolid">Solid Checkboxes &amp; Radio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js"
        crossorigin="anonymous"></script>
@endpush
