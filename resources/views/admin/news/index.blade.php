@extends('master')

@section('contents')
    <div class="news-contents-admin">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Berita</h1>
            <nav style="margin-bottom: 0 !important">
              <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Berita</li>
              </ol>
            </nav>
        </div>
        
        <div class="card" style="padding: 20px; display: flex; gap: 15px; flex-direction: column">
            <a href="#" class="btn btn-add btn-responsive" style="width: 180px;"><i class="bi bi-plus-circle-fill"></i>Tambah Berita</a>

            <div style="width: 100%; overflow: auto">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                            <b>N</b>ame
                            </th>
                            <th>Ext.</th>
                            <th>City</th>
                            <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                            <th>Completion</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection