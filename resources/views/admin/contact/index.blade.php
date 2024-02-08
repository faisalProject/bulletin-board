@extends('master')

@section('contents')
    <div class="contact-contents-admin">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Daftar Kontak</h1>
            <nav style="margin-bottom: 0 !important">
                <ol class="breadcrumb" style="margin-bottom: 0 !important">
                    <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Kontak</li>
                </ol>
            </nav>
        </div>

        <table id="datatable-contact" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th></th>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Modified At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable-contact').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('contact_admin_index') }}"
                },
                columns: [
                    {data: 'modal', name: 'modal'},
                    {
                        data: null,
                        render: function( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {data: 'username', name: 'username'},
                    {data: 'subject', name: 'subject'},
                    {data: 'message', name: 'message'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'}
                ]
            });

            new $.fn.DataTable.Responsive(table);
            table.responsive.recalc();
        })
    </script>
@endpush