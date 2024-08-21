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
                            <a href="/sekolah-keasramaan/al-quran/sertif" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('sertifikat.update', $sertifikat->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h3 class="card-title">Data Tambahan</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control datepicker"
                                                placeholder="Masukan Tanggal" id="datepicker-icon-1" name="tanggal"
                                                autocomplete="off" value="{{ $sertifikat->tanggal }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control form-select" name="kelas">
                                                <option value="">Pilih Kelas</option>
                                                <option value="X" {{ $sertifikat->kelas == 'X' ? 'selected' : '' }}>X</option>
                                                <option value="XI" {{ $sertifikat->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                                <option value="XII" {{ $sertifikat->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                                <option value="XIII" {{ $sertifikat->kelas == 'XIII' ? 'selected' : '' }}>XIII</option>
                                            </select>
                                            @error('kelas')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Siswa</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Siswa" name="nama" value="{{ $sertifikat->nama }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">NISN Siswa</label>
                                            <input type="text" class="form-control" placeholder="Masukan NISN Siswa" name="nisn" value="{{ $sertifikat->nisn }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Juz 30</label>
                                            <input type="file" class="form-control" name="juz_30">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Juz 29</label>
                                            <input type="file" class="form-control" name="juz_29">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Juz 28</label>
                                            <input type="file" class="form-control" name="juz_28">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Juz Umum</label>
                                            <input type="file" class="form-control" name="juz_umum">
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
        document.addEventListener("DOMContentLoaded", function() {
            // initializeDatepickers();
            initializeFileInputs();
            loadExistingFiles();
        });

        // Inisialisasi datepicker
        // function initializeDatepickers() {
        //     var datepickers = document.querySelectorAll('[id^="datepicker-icon-"]');
        //     datepickers.forEach(function(datepicker) {
        //         new Litepicker({
        //             element: datepicker,
        //             format: 'DD MMMM YYYY', // Format tanggal
        //             buttonText: {
        //                 previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
        //                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
        //                     stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        //                     <path d="M15 6l-6 6l6 6" /></svg>`,
        //                 nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
        //                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
        //                     stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        //                     <path d="M9 6l6 6l-6 6" /></svg>`,
        //             },
        //             locale: {
        //                 months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        //                 weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        //             }
        //         });
        //     });
        // }

        // Inisialisasi file input untuk menampilkan nama file yang dipilih
        function initializeFileInputs() {
            var fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(function(input) {
                input.addEventListener('change', function(event) {
                    var fileName = event.target.files[0] ? event.target.files[0].name : "Tidak ada file yang dipilih";
                    var label = input.closest('.mb-3').querySelector('.form-label');
                    label.textContent = fileName;
                });
            });
        }

        // Load file yang sudah ada sebelumnya
        function loadExistingFiles() {
            const data = @json($sertifikat);
            const files = {
                juz_30: data.juz_30,
                juz_29: data.juz_29,
                juz_28: data.juz_28,
                juz_umum: data.juz_umum,
            };

            for (const [key, value] of Object.entries(files)) {
                if (value) {
                    setFileInput(value, key);
                }
            }
        }

        function setFileInput(fileName, inputName) {
            const inputElement = document.querySelector(`input[name="${inputName}"]`);
            if (inputElement) {
                fetch('/storage/' + fileName)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.blob();
                    })
                    .then(blob => {
                        const file = new File([blob], fileName, {
                            type: blob.type,
                            lastModified: new Date(),
                        });

                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        inputElement.files = dataTransfer.files;
                    })
                    .catch(error => console.error('Error fetching file:', error));
            }
        }
    </script>
</x-app-layout>
