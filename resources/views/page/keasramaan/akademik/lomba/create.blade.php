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
                            <a href="/sekolah-keasramaan/akademik/lomba" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('lomba.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h3 class="card-title">Data Siswa</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type='date' class="form-control datepicker"
                                                placeholder="Masukan Tanggal" id="datepicker-icon-1" name="tanggal"
                                                autocomplete='off'>
                                            @error('tanggal')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
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
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Siswa</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="nama" value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kegiatan</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan Nama Kegiatan" name="kegiatan"
                                                value="{{ old('kegiatan') }}">
                                            @error('kegiatan')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <textarea class="form-control" placeholder="Masukan Keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Dokumentasi</label>
                                            <input type="file" class="form-control" name="dokumentasi[]" multiple>
                                            @error('dokumentasi')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Undangan/Surat</label>
                                            <input type="file" class="form-control" name="undangan[]" multiple>
                                            @error('undangan')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
