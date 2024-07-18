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
                                <a href="{{ route('rapor.create') }}" class="btn btn-primary">
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
                                                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#modal_create">
                                                    <i
                                                        class="fa-solid fa-chart-simple text-white text-xl bg-green p-2 rounded-lg"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('rapor.delete', $item->id) }}" method='post'>
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
