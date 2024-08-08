<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>

    <div class="img-fluid py-5" style="background-image: url('dist/img/gif/bg.png'); padding-bottom:30px;">
        <div class="py-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/database">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(0, 123, 255, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/protection.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Database
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/korespondensi">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(0, 123, 255, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/passport.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Korespondensi
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/administrasi">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(255, 0, 0, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/files.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Administrasi
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/penilaian">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(0, 123, 255, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/passed.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Penilaian
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/sarpras">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(255, 0, 0, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/school.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Sarpras
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/finance">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(0, 128, 0, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/dollar.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Keuangan
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/finance">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color:  rgba(255, 0, 0, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/360-feedback.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Penilaian Kinerja Guru (PKG)
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#passwordModal" data-url="/finance">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color:  rgba(0, 128, 0, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/quran.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Keasramaan
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('created-by') }}" class="text-decoration-none">
                            <div class="card shadow-sm mb-4 hover-shadow"
                                style="background-color: rgba(0, 128, 0, 0.25);">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/management-consulting.gif') }}" alt=""
                                        style="width: 50%; height: auto; margin-right: 16px;">
                                    <h2 class="card-title text-xl font-semibold mb-0"
                                        style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                        Created By
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for entering current password -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Enter Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="passwordForm">
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInput"
                                placeholder="Enter your password">
                        </div>
                        <div id="passwordError" class="alert alert-danger d-none" role="alert">
                            Password salah. Silakan coba lagi.
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitPassword">Submit</button>
                    <button type="button" class="btn btn-link" id="changePasswordButton">Change Password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for changing password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label for="currentPasswordInput" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPasswordInput"
                                placeholder="Enter your current password">
                        </div>
                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPasswordInput"
                                placeholder="Enter your new password">
                        </div>
                        <div id="changePasswordError" class="alert alert-danger d-none" role="alert">
                            Password salah atau baru tidak cocok. Silakan coba lagi.
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitChangePassword">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for successful password change -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Password berhasil diubah.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- logika Password --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let correctPassword = '12345'; // Password yang benar
            const submitButton = document.getElementById('submitPassword');
            const passwordInput = document.getElementById('passwordInput');
            const passwordError = document.getElementById('passwordError');
            const changePasswordButton = document.getElementById('changePasswordButton');
            let targetUrl = '';

            const changePasswordModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            const submitChangePasswordButton = document.getElementById('submitChangePassword');
            const currentPasswordInput = document.getElementById('currentPasswordInput');
            const newPasswordInput = document.getElementById('newPasswordInput');
            const changePasswordError = document.getElementById('changePasswordError');

            // Menangani klik pada link card
            document.querySelectorAll('.col-md-4 a').forEach(link => {
                link.addEventListener('click', function() {
                    targetUrl = this.getAttribute('data-url'); // Dapatkan URL dari atribut data-url
                    passwordInput.value = ''; // Bersihkan input setiap kali modal dibuka
                    passwordError.classList.add(
                        'd-none'); // Sembunyikan pesan kesalahan saat modal dibuka
                });
            });

            // Menangani event "Enter" dalam input password
            passwordInput.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Mencegah submit form default
                    submitButton.click(); // Simulasikan klik tombol submit
                }
            });

            // Menangani klik pada tombol submit modal
            submitButton.addEventListener('click', function() {
                const enteredPassword = passwordInput.value.trim();

                if (enteredPassword === correctPassword) {
                    // Tutup modal
                    var passwordModal = bootstrap.Modal.getInstance(document.getElementById(
                        'passwordModal'));
                    passwordModal.hide();

                    // Arahkan ke halaman yang dituju
                    window.location.href = targetUrl;
                } else {
                    // Tampilkan pesan kesalahan
                    passwordError.classList.remove('d-none');
                }
            });

            // Menangani klik pada tombol "Change Password"
            changePasswordButton.addEventListener('click', function() {
                var passwordModal = bootstrap.Modal.getInstance(document.getElementById('passwordModal'));
                passwordModal.hide();
                changePasswordModal.show();
                currentPasswordInput.value = ''; // Bersihkan input setiap kali modal dibuka
                newPasswordInput.value = ''; // Bersihkan input setiap kali modal dibuka
                changePasswordError.classList.add(
                    'd-none'); // Sembunyikan pesan kesalahan saat modal dibuka
            });

            // Menangani klik pada tombol submit modal ganti password
            submitChangePasswordButton.addEventListener('click', function() {
                const enteredCurrentPassword = currentPasswordInput.value.trim();
                const newPassword = newPasswordInput.value.trim();

                if (enteredCurrentPassword === correctPassword && newPassword) {
                    // Perbarui password
                    correctPassword = newPassword;
                    changePasswordModal.hide();
                    successModal.show();
                } else {
                    // Tampilkan pesan kesalahan
                    changePasswordError.classList.remove('d-none');
                }
            });
        });
    </script>

</x-app-layout>
