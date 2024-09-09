@extends('layouts.admin')
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
											FAQ
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-danger "
										href="{{route('faq.index')}}"
									
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
								<h4 class="text-blue h4">Add FAQ</h4>
								
							</div><br><br><br>
						
						</div>
						 <form class="container" action="{{route('faq.store')}}" method = "post">
                                                  @csrf
							 <div id="items">
							<div class="form-group">
								<label>Question</label>
								<input
									type="text"
									class="form-control-file form-control height-auto" name = "question[]"
									 required
								/>
							</div>

							<div class="form-group">
								<label>Answer</label>
								<textarea class="form-control" name = "answer[]" required></textarea>
							</div>

						</div>

							
							<button class="btn btn-primary btn-block">Add Question(s)</button>
							
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
        <hr style ="font-size: 20px">
        <div class="form-group">
								<label>Question</label>
								<input
									type="text"
									class="form-control-file form-control height-auto" name = "question[]"
									 required
								/>
							</div>

            <div class="form-group">
								<label>Answer</label>
								<textarea class="form-control" name = "answer[]" required></textarea>
							</div>

           
        `;
        document.getElementById('items').appendChild(newItem);
    });
</script>


@endsection