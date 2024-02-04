@extends('master')

@section('contents')
    <div class="news-detail-content">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Dashboard</h1>
            <nav style="margin-bottom: 0 !important">
              <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                <li class="breadcrumb-item active">{{ $news->title }}</li>
              </ol>
            </nav>
        </div>

        <div class="card" style="min-height: 100px; padding: 20px">
          <img src="{{ url($news->image) }}" class="img-thumbnail" alt="">
          <h4 style="font-weight: 700">{{ $news->title }}</h4>
          <p style="color: #899bbd !important">{{ \Carbon\Carbon::parse($news->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
          <p>Kategori : {{ $news->category_name }}</p>
          <p>Penulis : {{ $news->username }}</p>
          <p>{!! $news->content !!}</p>
        </div>
    </div>
@endsection