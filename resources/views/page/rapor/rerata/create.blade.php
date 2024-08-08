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
                        <form class="card" action="{{ route('rerata.perform') }}" method="POST"
                            enctype="multipart/form-data">
                            <div id="step1">
                                <div class="card-body">
                                    <h3 class="card-title">Muatan Nasional</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label"> Pendidikan Agama dan Budi Pekerti</label>
                                                <input type="number" class="form-control" name="pai"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Pendidikan Pancasila dan
                                                    Kewarganegaraan</label>
                                                <input type="number" class="form-control" name="pkn"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Bahasa Indonesia</label>
                                                <input type='number ' class="form-control" name="indo"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Matematika</label>
                                                <input type='number ' class="form-control" name="mtk"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sejarah Indonesia</label>
                                                <input type='number ' class="form-control" name="sejindo"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Bahasa Asing</label>
                                                <input type='number ' class="form-control" name="bhs_asing"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step2">
                                <div class="card-body">
                                    <h3 class="card-title">Muatan Kewilayahan</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Seni Budaya</label>
                                                <input type='number ' class="form-control" name="sbd"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">PJOK</label>
                                                <input type='number ' class="form-control" name="pjok"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step3">
                                <div class="card-body">
                                    <h3 class="card-title">C1. Dasar Bidang Keahlian</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Simulasi dan Komunikasi Digital</label>
                                                <input type='number ' class="form-control" name="simdig"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Fisika</label>
                                                <input type='number ' class="form-control" name="fis"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kimia</label>
                                                <input type='number ' class="form-control" name="kim"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step4">
                                <div class="card-body">
                                    <h3 class="card-title">C2. Dasar Program Keahlian</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sistem Komputer</label>
                                                <input type='number ' class="form-control" name="sis_kom"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Komputer dan Jaringan</label>
                                                <input type='number ' class="form-control" name="komjar"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Pemograman Dasar</label>
                                                <input type='number ' class="form-control" name="progdas"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Dasar Design Grafis</label>
                                                <input type='number ' class="form-control" name="ddg"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step5">
                                <div class="card-body">
                                    <h3 class="card-title">C3. Kompetensi Keahlian</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Infrastruktur Komputasi Awan </label>
                                                <input type='number ' class="form-control" name="iaas"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Platform Komputasi Awan</label>
                                                <input type='number ' class="form-control" name="paas"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Layanan Komputasi Awan</label>
                                                <input type='number ' class="form-control" name="saas"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sistem Internet of Things</label>
                                                <input type='number ' class="form-control" name="siot"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sistem Keamanan Jaringan</label>
                                                <input type='number ' class="form-control" name="skj"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Produk Kreatif dan Kewirausahaan</label>
                                                <input type='number ' class="form-control" name="pkk"
                                                    placeholder="Masukan Nilai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="button" class="btn btn-secondary" id="prevButton"
                                    style="display: none;">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                                <button type="submit" class="btn btn-success d-none"
                                    id="submitButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = ['step1', 'step2', 'step3', 'step4', 'step5', ];
            let currentStep = 0;

            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');
            const submitButton = document.getElementById('submitButton');

            const toggleVisibility = (element, condition) => {
                element.style.display = condition ? 'none' : 'inline-block';
            };

            const showStep = (step) => {
                steps.forEach((id, index) => {
                    document.getElementById(id).classList.toggle('d-none', index !== step);
                });
                toggleVisibility(prevButton, step === 0);
                toggleVisibility(nextButton, step === steps.length - 1);
                submitButton.classList.toggle('d-none', step !== steps.length - 1);
            };

            nextButton.addEventListener('click', function() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            prevButton.addEventListener('click', function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
            initializeDatepickers();
        });
    </script>
</x-app-layout>
