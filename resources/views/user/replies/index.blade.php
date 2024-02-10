@extends('master')

@section('contents')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('../../../img/page-header.jpg');">
            <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                <h2>Replies</h2>
                <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                </div>
            </div>
            </div>  
        </div>
        <nav>
            <div class="container">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Replies</li>
            </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
    
            <div class="section-header">
                <span>Email Reply</span>
                <h2>Email Reply</h2>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-10">

                    <div class="accordion accordion-flush" id="faqlist">
                        <?php $i = 1 ?>
                        @foreach ($replies as $reply)
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $i }}">
                                        <i class="bi bi-envelope question-icon"></i>
                                        {{ $reply->username }}
                                    </button>
                                </h3>
                                <div id="faq-content-{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        <p>Subjek : {{ $reply->subject }}</p>
                                        <p>Pesan : {{ $reply->reply }}</p>
                                        <p>Modified At : {{ $reply->updated_at }}</p>
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                        <?php $i++ ?>
                        @endforeach

                    </div>

                </div>
            </div>
    
        </div>
    </section
@endsection