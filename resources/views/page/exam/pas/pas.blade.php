<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="https://kit.fontawesome.com/82f9bbc013.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="col-12">
                    <div class="mb-4">
                        <div class="col-12 row">
                            <div class="mb-4 col">
                                <a href="/dashboard" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                            <div class="mb-4 col d-flex justify-content-end">
                                <a href="{{ route('pas.create') }}" class="btn btn-primary">
                                    Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <th>Tahun Ajaran</th>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Kisi-Kisi</th>
                                    <th>Soal</th>
                                    <th>Jawaban</th>
                                    <th>Proker</th>
                                    <th>Kehadiran Peserta</th>
                                    <th>BA</th>
                                    <th>SK Panitia</th>
                                    <th>Tatib</th>
                                    <th>Surat Pemberitahuan</th>
                                    <th>Jadwal</th>
                                    <th>Daftar Nilai</th>
                                    <th>Tanda Terima dan Penyerahan Soal</th>
                                    <th>Daftar Hadir Panitia</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($pas as $item)
                                        <tr>
                                            <td>
                                                {{ $item->tahun_ajaran }}
                                            </td>
                                            <td>
                                                {{ $item->kelas }}
                                            </td>
                                            <td>
                                                {{ $item->mapel }}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->kisi_kisi, '/'), 10, ' ...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->soal, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->jawaban, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->proker, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->kehadiran, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->ba, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->sk_panitia, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->tatib, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->surat_pemberitahuan, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->jadwal, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->daftar_nilai, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->tanda_terima_dan_penerimaan_soal, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                {!! Str::limit(Str::afterLast($item->kehadiran_panitia, '/'), 10, '...') !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('pas.edit', $item->id) }}">
                                                    <i
                                                        class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('pas.download', $item->id) }}">
                                                    <i
                                                        class="fa-solid fa-file-arrow-down text-white text-xl bg-green p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('pas.delete', $item->id) }}" method='post'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin?')">
                                                        <i
                                                            class="far fa-trash-alt text-white text-xl bg-red p-2 rounded-lg"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="19" class="text-center">
                                                Tidak ada Data
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
