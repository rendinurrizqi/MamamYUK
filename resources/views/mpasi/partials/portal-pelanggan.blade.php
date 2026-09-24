<div id="role-portal-pelanggan" class="role-portal-page">
    <nav class="navbar navbar-expand-lg navbar-custom px-3">
        <div class="container-fluid max-w-1600">
            <a class="navbar-brand d-flex align-items-center gap-2 text-brand-purple" href="#" onclick="switchCustView('beranda')">
                <div class="bg-brand-yellow text-dark p-2 rounded-circle fs-5"><i class="fa-solid fa-baby"></i></div>
                <div>
                    <span class="fs-5 fw-bold text-brand-purple">Mamam Yuk</span>
                    <div class="text-muted fs-8 fw-semibold" style="margin-top:-4px;">Mamam Yuk Harian Untuk Si Kecil</div>
                </div>
            </a>

            <!-- Jam Toko Status Header Desktop -->
            <div class="d-none d-md-flex align-items-center bg-purple-light px-3 py-1 rounded-pill border border-purple-200 ms-3">
                <span class="fs-8 fw-bold me-2 text-brand-purple"><i class="fa-solid fa-clock me-1"></i> Jam Toko:</span>
                <span id="store-hours-label" class="fw-bold text-dark fs-8 d-flex align-items-center gap-1">
                    <span id="store-hours-dot" class="d-inline-block rounded-circle bg-success" style="width:8px;height:8px;"></span>
                    BUKA (06.00 - 20.00)
                </span>
            </div>

            <!-- Jam Toko Status Header Mobile -->
            <div class="d-flex d-md-none align-items-center bg-purple-light px-2 py-1 rounded-pill border border-purple-200 ms-auto me-1" style="font-size:0.75rem;">
                <span id="store-hours-label-mobile" class="fw-bold text-dark d-flex align-items-center gap-1">
                    <span id="store-hours-dot-mobile" class="d-inline-block rounded-circle bg-success" style="width:7px;height:7px;"></span>
                    BUKA
                </span>
            </div>

            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#custNavContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-none d-md-block" id="custNavContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1 align-items-center">
                    <li class="nav-item"><a class="nav-link active" id="cust-nav-beranda" href="#" onclick="switchCustView('beranda')"><i class="fa-solid fa-house me-1"></i> Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" id="cust-nav-menu" href="#" onclick="switchCustView('menu')"><i class="fa-solid fa-utensils me-1"></i> Menu Besok</a></li>
                    <li class="nav-item"><a class="nav-link" id="cust-nav-riwayat" href="#" onclick="switchCustView('riwayat')"><i class="fa-solid fa-clock-rotate-left me-1"></i> Riwayat Pesanan</a></li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" id="cust-nav-poin" href="#" onclick="switchCustView('poin')">
                            <i class="fa-solid fa-coins me-1"></i> Poin Saya
                            <span id="poin-nav-badge" class="badge rounded-pill bg-brand-yellow text-dark fs-8 ms-1" style="display:none;">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" id="cust-nav-keranjang" href="#" onclick="switchCustView('keranjang')">
                            <i class="fa-solid fa-cart-shopping me-1"></i> Keranjang
                            <span id="cart-badge" class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle" style="display:none;">0</span>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2" id="cust-nav-auth-container">
                        <button class="btn btn-outline-brand-purple btn-sm rounded-pill px-3 fw-bold text-brand-purple" onclick="switchCustView('login')"><i class="fa-solid fa-user me-1"></i> Masuk</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mobile Bottom Navigation Bar (Khusus Handphone) -->
    <nav class="mobile-bottom-nav d-md-none fixed-bottom py-1 px-2" style="display: none;">
        <div class="d-flex justify-content-around align-items-center h-100">
            <a href="#" class="mobile-nav-item active d-flex flex-column align-items-center text-decoration-none py-1 px-1 rounded-3" id="mobile-nav-beranda" onclick="switchCustView('beranda')">
                <i class="fa-solid fa-house nav-icon"></i>
                <span class="nav-label mt-1">Beranda</span>
            </a>
            <a href="#" class="mobile-nav-item d-flex flex-column align-items-center text-decoration-none py-1 px-1 rounded-3" id="mobile-nav-menu" onclick="switchCustView('menu')">
                <i class="fa-solid fa-utensils nav-icon"></i>
                <span class="nav-label mt-1">Menu Besok</span>
            </a>
            <a href="#" class="mobile-nav-item d-flex flex-column align-items-center text-decoration-none py-1 px-1 rounded-3" id="mobile-nav-riwayat" onclick="switchCustView('riwayat')">
                <i class="fa-solid fa-clock-rotate-left nav-icon"></i>
                <span class="nav-label mt-1">Riwayat</span>
            </a>
            <a href="#" class="mobile-nav-item d-flex flex-column align-items-center text-decoration-none py-1 px-1 rounded-3 position-relative" id="mobile-nav-poin" onclick="switchCustView('poin')">
                <div class="position-relative">
                    <i class="fa-solid fa-coins nav-icon"></i>
                    <span id="mobile-poin-badge" class="badge rounded-pill bg-brand-yellow text-dark position-absolute top-0 start-100 translate-middle fs-9" style="display:none;">0</span>
                </div>
                <span class="nav-label mt-1">Poin</span>
            </a>
            <a href="#" class="mobile-nav-item d-flex flex-column align-items-center text-decoration-none py-1 px-1 rounded-3 position-relative" id="mobile-nav-keranjang" onclick="switchCustView('keranjang')">
                <div class="position-relative">
                    <i class="fa-solid fa-cart-shopping nav-icon"></i>
                    <span id="mobile-cart-badge" class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle fs-9" style="display:none;">0</span>
                </div>
                <span class="nav-label mt-1">Keranjang</span>
            </a>
            <a href="#" class="mobile-nav-item d-flex flex-column align-items-center text-decoration-none py-1 px-1 rounded-3" id="mobile-nav-akun" onclick="switchCustView(state.currentUser ? 'akun' : 'login')">
                <i class="fa-solid fa-user nav-icon" id="mobile-nav-user-icon"></i>
                <span class="nav-label mt-1" id="mobile-nav-user-label">Masuk</span>
            </a>
        </div>
    </nav>

    <div id="closed-hours-alert" class="bg-danger text-white py-2 px-3 text-center fw-bold fs-7 shadow-sm" style="display:none;">
        <i class="fa-solid fa-triangle-exclamation text-warning me-2 fs-6"></i>
        Maaf pesanan hari ini sudah tutup, lanjut memesan lagi besok jam 06.00 atau bisa langsung datang ke tempat jam 06.00 – 09.00
    </div>

    <div class="container-fluid p-3 p-md-4 max-w-1600">
        <div id="cust-view-beranda" class="cust-view">
            <div class="hero-banner mb-4">
                <span class="badge bg-brand-yellow text-dark mb-2 font-extrabold px-3 py-1"><i class="fa-solid fa-heart me-1"></i> Nutrisi Terbaik Untuk Si Kecil</span>
                <h2 class="fw-bold mb-2">Nutrisi Sehat, Alami & Bergizi Tinggi Setiap Hari</h2>
                <p class="text-white opacity-90 fs-7 max-w-600 mb-3">Dibuat khusus dari bahan segar pilihan tanpa pengawet. Masak fresh setiap pagi untuk tumbuh kembang optimal si kecil.</p>
                <button class="btn btn-brand-yellow px-4 py-2 text-dark font-bold" onclick="switchCustView('menu')"><i class="fa-solid fa-utensils me-1"></i> Lihat Menu Pre-Order Besok</button>
            </div>

            <h5 class="fw-bold text-brand-purple mb-3" id="home-menu-title"><i class="fa-solid fa-fire text-danger me-2"></i> Menu Spesial Pre-Order Besok</h5>
            <div id="home-products-grid" class="row g-3 mb-4"></div>
        </div>

        <div id="cust-view-menu" class="cust-view" style="display:none;">
            <h3 class="fw-bold text-brand-purple mb-3" id="catalog-menu-title"><i class="fa-solid fa-utensils me-2"></i> Katalog Menu Pre-Order Besok</h3>
            <div id="full-products-grid" class="row g-3"></div>
        </div>

        <div id="cust-view-keranjang" class="cust-view" style="display:none;">
            <h3 class="fw-bold text-brand-purple mb-3"><i class="fa-solid fa-cart-shopping me-2"></i> Keranjang Belanja Mamam Yuk</h3>
            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="card-custom p-3">
                        <div class="table-responsive">
                            <table class="table align-middle fs-7">
                                <thead class="bg-light">
                                    <tr><th>Varian Mamam Yuk</th><th>Harga / Cup</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr>
                                </thead>
                                <tbody id="cart-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-custom p-3">
                        <h6 class="fw-bold border-bottom pb-2 mb-3">Ringkasan Pesanan</h6>
                        <div class="d-flex justify-content-between mb-2 fs-7"><span>Subtotal</span><span id="cart-summary-subtotal">Rp 0</span></div>
                        <div class="d-flex justify-content-between mb-3 fs-7"><span>Kemasan Higienis</span><span class="text-success fw-bold">GRATIS</span></div>
                        <hr>
                        <div class="d-flex justify-content-between fs-5 fw-bold mb-3"><span>Total:</span><span id="cart-summary-total" class="text-brand-purple">Rp 0</span></div>
                        <button class="btn btn-brand-yellow w-100 py-2.5 fw-bold text-dark" onclick="proceedToCheckoutPage()">Lanjut Checkout <i class="fa-solid fa-arrow-right me-1"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div id="cust-view-checkout" class="cust-view" style="display:none;">
            <h3 class="fw-bold text-brand-purple mb-4 text-center"><i class="fa-solid fa-credit-card me-2"></i> Form Checkout Pemesanan Mamam Yuk</h3>
            <div class="row g-4 max-w-1000 mx-auto">
                <div class="col-md-5">
                    <div class="card-custom p-3 border-purple-200">
                        <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3">Ringkasan Belanja</h6>
                        <div id="checkout-items-list" class="d-flex flex-column gap-2 mb-3 fs-7"></div>
                        <div id="checkout-summary-container">
                            <div class="d-flex justify-content-between fw-bold fs-5 border-top pt-2">
                                <span>Total Tagihan:</span>
                                <span id="checkout-total-amount" class="text-brand-purple">Rp 0</span>
                            </div>
                        </div>
                        <div id="checkout-points-preview" class="fs-8 text-success fw-bold mt-2"></div>

                        <div class="mt-3 pt-3 border-top">
                            <label class="form-label fs-8 fw-bold text-dark mb-1">
                                <i class="fa-solid fa-ticket text-warning me-1"></i> Punya Kode Voucher / Poin?
                            </label>
                            <div class="input-group input-group-sm">
                                <input type="text" id="co-voucher-code" class="form-control form-control-sm fw-bold text-uppercase border-purple-200" placeholder="Contoh: RDM-1234">
                                <button type="button" class="btn btn-brand-purple fw-bold fs-8" onclick="applyCheckoutVoucher()">Gunakan</button>
                            </div>
                            <div id="co-voucher-status" class="fs-8 mt-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-custom p-4">
                        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Formulir Data Pemesan <span class="text-danger">*Wajib Isi</span></h6>
                        <form id="checkout-form" onsubmit="handleProcessCheckout(event)">
                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Nama Lengkap Bunda / Pemesan <span class="text-danger">*</span></label>
                                <input type="text" id="co-name" class="form-control" placeholder="Contoh: Bunda Siti Rahmawati" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                                <input type="tel" id="co-wa" class="form-control" placeholder="Contoh: 081298765432" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Pilih Outlet Pengambilan <span class="text-danger">*</span></label>
                                <select id="co-outlet" class="form-select fs-7" required>
                                    <option value="Outlet Pusat (Jl. Pajajaran)">Outlet Pusat (Jl. Pajajaran)</option>
                                    <option value="Outlet Cabang 1 (Suryakencana)">Outlet Cabang 1 (Suryakencana)</option>
                                    <option value="Outlet Cabang 2 (Cibinong)">Outlet Cabang 2 (Cibinong)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fs-7 fw-bold">Metode Pembayaran <span class="text-danger">*</span></label>
                                <div class="d-flex flex-column gap-2">
                                     <label class="border p-2.5 rounded-3 d-flex align-items-center gap-3 cursor-pointer bg-purple-light border-purple-200">
                                         <input type="radio" name="paymethod" value="Midtrans" checked>
                                         <i class="fa-solid fa-qrcode fs-4 text-brand-purple"></i>
                                         <div>
                                             <div class="fw-bold fs-7 text-brand-purple"><i class="fa-solid fa-bolt text-warning me-1"></i> Midtrans Payment Gateway (Otomatis Lunas)</div>
                                             <div class="text-muted fs-8">Scan QRIS / GoPay / ShopeePay / Virtual Account (BCA, Mandiri, BRI)</div>
                                         </div>
                                     </label>

                                     <label class="border p-2.5 rounded-3 d-flex align-items-center gap-3 cursor-pointer bg-light">
                                         <input type="radio" name="paymethod" value="COD">
                                         <i class="fa-solid fa-hand-holding-dollar fs-5 text-success"></i>
                                         <div><div class="fw-bold fs-7">Bayar Saat Ambil di Tempat (COD Outlet)</div><div class="text-muted fs-8">Bayar tunai / QRIS saat ambil pesanan di outlet</div></div>
                                     </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-brand-yellow w-100 py-3 fw-bold text-dark fs-6">
                                <i class="fa-solid fa-paper-plane me-2"></i> KONFIRMASI PESANAN
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="cust-view-riwayat" class="cust-view" style="display:none;">
            <h3 class="fw-bold text-brand-purple mb-3"><i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat Pesanan Saya</h3>
            <div class="card-custom p-3">
                <div class="table-responsive">
                    <table class="table align-middle fs-7 mb-0">
                        <thead class="bg-light">
                            <tr><th>ID Pesanan</th><th>Tanggal Ambil</th><th>Metode Bayar</th><th>Total</th><th>Status Ambil</th><th class="text-center">Aksi</th></tr>
                        </thead>
                        <tbody id="riwayat-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="cust-view-poin" class="cust-view" style="display:none;">
            <h3 class="fw-bold text-brand-purple mb-3"><i class="fa-solid fa-coins me-2"></i> Poin Saya & Tukar Reward</h3>
            <div id="poin-page-content"></div>
        </div>

        <div id="cust-view-akun" class="cust-view" style="display:none;">
            <h3 class="fw-bold text-brand-purple mb-3"><i class="fa-solid fa-circle-user me-2"></i> Profil & Akun Saya</h3>
            <div id="akun-page-content"></div>
        </div>

        <div id="cust-view-login" class="cust-view login-bg-container" style="display:none;">
            <div class="card-custom p-4 max-w-500 mx-auto shadow-lg login-card-glass">
                <div class="text-center mb-4">
                    <div class="bg-brand-yellow text-dark d-inline-flex p-3 rounded-circle mb-2 fs-2 shadow-sm"><i class="fa-solid fa-baby"></i></div>
                    <h4 class="fw-bold text-brand-purple mb-1">Member Mamam Yuk Si Kecil</h4>
                    <div class="bg-warning bg-opacity-25 border border-warning rounded-3 p-3 mt-3 shadow-sm">
                        <div class="fw-extrabold fs-6 text-dark d-flex align-items-center justify-content-center gap-2">
                            <i class="fa-solid fa-coins text-warning fs-4"></i>
                            <span>Daftarkan Menjadi Member Karena Akan Mendapatkan Point Setiap Pembelian</span>
                        </div>
                    </div>
                </div>
                <form onsubmit="handleLogin(event)">
                    <div class="mb-3 text-start">
                        <label class="form-label fs-7 fw-bold text-dark"><i class="fa-solid fa-user me-1 text-brand-purple"></i> Nama Panggilan Bunda</label>
                        <input type="text" id="login-name" class="form-control fw-semibold" placeholder="Contoh: Bunda Siti">
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label fs-7 fw-bold text-dark"><i class="fa-solid fa-phone me-1 text-brand-purple"></i> Nomor WhatsApp / Email</label>
                        <input type="text" id="login-identifier" class="form-control fw-semibold" placeholder="081298765432" required>
                    </div>
                    <button type="submit" class="btn btn-brand-purple w-100 py-2.5 fw-bold fs-6 mb-3 shadow-sm"><i class="fa-solid fa-right-to-bracket me-1"></i> MASUK MEMBER (+Poin)</button>
                </form>
                <button class="btn btn-outline-secondary btn-sm w-100 fw-bold py-2 mb-3" onclick="continueAsGuest()"><i class="fa-solid fa-user-slash me-1"></i> Lanjut Belanja Tanpa Akun (Tamu)</button>
                <div class="text-center border-top pt-3">
                    <button class="btn btn-link text-danger fs-8 fw-bold text-decoration-none" onclick="requestResetPasswordModal()"><i class="fa-solid fa-key me-1"></i> Lupa Kata Sandi? Minta Reset ke Owner</button>
                </div>
            </div>
        </div>
    </div>
</div>
