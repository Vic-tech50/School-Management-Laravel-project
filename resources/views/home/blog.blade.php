@extends('home.head')
@section('content') 


 
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(dash2/images/your-make/y-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
	                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== BLOG PART START ======-->
    
    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">

               <div class="col-lg-8">
           	@foreach($news as $new)
                   <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="uploads/{{$new->image}}" height="300" alt="Blog">
                       </div>
                       <div class="blog-cont">
                           <a href="blog-singel.html"><h3>{{$new->title}}</h3></a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($new->created_at)->format('m, F jS, y ') }}</a></li>
                               <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
                               <!-- <li><a href="#"><i class="fa fa-tags"></i>Education</a></li> -->
                           </ul>
                           <p class="expandable2" onclick="expandCell2(this)">{{$new->description}}</p>
                       </div>
                   </div> <!-- singel blog -->
                   @endforeach

            <div class="text-center text-warning">{{ $news->links() }}</div>

                
               </div>
               
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
   




@endsection