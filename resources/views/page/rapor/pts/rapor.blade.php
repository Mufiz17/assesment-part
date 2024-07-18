<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="https://kit.fontawesome.com/82f9bbc013.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
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
                                <a href="{{ route('rpts.create') }}" class="btn btn-primary">
                                    Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Tahun Ajaran</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>PAI</th>
                                        <th>PKN</th>
                                        <th>B.Indo</th>
                                        <th>MTK</th>
                                        <th>Sejindo</th>
                                        <th>B.Ingg</th>
                                        <th>SBD</th>
                                        <th>PJOK</th>
                                        <th>SimDig</th>
                                        <th>Fisika</th>
                                        <th>Kimia</th>
                                        <th>SisKom</th>
                                        <th>KomJar</th>
                                        <th>ProgDas</th>
                                        <th>DDG</th>
                                        <th>IaaS</th>
                                        <th>PaaS</th>
                                        <th>SaaS</th>
                                        <th>SIoT</th>
                                        <th>SKJ</th>
                                        <th>PKK</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($rpts as $item)
                                        <tr>
                                            <td>{{ $item->tahun_ajaran }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->pai }}</td>
                                            <td>{{ $item->pkn }}</td>
                                            <td>{{ $item->indo }}</td>
                                            <td>{{ $item->mtk }}</td>
                                            <td>{{ $item->sejindo }}</td>
                                            <td>{{ $item->bhs_asing }}</td>
                                            <td>{{ $item->sbd }}</td>
                                            <td>{{ $item->pjok }}</td>
                                            <td>{{ $item->simdig }}</td>
                                            <td>{{ $item->fis }}</td>
                                            <td>{{ $item->kim }}</td>
                                            <td>{{ $item->sis_kom }}</td>
                                            <td>{{ $item->komjar }}</td>
                                            <td>{{ $item->progdas }}</td>
                                            <td>{{ $item->ddg }}</td>
                                            <td>{{ $item->iaas }}</td>
                                            <td>{{ $item->paas }}</td>
                                            <td>{{ $item->saas }}</td>
                                            <td>{{ $item->siot }}</td>
                                            <td>{{ $item->skj }}</td>
                                            <td>{{ $item->pkk }}</td>
                                            <td>
                                                <a href="{{ route('rpts.edit', $item->id) }}">
                                                    <i
                                                        class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('rpts.pdf', $item->id) }}">
                                                    <i
                                                        class="fa-solid fa-file-export text-white text-xl bg-teal p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#modal_create">
                                                    <i
                                                        class="fa-solid fa-chart-simple text-white text-xl bg-green p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('rpts.delete', $item->id) }}" method='post'>
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
                                            <td colspan="25" class="text-center">
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
