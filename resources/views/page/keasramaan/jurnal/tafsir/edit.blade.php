<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/litepicker/dist/litepicker.js') }}" defer></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="/sekolah-keasramaan/jurnal-asrama/tafsir" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('tafsir.update', $tafsir->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h3 class="card-title">Edit Data Siswa</h3>
                                <div class="row row-cards">
                                    <!-- Tanggal -->
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type='date' class="form-control datepicker"
                                            placeholder="Masukan Tanggal" id="datepicker-icon-1" name="tanggal"
                                            autocomplete='off' value="{{ $tafsir->tanggal }}">
                                        @error('tanggal')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <!-- Kelas -->
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <select class="form-control form-select" name="kelas">
                                            <option value="">Pilih Kelas</option>
                                            <option value="X" @if ($tafsir->kelas == 'X') selected @endif>X
                                            </option>
                                            <option value="XI" @if ($tafsir->kelas == 'XI') selected @endif>XI
                                            </option>
                                            <option value="XII" @if ($tafsir->kelas == 'XII') selected @endif>
                                                XII</option>
                                            <option value="XIII" @if ($tafsir->kelas == 'XIII') selected @endif>
                                                XIII</option>
                                        </select>
                                        @error('kelas')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <!-- Nisn -->
                                    <div class="mb-3">
                                        <label class="form-label">NISN Siswa</label>
                                        <input type='text' class="form-control" name="nisn"
                                            placeholder="Masukan NISN Siswa" value="{{ $tafsir->nisn }}">
                                        @error('nisn')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    {{-- Materi --}}
                                    <div class="mb-3">
                                        <label class="form-label">Nama Materi</label>
                                        <input type='text' class="form-control" name="materi"
                                            placeholder="Masukan Materi" value="{{ $tafsir->materi }}">
                                        @error('materi')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
