@extends('home.head')
@section('content') 

 <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(dash2/images/your-make/y-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>FAQS</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">FAQS</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
  <div class="w3-accordion w3-light-grey">




 
</div>



   <div class="curriculam-cont">
                                     
                                        <div class="accordion" id="accordionExample">

                                        	@foreach($faq as $faq)
                                            <div class="card">
                                                <div class="card-header" id="{{$loop->iteration}}">
                                                    <a href="#" data-toggle="collapse" data-target="#q{{$loop->iteration}}" aria-expanded="true" aria-controls="collapseOne">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Question {{$loop->iteration}}</span></li>
                                                            <li><span class="head">{{$faq->question}}</span></li>
                                                               <li></li>
                                                            
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="q{{$loop->iteration}}" class="collapse show" aria-labelledby="{{$loop->iteration}}" data-parent="#accordionExample">
                                                    <div class="card-body w3-animate-right">
                                                        <p>{{$faq->answer}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                   
                                        </div>
                                    </div> <!-- curriculam cont -->

<script>
function myFunction(id) {
    document.getElementById(id).classList.toggle("w3-show");
}
</script>
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->



@endsection