@extends('home.head')
@section('content') 

 <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(dash2/images/your-make/y-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Gallery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
                @foreach($galleries as $gallery)
               <div class="col-lg-4 col-sm-6 mb-3">
               
                    <div class="singel-course" style="height: 470px">
                        <div class="thum">
                            <div class="image">
                                <img src="uploads/{{$gallery->image}}" height="250" alt="Gallery">
                            </div>
                            <div class="price">
                                <span>{{$loop->iteration}}</span>
                            </div>
                        </div>
                        <div class="cont">
                          
                            <h4 style="text-transform: capitalize;">{{$gallery->description}}</h4>
                         
                        </div>
                    </div> <!-- singel course -->
                </div>
                @endforeach 
               
           </div> <!-- row --><br><br>
            <div class="text-center text-warning">{{ $galleries->links() }}</div>
           
           
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   

@endsection