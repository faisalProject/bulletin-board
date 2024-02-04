@extends('master')

@section('contents')
    <div class="user-contents-admin">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Daftar Pengguna</h1>
            <nav style="margin-bottom: 0 !important">
                <ol class="breadcrumb" style="margin-bottom: 0 !important">
                    <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Pengguna</li>
                </ol>
            </nav>
        </div>

        <div class="card" style="padding: 20px; display: flex; gap: 15px; flex-direction: column">
            <table id="datatable-users" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
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
            var table = $('#datatable-users').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users_admin') }}"
                },
                columns: [
                    {
                        data: null,
                        render: function( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1 
                        }
                    },
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'role', name: 'role'},
                    {data: 'updated_at', name: 'updated_at'}
                ]
            });

            new $.fn.DataTable.Responsive(table);
            table.responsive.recalc();
        })
    </script>
@endpush