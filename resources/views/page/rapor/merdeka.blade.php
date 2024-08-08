<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card</title>

    <style>
        body {
            font-family: Arial, sans-serif;

        }

        table.d-none {
            border: none;
            width: 100%
        }

        .d-none td {
            text-align: left;
            vertical-align: top;
        }

        .label {
            display: inline-block;
            /* Menampilkan sebagai blok sebaris */
            width: 100px;
            /* Lebar tetap untuk label, disesuaikan sesuai kebutuhan */
            font-weight: bold;
            /* Menebalkan teks untuk label */
            vertical-align: top;
        }

        .long-label {
            display: inline-block;
            /* Menampilkan sebagai blok sebaris */
            width: 150px;
            /* Lebar tetap untuk label, disesuaikan sesuai kebutuhan */
            font-weight: bold;
            /* Menebalkan teks untuk label */
            vertical-align: top;
        }

        .value {
            display: inline-block;
            /* Menampilkan sebagai blok sebaris */
        }

        .right {
            width: 55%;
        }

        .left {
            vertical-align: top;
            width: 45%;
        }

        .title {
            text-align: center;
            font-weight: bold;
        }

        .group {
            width: 100%;
        }

        .gap {
            width: 5%
        }

        .attendance {
            margin-left: 0;
            margin-right: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .achievements {
            margin-left: auto;
            margin-right: 0;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.attitudes,
        table.subjects,
        table.extracurricular,
        table.attendance,
        table.achievements {
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
            background-color: #83878d;
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
            width: 10%;
        }

        table.extracurricular th.name {
            width: 30%;
        }

        table.extracurricular th.rank {
            width: 10%;
        }

        table.extracurricular th.desc {
            width: 40%;
        }

        table.attendance th.no {
            width: 10.5%;
        }

        table.attendance th.type {
            width: 40%;
        }

        table.attendance th.total {
            width: 50%;
        }

        table.achievements th.no {
            width: 10.5%;
        }

        table.achievements th.type {
            width: 40%;
        }

        table.achievements th.desc {
            width: 50%;
        }

        .notes {
            margin-right: auto;
            margin-left: auto;
            width: 70%;
        }

        .note {
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
        }

        .note th,
        .note td {
            text-align: center;
        }

        .signature {
            width: 100%;
        }

        .signature tr td {
            text-align: center;
        }

        .right-signature,
        .left-signature {
            width: 30%
        }

        .center-signature {
            width: 40%;
        }

        .center-signature {
            width: 40%;
        }

        td.name {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <p class="title">CAPAIAN HASIL BELAJAR PESERTA DIDIK</p>
    <table class="d-none">
        <tr>
            <td class="right">
                <span class="label">Nama</span>
                <span class="value">: {{ $rapor->nama }}</span>
                <br>
                <span class="label">NISN</span>
                <span class="value">: {{ $rapor->nisn }}</span>
                <br>
                <span class="label">Sekolah</span>
                <span class="value">: SMK TI BAZMA</span>
                <br>
                <span class="label">Alamat</span>
                <span class="value">: Jl. Raya Cikampak Cicadas,</span>
                <br>
                <span class="label"></span>
                <span class="value"> RT.1/RW.1, Cicadas, Kec.</span>
                <br>
                <span class="label"></span>
                <span class="value"> Ciampea, Kabupaten Bogor,</span>
                <br>
                <span class="label"></span>
                <span class="value"> Jawa Barat 16620</span>
            </td>
            <td class="center"></td>
            <td class="left">
                <span class="long-label">Kelas</span>
                <span class="value">: {{ $rapor->kelas }}</span>
                <br>
                <span class="long-label">Semester</span>
                <span class="value">: {{ $rapor->semester }}</span>
                <br>
                <span class="long-label">Tahun Pelajaran</span>
                <span class="value">: {{ $rapor->tahun_ajaran }}</span>
                <br>
            </td>
        </tr>
    </table>

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
                <td>Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia</td>
                <td>{{ $rapor->beriman }}</td>
            </tr>
            <tr>
                <td>Mandiri</td>
                <td>{{ $rapor->mandiri }}</td>
            </tr>
            <tr>
                <td>Bergotong royong</td>
                <td>{{ $rapor->gotong_royong }}</td>
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
                <td style="text-align: center;" colspan="1"><strong>A</strong></td>
                <td colspan="3"><strong>Muatan Nasional</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->pai))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Pendidikan Agama dan Budi Pekerti</td>
                    <td style="text-align: center;">{{ $rapor->pai }}</td>
                    <td>{{ $rapor->desc_pai }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->pkn))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                    <td style="text-align: center;">{{ $rapor->pkn }}</td>
                    <td>{{ $rapor->desc_pkn }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->indo))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Bahasa Indonesia</td>
                    <td style="text-align: center;">{{ $rapor->indo }}</td>
                    <td>{{ $rapor->desc_indo }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->mtk))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Matematika</td>
                    <td style="text-align: center;">{{ $rapor->mtk }}</td>
                    <td>{{ $rapor->desc_mtk }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->sejindo))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Sejarah Indonesia</td>
                    <td style="text-align: center;">{{ $rapor->sejindo }}</td>
                    <td>{{ $rapor->desc_sejindo }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->bhs_asing))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Bahasa Inggris</td>
                    <td style="text-align: center;">{{ $rapor->bhs_asing }}</td>
                    <td>{{ $rapor->desc_bhs_asing }}</td>
                @endif
            </tr>
            @if (!empty($rapor->sbd || $rapor->pjok))

                <tr class="group-header">
                    <td style="text-align: center;" colspan="1"><strong>B</strong></td>
                    <td colspan="3"><strong>Muatan Kewilayahan</strong></td>
                </tr>
                <tr>
                    @if (!empty($rapor->sbd))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Seni Budaya</td>
                        <td style="text-align: center;">{{ $rapor->sbd }}</td>
                        <td>{{ $rapor->desc_sbd }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->pjok))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                        <td style="text-align: center;">{{ $rapor->pjok }}</td>
                        <td>{{ $rapor->desc_pjok }}</td>
                </tr>
            @endif
            @endif

            <tr class="group-header">
                <td style="text-align: center;" colspan="1"><strong>C</strong></td>
                <td colspan="3"><strong>Kompetensi Keahlian</strong></td>
            </tr>
            @if (!empty($rapor->simdig || $rapor->fis || $rapor->kim))
                <tr class="group-header">
                    <td colspan="4"><strong>C1. Dasar Bidang Keahlian</strong></td>
                </tr>
                <tr>
                    @if (!empty($rapor->simdig))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Simulasi dan Komunikasi Digital</td>
                        <td style="text-align: center;">{{ $rapor->simdig }}</td>
                        <td>{{ $rapor->desc_simdig }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->fis))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Fisika</td>
                        <td style="text-align: center;">{{ $rapor->fis }}</td>
                        <td>{{ $rapor->desc_fis }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->kim))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Kimia</td>
                        <td style="text-align: center;">{{ $rapor->kim }}</td>
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
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Sistem Komputer</td>
                        <td style="text-align: center;">{{ $rapor->sis_kom }}</td>
                        <td>{{ $rapor->desc_sis_kom }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->komjar))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Komputer dan Jaringan Dasar</td>
                        <td style="text-align: center;">{{ $rapor->komjar }}</td>
                        <td>{{ $rapor->desc_komjar }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->progdas))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Pemrograman Dasar</td>
                        <td style="text-align: center;">{{ $rapor->progdas }}</td>
                        <td>{{ $rapor->desc_progdas }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->ddg))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Dasar Desain Grafis</td>
                        <td style="text-align: center;">{{ $rapor->ddg }}</td>
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
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Infrastruktur Komputasi Awan</td>
                        <td style="text-align: center;">{{ $rapor->iaas }}</td>
                        <td>{{ $rapor->desc_iaas }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->paas))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Platform Komputasi Awan</td>
                        <td style="text-align: center;">{{ $rapor->paas }}</td>
                        <td>{{ $rapor->desc_paas }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->saas))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Layanan Komputasi Awan</td>
                        <td style="text-align: center;">{{ $rapor->saas }}</td>
                        <td>{{ $rapor->desc_saas }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->siot))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Sistem Internet of Things</td>
                        <td style="text-align: center;">{{ $rapor->siot }}</td>
                        <td>{{ $rapor->desc_siot }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->skj))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Sistem Keamanan Jaringan</td>
                        <td style="text-align: center;">{{ $rapor->skj }}</td>
                        <td>{{ $rapor->desc_skj }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->pkk))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Produk Kreatif dan Kewirausahaan</td>
                        <td style="text-align: center;">{{ $rapor->pkk }}</td>
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
                <td style="text-align: center;">1</td>
                <td>Pramuka</td>
                <td style="text-align: center;">{{ $rapor->pramuka }}</td>
                <td>{{ $rapor->desc_pramuka }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">2</td>
                <td>Bulu Tangkis</td>
                <td style="text-align: center;">{{ $rapor->bultang }}</td>
                <td>{{ $rapor->desc_bultang }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">3</td>
                <td>Futsal</td>
                <td style="text-align: center;">{{ $rapor->futsal }}</td>
                <td>{{ $rapor->desc_futsal }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">4</td>
                <td>Silat</td>
                <td style="text-align: center;">{{ $rapor->silat }}</td>
                <td>{{ $rapor->desc_silat }}</td>
            </tr>
        </tbody>
    </table>

    <table class="group">
        <tr>
            <td style="vertical-align: top">
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
                            <td style="text-align: center;">1</td>
                            <td>Sakit</td>
                            <td>{{ $rapor->sakit }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Izin</td>
                            <td>{{ $rapor->izin }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Alpha</td>
                            <td>{{ $rapor->alpha }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="gap"></td>
            <td>
                <table class="achievements">
                    <thead>
                        <tr>
                            <th class="no">No</th>
                            <th class="type">Jenis Prestasi</th>
                            <th class="desc">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($rapor->prestasi) && is_array($rapor->prestasi))
                            @foreach ($rapor->prestasi as $index => $prestasi)
                                <tr>
                                    <td style="text-align: center;">{{ $index + 1 }}</td>
                                    <td>{{ $prestasi }}</td>
                                    <td>{{ $rapor->desc_prestasi[$index] ?? '' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Tidak ada prestasi yang tersedia</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </td>
        </tr>
    </table>


    <table class="notes">
        <tr>
            <td>
                <table class="note">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Catatan Wali Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">{{ $rapor->note }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <table class="signature">
        <tr>
            <td class='right-signature'>Orang Tua/Wali,</td>
            <td class="center-signature"></td>
            <td class='left-signature'>Wali Kelas</td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br></td>
            <td><br><br><br> Mengetahui,<br>Kepala SMK TI BAZMA</td>
            <td><br><br><br><br><br><br></td>
        </tr>
        <tr>
            <td>________________</td>
            <td></td>
            <td class="name">{{ $rapor->wname }}</td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td>NIK. {{ $rapor->nip }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding: 40px"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="name">{{ $rapor->hmaster }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>NIK. {{ $rapor->hmnip }}</td>
            <td></td>
        </tr>
    </table>
</body>

</html>
