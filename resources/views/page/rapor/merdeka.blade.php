{{-- <!DOCTYPE html>
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
            <label>Nama:</label>
        </div>
        <div>
            <label>Kelas:</label>
        </div>
        <div>
            <label>NISN:</label>
        </div>
        <div>
            <label>Semester:</label>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label>Sekolah:</label>
        </div>
        <div>
            <label>Tahun Pelajaran:</label>
        </div>
        <div>
            <label>Alamat:</label>
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
                <td>Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>Mandiri</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>Bergotong royong</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
        </tbody>
    </table>

    <h3>B. Nilai Akademik</h3>
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
                <td>1</td>
                <td>Pendidikan Agama dan Budi Pekerti</td>
                <td>90</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                <td>92</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Bahasa Indonesia</td>
                <td>85</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Matematika</td>
                <td>92</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Sejarah Indonesia</td>
                <td>81</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Bahasa Asing</td>
                <td>84</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr class="group-header">
                <td colspan="1"><strong>B</strong></td>
                <td colspan="3"><strong>Muatan Kewilayahan</strong></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Seni Budaya</td>
                <td>92</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                <td>90</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr class="group-header">
                <td colspan="1"><strong>C</strong></td>
                <td colspan="3"><strong>Kompetensi Keahlian</strong></td>
            </tr>
            <tr class="group-header">
                <td colspan="4"><strong>C1. Dasar Bidang Keahlian</strong></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Simulasi dan Komunikasi Digital</td>
                <td>94</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Fisika</td>
                <td>92</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>11</td>
                <td>Kimia</td>
                <td>88</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Dasar Program Keahlian</td>
                <td>91</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr class="group-header">
                <td colspan="4"><strong>C2. Dasar Program Keahlian</strong></td>
            </tr>
            <tr>
                <td>13</td>
                <td>Sistem Komputer</td>
                <td>89</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Komputer dan Jaringan Dasar</td>
                <td>95</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>15</td>
                <td>Pemrograman Dasar</td>
                <td>87</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr class="group-header">
                <td colspan="4"><strong>C3. Kompetensi Keahlian</strong></td>
            </tr>
            <tr>
                <td>16</td>
                <td>Administrasi Infrastruktur Jaringan</td>
                <td>92</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>17</td>
                <td>Administrasi Sistem Jaringan</td>
                <td>90</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>18</td>
                <td>Teknologi Layanan Jaringan</td>
                <td>94</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>19</td>
                <td>Produk Kreatif dan Kewirausahaan</td>
                <td>94</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
        </tbody>
    </table>

    <h3>C. Ekstrakurikuler</h3>
    <table class="extracurricular">
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="name">Nama Kegiatan</th>
                <th class="rank">Peringkat</th>
                <th class="desc">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Basket</td>
                <td>1</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pramuka</td>
                <td>1</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
            </tr>
            <tr>
                <td>3</td>
                <td>OSIS</td>
                <td>-</td>
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
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
                        <td>Tanpa Keterangan</td>
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
                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
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

</html> --}}


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
</html>
