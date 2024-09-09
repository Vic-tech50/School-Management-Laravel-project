@extends('home.head')
@section('content') 

  <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(dash2/images/your-make/y-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Events</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== EVENTS PART START ======-->
    
    <section id="event-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
           	@foreach($event as $event)
               <div class="col-lg-6">
                   <div class="singel-event-list mt-30">
                      
                       <div class="event-cont" >
                           <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($event->start_date)->format('m, F jS, y ') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('m, F jS, y ') }}</span>
                            <a href="events-singel.html"><h4>{{$event->title}}</h4></a>
                            <span><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($event->start_time)->format('h:i:s A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i:s A') }}</span>
                            <!-- <span><i class="fa fa-map-marker"></i> Rc Auditorim</span> -->
                            <br>
                            <p style="text-transform: capitalize; text-align: justify;" class="expandable" onclick="expandCell(this)">{{$event->description}}</p>
                       </div>
                   </div>
               </div>
               @endforeach
             
           </div> <!-- row -->
           
        </div> <!-- container -->
    </section>
    
    <!--====== EVENTS PART ENDS ======-->
   


@endsection