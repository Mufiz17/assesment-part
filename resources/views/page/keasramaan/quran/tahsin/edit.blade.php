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
                            <a href="/sekolah-keasramaan/al-quran/tahsin" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('tahsin.update', $tahsin->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h3 class="card-title">Data Tambahan</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="text" class="form-control datepicker" placeholder="Masukan Tanggal" id="datepicker-icon-1" name="tanggal" autocomplete="off" value="{{ $tahsin->tanggal }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control form-select" name="kelas">
                                                <option value="">Pilih Kelas</option>
                                                <option value="X" {{ $tahsin->kelas == 'X' ? 'selected' : '' }}>X</option>
                                                <option value="XI" {{ $tahsin->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                                <option value="XII" {{ $tahsin->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                                <option value="XIII" {{ $tahsin->kelas == 'XIII' ? 'selected' : '' }}>XIII</option>
                                            </select>
                                            @error('kelas')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Siswa</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Siswa" name="nama" value="{{ $tahsin->nama }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">NISN Siswa</label>
                                            <input type="text" class="form-control" placeholder="Masukan NISN Siswa" name="nisn" value="{{ $tahsin->nisn }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Surat</label>
                                            <input type="text" class="form-control" placeholder="Masukan Surat" name="surat" value="{{ $tahsin->surat }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Ayat</label>
                                            <input type="text" class="form-control" placeholder="Masukan Ayat" name="ayat" value="{{ $tahsin->ayat }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Predikat</label>
                                            <input type="text" class="form-control" placeholder="Masukan Predikat" name="predikat" value="{{ $tahsin->predikat }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Pengajar</label>
                                            <input type="text" class="form-control" placeholder="Masukan Pengajar" name="pengajar" value="{{ $tahsin->pengajar }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success" id="submitButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Inisialisasi datepicker
        document.addEventListener("DOMContentLoaded", function () {
            initializeDatepickers();
        });

        function initializeDatepickers() {
            var datepickers = document.querySelectorAll('[id^="datepicker-icon-"]');
            datepickers.forEach(function(datepicker) {
                new Litepicker({
                    element: datepicker,
                    format: 'DD MMMM YYYY', // Format tanggal
                    buttonText: {
                        previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                    locale: {
                        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                        weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                    }
                });
            });
        }
    </script>
</x-app-layout>
