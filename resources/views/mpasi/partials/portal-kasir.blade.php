<div id="role-portal-kasir" class="role-portal-page" style="display:none;">
    <div class="d-flex flex-column flex-md-row">
        <div class="role-sidebar p-3">
            <div class="d-flex align-items-center justify-content-between mb-3 px-2">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-brand-yellow text-dark p-2 rounded-circle fs-5"><i class="fa-solid fa-cash-register"></i></div>
                    <div>
                        <div class="fw-bold fs-6 text-white">Kasir Outlet</div>
                        <div class="text-warning fs-8 fw-bold">Portal Penjaga</div>
                    </div>
                </div>
            </div>

            <div id="kasir-sidebar-content">
                <div class="mb-3 px-1">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label text-warning fs-8 fw-bold mb-0"><i class="fa-solid fa-store me-1"></i> Cabang Bertugas:</label>
                        <span class="badge bg-success fs-8 text-white"><i class="fa-solid fa-lock me-1"></i> Terkunci PIN</span>
                    </div>
                    <div class="bg-white border border-warning rounded-3 p-2 text-start mb-2">
                        <div class="fw-bold text-dark fs-8 text-truncate">
                            <i class="fa-solid fa-building-circle-check text-brand-purple me-1"></i>
                            <span id="kasir-active-outlet-name">Outlet Pusat (Jl. Pajajaran)</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-warning text-white w-100 fw-bold fs-8" onclick="openKasirSwitchOutletModal()">
                        <i class="fa-solid fa-key me-1"></i> Ganti Cabang (PIN)
                    </button>
                </div>

                <nav class="nav kasir-nav-horizontal flex-row flex-md-column gap-1.5 fs-7" id="kasir-sidebar-nav">
                    <a class="nav-link active" href="#" onclick="switchKasirTab('preorder')"><i class="fa-solid fa-clipboard-check"></i> <span>Pre-Order</span></a>
                    <a class="nav-link" href="#" onclick="switchKasirTab('pos')"><i class="fa-solid fa-store"></i> <span>Kasir</span></a>
                    <a class="nav-link" href="#" onclick="switchKasirTab('leftover')"><i class="fa-solid fa-clipboard-list"></i> <span>Laporan</span></a>
                </nav>

                <div class="mt-3 mt-md-4 pt-3 border-top border-purple-200 px-1">
                    <form method="POST" action="{{ route('kasir.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-brand-yellow w-100 fw-bold text-dark fs-8 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class="fa-solid fa-right-from-bracket"></i> Keluar Portal
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-grow-1 p-4 overflow-auto">
            <!-- Lock Card for Unauthenticated Cashier -->
            <div id="kasir-unauth-lock-card" class="card-custom p-5 text-center my-4 border-purple-200" style="display:none;">
                <div class="mb-3 text-brand-purple">
                    <i class="fa-solid fa-store-slash fa-4x opacity-75"></i>
                </div>
                <h4 class="fw-bold text-brand-purple mb-2">Kasir Belum Login Cabang</h4>
                <p class="text-muted fs-7 mb-4 mx-auto" style="max-width: 520px;">
                    Silakan pilih cabang bertugas dan masukkan <b>PIN Akses Kasir</b> terlebih dahulu untuk membuka menu Pre-Order, Kasir, dan Laporan.
                </p>
                <div>
                    <button type="button" class="btn btn-brand-purple btn-lg px-4 py-2.5 fw-bold fs-7 shadow-sm" onclick="openKasirSwitchOutletModal()">
                        <i class="fa-solid fa-key me-2"></i> Login & Pilih Cabang Bertugas (PIN)
                    </button>
                </div>
            </div>

            <div id="kasir-tab-preorder" class="kasir-tab-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-clipboard-check text-brand-purple me-2"></i> Pre-Order Checklist Online</h4>
                        <p class="text-muted fs-7 mb-0">Ceklis Bunda yang mengambil pesanan online dan perbarui status pembayaran.</p>
                    </div>
                    <div class="badge bg-purple-light text-brand-purple border border-purple-200 fs-7 px-3 py-2 fw-bold" id="kasir-active-outlet-badge">
                        <i class="fa-solid fa-location-dot me-1 text-danger"></i> Outlet Pusat (Jl. Pajajaran)
                    </div>
                </div>
                <div class="card-custom p-3 border-purple-200">
                    <div class="table-responsive">
                        <table class="table align-middle fs-7 mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">Ceklis Ambil</th>
                                    <th>ID & Nama Bunda</th>
                                    <th>WhatsApp</th>
                                    <th>Detail Pesanan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Ambil</th>
                                    <th>Info Pembatalan</th>
                                </tr>
                            </thead>
                            <tbody id="kasir-preorder-tbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="kasir-tab-pos" class="kasir-tab-content" style="display:none;">
                <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-store text-brand-purple me-2"></i> Kasir</h4>
                <p class="text-muted fs-7 mb-4">Proses pembelian langsung di outlet untuk pembeli non pre-order.</p>
                <div class="row g-3">
                    <div class="col-md-7">
                        <div class="card-custom p-3">
                            <h6 class="fw-bold mb-3" id="pos-products-heading"><i class="fa-solid fa-calendar-day text-brand-purple me-1"></i> Pilih Produk Mamam Yuk Ready Stock</h6>
                            <div id="pos-products-grid" class="row g-2"></div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card-custom p-3">
                            <h6 class="fw-bold border-bottom pb-2 mb-3">Keranjang Transaksi POS</h6>
                            <div id="pos-cart-list" class="d-flex flex-column gap-2 mb-3 fs-7"></div>
                            <div class="border-top pt-2">
                                <div class="d-flex justify-content-between text-muted fs-8 mb-1">
                                    <span>Subtotal:</span>
                                    <span id="pos-subtotal-display" class="fw-bold text-dark">Rp 0</span>
                                </div>

                                <!-- Input Diskon Belanja -->
                                <div class="mb-3 p-2 bg-light rounded border">
                                    <label class="form-label fs-8 fw-bold text-brand-purple mb-1 d-block">
                                        <i class="fa-solid fa-tags me-1"></i> Diskon Belanja (Opsional)
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <select id="pos-discount-type" class="form-select fs-8 fw-bold text-brand-purple" style="max-width: 85px;" onchange="updatePosDiscount()">
                                            <option value="rp">Rp</option>
                                            <option value="percent">%</option>
                                        </select>
                                        <input type="number" id="pos-discount-value" class="form-control fs-8 fw-bold text-dark" placeholder="Masukkan diskon..." min="0" oninput="updatePosDiscount()">
                                    </div>
                                    <div id="pos-discount-amount-display" class="fs-8 text-danger fw-bold mt-1 text-end" style="display:none;"></div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center fw-bold fs-5 mb-3">
                                    <span>Total Bayar:</span>
                                    <span id="pos-total-display" class="text-brand-purple">Rp 0</span>
                                </div>

                                <!-- Pilih Metode Pembayaran (Uang Cash / QRIS / Transfer) -->
                                <div class="mb-3 p-2.5 bg-light rounded-3 border">
                                    <label class="form-label fs-8 fw-bold text-brand-purple mb-2 d-block">
                                        <i class="fa-solid fa-credit-card me-1"></i> Metode Pembayaran Kasir
                                    </label>
                                    <div class="d-flex gap-2">
                                        <div class="form-check flex-fill p-2 border rounded-3 bg-white text-center cursor-pointer mb-0">
                                            <input class="form-check-input ms-0 me-1.5 cursor-pointer" type="radio" name="posPaymentMethod" id="posPayCash" value="cash" checked>
                                            <label class="form-check-label fw-bold text-dark cursor-pointer fs-8" for="posPayCash">
                                                <i class="fa-solid fa-money-bill-wave text-success me-1"></i> Uang Cash
                                            </label>
                                        </div>
                                        <div class="form-check flex-fill p-2 border rounded-3 bg-white text-center cursor-pointer mb-0">
                                            <input class="form-check-input ms-0 me-1.5 cursor-pointer" type="radio" name="posPaymentMethod" id="posPayQris" value="qris">
                                            <label class="form-check-label fw-bold text-dark cursor-pointer fs-8" for="posPayQris">
                                                <i class="fa-solid fa-qrcode text-primary me-1"></i> QRIS / Transfer
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pilihan Cetak Belanja (Ya / Engga) -->
                                <div class="mb-3 p-2.5 bg-purple-light rounded-3 border border-purple-200">
                                    <label class="form-label fs-8 fw-bold text-brand-purple mb-1.5 d-block"><i class="fa-solid fa-print me-1"></i> Cetak Struk Belanja?</label>
                                    <div class="d-flex gap-4 fs-7 fw-bold">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="posPrintReceipt" id="posPrintYes" value="yes" checked>
                                            <label class="form-check-label text-dark cursor-pointer" for="posPrintYes">Ya (Cetak)</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="posPrintReceipt" id="posPrintNo" value="no">
                                            <label class="form-check-label text-dark cursor-pointer" for="posPrintNo">Engga</label>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-brand-yellow w-100 py-2.5 fw-bold text-dark" onclick="processPosCheckout()">
                                    <i class="fa-solid fa-receipt me-1"></i> Selesaikan Transaksi Kasir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kasir-tab-leftover" class="kasir-tab-content" style="display:none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="fw-bold text-danger mb-0"><i class="fa-solid fa-clipboard-list me-2"></i> Rekapan Penjualan Hari Ini</h4>
                        <div class="text-muted fs-8">Terhitung otomatis bersih dari stok alokasi dikurangi penjualan POS kasir.</div>
                    </div>
                    <button class="btn btn-danger fw-bold rounded-pill px-3" onclick="submitAllKasirLeftovers()">
                        <i class="fa-solid fa-paper-plane me-1"></i> Kirim Laporan
                    </button>
                </div>
                <div class="card-custom p-3 border-danger border-opacity-50 mb-3">
                    <div class="table-responsive">
                        <table class="table align-middle fs-7 mb-0">
                            <thead>
                                <tr style="background-color: #F5EBFB; color: #212121; border-bottom: 2px solid #B57EDC;">
                                    <th class="py-2 px-3 text-start">NAMA ITEM</th>
                                    <th class="py-2 px-3 text-end">HARGA</th>
                                    <th class="py-2 px-3 text-center">STOK</th>
                                    <th class="py-2 px-3 text-center">PESANAN</th>
                                    <th class="py-2 px-3 text-center">JUALAN</th>
                                    <th class="py-2 px-3 text-center">SISA</th>
                                    <th class="py-2 px-3 text-end">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody id="kasir-leftover-tbody"></tbody>
                        </table>
                    </div>
                </div>

                <!-- Section Upload Foto Dokumen / Bukti Rekap Penjualan Kasir -->
                <div class="card-custom p-3 border-purple-200">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold text-brand-purple mb-0">
                            <i class="fa-solid fa-camera me-2"></i> Upload Foto Bukti 
                        </h6>
                        <span class="badge bg-purple-light text-brand-purple border border-purple-200 fs-8">
                            <i class="fa-solid fa-images me-1"></i> Multi-Upload Foto
                        </span>
                    </div>
                    <p class="text-muted fs-8 mb-3">Upload foto bukti sisa produk, struk fisik, atau suasana outlet hari ini untuk dikirimkan ke Admin & Owner.</p>

                    <div class="mb-3">
                        <input type="file" id="kasir-rekap-photos-input" class="form-control form-control-sm border-purple-200 fw-bold" accept="image/*" multiple onchange="handleKasirMultiplePhotosUpload(this)">
                    </div>

                    <div id="kasir-rekap-photos-preview" class="row g-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
