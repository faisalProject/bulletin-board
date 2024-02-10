@extends('master')

@section('contents')
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('../../../img/page-header.jpg');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>About</h2>
                    <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <ol>
                <li><a href="/dashboard/index">Home</a></li>
                <li>About</li>
            </ol>
        </div>
    </nav>
</div>

<section id="features" class="features">
    <div class="container" style="display: flex; flex-direction: column; gap: 15px;">
        <p style="text-align: justify"><span class="tab">Bulletin</span> board atau papan pengumuman adalah salah satu alat komunikasi yang paling umum digunakan di berbagai tempat seperti sekolah, kantor, pusat perbelanjaan, dan tempat umum lainnya. Dengan pesan yang dipasang secara visual, bulletin board menjadi sarana yang efektif untuk menyampaikan informasi kepada banyak orang. Proyek bulletin board akan menghasilkan platform yang interaktif dan informatif untuk berbagi berita, pengumuman, informasi acara, dan konten lainnya.</p>

        <p>Tujuan</p>
        <p style="display: flex; align-items: center; gap: 10px; margin-bottom: 0 !important"><i class="bi bi-caret-right-fill"></i>Membuat platform komunikasi yang efisien dan mudah diakses bagi pengguna.</p>
        <p style="display: flex; align-items: center; gap: 10px; margin-bottom: 0 !important"><i class="bi bi-caret-right-fill"></i>Mengintegrasikan fitur-fitur interaktif untuk meningkatkan keterlibatan pengguna.</p>
        <p style="display: flex; align-items: center; gap: 10px; margin-bottom: 0 !important"><i class="bi bi-caret-right-fill"></i>Menyediakan ruang untuk berbagi informasi penting dan berguna kepada pengguna.</p>
    </div>
</section><!-- End Features Section -->
@endsection