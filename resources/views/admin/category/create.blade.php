<div class="modal fade" id="add-category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category_admin_store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 id="exampleModalLabel" style="margin-bottom: 0 !important; font-weight: 600">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; flex-direction: column; gap: 15px">
                <div style="display: flex; flex-direction: column; gap: 10px">
                    <label for="category_name">Nama Kategori</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" required>
                    @error('category_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-responsive" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i>Tutup</button>
                <button type="submit" class="btn btn-add btn-responsive"><i class="bi bi-check-circle-fill"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>