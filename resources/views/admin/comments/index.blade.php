@extends('master')

@section('contents')
    <div class="comment-contents-admin">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Daftar Komentar</h1>
            <nav style="margin-bottom: 0 !important">
                <ol class="breadcrumb" style="margin-bottom: 0 !important">
                    <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Komentar</li>
                </ol>
            </nav>
        </div>

        <div class="card" style="padding: 20px; display: flex; gap: 15px; flex-direction: column">
            <table id="datatable-comment" class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Komentar</th>
                        <th>Dari</th>
                        <th>Berita</th>
                        <th>Modified At</th>
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
            var table = $('#datatable-comment').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('comment_admin_index') }}"
                },
                columns: [
                    {
                        data: null,
                        render: function( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        },
                    },
                    {data: 'comment', name: 'comment'},
                    {data: 'username', name: 'username'},
                    {data: 'title', name: 'title'},
                    {data: 'updated_at', name: 'updated_at'}
                ]
            });

            new $.fn.DataTable.Responsive(table);
            table.responsive.recalc();
        });
    </script>
@endpush