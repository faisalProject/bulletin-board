@extends('master')
@section('contents')
<div class="category-contents-admin">
    <div class="pagetitle" style="margin-bottom: 0 !important;">
        <h1>Daftar Kategori</h1>
        <nav style="margin-bottom: 0 !important">
            <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                <li class="breadcrumb-item active">Daftar Kategori</li>
            </ol>
        </nav>
    </div>

    <div class="card" style="padding: 20px; display: flex; gap: 15px; flex-direction: column">
        <button type="button" class="btn btn-add btn-responsive" data-bs-toggle="modal" data-bs-target="#add-category" style="width: 200px"><i class="bi bi-plus-circle-fill"></i>Tambah Kategori</button>
        @include('admin.category.create')
        <table id="datatable-category" class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 0 !important; margin-left: 0 !important"></th>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Modified At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable-category').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('category_admin') }}"
                },
                columns: [
                    {data: 'modal', name: 'modal'},
                    {
                        data: null,
                        render: function( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {data: 'category_name', name: 'category_name'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'},
                ]
            });

            new $.fn.DataTable.Responsive(table);
            table.responsive.reaclc();
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#category-admin-destroy', function () {
            var formId = $(this).data('form-id');
            console.log(formId);

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data akan terhapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#' + formId).submit();
                }
            });
        });
    </script>
@endpush