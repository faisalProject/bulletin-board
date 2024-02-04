@extends('master')

@section('contents')
    <div class="news-edit">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Ubah Berita</h1>
            <nav style="margin-bottom: 0 !important">
              <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard/index">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/news/index">Berita</a></li>
                <li class="breadcrumb-item active">Ubah Berita</li>
              </ol>
            </nav>
        </div>

        <form action="{{ route('news_admin_update', $news->id) }}" method="POST" enctype="multipart/form-data" class="card">
          @csrf
          @method('PUT')
          <div class="row-input">
            <div class="col">
              <div class="input-el">
                <label for="title" style="font-weight: 600">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
                @error('title')
                    <small class="text-danger" style="font-weight: 600">{{ $message }}</small>
                @enderror
              </div>
              <div class="input-el">
                <label for="content-edit" style="font-weight: 600">Naskah Berita</label>
                <textarea name="content" id="content-edit" cols="30" rows="10" class="form-control">{{ $news->content }}</textarea>
                @error('content')
                    <small class="text-danger" style="font-weight: 600">{{ $message }}</small>
                @enderror
              </div>
              <div class="input-el">
                <label for="category_id_edit" style="font-weight: 600">Pilih Kategori</label>
                <select name="category_id" id="category_id_edit" class="form-select" aria-label="Default select example" style="width: 100%">
                  <option selected value="{{ $news->category_id }}">{{ $news->category_name }}</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger" style="font-weight: 600">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col">
              <div class="input-el">
                <label for="image" style="font-weight: 600">Gambar</label>
                <input type="file" class="form-control" value="{{ $news->image }}" name="image" id="image" onchange="imgPreview()">
              </div>
              <div class="input-el">
                <img class="img-preview d-block">
              </div>
              <div class="input-el">
                <label for="" style="font-weight: 600">Gambar Sebelumnya</label>
                <img src="{{ url($news->image) }}" class="img-thumbnail" alt="">
              </div>
            </div>
          </div>
          <div class="row-input">
            <button type="submit" class="btn btn-warning btn-responsive"><i class="bi bi-pencil-square"></i>Ubah Berita</button>
          </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
      ClassicEditor
        .create( document.querySelector('#content-edit') )
        .catch( error => {
          console.log( error )
        } );

        $(document).ready(function() {
          $('#category_id_edit').select2();
        })

        function imgPreview()
        {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';
            imagePreview.classList.add('img-thumbnail');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush