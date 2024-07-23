<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card</title>
    <link rel="stylesheet" href="{{ asset('path/to/your.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
            margin-left: auto;
            margin-right: auto;
            /* Adjusted for F4 size */
        }

        .dnone {
            display: none;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .header img {
            height: 120px;
        }

        .student-info {
            margin-bottom: 20px;
        }

        .student-info span {
            display: inline-block;
            width: 220px;
        }

        .main-content {
            display: flex;
            justify-content: space-between;
            max-width: 97%;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #0288D1;
            padding: 8px;
            font-size: 14px;
        }

        th {
            background-color: #0288D1;
            font-weight: normal;
            color: #fff;
        }

        .kkm,
        .grade,
        .predicate {
            text-align: center;
        }

        .rating-scale,
        .attendance {
            width: 100%;
            font-size: 14px;
            margin-left: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
        }

        .group-header {
            background-color: #0288D1;
            color: #fff;
        }

        .gh-header {
            width: 70%;
        }

        .gh-width {
            text-align: center;
        }

        .rating-scale p,
        .attendance p {
            margin: 5px 0;
        }

        .note {
            width: 100%;
        }

        .notes {
            font-size: 14px;
            margin-top: 20px;
            background-color: #e6efff;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #b3d1ff;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .signature div {
            text-align: center;
            width: 45%;
        }

        .signature .name {
            margin-top: 80px;
        }
    </style>

</head>

<body>
    <div class="report-card">
        <div class="header">
            <h2>LAPORAN HASIL PENILAIAN TENGAH SEMESTER GANJIL<br>TAHUN PELAJARAN 2022/2023</h2>
            <img src="https://smktibazma.sch.id/static/media/main-logo-2.7b74690f86ab4e9a4743.png" alt="Logo">
        </div>
        <div class="student-info">
            <br>
            <p><span>Nama Peserta Didik</span> : Radid Aditia Renaldi</p>
            <p><span>Kelas</span> : X (SIJA)</p>
        </div>
        <div class="main-content">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>KKM</th>
                        <th>Nilai</th>
                        <th>Predikat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pend. Agama Islam & Budi Pekerti</td>
                        <td class="kkm">80</td>
                        <td class="grade">80</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pendidikan Pancasila</td>
                        <td class="kkm">80</td>
                        <td class="grade">84</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bahasa Indonesia</td>
                        <td class="kkm">80</td>
                        <td class="grade">82</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>PJOK</td>
                        <td class="kkm">80</td>
                        <td class="grade">85</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sejarah Indonesia</td>
                        <td class="kkm">80</td>
                        <td class="grade">84</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Seni Budaya</td>
                        <td class="kkm">80</td>
                        <td class="grade">81</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Tahfidz</td>
                        <td class="kkm">80</td>
                        <td class="grade">81</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Tahsin</td>
                        <td class="kkm">80</td>
                        <td class="grade">84</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Matematika</td>
                        <td class="kkm">85</td>
                        <td class="grade">90</td>
                        <td class="predicate">A</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Bahasa Inggris</td>
                        <td class="kkm">75</td>
                        <td class="grade">80</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Ilmu Pengetahuan Alam dan Sosial</td>
                        <td class="kkm">75</td>
                        <td class="grade">77</td>
                        <td class="predicate">C</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Informatika</td>
                        <td class="kkm">75</td>
                        <td class="grade">75</td>
                        <td class="predicate">C</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Pemrograman Dasar</td>
                        <td class="kkm">75</td>
                        <td class="grade">81</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Komputer dan Jaringan Dasar</td>
                        <td class="kkm">75</td>
                        <td class="grade">81</td>
                        <td class="predicate">B</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Dasar Desain Grafis</td>
                        <td class="kkm">75</td>
                        <td class="grade">33</td>
                        <td class="predicate">D</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <table class="rating-scale">
                    <thead>
                        <tr class="dnone">
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="group-header">
                            <td colspan="4"><strong>Rentang predikat</strong></td>
                        </tr>
                        <tr>
                            <td>A</td>
                            <td>Amat baik</td>
                            <td>90-100</td>
                        </tr>
                        <tr>
                            <td>B</td>
                            <td>Baik</td>
                            <td>80-89</td>
                        </tr>
                        <tr>
                            <td>C</td>
                            <td>Cukup</td>
                            <td>70-79</td>
                        </tr>
                        <tr>
                            <td>D</td>
                            <td>Perlu Bimbingan</td>
                            <td>&lt;70</td>
                        </tr>
                    </tbody>
                </table>

                <table class="attendance">
                    <thead>
                        <tr class="dnone">
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="group-header">
                            <td colspan="4"><strong>Kehadiran</strong></td>
                        </tr>
                        <tr>
                            <td class="gh-header">Total Pertemuan</td>
                            <td class="gh-width">0</td>
                        </tr>
                        <tr>
                            <td class="gh-header">Sakit</td>
                            <td class="gh-width">0</td>
                        </tr>
                        <tr>
                            <td class="gh-header">Izin</td>
                            <td class="gh-width">0</td>
                        </tr>
                        <tr>
                            <td class="gh-header">Alpha</td>
                            <td class="gh-width">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="">
            <table class="note">
                <thead>
                    <tr class="dnone">
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="group-header">
                        <td colspan="4"><strong>Catatan</strong></td>
                    </tr>
                    <tr>
                        <td>1. Nilai yang dicantumkan adalah nilai murni Peserta Didik dalam mengerjakan soal PTS Ganjil TP 2022/2023 (nilai remedi tidak dicantumkan).</td>
                    </tr>
                    <td>2. Nilai yang ditujukan pada PTS Ganjil TP 2022/2023 adalah aspek pengetahuan dan praktik yang telah dikumulasi.</td>


                </tbody>
            </table>
        </div>
        <div class="signature">
            <div>
                <p>Mengetahui,</p>
                <p>Kepala SMK TI BAZMA</p>
                <p class="name">Sukendar, SEI<br>NIK. 21.001</p>
            </div>
            <div>
                <p>Bogor, 01 Oktober 2022</p>
                <p>Wali Kelas</p>
                <p class="name">Ulfa Mujahidah, M.Pd<br>NIK. 21.005</p>
            </div>
        </div>
    </div>

</body>

</html>
