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
                            <a href="/pts" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('pts.perform') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h3 class="card-title">Tambahkan Data</h3>
                                <div class="row row-cards">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <select class="form-control form-select" name="tahun_ajaran">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                <option value="2024-2025">2024-2025</option>
                                                <option value="2025-2026">2025-2026</option>
                                                <option value="2026-2027">2026-2027</option>
                                                <option value="2027-2028">2027-2028</option>
                                                <option value="2028-2029">2028-2029</option>
                                                <option value="2029-2030">2029-2030</option>
                                            </select>
                                            @error('tahun_ajaran')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
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
                                    <div class="col-sm-6 col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">Mapel</label>
                                            <select class="form-control form-select" name="mapel">
                                                <option value="">Pilih Mapel</option>
                                                <option value="SAAS">SAAS</option>
                                                <option value="PAAS">PAAS</option>
                                                <option value="IAAS">IAAS</option>
                                                <option value="SKJ">SKJ</option>
                                                <option value="SIoT">SIoT</option>
                                                <option value="PJOK">PJOK</option>
                                                <option value="MTK">MTK</option>
                                                <option value="BIng">BIng</option>
                                                <option value="BInd">BInd</option>
                                                <option value="PAIBP">PAIBP</option>
                                                <option value="Kimia">Kimia</option>
                                                <option value="Fisika">Fisika</option>
                                                <option value="Seni">Seni</option>
                                                <option value="Sejarah">Sejarah</option>
                                                <option value="Pancasila">Pancasila</option>
                                            </select>
                                            @error('mapel')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Kisi Kisi</div>
                                            <input type="file" class="form-control" name="kisi_kisi">
                                            @error('kisi_kisi')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Soal</div>
                                            <input type="file" class="form-control" name="soal">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Jawaban</div>
                                            <input type="file" class="form-control" name="jawaban">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Proker</div>
                                            <input type="file" class="form-control" name="proker">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Kehadiran</div>
                                            <input type="file" class="form-control" name="kehadiran">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">BA</div>
                                            <input type="file" class="form-control" name="ba">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">SK Panitia</div>
                                            <input type="file" class="form-control" name="sk_panitia">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Tatib</div>
                                            <input type="file" class="form-control" name="tatib">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Surat Pemberitahuan</div>
                                            <input type="file" class="form-control" name="surat_pemberitahuan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Jadwal</div>
                                            <input type="file" class="form-control" name="jadwal">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Daftar Nilai</div>
                                            <input type="file" class="form-control" name="daftar_nilai">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Tanda Terima dan Penyerahan Soal</div>
                                            <input type="file" class="form-control" name="tanda_terima_dan_penerimaan_soal">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <div class="form-label">Daftar Hadir Panitia</div>
                                            <input type="file" class="form-control" name="kehadiran_panitia">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
