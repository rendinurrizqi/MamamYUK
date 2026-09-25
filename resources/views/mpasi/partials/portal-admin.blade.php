<div id="role-portal-admin" class="role-portal-page">
            <div class="d-flex flex-column flex-md-row">
                <div class="role-sidebar p-3">
                    <div class="d-flex align-items-center justify-content-between mb-3 px-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-brand-yellow text-dark p-2 rounded-circle fs-5"><i class="fa-solid fa-user-gear"></i></div>
                            <div>
                                <div class="fw-bold fs-6 text-white">Portal Admin</div>
                                <div class="text-warning fs-8 fw-bold">Operational Control</div>
                            </div>
                        </div>
                    </div>

                    <div id="admin-sidebar-content">
                        <nav class="nav portal-nav-horizontal flex-row flex-md-column gap-1.5 fs-7" id="admin-sidebar-nav">
                            <a class="nav-link active" href="#" onclick="switchAdminTab('menu')"><i class="fa-solid fa-calendar-days"></i> <span>Atur Menu Harian</span></a>
                            <a class="nav-link" href="#" onclick="switchAdminTab('produk')"><i class="fa-solid fa-bowl-food"></i> <span>Master Produk</span></a>
                            <a class="nav-link" href="#" onclick="switchAdminTab('pesanan')"><i class="fa-solid fa-cart-shopping"></i> <span>Pesanan Outlet</span></a>
                            <a class="nav-link" href="#" onclick="switchAdminTab('dapur')"><i class="fa-solid fa-industry"></i> <span>Rekap Dapur</span></a>
                            <a class="nav-link" href="#" onclick="switchAdminTab('stok')"><i class="fa-solid fa-boxes-stacked"></i> <span>Persediaan Stok</span></a>
                            <a class="nav-link" href="#" onclick="switchAdminTab('laporan-outlet')"><i class="fa-solid fa-file-invoice-dollar"></i> <span>Laporan Outlet</span></a>
                            <a class="nav-link" href="#" onclick="switchAdminTab('poin')"><i class="fa-solid fa-coins"></i> <span>Penukaran Poin</span> <span id="admin-redemptions-pending-badge" class="badge rounded-pill bg-danger ms-1" style="display:none;">0</span></a>
                        </nav>

                        <div class="mt-3 mt-md-4 pt-3 border-top border-purple-200 px-1">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-brand-yellow w-100 fw-bold text-dark fs-8 d-flex align-items-center justify-content-center gap-2 py-2">
                                    <i class="fa-solid fa-right-from-bracket"></i> Keluar Portal
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex-grow-1 p-4 overflow-auto">
                    <div id="admin-tab-menu" class="admin-tab-content">
                        <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-calendar-days text-brand-purple me-2"></i> Pengaturan Menu Rotasi Harian</h4>
                        <p class="text-muted fs-7 mb-4">Rotasi menu berjalan otomatis di website pelanggan berdasarkan jadwal hari.</p>
                        <div id="admin-daily-menu-grid" class="row g-3"></div>
                    </div>

                    <div id="admin-tab-produk" class="admin-tab-content" style="display:none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-bowl-food text-brand-purple me-2"></i> Master Data Produk Mamam Yuk</h4>
                                <p class="text-muted fs-7 mb-0">Kelola varian produk, harga, dan ketersediaan stok ready di outlet.</p>
                            </div>
                            <button class="btn btn-brand-yellow fw-bold" onclick="showAddProductModal()"><i class="fa-solid fa-plus me-1"></i> Tambah Varian Baru</button>
                        </div>
                        <div class="card-custom p-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr><th>Foto</th><th>ID</th><th>Varian Mamam Yuk</th><th>Harga / Cup</th><th>Kategori</th><th>Usia</th><th>Stok Ready</th><th>Status</th><th class="text-center">Aksi Admin</th></tr>
                                    </thead>
                                    <tbody id="adm-products-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="admin-tab-pesanan" class="admin-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-cart-shopping text-brand-purple me-2"></i> Pesanan Pelanggan Per Outlet</h4>
                                <p class="text-muted fs-7 mb-0">Pantau siapa memesan apa di cabang mana. Pesanan otomatis di-reset setiap pergantian hari.</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2 filter-controls-mobile">
                                <button class="btn btn-brand-yellow btn-sm fw-bold px-3 py-1.5 fs-8" onclick="showAddManualOrderModal()">
                                    <i class="fa-solid fa-plus-circle me-1"></i> Tambah Pesanan Manual
                                </button>
                                <button class="btn btn-brand-purple btn-sm fw-bold px-3 py-1.5 fs-8" onclick="printAdminPesananReport()">
                                    <i class="fa-solid fa-print me-1"></i> Cetak Rekap Pesanan
                                </button>
                                <button class="btn btn-sm btn-outline-danger fs-8 fw-bold" onclick="confirmResetAllOrders()"><i class="fa-solid fa-trash-can me-1"></i> Bersihkan Pesanan Hari Ini</button>
                                <select id="adm-pesanan-outlet-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderAdminPesananPerOutlet()">
                                    <option value="ALL">SEMUA CABANG OUTLET</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-custom p-3 border-purple-200">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>ID & Nama Bunda</th>
                                            <th>Cabang Outlet</th>
                                            <th>WhatsApp</th>
                                            <th>Detail Pesanan</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Ambil</th>
                                            <th>Status Pembatalan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="adm-pesanan-tbody"></tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-custom p-3 mt-4 border-purple-200">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h6 class="fw-bold text-brand-purple mb-0">
                                    <i class="fa-solid fa-list-check me-2"></i> Rekap Total Jumlah Menu Yang Dipesan Pelanggan
                                </h6>
                                <span class="badge bg-brand-purple fs-8" id="adm-pesanan-total-badge">Total: 0 Cup</span>
                            </div>
                            <div id="adm-pesanan-summary-content"></div>
                        </div>

                        <div class="card-custom p-3 mt-4 border-purple-200">
                            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-2 mb-3 gap-2">
                                <div>
                                    <h6 class="fw-bold text-brand-purple mb-0">
                                        <i class="fa-solid fa-boxes-packing me-2"></i> Atur Stok Produk Per Cabang Outlet / Kasir (Dikelompokkan Sesuai Hari)
                                    </h6>
                                    <div class="text-muted fs-8">Atur ketersediaan stok ready produk secara independen untuk masing-masing cabang outlet/kasir dikelompokkan berdasarkan jadwal hari.</div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <div class="d-flex align-items-center gap-1">
                                        <label class="form-label fs-8 fw-bold mb-0 text-dark">Filter Hari:</label>
                                        <select id="adm-stock-day-select" class="form-select form-select-sm fs-8 w-auto fw-bold text-brand-purple border-purple-200" onchange="renderAdminOutletStockTable()">
                                            <option value="ALL">Semua Hari (Kelompokan)</option>
                                            <option value="Senin">Hari Senin</option>
                                            <option value="Selasa">Hari Selasa</option>
                                            <option value="Rabu">Hari Rabu</option>
                                            <option value="Kamis">Hari Kamis</option>
                                            <option value="Jumat">Hari Jumat</option>
                                            <option value="Sabtu">Hari Sabtu</option>
                                            <option value="Minggu">Hari Minggu</option>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <label class="form-label fs-8 fw-bold mb-0 text-dark">Pilih Cabang Outlet:</label>
                                        <select id="adm-stock-outlet-select" class="form-select form-select-sm fs-8 w-auto fw-bold text-brand-purple border-purple-200" onchange="renderAdminOutletStockTable()">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Varian Produk Mamam Yuk</th>
                                            <th>Kategori & Usia</th>
                                            <th>Harga / Cup</th>
                                            <th>Stok Ready Cabang (Cup)</th>
                                            <th class="text-center">Aksi / Atur Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody id="adm-outlet-stock-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="admin-tab-dapur" class="admin-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-1 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-industry text-brand-purple me-2"></i> Rekapitulasi Dapur Masak Esok Hari</h4>
                                <p class="text-muted fs-7 mb-0">Terintegrasi dengan data Pesanan Per Outlet: Total Porsi Masak dihitung murni dari pre-order online yang masih berlaku (tanpa buffer walk-in).</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2 filter-controls-mobile">
                                <button class="btn btn-brand-purple btn-sm fw-bold px-3 py-1.5 fs-8" onclick="printDapurMasakReport('adm-dapur-outlet-filter')">
                                    <i class="fa-solid fa-print me-1"></i> Cetak Rekap Dapur
                                </button>
                                <select id="adm-dapur-day-filter" class="form-select form-select-sm fs-8 w-auto fw-bold text-brand-purple border-purple-200" onchange="renderAdminProduction()">
                                    <option value="ALL">Semua Hari (Kelompokan)</option>
                                    <option value="Senin">Hari Senin</option>
                                    <option value="Selasa">Hari Selasa</option>
                                    <option value="Rabu">Hari Rabu</option>
                                    <option value="Kamis">Hari Kamis</option>
                                    <option value="Jumat">Hari Jumat</option>
                                    <option value="Sabtu">Hari Sabtu</option>
                                    <option value="Minggu">Hari Minggu</option>
                                </select>
                                <select id="adm-dapur-outlet-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderAdminProduction()">
                                    <option value="ALL">SEMUA OUTLET (KONSOLIDASI)</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-custom p-3 mt-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light"><tr><th>Varian Mamam Yuk</th><th>Pre-Order Online</th><th>Pre-Order Manual</th><th>Stok Produk</th><th>Total Porsi Masak</th></tr></thead>
                                    <tbody id="adm-production-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="admin-tab-stok" class="admin-tab-content" style="display:none;">
                        <h4 class="fw-bold text-dark mb-1"><i class="fa-solid fa-boxes-stacked text-brand-purple me-2"></i> Persediaan Bahan Baku Dapur</h4>
                        <p class="text-muted fs-7 mb-4">Pantau ketersediaan bahan mentah dapur dan peringatan stok menipis.</p>
                        <div class="card-custom p-3">
                            <div class="table-responsive">
                                <table class="table align-middle fs-7 mb-0">
                                    <thead class="bg-light"><tr><th>Nama Bahan</th><th>Stok</th><th>Min Stok</th><th>Satuan</th><th>Status</th></tr></thead>
                                    <tbody id="adm-inventory-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="admin-tab-laporan-outlet" class="admin-tab-content" style="display:none;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-invoice-dollar text-brand-purple me-2"></i> Laporan Penjualan & Keuntungan Per Cabang Outlet</h4>
                                <p class="text-muted fs-7 mb-0">Pantau omset harian & bulanan, kerugian produk sisa, serta laba bersih per cabang.</p>
                            </div>
                            <div class="d-flex gap-2 filter-controls-mobile">
                                <select id="adm-report-period-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderAdminOutletReports()">
                                    <option value="HARIAN">Periode: Harian Hari Ini</option>
                                    <option value="BULANAN">Periode: Bulanan Bulan Ini</option>
                                </select>
                                <select id="adm-report-outlet-filter" class="form-select form-select-sm fs-8 w-auto fw-bold" onchange="renderAdminOutletReports()">
                                    <option value="ALL">KONSOLIDASI SEMUA OUTLET</option>
                                    <option value="Outlet Pusat (Jl. Pajajaran)">Outlet Pusat (Jl. Pajajaran)</option>
                                    <option value="Outlet Cabang 1 (Suryakencana)">Outlet Cabang 1 (Suryakencana)</option>
                                    <option value="Outlet Cabang 2 (Cibinong)">Outlet Cabang 2 (Cibinong)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-4" id="adm-outlet-metric-cards"></div>

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
                                    <tbody id="adm-outlet-report-tbody"></tbody>
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
                                    <tbody id="adm-leftover-report-tbody"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Foto Dokumentasi Rekap Penjualan Kasir (Admin View) -->
                        <div class="card-custom p-3 border-purple-200">
                            <h6 class="fw-bold text-brand-purple border-bottom pb-2 mb-3">
                                <i class="fa-solid fa-camera me-2"></i> Foto Dokumentasi & Bukti Rekap Kasir (Real-Time)
                            </h6>
                            <div id="adm-rekap-photos-grid" class="row g-2"></div>
                        </div>
                    </div>

                    <div id="admin-tab-poin" class="admin-tab-content" style="display:none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="fw-bold text-dark mb-0"><i class="fa-solid fa-coins text-brand-purple me-2"></i> Permintaan Penukaran Poin Customer</h4>
                                <p class="text-muted fs-7 mb-0">Konfirmasi atau tolak permintaan penukaran poin dari customer. Jika ditolak, poin otomatis dikembalikan ke customer.</p>
                            </div>
                            <button class="btn btn-sm btn-outline-brand-purple fw-bold" onclick="refreshRedemptionsData()"><i class="fa-solid fa-rotate me-1"></i> Refresh Data</button>
                        </div>
                        <div class="card-custom p-3 border-purple-200">
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
                                    <tbody id="adm-redemptions-tbody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
