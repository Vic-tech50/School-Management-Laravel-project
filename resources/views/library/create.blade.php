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
											Add Books
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-danger"
										href="{{route('library.index')}}"
										role="button"
										
									>
										<i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i> Go Back
									</a>
									
								</div>
							</div>
						</div>
					</div>
				

					<!-- horizontal Basic Forms Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Add Book(s)</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="{{route('library.store')}}" method = "post">
                                                  @csrf
							 <div id="items">
							<div class="form-group">
								<label>Book Name</label>
								<input
									type="text"
									class="form-control-file form-control height-auto"  name = "book_name[]"
									 required
								/>
							</div>

							<div class="row">
								<div class="col-sm-12 col-lg-4">
									<div class="form-group">
								<label>Class</label>
								
								<select class="custom-select col-12" name="class[]" required>
									<option value="SSS1">SSS1</option>
									<option value="SSS2">SSS2</option>
									<option value="SSS3">SSS3</option>
									<option value="JSS1">JSS1</option>
									<option value="JSS2">JSS2</option>
									<option value="JSS3">JSS3</option>
									
									
									</select>
							</div>
								</div>

								<div class="col-sm-12 col-lg-4">
									<div class="form-group">
								<label>Subject</label>
								<select class="custom-select col-12" name="subject[]" required>
									<option value="Maths">Maths</option>
									<option value="English">English</option>
									<option value="French">French</option>
									<option value="Biology">Biology</option>
									<option value="Physic">Physic</option>
									<option value="Chemistry">Chemistry</option>
									
									
									</select>
							</div>
								</div>


								<div class="col-sm-12 col-lg-4">
									<div class="form-group">
								<label>Total Books</label>
								<input
									type="number" style = "height: 43px;"
									class="form-control-file form-control height-auto"  name = "total[]"
									 required
								/>
							</div>
								</div>

							</div>

							

						</div>

							
							<button class="btn btn-primary btn-block">Add Books</button>
							
						</form>

						<!-- <button type="button"  id="add-item">Add Item</button> -->

						<button type="button" class="btn btn-primary" id="add-item" style="position: fixed; right: 5px; bottom: 150px;">
			<i class="fa fa-plus"></i>
		</button>
				
					</div>
					<!-- horizontal Basic Forms End -->

				</div>

<script>
    document.getElementById('add-item').addEventListener('click', function() {
        var newItem = document.createElement('div');
        newItem.classList.add('item');
        newItem.innerHTML = `
        <hr>
        <div class="form-group">
            <label for="book_name">Book Name</label>
            <input type="text" class="form-control-file form-control height-auto" name="book_name[]" required>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="class">Class</label>
                    <select class="custom-select col-12" name="class[]" required>
                       	<option value="SSS1">SSS1</option>
									<option value="SSS2">SSS2</option>
									<option value="SSS3">SSS3</option>
									<option value="JSS1">JSS1</option>
									<option value="JSS2">JSS2</option>
									<option value="JSS3">JSS3</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select class="custom-select col-12" name="subject[]" required>
                      <option value="Maths">Maths</option>
									<option value="English">English</option>
									<option value="French">French</option>
									<option value="Biology">Biology</option>
									<option value="Physic">Physic</option>
									<option value="Chemistry">Chemistry</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="total">Total Books</label>
                    <input type="number" style="height: 43px;" class="form-control-file form-control height-auto" name="total[]" required>
                </div>
            </div>
        </div>
        `;
        document.getElementById('items').appendChild(newItem);
    });
</script>



@endsection