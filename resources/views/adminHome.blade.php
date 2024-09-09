@extends('layouts.admin')
@section('content')

    <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">
                <div class="title pb-20">
                    <h2 class="h3 mb-0">School Overview</h2>
                </div>


<style>
.hover-effect .icon {
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.hover-effect:hover .icon {
    transform: scale(1.2);
  
}

.hover-effect .icon i {
    transition: color 0.3s ease;
}

.hover-effect:hover .icon i {
    color: #ffffff; /* Change to the color you want on hover */
}
</style>


                <div class="row pb-10">
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$students}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                        Students
                                    </div>
                                </div>
                                <div class="widget-icon">
                                 <a href="{{route('student.index')}}" class="hover-effect">
    <div class="icon" data-color="#00eccf">
        <i class="icon-copy dw dw-user"></i>
    </div>
</a>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$teachers}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                       Teaching Staff
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <a href="{{route('teachers.index')}}" class="hover-effect">
                                    <div class="icon" data-color="#ff5b5b">
                                        <span class="icon-copy dw dw-board"></span>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$non_teachers}}</div>
                                    <div class="font-14 text-secondary weight-500">
                                       Non Teaching
                                    </div>
                                </div>
                                <div class="widget-icon">
                                    <a href="{{route('staffs.index')}}" class="hover-effect">
                                    <div class="icon">
                                        <i
                                            class="icon-copy fa fa-stethoscope"
                                            aria-hidden="true"
                                        ></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="pb-10">
                    <div class=" mb-20">
                        <div class="card-box height-100-p pd-20">
 <div class="d-flex justify-content-between">
                                <div class="h5 mb-0">Number Of Student By State</div>
                             
                            </div>
                            <canvas id="barChart" style="height: 20px"></canvas>
                            <!-- <div id="diseases-chart"></div> -->



<script>
const xValue = ["Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "FCT", "Gombe", "Imo", "Jigawa", "kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos","Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara" ];
const yValue = [{{$abia}}, 
    {{$adamawa}}, 
    {{$akwa}}, 
    {{$anambra}}, 
    {{$bauchi}}, 
    {{$bayelsa}}, 
    {{$benue}}, 
    {{$borno}}, 
    {{$cross}}, 
    {{$delta}}, 
    {{$ebonyi}}, 
    {{$edo}}, 
    {{$ekiti}}, 
    {{$enugu}}, 
    {{$fct}}, 
    {{$gombe}}, 
    {{$imo}}, 
    {{$jigawa}}, 
    {{$kaduna}}, 
    {{$kano}}, 
    {{$katsina}}, 
    {{$kebbi}}, 
    {{$kogi}}, 
    {{$kwara}}, 
    {{$lagos}}, 
    {{$nasarawa}}, 
    {{$niger}}, 
    {{$ogun}}, 
    {{$ondo}}, 
    {{$osun}}, 
    {{$oyo}},
    {{$plateau}}, 
    {{$rivers}}, 
    {{$sokoto}}, 
    {{$taraba}}, 
    {{$yobe}}, 
    {{$zamfara}}, 
    
    ];
const barColor = ["red", "green","blue","orange","brown"];

new Chart("barChart", {
  type: "bar",
  data: {
    labels: xValue,
    datasets: [{
      backgroundColor: barColor,
      data: yValue
    }]
  },
  options: {
    legend: {display: true},
    title: {
      display: true,
      text: "Number Of Student"
    }
  }
});
</script>

                        
                        </div>
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p pd-20 min-height-200px">
                            <div class="d-flex justify-content-between pb-10">
                                <div class="h5 mb-0">Recent Teachers</div>
                              
                            </div>
                            <div class="user-list">
                                <ul>
                                    @forelse($recent_teachers as $teacher)
                                    <li class="d-flex align-items-center justify-content-between">
                                        <div class="name-avatar d-flex align-items-center pr-2">
                                            <div class="avatar mr-2 flex-shrink-0">
                                                @if($teacher->passport != null)
                                    <img
                                        src="{{ asset('uploads')}}/{{$teacher->passport}}"
                                        alt=""
                                        class="avatar-photo w3-circle w3-card-4"
                                        style="width: 100px; height: 100px;"
                                    />
                                    @else
                                    <img
                                        src="{{ asset('vendors/images/person.svg') }}"
                                        alt=""
                                        class="avatar-photo"
                                        style="width: 70px; height: 50px;"
                                    />
                                    @endif
                                            </div>
                                            <div class="txt">
                                                <span
                                                    class="badge badge-pill badge-sm"
                                                    data-bgcolor="#e7ebf5"
                                                    data-color="#265ed7"
                                                    >{{ \Carbon\Carbon::parse($teacher->created_at)->format('m, F jS, Y') }}</span
                                                >
                                                <div class="font-14 weight-600">{{$teacher->name}}</div>
                                                <div class="font-12 weight-500" data-color="#b2b1b6">
                                                    {{$teacher->certificate}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cta flex-shrink-0">
                                            <a href="{{route('teachers.index')}}" class="hover-effect" 
                                                ><i class="icon-copy dw dw-right-arrow w3-large"></i></a
                                            >
                                        </div>
                                    </li>
                                    <hr>
                                    @empty
                                    <center>
                                        <p style="color: red;">No Teacher Yet</p>
                                    </center>
                                    @endforelse
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-20">
                        <div class="card-box height-100-p pd-20 min-height-100px">
                            <div class="d-flex justify-content-between">
                                <div class="h5 mb-0">Number Of Student</div>
                             
                            </div>

                            <canvas id="myChart" style="height: 300px; width: 300px;"></canvas>

<script>
const xValues = ["SSS1", "SSS2", "SSS1", "JSS3", "JSS2", "JSS1"];
const yValues = [{{$ss1}}, 49, 44, 24, 15, 70];
const barColors = ["red", "green", "blue", "orange", "brown", "purple"];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
 
});
</script>


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-20">
                        <div class="card-box height-100-p pd-20 min-height-200px">
                            <div class="d-flex justify-content-between pb-10">
                                <div class="h5 mb-0">Recent Events</div>
                              
                            </div>
                            <div class="user-list">
                                <ul>
                                    @forelse($event as $event)
                                    <li class="d-flex align-items-center justify-content-between">
                                        <div class="name-avatar d-flex align-items-center pr-2">
                                           
                                            <div class="txt">
                                                <span
                                                    class="badge badge-pill badge-sm"
                                                    data-bgcolor="#e7ebf5"
                                                    data-color="#265ed7"
                                                    >{{ \Carbon\Carbon::parse($event->created_at)->format('m, F jS, Y') }}</span
                                                >
                                                <div class="font-14 weight-600">{{$event->title}}</div>
                                                <div class="font-12 weight-500" data-color="#b2b1b6">
                                                    <!-- {{$event->certificate}} -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cta flex-shrink-0">
                                            <a href="{{route('event.index')}}" class="hover-effect" 
                                                ><i class="icon-copy dw dw-right-arrow w3-large"></i></a
                                            >
                                        </div>
                                    </li>
                                    <hr>
                                    @empty
                                    <center>
                                        <h3 style="color: red;">No Event Yet</h3    >
                                    </center>
                                    @endforelse
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>





@endsection