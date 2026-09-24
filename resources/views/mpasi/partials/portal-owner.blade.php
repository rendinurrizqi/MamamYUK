        <div id="role-portal-owner" class="role-portal-page" style="display:none;">
            <div class="d-flex flex-column flex-md-row">
                <div class="role-sidebar p-3">
                    <div class="d-flex align-items-center justify-content-between mb-3 px-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-brand-yellow text-dark p-2 rounded-circle fs-5"><i class="fa-solid fa-user-shield"></i></div>
                            <div>
                                <div class="fw-bold fs-6 text-white">Portal Owner</div>
                                <div class="text-warning fs-8 fw-bold">Akses Penuh Bisnis</div>
                            </div>
                        </div>
                    </div>

                    <div id="owner-sidebar-content">
                        <nav class="nav portal-nav-horizontal flex-row flex-md-column gap-1.5 fs-7" id="owner-sidebar-nav">
                            <a class="nav-link active" href="#" onclick="switchOwnerTab('dashboard')"><i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('outlet')"><i class="fa-solid fa-shop"></i> <span>Kelola Outlet</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('menu')"><i class="fa-solid fa-calendar-days"></i> <span>Atur Menu Harian</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('produk')"><i class="fa-solid fa-bowl-food"></i> <span>Master Produk</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('praorder')">
                                <i class="fa-solid fa-clipboard-check"></i> <span>Pre-Order Outlet</span>
                                <span id="owner-cancel-badge" class="badge bg-danger fs-8 ms-1" style="display:none;">0</span>
                            </a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('dapur')"><i class="fa-solid fa-industry"></i> <span>Rekap Dapur</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('stok')"><i class="fa-solid fa-boxes-stacked"></i> <span>Persediaan Stok</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('laporan')"><i class="fa-solid fa-file-invoice-dollar"></i> <span>Laporan Outlet</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('poin')"><i class="fa-solid fa-coins"></i> <span>Poin & Reward</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('pengeluaran')"><i class="fa-solid fa-receipt"></i> <span>Kelola Pengeluaran</span></a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('resetpass')">
                                <i class="fa-solid fa-key"></i> <span>Reset Password</span>
                                <span id="owner-resetpass-badge" class="badge bg-danger fs-8 ms-1" style="display:none;">0</span>
                            </a>
                            <a class="nav-link" href="#" onclick="switchOwnerTab('background')"><i class="fa-solid fa-image"></i> <span>Ubah Latar</span></a>
                        </nav>

                        <div class="mt-3 mt-md-4 pt-3 border-top border-purple-200 px-1">
                            <form method="POST" action="{{ route('owner.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-brand-yellow w-100 fw-bold text-dark fs-8 d-flex align-items-center justify-content-center gap-2 py-2">
                                    <i class="fa-solid fa-right-from-bracket"></i> Keluar Portal
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex-grow-1 p-4 overflow-auto">
                    <div id="owner-tab-dashboard" class="owner-tab-content">
                        <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-gauge-high text-brand-purple me-2"></i> Dashboard Ringkasan Bisnis</h4>
                        <p class="text-muted fs-7 mb-4">Pantau performa seluruh cabang outlet secara konsolidasi dalam satu layar.</p>
                        <div class="row g-3 mb-4" id="owner-dashboard-cards"></div>
                        <div class="row g-3">
                            <div class="col-lg-7">
                                <div class="card-custom p-3 h-100">
                                    <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3"><i class="fa-solid fa-store me-2"></i> Performa Cepat Per Cabang (Hari Ini)</h6>
                                    <div class="table-responsive">
                                        <table class="table align-middle fs-7 mb-0">
                                            <thead class="bg-light"><tr><th>Cabang Outlet</th><th>Omset (Rp)</th><th>Porsi Terjual</th></tr></thead>
                                            <tbody id="owner-dashboard-outlet-tbody"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card-custom p-3 h-100 border-danger border-opacity-50">
                                    <h6 class="fw-bold text-danger border-bottom pb-2 mb-3"><i class="fa-solid fa-key me-2"></i> Tiket Reset Password Menunggu</h6>
                                    <div id="owner-dashboard-resetpass-list" class="d-flex flex-column gap-2 fs-7"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-outlet" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-shop text-brand-purple me-2"></i> Kelola Cabang Outlet</h4>
                                <p class="text-muted fs-7 mb-0">Tambah, ubah nama, atau hapus cabang outlet. Perubahan otomatis sinkron ke semua dropdown outlet di seluruh portal.</p>
                            </div>
                            <div class="filter-controls-mobile">
                                <button class="btn btn-brand-yellow fw-bold" onclick="showAddOutletModal()"><i class="fa-solid fa-plus me-1"></i> Tambah Outlet Baru</button>
                            </div>
                        </div>
                        <div class="card-custom p-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr><th>Nama Cabang Outlet</th><th>Total Pre-Order</th><th>Pre-Order Belum Diambil</th><th class="text-center">Aksi Owner</th></tr>
                                    </thead>
                                    <tbody id="own-outlets-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-menu" class="owner-tab-content" style="display:none;">
                        <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-calendar-days text-brand-purple me-2"></i> Pengaturan Menu Rotasi Harian</h4>
                        <p class="text-muted fs-7 mb-4">Owner dapat menambah maupun menghapus varian menu untuk tiap hari, otomatis sinkron ke pelanggan.</p>
                        <div id="own-daily-menu-grid" class="row g-3"></div>
                    </div>

                    <div id="owner-tab-produk" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-bowl-food text-brand-purple me-2"></i> Master Data Produk Mamam Yuk</h4>
                                <p class="text-muted fs-7 mb-0">Owner dapat menambah, mengedit, restok, mengubah status, maupun menghapus varian produk.</p>
                            </div>
                            <div class="filter-controls-mobile">
                                <button class="btn btn-brand-yellow fw-bold" onclick="showAddProductModal()"><i class="fa-solid fa-plus me-1"></i> Tambah Varian Baru</button>
                            </div>
                        </div>
                        <div class="card-custom p-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr><th>Foto</th><th>ID</th><th>Varian Mamam Yuk</th><th>Harga / Cup</th><th>Kategori</th><th>Usia</th><th>Stok Ready</th><th>Status</th><th class="text-center">Aksi Owner</th></tr>
                                    </thead>
                                    <tbody id="own-products-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-praorder" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-clipboard-check text-brand-purple me-2"></i> Monitor Pre-Order Seluruh Cabang</h4>
                                <p class="text-muted fs-7 mb-0">Owner bisa melihat dan mengubah status pembayaran/ambil, serta menyetujui/menolak pembatalan (otomatis reset per hari).</p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-brand-yellow btn-sm fw-bold px-3 py-1.5 fs-8" onclick="showAddManualOrderModal()">
                                    <i class="fa-solid fa-plus-circle me-1"></i> Tambah Pesanan Manual
                                </button>
                                <button class="btn btn-sm btn-outline-danger fs-8 fw-bold" onclick="confirmResetAllOrders()"><i class="fa-solid fa-trash-can me-1"></i> Bersihkan Pesanan Hari Ini</button>
                            </div>
                        </div>
                        <div class="card-custom p-3 border-purple-200">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center">Ceklis Ambil</th>
                                            <th>ID & Nama Bunda</th>
                                            <th>Cabang Outlet</th>
                                            <th>WhatsApp</th>
                                            <th>Detail Pesanan</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Ambil</th>
                                            <th>Permintaan Pembatalan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="owner-preorder-tbody"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-custom p-3 mt-4 border-purple-200">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h6 class="fw-bold text-brand-purple mb-0">
                                    <i class="fa-solid fa-list-check me-2"></i> Rekap Total Jumlah Menu Yang Dipesan Pelanggan
                                </h6>
                                <span class="badge bg-brand-purple fs-8" id="own-pesanan-total-badge">Total: 0 Cup</span>
                            </div>
                            <div id="own-pesanan-summary-content"></div>
                        </div>
                    </div>

                    <div id="owner-tab-dapur" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-1 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-industry text-brand-purple me-2"></i> Rekapitulasi Dapur Masak Esok Hari</h4>
                                <p class="text-muted fs-7 mb-0">Terintegrasi dengan data Pesanan Per Outlet: Total Porsi Masak dihitung murni dari pre-order online yang masih berlaku (tanpa buffer walk-in).</p>
                            </div>
                            <div class="d-flex align-items-center gap-2 filter-controls-mobile">
                                <button class="btn btn-brand-purple btn-sm fw-bold px-3 py-1.5 fs-8" onclick="printDapurMasakReport('own-dapur-outlet-filter')">
                                    <i class="fa-solid fa-print me-1"></i> Cetak Rekap Dapur
                                </button>
                                <select id="own-dapur-day-filter" class="form-select form-select-sm fs-8 w-auto fw-bold text-brand-purple border-purple-200" onchange="renderOwnerProduction()">
                                    <option value="ALL">Semua Hari (Kelompokan)</option>
                                    <option value="Senin">Hari Senin</option>
                                    <option value="Selasa">Hari Selasa</option>
                                    <option value="Rabu">Hari Rabu</option>
                                    <option value="Kamis">Hari Kamis</option>
                                    <option value="Jumat">Hari Jumat</option>
                                    <option value="Sabtu">Hari Sabtu</option>
                                    <option value="Minggu">Hari Minggu</option>
                                </select>
                                <select id="own-dapur-outlet-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderOwnerProduction()">
                                    <option value="ALL">SEMUA OUTLET (KONSOLIDASI)</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-custom p-3 mt-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light"><tr><th>Varian Mamam Yuk</th><th>Pre-Order Online</th><th>Pre-Order Manual</th><th>Stok Produk</th><th>Total Porsi Masak</th></tr></thead>
                                    <tbody id="own-production-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-stok" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-boxes-stacked text-brand-purple me-2"></i> Persediaan Bahan Baku Dapur</h4>
                                <p class="text-muted fs-7 mb-0">Owner dapat menambah bahan baru maupun mengubah jumlah stok bahan mentah.</p>
                            </div>
                            <div class="filter-controls-mobile">
                                <button class="btn btn-brand-yellow fw-bold" onclick="showAddInventoryModal()"><i class="fa-solid fa-plus me-1"></i> Tambah Bahan Baku</button>
                            </div>
                        </div>
                        <div class="card-custom p-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light"><tr><th>Nama Bahan</th><th>Stok</th><th>Min Stok</th><th>Satuan</th><th>Status</th><th class="text-center">Aksi</th></tr></thead>
                                    <tbody id="own-inventory-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-laporan" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-invoice-dollar text-brand-purple me-2"></i> Laporan Penjualan Semua Cabang</h4>
                                <p class="text-muted fs-7 mb-0">Owner memantau omset harian & bulanan serta porsi terjual per cabang.</p>
                            </div>
                            <div class="d-flex gap-2 filter-controls-mobile">
                                <select id="own-report-period-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderOwnerOutletReports()">
                                    <option value="HARIAN">Periode: Harian Hari Ini</option>
                                    <option value="BULANAN">Periode: Bulanan Bulan Ini</option>
                                </select>
                                <select id="own-report-outlet-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderOwnerOutletReports()">
                                    <option value="ALL">KONSOLIDASI SEMUA OUTLET</option>
                                    <option value="Outlet Pusat (Jl. Pajajaran)">Outlet Pusat (Jl. Pajajaran)</option>
                                    <option value="Outlet Cabang 1 (Suryakencana)">Outlet Cabang 1 (Suryakencana)</option>
                                    <option value="Outlet Cabang 2 (Cibinong)">Outlet Cabang 2 (Cibinong)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-4" id="own-outlet-metric-cards"></div>

                        <div class="card-custom p-3 mb-4">
                            <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3"><i class="fa-solid fa-list-check me-2"></i> Rekapitulasi Rincian Per Cabang Outlet</h6>
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="py-2 px-3 text-start">Nama Cabang Outlet</th>
                                            <th class="py-2 px-3 text-center">PO Diambil</th>
                                            <th class="py-2 px-3 text-center">Porsi Terjual</th>
                                            <th class="py-2 px-3 text-center">Sisa</th>
                                            <th class="py-2 px-3 text-end">Rugi (Rp)</th>
                                            <th class="py-2 px-3 text-end">Omset (Rp)</th>
                                            <th class="py-2 px-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="own-outlet-report-tbody"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-custom p-3 border-danger border-opacity-25 mb-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h6 class="fw-bold text-danger mb-0"><i class="fa-solid fa-clipboard-list me-2"></i> Laporan Rekapan Penjualan Per Outlet</h6>
                                <span class="badge bg-danger fs-8"><i class="fa-solid fa-circle-check me-1"></i> Terhubung Live Kasir</span>
                            </div>
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
                                    <tbody id="own-leftover-report-tbody"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Foto Dokumentasi Rekap Penjualan Kasir (Owner View) -->
                        <div class="card-custom p-3 border-purple-200">
                            <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3">
                                <i class="fa-solid fa-camera me-2"></i> Foto Dokumentasi & Bukti Rekap Kasir (Real-Time)
                            </h6>
                            <div id="own-rekap-photos-grid" class="row g-2"></div>
                        </div>
                    </div>

                    <div id="owner-tab-poin" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-coins text-brand-purple me-2"></i> Kelola Poin & Reward Pelanggan</h4>
                                <p class="text-muted fs-7 mb-0">Atur poin member secara manual (tambah/kurangi/reset), kelola katalog reward, dan atur rasio poin yang didapat pelanggan saat belanja.</p>
                            </div>
                        </div>

                        <ul class="nav nav-pills mb-3 fs-7 fw-bold gap-2" id="owner-poin-subnav">
                            <li class="nav-item">
                                <a class="nav-link active bg-purple-light text-brand-purple border border-purple-200" href="#" onclick="switchOwnerPoinSubTab('member')">
                                    <i class="fa-solid fa-users me-1"></i> Poin Member
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border" href="#" onclick="switchOwnerPoinSubTab('reward')">
                                    <i class="fa-solid fa-gift me-1"></i> Katalog Reward
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border" href="#" onclick="switchOwnerPoinSubTab('rate')">
                                    <i class="fa-solid fa-sliders me-1"></i> Pengaturan Perolehan Poin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border position-relative" href="#" onclick="switchOwnerPoinSubTab('redemptions')">
                                    <i class="fa-solid fa-clock-rotate-left me-1"></i> Permintaan Penukaran Poin
                                    <span id="owner-redemptions-pending-badge" class="badge rounded-pill bg-danger ms-1" style="display:none;">0</span>
                                </a>
                            </li>
                        </ul>

                        <div id="owner-poin-sub-member">
                            <div class="card-custom p-3 border-purple-200">
                                <div class="table-responsive">
                                    <table class="table align-middle fs-7 mb-0">
                                        <thead class="bg-light">
                                            <tr><th>Nama Member</th><th>WhatsApp / Email</th><th>Poin Aktif</th><th class="text-center">Aksi</th></tr>
                                        </thead>
                                        <tbody id="own-members-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="owner-poin-sub-reward" style="display:none;">
                            <div class="d-flex justify-content-end mb-3">
                                <button class="btn btn-brand-yellow fw-bold" onclick="showAddRewardModal()"><i class="fa-solid fa-plus me-1"></i> Tambah Reward Baru</button>
                            </div>
                            <div class="card-custom p-3 border-purple-200">
                                <div class="table-responsive">
                                    <table class="table align-middle fs-7 mb-0">
                                        <thead class="bg-light">
                                            <tr><th>Nama Reward</th><th>Biaya Poin</th><th>Deskripsi</th><th class="text-center">Aksi</th></tr>
                                        </thead>
                                        <tbody id="own-rewards-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="owner-poin-sub-rate" style="display:none;">
                            <div class="card-custom p-3 border-purple-200 mb-4">
                                <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3"><i class="fa-solid fa-coins me-2"></i> Rasio Poin Global (Berdasarkan Total Belanja)</h6>
                                <p class="text-muted fs-8 mb-3">Atur berapa Rupiah belanja yang setara dengan 1 Poin. Rasio ini otomatis berlaku untuk seluruh transaksi checkout online pelanggan yang login sebagai member, kecuali produk memiliki Poin Kustom di bawah.</p>
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-5">
                                        <label class="form-label fs-7 fw-bold">Setiap Belanja Rp Berapa = 1 Poin?</label>
                                        <div class="input-group">
                                            <span class="input-group-text fw-bold">Rp</span>
                                            <input type="number" id="owner-points-rate-input" class="form-control fw-bold" min="1" value="1000">
                                            <span class="input-group-text fw-bold">= 1 Poin</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-brand-purple fw-bold w-100" onclick="saveOwnerPointsRate()"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan Rasio Poin</button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fs-8 text-muted fst-italic" id="owner-points-rate-example">Contoh: belanja Rp 15.000 akan mendapat 15 Poin.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-custom p-3 border-purple-200">
                                <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3"><i class="fa-solid fa-bowl-food me-2"></i> Poin Kustom Per Varian Produk (Opsional)</h6>
                                <p class="text-muted fs-8 mb-3">Tetapkan jumlah Poin tetap untuk tiap cup varian tertentu jika ingin berbeda dari rasio global di atas. Kosongkan / set ke 0 agar produk memakai rasio global.</p>
                                <div class="table-responsive">
                                    <table class="table align-middle fs-7 mb-0">
                                        <thead class="bg-light">
                                            <tr><th>Varian Mamam Yuk</th><th>Harga / Cup</th><th>Poin Kustom / Cup</th><th class="text-center">Aksi</th></tr>
                                        </thead>
                                        <tbody id="own-product-points-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="owner-poin-sub-redemptions" style="display:none;">
                            <div class="card-custom p-3 border-purple-200">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold text-brand-purple mb-0"><i class="fa-solid fa-list-check me-2"></i> Daftar Permintaan Penukaran Poin Customer</h6>
                                    <button class="btn btn-sm btn-outline-brand-purple fw-bold" onclick="refreshRedemptionsData()"><i class="fa-solid fa-rotate me-1"></i> Refresh Data</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle fs-7 mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Waktu</th>
                                                <th>Member / Customer</th>
                                                <th>Nama Reward</th>
                                                <th>Kode Voucher</th>
                                                <th>Biaya Poin</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi / Konfirmasi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="own-redemptions-tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-resetpass" class="owner-tab-content" style="display:none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-key text-brand-purple me-2"></i> Kelola Reset Password Pelanggan</h4>
                                <p class="text-muted fs-7 mb-0">Proses permintaan reset kata sandi dari pelanggan, atau reset manual berdasarkan nomor WhatsApp.</p>
                            </div>
                            <button class="btn btn-brand-purple fw-bold" onclick="showManualResetPasswordModal()"><i class="fa-solid fa-user-lock me-1"></i> Reset Manual Pelanggan</button>
                        </div>
                        <div class="card-custom p-3 border-purple-200">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr><th>ID Tiket</th><th>Nama Pelanggan</th><th>WhatsApp</th><th>Waktu Permohonan</th><th>Status</th><th class="text-center">Aksi</th></tr>
                                    </thead>
                                    <tbody id="own-resetpass-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-pengeluaran" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-receipt text-brand-purple me-2"></i> Catatan Pengeluaran Operasional</h4>
                                <p class="text-muted fs-7 mb-0">Catat dan kelola pengeluaran harian/bulanan. Anda dapat menambah, mengedit <b>nama barang yang dibeli</b>, nominal, dan kategori.</p>
                            </div>
                            <button class="btn btn-brand-purple fw-bold px-3 py-2" onclick="showAddExpenseModal()"><i class="fa-solid fa-plus-circle me-1"></i> Tambah Pengeluaran Baru</button>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="card-custom p-3 border-start border-4 border-danger">
                                    <div class="text-muted fs-8 fw-bold">TOTAL PENGELUARAN HARI INI</div>
                                    <div class="fs-4 fw-bold text-danger" id="exp-total-today">Rp 0</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-custom p-3 border-start border-4 border-warning">
                                    <div class="text-muted fs-8 fw-bold">TOTAL PENGELUARAN BULAN INI</div>
                                    <div class="fs-4 fw-bold text-warning" id="exp-total-month">Rp 0</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-custom p-3 border-start border-4 border-info">
                                    <div class="text-muted fs-8 fw-bold">TOTAL ITEM PENGELUARAN</div>
                                    <div class="fs-4 fw-bold text-info" id="exp-total-items">0 Item</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-custom p-3 border-purple-200">
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                                <div class="fw-bold text-brand-purple fs-7"><i class="fa-solid fa-boxes-stacked me-1"></i> Daftar Barang Dibeli & Pengeluaran Operasional</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Barang Yang Dibeli</th>
                                            <th>Kategori</th>
                                            <th>Biaya / Nominal</th>
                                            <th>Catatan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="owner-expenses-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="owner-tab-background" class="owner-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-image text-brand-purple me-2"></i> Pengaturan Gambar Latar Belakang</h4>
                                <p class="text-muted fs-7 mb-0">Ubah gambar latar belakang (background) portal login dan tampilan pelanggan secara langsung dari Portal Owner.</p>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-7">
                                <div class="card-custom p-4 border-purple-200 shadow-sm h-100">
                                    <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3">
                                        <i class="fa-solid fa-upload me-2"></i> Pilih / Unggah Gambar Latar Belakang
                                    </h6>
                                    
                                    <form id="owner-bg-form" onsubmit="saveOwnerBgImage(event)">
                                        <!-- Opsi 1: Unggah File Gambar -->
                                        <div class="mb-3">
                                            <label class="form-label fs-7 fw-bold text-dark mb-1">
                                                <i class="fa-solid fa-file-image me-1 text-brand-purple"></i> Unggah File Gambar Baru (Komputer / HP)
                                            </label>
                                            <input type="file" id="owner-bg-file-input" class="form-control form-control-sm border-purple-200" accept="image/*" onchange="handleBgFileSelect(event)">
                                            <div class="form-text fs-8 text-muted mt-1">Format didukung: JPG, PNG, WEBP (Maksimal 5MB).</div>
                                        </div>

                                        <div class="d-flex align-items-center my-3">
                                            <hr class="flex-grow-1 border-purple-200 my-0">
                                            <span class="px-3 text-muted fs-8 fw-bold text-uppercase">ATAU</span>
                                            <hr class="flex-grow-1 border-purple-200 my-0">
                                        </div>

                                        <!-- Opsi 2: URL Gambar -->
                                        <div class="mb-3">
                                            <label class="form-label fs-7 fw-bold text-dark mb-1">
                                                <i class="fa-solid fa-link me-1 text-brand-purple"></i> Masukkan Link / URL Gambar Web
                                            </label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text bg-purple-light border-purple-200 text-brand-purple"><i class="fa-solid fa-globe"></i></span>
                                                <input type="url" id="owner-bg-url-input" class="form-control border-purple-200 fs-7 fw-semibold" placeholder="https://example.com/gambar-background.jpg" oninput="handleBgUrlInput(event)">
                                            </div>
                                        </div>

                                        <!-- Opsi 3: Preset Pilihan -->
                                        <div class="mb-4">
                                            <label class="form-label fs-7 fw-bold text-dark mb-2">
                                                <i class="fa-solid fa-palette me-1 text-brand-purple"></i> Gunakan Preset Background Siap Pakai:
                                            </label>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-sm btn-outline-purple fw-bold fs-8" onclick="applyBgPreset('/images/bg-login.jpg')">
                                                    <i class="fa-solid fa-rotate-left me-1"></i> Asli (Mamam Yuk Default)
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-warning text-dark fw-bold fs-8" onclick="applyBgPreset('https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&w=1600&q=80')">
                                                    <i class="fa-solid fa-carrot me-1"></i> Healthy Organic Food
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-info text-dark fw-bold fs-8" onclick="applyBgPreset('https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=1600&q=80')">
                                                    <i class="fa-solid fa-utensils me-1"></i> Warm Kitchen & Bakery
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success fw-bold fs-8" onclick="applyBgPreset('https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=1600&q=80')">
                                                    <i class="fa-solid fa-leaf me-1"></i> Fresh Veggies Pastel
                                                </button>
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2 pt-3 border-top">
                                            <button type="submit" class="btn btn-brand-purple fw-bold py-2 px-4 shadow-sm fs-7">
                                                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Gambar Latar Belakang
                                            </button>
                                            <button type="button" class="btn btn-outline-danger fw-bold py-2 px-3 fs-7" onclick="resetBgToDefault()">
                                                <i class="fa-solid fa-arrow-rotate-left me-1"></i> Reset Default
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="card-custom p-4 border-purple-200 shadow-sm h-100 bg-light">
                                    <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3">
                                        <i class="fa-solid fa-eye me-2"></i> Live Preview Tampilan Latar Belakang
                                    </h6>
                                    
                                    <div id="owner-bg-preview-card" class="rounded-4 overflow-hidden shadow-lg p-4 d-flex flex-column align-items-center justify-content-center text-center position-relative" style="min-height: 280px; background-size: cover; background-position: center; transition: all 0.3s ease;">
                                        <div class="position-absolute inset-0 bg-dark bg-opacity-40" style="backdrop-filter: blur(2px);"></div>
                                        
                                        <div class="position-relative z-1 bg-white bg-opacity-95 p-4 rounded-4 shadow border w-100" style="max-width: 320px;">
                                            <div class="bg-brand-yellow text-dark p-2 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:48px;height:48px;">
                                                <i class="fa-solid fa-user-shield fs-5"></i>
                                            </div>
                                            <h6 class="fw-bold text-brand-purple mb-1">Portal Mamam Yuk</h6>
                                            <p class="text-muted fs-8 mb-3">Tampilan login dengan background baru.</p>
                                            <button type="button" class="btn btn-brand-purple btn-sm w-100 fw-bold disabled" style="opacity:0.85;">Contoh Tombol Login</button>
                                        </div>
                                    </div>
                                    <div class="fs-8 text-muted text-center mt-3">
                                        <i class="fa-solid fa-circle-info me-1 text-brand-purple"></i> Preview di atas akan langsung berubah sesuai pilihan gambar Anda secara realtime.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
