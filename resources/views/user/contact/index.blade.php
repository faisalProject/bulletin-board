@extends('master')

@section('contents')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('../../../img/page-header.jpg');">
            <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                <h2>Contact</h2>
                <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                </div>
            </div>
            </div>
        </div>
        <nav>
            <div class="container">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
            </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    
        <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
    
            <div>
                <iframe style="border:0; width: 100%; height: 340px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->
    
            <div class="row gy-4 mt-4">
    
            <div class="col-lg-4">
    
                <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                    <h4>Location:</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                </div>
                </div><!-- End Info Item -->
    
                <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                    <h4>Email:</h4>
                    <p>info@example.com</p>
                </div>
                </div><!-- End Info Item -->
    
                <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                    <h4>Call:</h4>
                    <p>+1 5589 55488 55</p>
                </div>
                </div><!-- End Info Item -->
    
            </div>
    
            <div class="col-lg-8">
                <form action="{{ route('contact_user_store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" style="box-shadow: none !important; border-radius: 4px !important" name="name" class="form-control" id="name" placeholder="Nama" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" style="box-shadow: none !important; border-radius: 4px !important" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" style="box-shadow: none !important; border-radius: 4px !important" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" style="box-shadow: none !important; border-radius: 4px !important" name="message" rows="5" placeholder="Pesan" required></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary" style="display: flex; justify-content: center; align-items: center; gap: 10px; border-radius: 4px; width: 100%"><i class="bi bi-send-fill"></i> Kirim</button>
                    </div>
                </form>
            </div><!-- End Contact Form -->
    
        </div>
    </section><!-- End Contact Section -->
@endsection