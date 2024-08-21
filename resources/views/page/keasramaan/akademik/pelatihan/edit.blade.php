<x-app-layout>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="/sekolah-keasramaan/akademik/pelatihan" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                    <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h3 class="card-title">Edit Data Siswa</h3>
                            <div class="row row-cards">
                                <!-- Input fields here... -->

                                <!-- Dokumentasi -->
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="dokumentasi" class="form-label">Dokumentasi</label>
                                        <div class="file-upload-wrapper">
                                            <p>Upload up to 10 supported files. Max 1 MB per file.</p>
                                            <input type="file" name="dokumentasi[]" multiple>
                                            <ul class="file-list" id="dokumentasi-file-list">
                                                @php
                                                    $dokumentasiFiles = json_decode($pelatihan->dokumentasi, true) ?? [];
                                                @endphp
                                                @if($dokumentasiFiles)
                                                    @foreach ($dokumentasiFiles as $file)
                                                        <li class="card mb-2" style="width: 12rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ \Illuminate\Support\Str::limit(basename($file), 20) }}</h5>
                                                                <p class="card-text">Size: {{ round(Storage::size($file) / 1024, 2) }} KB</p>
                                                                <a href="{{ Storage::url($file) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                                                <span class="remove-file btn btn-danger btn-sm">Remove</span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <p>No files available.</p>
                                                @endif
                                            </ul>
                                        </div>
                                        @error('dokumentasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Upload File Undangan -->
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label for="undangan" class="form-label">Undangan/Surat</label>
                                        <div class="file-upload-wrapper">
                                            <p>Upload up to 10 supported files. Max 1 MB per file.</p>
                                            <input type="file" name="undangan[]" multiple>
                                            <ul class="file-list" id="undangan-file-list">
                                                @php
                                                    $undanganFiles = json_decode($pelatihan->undangan, true) ?? [];
                                                @endphp
                                                @if($undanganFiles)
                                                    @foreach ($undanganFiles as $file)
                                                        <li class="card mb-2" style="width: 12rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ \Illuminate\Support\Str::limit(basename($file), 20) }}</h5>
                                                                <p class="card-text">Size: {{ round(Storage::size($file) / 1024, 2) }} KB</p>
                                                                <a href="{{ Storage::url($file) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                                                <span class="remove-file btn btn-danger btn-sm">Remove</span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <p>No files available.</p>
                                                @endif
                                            </ul>
                                            @error('undangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dokumentasiInput = document.querySelector('input[name="dokumentasi[]"]');
            const undanganInput = document.querySelector('input[name="undangan[]"]');

            function handleFileDisplay(inputElement, listId) {
                const fileList = document.getElementById(listId);

                inputElement.addEventListener('change', function() {
                    fileList.innerHTML = '';
                    const files = Array.from(inputElement.files);

                    files.forEach(file => {
                        const card = document.createElement('div');
                        card.className = 'card mb-2';
                        card.style.width = '12rem';

                        card.innerHTML = `
                            <div class="card-body">
                                <h5 class="card-title">${file.name.length > 20 ? file.name.slice(0, 20) + '...' : file.name}</h5>
                                <p class="card-text">Size: ${(file.size / 1024).toFixed(2)} KB</p>
                                <span class="remove-file btn btn-danger btn-sm">Remove</span>
                            </div>
                        `;

                        card.querySelector('.remove-file').addEventListener('click', function() {
                            card.remove();
                        });

                        fileList.appendChild(card);
                    });
                });
            }

            handleFileDisplay(dokumentasiInput, 'dokumentasi-file-list');
            handleFileDisplay(undanganInput, 'undangan-file-list');
        });
    </script>
</x-app-layout>
