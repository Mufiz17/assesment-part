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
                                <a href="/penilaian" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                            <div class="mb-4 col d-flex justify-content-end">
                                <a href="{{ route('pts.create') }}" class="btn btn-primary">
                                    Tambah
                                </a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                    <div class="d-flex">
                                        <div>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon alert-icon">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>
                            @endif
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
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($pts as $item)
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
                                                <a href="{{ route('pts.edit', $item->id) }}">
                                                    <i
                                                        class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('pts.download', $item->id) }}">
                                                    <i
                                                        class="fa-solid fa-file-arrow-down text-white text-xl bg-green p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="" data-bs-toggle="modal"
                                                    data-bs-target="#modal-danger">
                                                    <i
                                                        class="far fa-trash-alt text-white text-xl bg-red p-2 rounded-lg"></i>
                                                </a>
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

    {{-- Danger Modal --}}
    @foreach ($pts as $item)
    <form action="{{ route('pts.delete', $item->id) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 9v4"></path>
                            <path
                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                            </path>
                            <path d="M12 16h.01"></path>
                        </svg>
                        <h3>Are you sure?</h3>
                        <div class="text-secondary">Do you really want to remove this files? What you've done cannot
                            be
                            undone.</div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Cancel
                                    </a>
                                </div>
                                <div class="col">
                                    <button href="#" type="submit" class="btn btn-danger w-100"
                                        data-bs-dismiss="modal">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
</x-app-layout>
