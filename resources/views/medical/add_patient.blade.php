@extends($layout)
@section('content')
<div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Patient
                                        </li>
                                    </ol>
                                 </nav>
                            </div>
                           
                        </div>
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        
                <div class="header-search">
                     <form action="/create" method="post" class="search-box container">
                                @csrf
                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-6 mb-3">
                           
                            <input
                                type="text"
                                class="form-control search-input"
                                placeholder="Registration Number"
                                name = "number"
                                required
                            />
                        </div>

                        <div class="col-md-6 col-sm-12 col-lg-6 mb-3 ">

                            <button class="btn btn-block btn-info">Check</button>

                        </div>

                        </div>
                          
                        </div>
                    </form>
                </div>
                    </div>
                </div>
              
            </div>
        </div>
@endsection