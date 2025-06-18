@extends('admin.layouts.layout')

@section('title', isset($result) ? "Edit About Us Section $result->position" : 'Create Gallery')



@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="edit-3"></i>
                    </div>
                    <span>{{ isset($result) ? "Edit About Us Section $result->position" : 'Create Gallery' }}</span>
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
                            {{ isset($result) ? "Edit About Us Section $result->position" : 'Create About Us Section' }}
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

                                        <div class="form-group">
                                            <label for="position">Section Position</label>
                                            <select class="form-control" id="position" name="position" required>
                                                <option value="">Select Position</option>
                                                <option value="top"
                                                    {{ old('position', isset($result) ? $result->position : '') == 'top' ? 'selected' : '' }}>
                                                    Top</option>
                                                <option value="middle"
                                                    {{ old('position', isset($result) ? $result->position : '') == 'middle' ? 'selected' : '' }}>
                                                    Middle</option>
                                                <option value="bottom"
                                                    {{ old('position', isset($result) ? $result->position : '') == 'bottom' ? 'selected' : '' }}>
                                                    Bottom</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" id="title" name="title" type="text"
                                                value="{{ old('title', isset($result) ? $result->title : '') }}"
                                                placeholder="Section Title" />
                                        </div>


                                        <div class="form-group">
                                            <label for="content">Section Content</label>
                                            <textarea class="form-control rich-text" id="content" name="content" placeholder="Section Content" required>{{ old('content', isset($result) ? $result->content : '') }}</textarea>
                                        </div>



                                        <div class="form-group" >
                                            <label for="photo_left" style="font-weight: 600; color: #495057;">Photo
                                                Left</label>

                                            @if (isset($result->photo_left) && $result->photo_left)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="delete_photo_left"
                                                        name="delete_photo_left" value="1">
                                                    <label class="form-check-label" for="delete_photo_left">Delete Photo
                                                        Left</label>
                                                </div>
                                            @endif
                                            <script>
                                                function clearPhotoLeftInput() {
                                                    const input = document.getElementById('photo_left');
                                                    const textInput = document.getElementById('text_photo_left');
                                                    input.value = '';
                                                    const preview = document.getElementById('photo-preview');
                                                    if (preview) {
                                                        preview.src = '';
                                                        preview.style.display = 'none';
                                                    }
                                                }
                                            </script>
                                            <input class="form-control" id="photo_left" name="photo_left" type="file"
                                                style="padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.25rem;"
                                                onchange="previewPhoto(event, 'left')" />

                                            <div class="mt-5" style="margin-bottom: 10px">
                                                <p id="text-photo-left" style="display: none">
                                                    New Photo:</p>
                                                <img src="#" id="photo-preview-left" alt="Preview Image from Input"
                                                    style="max-width: 200px; max-height: 200px; display: none; margin-bottom:20px;">
                                                @if (isset($result->photo_left))
                                                    <p id="text_photo_left"
                                                        style="display: {{ isset($result) && $result->photo_left ? 'block' : 'none' }};">
                                                        Currently Photo:</p>
                                                    <img id="photo-preview-left"
                                                        src="{{ isset($result) && $result->photo_left ? asset('storage/' . $result->photo_left) : '' }}"
                                                        alt="Image Preview Left"
                                                        style="max-width: 200px; max-height: 200px; display: {{ isset($result) && $result->photo_left ? 'block' : 'none' }}; border: 1px solid #eee; border-radius: 0.25rem;">
                                                @endif
                                            </div>
                                            @if (!isset($result->photo_left))
                                                <div class="mt-5">
                                                    No Photo For Left
                                                </div>
                                            @endif
                                        </div>


                                        <div class="form-group" style="margin-bottom: 1.5rem;">
                                            <label for="photo_right" style="font-weight: 600; color: #495057;">Photo
                                                Right</label>
                                            @if (isset($result->photo_right) && $result->photo_right)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="delete_photo_right"
                                                        name="delete_photo_right" value="1">
                                                    <label class="form-check-label" for="delete_photo_right">Delete
                                                        Photo
                                                        Right</label>
                                                </div>
                                            @endif


                                            <input class="form-control" id="photo_right" name="photo_right" type="file"
                                                style="padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.25rem;"
                                                onchange="previewPhoto(event, 'right')" />

                                            <div class="mt-5">
                                                <p id="text-photo-right" style="display: none">
                                                    New Photo:</p>
                                                <img src="#" id="photo-preview-right" alt="Preview Image from Input"
                                                    style="max-width: 200px; max-height: 200px; display: none; margin-bottom:20px;">
                                                @if (isset($result->photo_right))
                                                    <p id="text_photo_right"
                                                        style="display: {{ isset($result) && $result->photo_right ? 'block' : 'none' }};">
                                                        Currently Photo:</p>
                                                    <img id="photo-preview-right"
                                                        src="{{ isset($result) && $result->photo_right ? asset('storage/' . $result->photo_right) : '' }}"
                                                        alt="Image Preview Right"
                                                        style="max-width: 200px; max-height: 200px; display: {{ isset($result) && $result->photo_right ? 'block' : 'none' }}; border: 1px solid #eee; border-radius: 0.25rem;">
                                                @endif
                                            </div>
                                            @if (!isset($result->photo_right))
                                                <div class="mt-5">
                                                    No Photo For Right
                                                </div>
                                            @endif


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

                                            function previewImageTwo(event) {
                                                const input = event.input
                                                const preview = document.getElementById('photo-preview2')
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

                                            function previewPhoto(event, leftOrRight) {
                                                const input = event.target
                                                const preview = document.getElementById(`photo-preview-${leftOrRight}`);
                                                const inputText = document.getElementById(`text-photo-${leftOrRight}`);
                                                if (input.files && input.files[0]) {
                                                    const reader = new FileReader()
                                                    reader.onload = (e) => {
                                                        preview.src = e.target.result
                                                        preview.style.display = 'block'
                                                        inputText.style.display = 'block'
                                                    }
                                                    reader.readAsDataURL(input.files[0])
                                                } else {
                                                    preview.src = '#'
                                                    preview.style.display = 'none'
                                                    inputText.style.display = 'none'
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            ClassicEditor.create(document.querySelector('.rich-text')).catch(e => {
                console.error('error: ', e)
            })
        })
    </script>
@endpush
