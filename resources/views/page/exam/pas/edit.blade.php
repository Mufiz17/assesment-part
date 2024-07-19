<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="/pas" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('pas.update', $pas->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h3 class="card-title">Tambahkan Data</h3>
                                <div class="row row-cards">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <select class="form-control form-select" name="tahun_ajaran">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                @foreach(['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $tahun)
                                                    <option value="{{ $tahun }}" {{ $pas->tahun_ajaran == $tahun ? 'selected' : '' }}>
                                                        {{ $tahun }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tahun_ajaran')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control form-select" name="kelas">
                                                <option value="">Pilih Kelas</option>
                                                @foreach(['X', 'XI', 'XII', 'XIII'] as $kelas)
                                                    <option value="{{ $kelas }}" {{ $pas->kelas == $kelas ? 'selected' : '' }}>
                                                        {{ $kelas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">Mapel</label>
                                            <select class="form-control form-select" name="mapel">
                                                <option value="">Pilih Mapel</option>
                                                @foreach(['SAAS', 'PAAS', 'IAAS', 'SKJ', 'SIoT', 'PJOK', 'MTK', 'BIng', 'BInd', 'PAIBP', 'Kimia', 'Fisika', 'Seni', 'Sejarah', 'Pancasila'] as $mapel)
                                                    <option value="{{ $mapel }}" {{ $pas->mapel == $mapel ? 'selected' : '' }}>
                                                        {{ $mapel }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('mapel')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @foreach(['kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran', 'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'] as $fileField)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <div class="form-label">{{ ucwords(str_replace('_', ' ', $fileField)) }}</div>
                                                <input type="file" class="form-control" name="{{ $fileField }}" value="{{$fileField}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
