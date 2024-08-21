<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <script src="{{ asset('dist/libs/litepicker/dist/litepicker.js') }}" defer></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="/sekolah-keasramaan/jurnal-asrama/fiqih" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('fiqih.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type='date' class="form-control datepicker"
                                            placeholder="Masukan Tanggal" id="datepicker-icon-1" name="tanggal"
                                            autocomplete='off'>
                                        @error('tanggal')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <select class="form-control form-select" name="kelas">
                                            <option value="">Pilih Kelas</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                            <option value="XIII">XIII</option>
                                        </select>
                                        @error('kelas')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nisn" class="form-label">NISN Siswa</label>
                                        <input type="text"
                                            class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                            name="nisn" value="{{ old('nisn') }}">
                                        @error('nisn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="materi" class="form-label">Nama materi</label>
                                        <input type="text"
                                            class="form-control @error('materi') is-invalid @enderror" id="materi"
                                            name="materi" value="{{ old('materi') }}">
                                        @error('materi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">Add Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
