@extends('master')

@section('contents')
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('../../../img/page-header.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="news-title" style="width: 576px;">
            <h3 style="text-align: center">{{ $post->title }}</h3>
            <?php $content = \Illuminate\Support\Str::words(strip_tags($post->content), 30, '...') ?> 
            <p style="text-align: center">{!! $content !!}</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <div class="sub-menu" style="display: flex; gap: 10px">
          <a style="font-weight: 600" href="/dashboard/index">Home</a> /
          <p style="font-weight: 600">{{ $post->title }}</p>
        </div>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Service Details Section ======= -->
  <section id="service-details" class="service-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-4">
          <div class="services-list">
            <p style="font-weight: 600">Kategori Berita</p>
            @foreach ($categories as $category)
              <a href="#">{{ $category->category_name }}</a>  
            @endforeach
          </div>
          
          <div style="display: flex; flex-direction: column; gap: 10px">
            <p style="color: #899bbd; margin-bottom: 0 !important">{{ \Carbon\Carbon::parse($post->updated_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
            <p style="margin-bottom: 0 !important">Penulis : {{ $post->username }}</p>
            <p style="margin-bottom: 0 !important">Kategori : {{ $post->category_name }}</p>
          </div>
        </div>

        <div class="col-lg-8">
          <img src="{{ url($post->image) }}" alt="" class="img-fluid services-img">
          <h3>{{ $post->title }}</h3>
          <p>{!! $post->content !!}</p>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          <div style="display: flex; flex-direction: column; gap: 15px;">
            <p style="font-weight: 600; margin-bottom: 0 !important">Komentar:</p>
            <ul>
              @if ( !$comments->isEmpty() )
                @foreach ($comments as $comment)  
                  <li style="display: flex; flex-direction: column; gap: 10px; align-items: flex-start">
                    <p style="font-weight: 600; margin-bottom: 0 !important; display: flex; align-items: center; gap: 10px"><i class="bi bi-caret-right-fill" style="color: #899bbd"></i> {{ $comment->username }}</p>
                    <p style="margin-bottom: 0 !important">{{ $comment->content }}</p>
                  </li>
                @endforeach
              @else 
                  <p style="margin-bottom: 0 !important">Belum Ada komentar</p>
              @endif 
            </ul>
          </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          <form action="{{ route('comment_store', $post->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 10px">
            @csrf
            <label for="comment" style="font-weight: 600">Tambahkan komentar sebagai {{ Auth::user()->username }}</label>
            <textarea name="content" id="comment" class="form-control" cols="30" rows="10" style="width: 100%; box-shadow: none !important" required></textarea>
            <button type="submit" class="btn btn-primary btn-responsive"><i class="bi bi-check-circle-fill"></i> Simpan Komentar</button>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Service Details Section -->
@endsection