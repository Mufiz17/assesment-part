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
                            <a href="/rapor" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('rapor.update', $rapor->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div id="step1">
                                <div class="card-body">
                                    <h3 class="card-title">Data Siswa</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Tahun Ajaran</label>
                                                <select class="form-control form-select" name="tahun_ajaran">
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    <option value="2024-2025"
                                                        {{ $rapor->tahun_ajaran == '2024-2025' ? 'selected' : '' }}>
                                                        2024-2025</option>
                                                    <option value="2025-2026"
                                                        {{ $rapor->tahun_ajaran == '2025-2026' ? 'selected' : '' }}>
                                                        2025-2026</option>
                                                    <option value="2026-2027"
                                                        {{ $rapor->tahun_ajaran == '2026-2027' ? 'selected' : '' }}>
                                                        2026-2027</option>
                                                    <option value="2027-2028"
                                                        {{ $rapor->tahun_ajaran == '2027-2028' ? 'selected' : '' }}>
                                                        2027-2028</option>
                                                    <option value="2028-2029"
                                                        {{ $rapor->tahun_ajaran == '2028-2029' ? 'selected' : '' }}>
                                                        2028-2029</option>
                                                    <option value="2029-2030"
                                                        {{ $rapor->tahun_ajaran == '2029-2030' ? 'selected' : '' }}>
                                                        2029-2030</option>
                                                </select>
                                                @error('tahun_ajaran')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kelas</label>
                                                <select class="form-control form-select" name="kelas">
                                                    <option value="">Pilih Kelas</option>
                                                    <option value="X"
                                                        {{ $rapor->kelas == 'X' ? 'selected' : '' }}>X</option>
                                                    <option value="XI"
                                                        {{ $rapor->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                                    <option value="XII"
                                                        {{ $rapor->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                                    <option value="XIII"
                                                        {{ $rapor->kelas == 'XIII' ? 'selected' : '' }}>XIII</option>
                                                </select>
                                                @error('kelas')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Semester</label>
                                                <select class="form-control form-select" name="semester">
                                                    <option value="">Pilih Semester</option>
                                                    <option value="1 (Ganjil)" {{ $rapor->semester == '1 (Ganjil)' ? 'selected' : '' }}>1 (Ganjil)</option>
                                                    <option value="2 (Genap)" {{ $rapor->semester == '2 (Genap)' ? 'selected' : '' }}>2 (Genap)</option>
                                                </select>
                                                @error('semester')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Siswa</label>
                                                <input type='text' class="form-control" placeholder="Masukan Nama" name="nama" value="{{ $rapor->nama }}">
                                                @error('nama')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">NISN Siswa</label>
                                                <input type='number' class="form-control" placeholder="Masukan Nama" name="nisn" value="{{ $rapor->nisn }}">
                                                @error('nisn')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="step2">
                                <div class="card-body">
                                    <h3 class="card-title">Data Tambahan</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal dikeluarkan</label>
                                                <input type='text' class="form-control datepicker" placeholder="Masukan Tanggal" name="released" value="{{ $rapor->released }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Walas</label>
                                                <input type='text' class="form-control" placeholder="Masukan Nama" name="wname" value="{{ $rapor->wname }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">NIP Walas</label>
                                                <input type='text' class="form-control" placeholder="Masukan NIP" name="nip" value="{{ $rapor->nip }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kepala Sekolah</label>
                                                <input type='text' class="form-control" placeholder="Masukan Nama" name="hmaster" value="{{ $rapor->hmaster }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">NIP Kepala Sekolah</label>
                                                <input type='text' class="form-control" placeholder="Masukan NIP" name="hmnip" value="{{ $rapor->hmnip }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="step3">
                                <div class="card-body">
                                    <h3 class="card-title">Nilai Sikap</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia</label>
                                                <input type='text' class="form-control" placeholder="Masukan deskripsi" name="beriman" value="{{ $rapor->beriman }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Mandiri</label>
                                                <input type='text' class="form-control" placeholder="Masukan deskripsi" name="mandiri" value="{{ $rapor->mandiri }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Bergotong royong</label>
                                                <input type='text' class="form-control" placeholder="Masukan deskripsi" name="gotong_royong" value="{{ $rapor->gotong_royong }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step4">
                                <div class="card-body">
                                    <h3 class="card-title">Muatan Nasional</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Pendidikan Agama Islam dan Budi
                                                    Pekerti</label>
                                                <input type="number" class="form-control" placeholder="Masukan Nilai"
                                                    name="pai" value="{{ $rapor->pai }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Pendidikan Pancasila dan
                                                    Kewarganegaraan</label>
                                                <input type="number" class="form-control" name="pkn"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->pkn }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Bahasa Indonesia</label>
                                                <input type='number' class="form-control" name="indo"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->indo }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Pendidikan Agama Islam dan Budi
                                                    Pekerti</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_pai">{{ $rapor->desc_pai }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Pendidikan Pancasila dan
                                                    Kewarganegaraan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_pkn">{{ $rapor->desc_pkn }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Bahasa Indonesia</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_indo">{{ $rapor->desc_indo }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Matematika</label>
                                                <input type='number' class="form-control" name="mtk"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->mtk }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sejarah Indonesia</label>
                                                <input type='number' class="form-control" name="sejindo"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->sejindo }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Bahasa Asing</label>
                                                <input type='number' class="form-control" name="bhs_asing"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->bhs_asing }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Matematika</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_mtk">{{ $rapor->desc_mtk }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Sejarah Indonesia</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_sejindo">{{ $rapor->desc_sejindo }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Bahasa Asing</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_bhs_asing">{{ $rapor->desc_bhs_asing }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step5">
                                <div class="card-body">
                                    <h3 class="card-title">Muatan Kewilayahan</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Seni Budaya</label>
                                                <input type="number" class="form-control" name="sbd"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->sbd }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">PJOK</label>
                                                <input type="number" class="form-control" name="pjok"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->pjok }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Seni Budaya</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_sbd">{{ $rapor->desc_sbd }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi PJOK</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_pjok">{{ $rapor->desc_pjok }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step6">
                                <div class="card-body">
                                    <h3 class="card-title">C1. Dasar Bidang Keahlian</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Simulasi dan Komunikasi Digital</label>
                                                <input type="number" class="form-control" name="simdig"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->simdig }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Fisika</label>
                                                <input type="number" class="form-control" name="fis"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->fis }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kimia</label>
                                                <input type="number" class="form-control" name="kim"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->kim }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Simulasi dan Komunikasi
                                                    Digital</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_simdig">{{ $rapor->desc_simdig }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Fisika</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_fis">{{ $rapor->desc_fis }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Kimia</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_kim">{{ $rapor->desc_kim }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step7">
                                <div class="card-body">
                                    <h3 class="card-title">C2. Dasar Program Keahlian</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sistem Komputer</label>
                                                <input type="number" class="form-control" name="sis_kom"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->sis_kom }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Komputer dan Jaringan</label>
                                                <input type="number" class="form-control" name="komjar"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->komjar }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Pemrograman Dasar</label>
                                                <input type="number" class="form-control" name="progdas"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->progdas }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Sistem Komputer</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_sis_kom">{{ $rapor->desc_sis_kom }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Komputer dan Jaringan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_komjar">{{ $rapor->desc_komjar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Pemrograman Dasar</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_progdas">{{ $rapor->desc_progdas }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Dasar Design Grafis</label>
                                                <input type="number" class="form-control" name="ddg"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->ddg }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Dasar Design Grafis</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_ddg">{{ $rapor->desc_ddg }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step8">
                                <div class="card-body">
                                    <h3 class="card-title">C3. Kompetensi Keahlian</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Infrastruktur Komputasi Awan</label>
                                                <input type="number" class="form-control" name="iaas"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->iaas }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Platform Komputasi Awan</label>
                                                <input type="number" class="form-control" name="paas"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->paas }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Layanan Komputasi Awan</label>
                                                <input type="number" class="form-control" name="saas"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->saas }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Infrastruktur Komputasi
                                                    Awan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_iaas">{{ $rapor->desc_iaas }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Platform Komputasi Awan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_paas">{{ $rapor->desc_paas }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Layanan Komputasi Awan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_saas">{{ $rapor->desc_saas }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sistem Internet of Things</label>
                                                <input type="number" class="form-control" name="siot"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->siot }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sistem Keamanan Jaringan</label>
                                                <input type="number" class="form-control" name="skj"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->skj }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Produk Kreatif dan Kewirausahaan</label>
                                                <input type="number" class="form-control" name="pkk"
                                                    placeholder="Masukan Nilai" value="{{ $rapor->pkk }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Sistem Internet of Things</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_siot">{{ $rapor->desc_siot }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Sistem Keamanan Jaringan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_skj">{{ $rapor->desc_skj }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Produk Kreatif dan
                                                    Kewirausahaan</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="desc_pkk">{{ $rapor->desc_pkk }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step9">
                                <div class="card-body">
                                    <h3 class="card-title">Catatan</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Catatan Wali Kelas</label>
                                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="note">{{ $rapor->note }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="button" class="btn btn-secondary" id="prevButton"
                                    style="display: none;">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                                <button type="submit" class="btn btn-success d-none"
                                    id="submitButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = ['step1', 'step2', 'step3', 'step4', 'step5', 'step6', 'step7', 'step8', 'step9'];
            let currentStep = 0;

            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');
            const submitButton = document.getElementById('submitButton');

            const toggleVisibility = (element, condition) => {
                element.style.display = condition ? 'none' : 'inline-block';
            };

            const showStep = (step) => {
                steps.forEach((id, index) => {
                    document.getElementById(id).classList.toggle('d-none', index !== step);
                });
                toggleVisibility(prevButton, step === 0);
                toggleVisibility(nextButton, step === steps.length - 1);
                submitButton.classList.toggle('d-none', step !== steps.length - 1);
            };

            nextButton.addEventListener('click', function() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            prevButton.addEventListener('click', function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
        });
    </script>
</x-app-layout>
