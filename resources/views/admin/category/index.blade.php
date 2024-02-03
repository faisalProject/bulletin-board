@extends('master')
@section('contents')
<div class="category-contents-admin">
    <div class="pagetitle" style="margin-bottom: 0 !important;">
        <h1>Daftar Kategori</h1>
        <nav style="margin-bottom: 0 !important">
            <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Daftar Kategori</li>
            </ol>
        </nav>
    </div>

    <div class="card" style="padding: 20px; display: flex; gap: 15px; flex-direction: column">
        <button type="button" class="btn btn-add btn-responsive" data-bs-toggle="modal" data-bs-target="#add-category" style="width: 200px"><i class="bi bi-plus-circle-fill"></i>Tambah Kategori</button>
        @include('admin.category.create')
        <table id="datatable-category" class="table datatable-users" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Modified At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        {{-- @include('admin.category.edit') --}}
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.datatable-users').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('category_admin') }}"
                },
                columns: [
                    {
                        data: null,
                        render: function( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {data: 'category_name', name: 'category_name'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'}
                ]
            });

            new $.fn.DataTable.Responsive(table);
            table.responsive.reaclc();
        });
    </script>

    <script type="text/javascript">
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();

            var formId = $(this).data('form-id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form setelah konfirmasi
                    document.getElementById(formId).submit();
                }
            });
        })
    </script>
@endpush