<form method="POST" action="{{ route('admin.products.store') }}">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label for="pf_name" class="form-label fw-semibold">Nama Produk</label>
            <input type="text" id="pf_name" name="name" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="pf_category" class="form-label fw-semibold">Kategori</label>
            <input type="text" id="pf_category" name="category" class="form-control" value="Bubur" required>
        </div>
        <div class="col-md-3">
            <label for="pf_age_group" class="form-label fw-semibold">Umur</label>
            <input type="text" id="pf_age_group" name="age_group" class="form-control" value="6+ Bulan" required>
        </div>
        <div class="col-md-4">
            <label for="pf_price" class="form-label fw-semibold">Harga</label>
            <input type="number" id="pf_price" name="price" class="form-control" min="1" required>
        </div>
        <div class="col-md-4">
            <label for="pf_stock" class="form-label fw-semibold">Stok</label>
            <input type="number" id="pf_stock" name="stock" class="form-control" min="0" required>
        </div>
        <div class="col-md-4">
            <label for="pf_status" class="form-label fw-semibold">Status</label>
            <select id="pf_status" name="status" class="form-select">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
        </div>
        <div class="col-12">
            <label for="pf_ingredients" class="form-label fw-semibold">Bahan</label>
            <textarea id="pf_ingredients" name="ingredients" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-brand-purple"><i class="fa-solid fa-save me-2"></i> Simpan Produk</button>
        </div>
    </div>
</form>
