@extends('admin.layouts.layout')

@section('title', isset($result) ? 'Edit Slider Gallery' : 'Create Slider Gallery')



@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="edit-3"></i>
                    </div>
                    <span>{{ isset($result) ? 'Edit Slider Gallery' : 'Create Slider Gallery' }}</span>
                </h1>
                <div class="page-header-subtitle">
                    Use this dynamic form to easily {{ isset($result) ? 'edit' : 'create' }} data.
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
                            {{ isset($result) ? "Edit $result->id Slider Gallery" : 'Create Slider Gallery' }}
                        </div>

                        <div class="mr-4 ml-4 mt-4 mb-0">
                            @include('admin.layouts.feedback')

                        </div>

                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        @method(isset($result) ? 'PUT' : 'POST')

                                        <div class="form-group" style="margin-bottom: 1.5rem;">
                                            <label for="photo" style="font-weight: 600; color: #495057;">Photo</label>
                                            <input class="form-control" id="photo" name="photo" type="file"
                                                style="padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.25rem;"
                                                onchange="previewPhoto(event)" />

                                            <div class="mt-5">
                                                <p id="input-text" style="display: none;">New Photo:</p>
                                                <img src="#" id="photo-preview" alt="Preview Image from Input"
                                                    style="max-width: 200px; max-height: 200px; display: none; margin-bottom:20px;">
                                                @if (isset($result->photo))
                                                    <p id="input-text"
                                                        style="display: {{ isset($result->photo) ? 'block' : 'none' }};">
                                                        Currently Photo:</p>
                                                @endif
                                                <img id="photo-preview"
                                                    src="{{ isset($result) && $result->photo ? asset('storage/' . $result->photo) : '' }}"
                                                    alt="Image Preview"
                                                    style="max-width: 200px; max-height: 200px; display: {{ isset($result) && $result->photo ? 'block' : 'none' }}; border: 1px solid #eee; border-radius: 0.25rem;">
                                            </div>
                                        </div>
                                        <script>
                                            function previewImage(event) {
                                                const input = event.input
                                                const preview = document.getElementById('photo-preview')
                                                if (input.files && input.files[0]) {
                                                    const reader = new FileReader()
                                                    reader.onload = (e) => {
                                                        preview.src = e.target.result;
                                                        preview.style.display = 'block'
                                                    }
                                                    reader.readAsDataURL(input.files[0])
                                                } else {
                                                    preview.src = ''
                                                    preview.style.display = 'none'
                                                }
                                            }

                                           function previewPhoto(event) {
                                                const input = event.target;
                                                const preview = document.getElementById('photo-preview');
                                                const inputText = document.getElementById('input-text');
                                                if (input.files && input.files[0]) {
                                                    const reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        preview.src = e.target.result;
                                                        preview.style.display = 'block';
                                                        inputText.style.display = 'block';
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    preview.src = '#';
                                                    preview.style.display = 'none';
                                                    inputText.style.display = 'none';
                                                }
                                            }
                                        </script>

                                        <button type="submit"
                                            class="btn btn-primary px-5 mt-2">{{ isset($result) ? 'Update' : 'Create' }}</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    ClassicEditor.create(document.querySelector('.rich-text'))
                        .catch(error => {
                            console.error(error);
                        });
                });
            </script>

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
