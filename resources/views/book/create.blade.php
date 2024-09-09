@extends('layouts.librarian')
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
											Lend Books
										</li>
									</ol>
								</nav>
							</div>
						
						</div>
					</div>
				

					<!-- horizontal Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Lend Book(s)</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="{{route('book.store')}}" method = "post">
                                                  @csrf
							 <div id="items">


							

							<div class="row">
								<div class="col-sm-12 col-lg-6">
									<div class="form-group">
								<label>Book Name <span class="text-danger">*</span></label>
								
								<select class="custom-select col-12" style="text-transform: uppercase;" name="book_name" required>
									@foreach($book as $book)
									<option value="{{$book->book_name}} {{$book->class}} {{$book->subject}} {{$book->total}} " >{{$book->book_name}}</option>
								@endforeach
									
									
									</select>
							</div>
								</div>

								<div class="col-sm-12 col-lg-6">
									<div class="form-group">
								<label>Staff Name <small>(For Staff)</small></label>
								<select class="custom-select col-12" style="text-transform: uppercase;" name="staff_name" >
										<option selected value="null">Null</option>
									@foreach($staff as $staff)
									<option value="{{$staff->name}}" >{{$staff->name}}</option>
								@endforeach
									
									
									</select>
							
							</div>
								</div>
							</div>
<div class="row">


								<div class="col-sm-12 col-lg-6">
									<label>Reg Number</label>
									<select class="custom-select col-12" style="text-transform: uppercase;" name="reg_number" >
										<option selected value="null">Null</option>
									@foreach($student as $student)
									<option value="{{$student->reg_number}}" >{{$student->reg_number}}</option>
								@endforeach
									
									
									</select>
							
								</div>



								<div class="col-sm-12 col-lg-6">
									<div class="form-group">
								<label>Total Books <span class="text-danger">*</span></label>
								<input
									type="number" style = "height: 43px;"
									class="form-control-file form-control height-auto"  name = "total"
									 required
								/>
							</div>
								</div>

							</div>


								<div class="">
									<div class="form-group">
								<label>Return Date <span class="text-danger">*</span></label>
								<input
									type="date" style = "height: 43px;"
									class="form-control-file form-control height-auto"  name = "return_date"
									 required
								/>
							</div>
								</div>

							</div>

							

							
							<button class="btn btn-primary btn-block">Lend Books</button>
							
						</form>
						</div>


						<!-- <button type="button"  id="add-item">Add Item</button> -->

				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>



@endsection