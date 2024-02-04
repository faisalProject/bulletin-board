@extends('master')

@section('contents')
    <div class="dashboard-contents-admin" style="border-radius: 4px;">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Dashboard</h1>
            <nav style="margin-bottom: 0 !important">
              <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </nav>
        </div>
        <div class="card" style="margin: 0 !important; display: flex; flex-direction: column; gap: 10px; justify-content: center; height: 50px; padding: 20px; border-radius: 4px">
            <h5 style="font-weight: 600">Berita Terbaru</h5>
        </div>
        <div class="news-container">
            @foreach ($news as $n)   
                <?php $content = \Illuminate\Support\Str::words(strip_tags($n->content), 30, '...') ?>
                <div class="card">
                    <img src="{{ url($n->image) }}" alt="">
                    <div class="desc">
                        <a class="title" href="/admin/dashboard/detail/{{ $n->id }}">{{ $n->title }}</a>
                        <p style="color: #899bbd !important" class="date">{{ \Carbon\Carbon::parse($n->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                        <p class="desc">{!! $content !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection