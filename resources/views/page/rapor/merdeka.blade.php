<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .title {
            text-align: center;
            font-weight: bold;
        }

        .form-group {
            display: flex;
            margin-bottom: 10px;
        }

        .form-group div {
            width: 45%;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .attendance {
            margin-left: 0;
            margin-right: auto;
        }

        .achievements {
            margin-left: auto;
            margin-right: 0;
        }

        table.attitudes,
        table.subjects,
        table.extracurricular,
        table.attendance,
        table.achievements,
        table.note {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.attitudes th,
        table.attitudes td,
        table.subjects th,
        table.subjects td,
        table.extracurricular th,
        table.extracurricular td,
        table.attendance th,
        table.attendance td,
        table.achievements th,
        table.achievements td,
        table.note th,
        table.note td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        table.attitudes th,
        table.subjects th,
        table.extracurricular th,
        table.attendance th,
        table.achievements th,
        table.note th {
            background-color: #f2f2f2;
        }

        table.attitudes th.dimensi {
            width: 42%;
        }

        table.subjects th.no {
            width: 10%;
        }

        table.subjects th.mapel {
            width: 30%;
        }

        table.subjects th.grade {
            width: 10%;
        }

        table.subjects th.desc {
            width: 40%;
        }

        table.extracurricular th.no {
            width: 5%;
        }

        table.extracurricular th.name {
            width: 30%;
        }

        table.extracurricular th.rank {
            width: 7%;
        }

        table.extracurricular th.desc {
            width: 40%;
        }

        table.attendance th.no {
            width: 10.5%;
        }

        table.attendance th.type {
            width: 30%;
        }

        table.attendance th.total {
            width: 40%;
        }

        table.achievements th.no {
            width: 10.5%;
        }

        table.achievements th.type {
            width: 30%;
        }

        table.achievements th.desc {
            width: 40%;
        }

        .group {
            display: grid;
            grid-template-columns: auto auto
        }

        .note {
            max-width: 50%;
            margin: 20px auto;
        }

        .note th,
        .note td {
            text-align: center;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .left-signature,
        .right-signature,
        .last-signature {
            width: 30%;
            text-align: center;
        }
    </style>
</head>

<body>
    <p class="title">CAPAIAN HASIL BELAJAR PESERTA DIDIK</p>
    <div class="form-group">
        <div>
            <label>Nama: {{ $rapor->nama }}</label>
        </div>
        <div>
            <label>Kelas: {{ $rapor->kelas }}</label>
        </div>
        <div>
            <label>NISN: {{ $rapor->nisn }}</label>
        </div>
        <div>
            <label>Semester: {{ $rapor->semester }}</label>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>Sekolah: SMK TI BAZMA</label>
        </div>
        <div>
            <label>Tahun Pelajaran: {{ $rapor->tahun_ajaran }}</label>
        </div>
        <div>
            <label>Alamat: Jl. Raya Cikampak Cicadas, RT.1/RW.1, Cicadas, Kec. Ciampea, Kabupaten Bogor, Jawa Barat 16620</label>
        </div>
    </div>

    <h3>A. Sikap</h3>
    <table class="attitudes">
        <thead>
            <tr>
                <th class="dimensi">Dimensi</th>
                <th class="penjelasan">Penjelasan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if (!empty($rapor->beriman))
                    <td>Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia</td>
                    <td>{{ $rapor->beriman }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->mandiri))
                <td>Mandiri</td>
                <td>{{ $rapor->mandiri }}</td>
                @endif
            </tr>
            <tr>
            @if (!empty($rapor->gotong_royong))
            <td>Bergotong royong</td>
            <td>{{ $rapor->gotong_royong }}</td>
            @endif
            </tr>
        </tbody>
    </table>

    <h3>B. Nilai Akademik</h3>
    @php
        $i = 1;
    @endphp
    <table class="subjects">
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="mapel">Mata Pelajaran</th>
                <th class="grade">Nilai</th>
                <th class="desc">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="group-header">
                <td colspan="1"><strong>A</strong></td>
                <td colspan="3"><strong>Muatan Nasional</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->pai))
                <td>{{$i++}}</td>
                <td>Pendidikan Agama dan Budi Pekerti</td>
                <td>{{ $rapor->pai }}</td>
                <td>{{ $rapor->desc_pai }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->pai))
                <td>{{$i++}}</td>
                <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                <td>{{ $rapor->pkn }}</td>
                <td>{{ $rapor->desc_pkn }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->indo))
                <td>{{$i++}}</td>
                <td>Bahasa Indonesia</td>
                <td>{{ $rapor->indo }}</td>
                <td>{{ $rapor->desc_indo }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->mtk))

                <td>{{$i++}}</td>
                <td>Matematika</td>
                <td>{{ $rapor->mtk }}</td>
                <td>{{ $rapor->desc_mtk }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->sejindo))

                <td>{{$i++}}</td>
                <td>Sejarah Indonesia</td>
                <td>{{ $rapor->sejindo }}</td>
                <td>{{ $rapor->desc_sejindo }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->bhs_asing))

                <td>{{$i++}}</td>
                <td>Bahasa Inggris</td>
                <td>{{ $rapor->bhs_asing }}</td>
                <td>{{ $rapor->desc_bhs_asing }}</td>
                @endif
            </tr>
            @if (!empty($rapor->sbd || $rapor->pjok))

            <tr class="group-header">
                <td colspan="1"><strong>B</strong></td>
                <td colspan="3"><strong>Muatan Kewilayahan</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->sbd))

                <td>{{$i++}}</td>
                <td>Seni Budaya</td>
                <td>{{ $rapor->sbd }}</td>
                <td>{{ $rapor->desc_sbd }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->pjok))

                <td>{{$i++}}</td>
                <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                <td>{{ $rapor->pjok }}</td>
                <td>{{ $rapor->desc_pjok }}</td>
            </tr>
                @endif
            @endif

            <tr class="group-header">
                <td colspan="1"><strong>C</strong></td>
                <td colspan="3"><strong>Kompetensi Keahlian</strong></td>
            </tr>
            @if (!empty($rapor->simdig || $rapor->fis || $rapor->kim))
            <tr class="group-header">
                <td colspan="4"><strong>C1. Dasar Bidang Keahlian</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->simdig))

                <td>{{$i++}}</td>
                <td>Simulasi dan Komunikasi Digital</td>
                <td>{{ $rapor->simdig }}</td>
                <td>{{ $rapor->desc_simdig }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->fis))

                <td>{{$i++}}</td>
                <td>Fisika</td>
                <td>{{ $rapor->fis }}</td>
                <td>{{ $rapor->desc_fis }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->kim))

                <td>{{$i++}}</td>
                <td>Kimia</td>
                <td>{{ $rapor->kim }}</td>
                <td>{{ $rapor->desc_kim }}</td>
                @endif
            </tr>
            @endif
            @if (!empty($rapor->sis_kom || $rapor->komjar || $rapor->progdas || $rapor->ddg))

            <tr class="group-header">
                <td colspan="4"><strong>C2. Dasar Program Keahlian</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->sis_kom))

                <td>{{$i++}}</td>
                <td>Sistem Komputer</td>
                <td>{{ $rapor->sis_kom }}</td>
                <td>{{ $rapor->desc_sis_kom }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->komjar))

                <td>{{$i++}}</td>
                <td>Komputer dan Jaringan Dasar</td>
                <td>{{ $rapor->komjar }}</td>
                <td>{{ $rapor->desc_komjar }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->progdas))

                <td>{{$i++}}</td>
                <td>Pemrograman Dasar</td>
                <td>{{ $rapor->progdas }}</td>
                <td>{{ $rapor->desc_progdas }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->ddg))

                <td>{{$i++}}</td>
                <td>Dasar Desain Grafis</td>
                <td>{{ $rapor->ddg }}</td>
                <td>{{ $rapor->desc_ddg }}</td>
                @endif
            </tr>
            @endif
            @if (!empty($rapor->iaas || $rapor->paas || $rapor->saas || $rapor->siot || $rapor->skj || $rapor->pkk))

            <tr class="group-header">
                <td colspan="4"><strong>C3. Kompetensi Keahlian</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->iaas))

                <td>{{$i++}}</td>
                <td>Infrastruktur Komputasi Awan</td>
                <td>{{ $rapor->iaas }}</td>
                <td>{{ $rapor->desc_iaas }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->paas))

                <td>{{$i++}}</td>
                <td>Platform Komputasi Awan</td>
                <td>{{ $rapor->paas }}</td>
                <td>{{ $rapor->desc_paas }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->saas))

                <td>{{$i++}}</td>
                <td>Layanan Komputasi Awan</td>
                <td>{{ $rapor->saas }}</td>
                <td>{{ $rapor->desc_saas }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->siot))

                <td>{{$i++}}</td>
                <td>Sistem Internet of Things</td>
                <td>{{ $rapor->siot }}</td>
                <td>{{ $rapor->desc_siot }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->skj))

                <td>{{$i++}}</td>
                <td>Sistem Keamanan Jaringan</td>
                <td>{{ $rapor->skj }}</td>
                <td>{{ $rapor->desc_skj }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->pkk))

                <td>{{$i++}}</td>
                <td>Produk Kreatif dan Kewirausahaan</td>
                <td>{{ $rapor->pkk }}</td>
                <td>{{ $rapor->desc_pkk }}</td>
                @endif
            </tr>
            @endif
        </tbody>
    </table>

    <h3>C. Ekstrakurikuler</h3>
    <table class="extracurricular">
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="name">Nama Kegiatan</th>
                <th class="rank">Predikat</th>
                <th class="desc">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pramuka</td>
                <td>{{ $rapor->pramuka }}</td>
                <td>{{ $rapor->desc_pramuka }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Bulu Tangkis</td>
                <td>{{ $rapor->bultang }}</td>
                <td>{{ $rapor->desc_bultang }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Futsal</td>
                <td>{{ $rapor->futsal }}</td>
                <td>{{ $rapor->desc_futsal }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Silat</td>
                <td>{{ $rapor->silat }}</td>
                <td>{{ $rapor->desc_silat }}</td>
            </tr>
        </tbody>
    </table>

    <div class="group">
        <div>
            <table class="attendance">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th class="type">Jenis</th>
                        <th class="total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sakit</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Izin</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Alpha</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table class="achievements">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th class="type">Jenis</th>
                        <th class="desc">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kejuaraan Basket</td>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kejuaraan Pencak Silat</td>
                        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <table class="note">
        <thead>
            <tr>
                <th>Catatan Wali Kelas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type
                    specimen book.</td>
            </tr>
        </tbody>
    </table>
    <div class="signatures">
        <div class="left-signature">
            <p>Orang Tua/Wali,</p>
            <br><br><br>
            <p>______________________</p>
        </div>
        <div class="right-signature">
            <p>Wali Kelas,</p>
            <br><br><br>
            <p>______________________</p>
        </div>
    </div>
    <div class="signatures">
        <div class="last-signature">
            <p>Kepala Sekolah,</p>
            <br><br><br>
            <p>______________________</p>
        </div>
    </div>
</body>

</html>

{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Alignment</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            font-weight: 200;
            font-style: normal;
            text-align: center;
        }

        table {
            border: 1px solid #000;
            font-size: 14px;
            width: 90%;
            margin: 0 auto;
        }

        .table-container {
            max-width: 50%;
            margin-left: auto;
            margin-right: 0;
        }

        .table-custom-sm {
            font-size: 0.8rem;
            padding: 0.2rem;
        }

        .table-custom-sm th,
        .table-custom-sm td {
            padding: 0.2rem;
        }

        .up {
            display: flex;
            justify-content: space-between;
        }

        .left,
        .right {
            width: 45%;
        }

        .table th,
        .table td,
        .table tr {
            border: 1px solid #000;
        }

        th {
            background-color: grey;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table class="table table-vcenter table-mobile-md card-table table-sm table-custom-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Absensi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Izin</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sakit</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alpha</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html> --}}
