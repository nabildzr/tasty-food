@extends('admin.layouts.layout')

@section('title', 'Business Information')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush


@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="edit-3"></i>
                    </div>
                    <span>{{ 'Business Information' }}</span>
                </h1>
                <div class="page-header-subtitle">
                  Use this dynamic form to easily edit/read data.
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
                            {{ "Business Information"  }}
                        </div>

                        <div class="mr-4 ml-4 mt-4 mb-0">
                            @include('admin.layouts.feedback')

                        </div>

                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="{{ route('business-information.update', $businessInformation->id) }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" id="phone" name="phone" type="text"
                                                value="{{ old('phone', isset($businessInformation) ? $businessInformation->phone : '') }}"
                                                placeholder="Phone" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="email"
                                                value="{{ old('email', isset($businessInformation) ? $businessInformation->email : '') }}"
                                                placeholder="Email" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="location">Location Address (Auto filled from the maps)</label>
                                            <input class="form-control" id="location" name="location" type="text"
                                                value="{{ old('location', isset($businessInformation) ? $businessInformation->location : '') }}"
                                                placeholder="Location Address" required disabled/>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Location on Map (Click to set marker)</label>
                                          
                                            <div id="map"
                                                style="height: 400px; width: 100%; border: 1px solid #ddd; border-radius: 4px;">
                                            </div>

                                            <input type="hidden" id="latitude" name="latitude"
                                                value="{{ old('latitude', isset($businessInformation) ? $businessInformation->latitude : '') }}">
                                            <input type="hidden" id="longitude" name="longitude"
                                                value="{{ old('longitude', isset($businessInformation) ? $businessInformation->longitude : '') }}">

                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    Selected coordinates:
                                                    <span id="coords-display">
                                                        {{ isset($businessInformation) ? $businessInformation->latitude . ', ' . $businessInformation->longitude : 'Click on map to select' }}
                                                    </span>
                                                </small>
                                            </div>
                                        </div>


                                        <button type="submit"
                                            class="btn btn-primary px-5 mt-2">Update</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Set default location (Jakarta) atau lokasi yang sudah ada jika edit
                    const defaultLat = {{ isset($result) && $result->latitude ? $result->latitude : -6.2088 }};
                    const defaultLng = {{ isset($result) && $result->longitude ? $result->longitude : 106.8456 }};

                    // Initialize map
                    const map = L.map('map').setView([defaultLat, defaultLng], 13);

                    // Add OpenStreetMap tile layer
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    let marker;

                    // Add marker for existing location if editing
                    if (defaultLat && defaultLng) {
                        marker = L.marker([defaultLat, defaultLng], {
                            draggable: true
                        }).addTo(map);
                        marker.on('dragend', function(e) {
                            const coords = e.target.getLatLng();
                            updateCoordinates(coords.lat, coords.lng);
                            getAddressFromCoordinates(coords.lat, coords.lng);
                        });

                        // If we have coordinates but no address, get the address
                        if (!document.getElementById('location').value.trim()) {
                            getAddressFromCoordinates(defaultLat, defaultLng);
                        }
                    }

                    // Add click event to set marker
                    map.on('click', function(e) {
                        if (marker) {
                            map.removeLayer(marker);
                        }

                        marker = L.marker(e.latlng, {
                            draggable: true
                        }).addTo(map);
                        updateCoordinates(e.latlng.lat, e.latlng.lng);
                        getAddressFromCoordinates(e.latlng.lat, e.latlng.lng);

                        marker.on('dragend', function(e) {
                            const coords = e.target.getLatLng();
                            updateCoordinates(coords.lat, coords.lng);
                            getAddressFromCoordinates(coords.lat, coords.lng);
                        });
                    });

                    function updateCoordinates(lat, lng) {
                        document.getElementById('latitude').value = lat.toFixed(9);
                        document.getElementById('longitude').value = lng.toFixed(9);
                        document.getElementById('coords-display').textContent = lat.toFixed(6) + ', ' + lng.toFixed(6);
                    }

                    // Fungsi untuk mendapatkan alamat dari koordinat menggunakan Nominatim API
                    function getAddressFromCoordinates(lat, lng) {
                        const url =
                            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`;

                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                if (data && data.display_name) {
                                    document.getElementById('location').value = data.display_name;
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching address:', error);
                            });
                    }
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
