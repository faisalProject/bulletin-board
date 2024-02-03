@extends('master')

@section('contents')
    <div class="dashboard-contents-admin" style="border-radius: 4px;">
        <div class="pagetitle" style="margin-bottom: 0 !important;">
            <h1>Dashboard</h1>
            <nav style="margin-bottom: 0 !important">
              <ol class="breadcrumb" style="margin-bottom: 0 !important">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </nav>
        </div>
        <div class="card" style="margin: 0 !important; display: flex; flex-direction: column; gap: 10px; justify-content: center; height: 50px; padding: 20px; border-radius: 4px">
            <h5 style="font-weight: 600">Berita Terbaru</h5>
        </div>
        <div class="news-container">
            <div class="card">
                <img src="../../img/2.jpg" alt="">
                <div class="desc">
                    <a class="title" href="#">Lorem Ipsum Dolor...</a>
                    <p class="date">Senin, 23 Agustus 2024</p>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget tincidunt magna. Aliquam eu eros quis nisi vulputate convallis sed id mi...</p>
                </div>
            </div>

            <div class="card">
                <img src="../../img/2.jpg" alt="">
                <div class="desc">
                    <a class="title" href="#">Lorem Ipsum Dolor...</a>
                    <p class="date">Senin, 23 Agustus 2024</p>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget tincidunt magna. Aliquam eu eros quis nisi vulputate convallis sed id mi...</p>
                </div>
            </div>

            <div class="card">
                <img src="../../img/2.jpg" alt="">
                <div class="desc">
                    <a class="title" href="#">Lorem Ipsum Dolor...</a>
                    <p class="date">Senin, 23 Agustus 2024</p>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget tincidunt magna. Aliquam eu eros quis nisi vulputate convallis sed id mi...</p>
                </div>
            </div>

            <div class="card">
                <img src="../../img/2.jpg" alt="">
                <div class="desc">
                    <a class="title" href="#">Lorem Ipsum Dolor...</a>
                    <p class="date">Senin, 23 Agustus 2024</p>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget tincidunt magna. Aliquam eu eros quis nisi vulputate convallis sed id mi...</p>
                </div>
            </div>

            <div class="card">
                <img src="../../img/2.jpg" alt="">
                <div class="desc">
                    <a class="title" href="#">Lorem Ipsum Dolor...</a>
                    <p class="date">Senin, 23 Agustus 2024</p>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget tincidunt magna. Aliquam eu eros quis nisi vulputate convallis sed id mi...</p>
                </div>
            </div>
        </div>
    </div>
@endsection