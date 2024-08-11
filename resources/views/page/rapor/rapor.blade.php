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
                                <a href="/penilaian" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                            <div class="mb-4 col d-flex justify-content-end">
                                <a href="{{ route('average') }}" class="btn btn-success mx-6">
                                    Rerata Mapel
                                </a>
                                <a href="{{ route('rapor.create') }}" class="btn btn-primary">
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
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($rapor as $item)
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
                                                <a href="{{ route('rapor.edit', $item->id) }}">
                                                    <i
                                                        class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('rapor.pdf', $item->id) }}">
                                                    <i
                                                        class="fa-solid fa-file-export text-white text-xl bg-teal p-2 rounded-lg"></i>
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

    {{-- Danger Modal --}}
    @foreach ($rapor as $item)
        <form action="{{ route('rapor.delete', $item->id) }}" method="post">
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

    {{-- <form action='{{ route('rapor.chart', $rapor->id) }}'>
        @csrf
        <div class="modal modal-blur fade" id="modal_create" tabindex="-1" role="dialog" aria-modal="false">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <div id="chart-demo-area" class="chart-lg"></div>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer>
                            </script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-area'), {
                                        chart: {
                                            type: "area",
                                            fontFamily: 'inherit',
                                            height: 240,
                                            parentHeightOffset: 0,
                                            toolbar: {
                                                show: false,
                                            },
                                            animations: {
                                                enabled: false
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false,
                                        },
                                        fill: {
                                            opacity: .16,
                                            type: 'solid'
                                        },
                                        stroke: {
                                            width: 2,
                                            lineCap: "round",
                                            curve: "smooth",
                                        },
                                        series: [{
                                            name: "series1",
                                            data: [4, 65, 30, 99, 32, 89, 45]
                                        }, {
                                            name: "series2",
                                            data: [45, 43, 30, 23, 38, 39, 54]
                                        }],
                                        tooltip: {
                                            theme: 'dark'
                                        },
                                        grid: {
                                            padding: {
                                                top: -20,
                                                right: 0,
                                                left: -4,
                                                bottom: -4
                                            },
                                            strokeDashArray: 4,
                                        },
                                        xaxis: {
                                            labels: {
                                                padding: 0,
                                            },
                                            tooltip: {
                                                enabled: false
                                            },
                                            axisBorder: {
                                                show: false,
                                            },
                                            type: 'integer',
                                        },
                                        yaxis: {
                                            labels: {
                                                padding: 4
                                            },
                                        },
                                        labels: [
                                            '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25',
                                            '2020-06-26', '2020-06-27'
                                        ],
                                        colors: [tabler.getColor("primary"), tabler.getColor("purple")],
                                        legend: {
                                            show: true,
                                            position: 'bottom',
                                            offsetY: 12,
                                            markers: {
                                                width: 10,
                                                height: 10,
                                                radius: 100,
                                            },
                                            itemMargin: {
                                                horizontal: 8,
                                                vertical: 8
                                            },
                                        },
                                    })).render();
                                });
                            </script>
                            <div class="card-body">
                                <div id="chart-demo-area" class="chart-lg"></div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer>
                        </script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-area'), {
                                    chart: {
                                        type: "area",
                                        fontFamily: 'inherit',
                                        height: 240,
                                        parentHeightOffset: 0,
                                        toolbar: {
                                            show: false,
                                        },
                                        animations: {
                                            enabled: false
                                        },
                                    },
                                    dataLabels: {
                                        enabled: false,
                                    },
                                    fill: {
                                        opacity: .16,
                                        type: 'solid'
                                    },
                                    stroke: {
                                        width: 2,
                                        lineCap: "round",
                                        curve: "smooth",
                                    },
                                    series: [{
                                        name: "series1",
                                        data: {
                                            !!json_encode($chartData)
                                        }
                                    }, {
                                        name: "series2",
                                        data: [45, 43, 30, 23, 38, 39, 54]
                                    }],
                                    tooltip: {
                                        theme: 'dark'
                                    },
                                    grid: {
                                        padding: {
                                            top: -20,
                                            right: 0,
                                            left: -4,
                                            bottom: -4
                                        },
                                        strokeDashArray: 4,
                                    },
                                    xaxis: {
                                        labels: {
                                            padding: 0,
                                        },
                                        tooltip: {
                                            enabled: false
                                        },
                                        axisBorder: {
                                            show: false,
                                        },
                                        type: 'integer',
                                    },
                                    yaxis: {
                                        labels: {
                                            padding: 4
                                        },
                                    },
                                    labels: [
                                        '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25',
                                        '2020-06-26', '2020-06-27'
                                    ],
                                    colors: [tabler.getColor("primary"), tabler.getColor("purple")],
                                    legend: {
                                        show: true,
                                        position: 'bottom',
                                        offsetY: 12,
                                        markers: {
                                            width: 10,
                                            height: 10,
                                            radius: 100,
                                        },
                                        itemMargin: {
                                            horizontal: 8,
                                            vertical: 8
                                        },
                                    },
                                })).render();
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </form> --}}
</x-app-layout>
