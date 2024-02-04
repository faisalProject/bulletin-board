@extends('master')

@section('contents')
    <div class="news-contents-admin">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Berita</h1>
            <nav style="margin-bottom: 0 !important">
              <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                <li class="breadcrumb-item active">Berita</li>
              </ol>
            </nav>
        </div>
        
        <div class="card" style="padding: 20px; display: flex; gap: 15px; flex-direction: column">
            <a href="/admin/news/create" class="btn btn-add btn-responsive" style="width: 180px;"><i class="bi bi-plus-circle-fill"></i>Tambah Berita</a>

            <table id="datatable-news" class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
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
            var table = $('#datatable-news').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('news_admin') }}"
                },
                columns: [
                    {
                        data: null,
                        render: function( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {data: 'title', name: 'title'},
                    {data: 'content', name: 'content'},
                    {data: 'category_name', name: 'category_name'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'}
                ]
            });

            new $.fn.DataTable.Responsive(table);
            table.responsive.recalc();
        })

        $(document).on('click', '#news-admin-destroy', function () {
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