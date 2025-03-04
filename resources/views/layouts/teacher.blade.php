<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Teacher Dashboard</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{ asset('new/gallery/navylogo4.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ asset('new/gallery/navylogo4.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ asset('new/gallery/navylogo4.png') }}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('vendors/styles/icon-font.min.css') }}"
		/>

			<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('src/plugins/fancybox/dist/jquery.fancybox.css') }}"
		/>

		 <script src="{{asset('jsx/tinymce/tinymce.min.js') }}"></script>


		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}"
		/>
		<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('w3/w32.css') }}" />

	<script type="text/javascript" src="{{ asset('angular.js') }}"></script>

				<!-- bootstrap-tagsinput css -->

				<!-- switchery css -->
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('src/plugins/switchery/switchery.min.css') }}"
		/>

		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}"
		/>
		<!-- bootstrap-touchspin css -->
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}"
		/>

		 <link rel="stylesheet" href = "{{asset('w3/w32.css') }}">

		 	<link
			rel="stylesheet"
			type="text/css"
			href="{{asset('src/plugins/jquery-steps/jquery.steps.css') }}"
		/>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>

		 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->

￼


		<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}


/*
    table {
  table-layout:fixed;
}*/

table td {
  
/*  width: 100%;*/
/*  white-space: nowrap;*/
  overflow: hidden;
  text-overflow: ellipsis;
}
.expandable {
            max-width: 1000px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            text-align: justify;
        }

</style>

	</head>
	<body ng-app = "">
		<!-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="vendors/images/deskapp-logo.svg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div> -->

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			
				<div class="header-search">
				
				</div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
					@use('App\Models\Notice')
									@php
									$notices = Notice::where('reciepient', 'teacher')->latest()->limit(5)->get();
									$ct = Notice::where('reciepient', 'teacher')->count();

									@endphp
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							@if($ct > 1)
							<span class="badge notification-active"></span>
							@endif
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>

									
								

									@foreach($notices as $notice)
									
									<li>
										<a href="{{route('teacher.notice')}}">

											<!-- <img src="vendors/images/img.jpg" alt="" /> -->
											<h3>{{$notice->title}}</h3>
											<p  class="expandable">
											{{$notice->description}}
											</p>
										</a>
									</li><hr>
									@endforeach
							
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								
								@if(Auth::user()->passport != null)
									<img
										src="{{ asset('uploads')}}/{{Auth::user()->passport}}"
										alt=""
										class="avatar-photo"
										style="width: 70px; height: 50px;"
									/>
									@else
									<img
										src="{{ asset('vendors/images/person.svg') }}"
										alt=""
										class="avatar-photo"
										style="width: 70px; height: 50px;"
									/>
									@endif
								
								<!-- <img src="{{ asset('uploads/teachers')}}/{{Auth::user()->passport}}" alt="image" style="height: 100%" /> -->
							</span>
							<span class="user-name">{{Auth::user()->name}}</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="{{route('teacher.profile')}}"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
								><i class="dw dw-logout"></i> Log Out</a
							>

							 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						</div>
					</div>
				</div>
				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src="vendors/images/github.svg" alt=""
					/></a>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>
 
		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="/teacher/home">
					<img src="{{asset('new/gallery/navylogo4.png')}}" alt="" class="dark-logo" />
					<img
						src="{{asset('new/gallery/navylogo4.png')}}"
						alt="logo" style = "height: 100px;"
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="/teacher/home" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-people"></span
								><span class="mtext">Classroom</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('teacher.students')}}">Your Class Details</a></li>
							
							</ul>
						</li>

							<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-check-square"></span
								><span class="mtext">Attendance</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('teacher.attendance')}}">Mark Attendance</a></li>
								<li><a href="{{route('teacher.view')}}">View Attendance</a></li>
							
							</ul>
						</li>

								<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-upload"></span
								><span class="mtext">Result</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('result.index')}}">Upload Result</a></li>
								<li><a href="{{route('teacher.check')}}">Check Result</a></li>
								<!--  -->
							
							</ul>
						</li>
						
								
							<li>
							<a href="{{route('assignment.index')}}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-book"></span
								><span class="mtext">Assignment</span>
							</a>
						</li>

					

							<li>
							<a href="{{route('teacher.notice')}}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-bell"></span
								><span class="mtext">Notification</span>
							</a>
						</li>
						
					

					
						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<div class="sidebar-small-cap">Extra</div>
						</li>
						<li>
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-gear"></span
								><span class="mtext">Settings</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('teacher.profile')}}">Profile</a></li>
								
								
							</ul>
						</li>
					
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

@yield('content')

		<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank"
						>Ankit Hingarajiya</a
					>
				</div>
			</div>
		</div>
		
		<!-- js -->
		<script src="{{ asset('vendors/scripts/core.js') }}"></script>
		<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
		<script src="{{ asset('vendors/scripts/process.js') }}"></script>
		<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
		<script src="{{ asset('vendors/scripts/apexcharts-settings.js') }}"></script>
		<script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('vendors/scripts/dashboard3.js') }}"></script>

		<script src="{{ asset('src/plugins/jquery-steps/jquery.steps.js') }}"></script>
		<script src="{{ asset('vendors/scripts/steps-setting.js') }}"></script>

		<script src="{{ asset('src/plugins/fancybox/dist/jquery.fancybox.js') }}"></script>


			<!-- buttons for Export datatable -->
		<script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
		<!-- Datatable Setting js -->
		<script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>
			<!-- switchery js -->
		<script src="{{ asset('src/plugins/switchery/switchery.min.js') }}"></script>
		<!-- bootstrap-tagsinput js -->
		<script src="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
		<!-- bootstrap-touchspin js -->
		<script src="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
		<script src="{{ asset('vendors/scripts/advanced-components.js') }}"></script>
		<!-- Google Tag Manager (noscript) -->


@include('sweetalert::alert')
    <!--  -->


    <script>
    function submitForm() {
        var formData = {
            assignment: $('#assignment').val(),
            first_ca: $('#first_ca').val(),
            second_ca: $('#second_ca').val(),
            exam: $('#exam').val(),
            total: $('#total').val(),
            _token: $('input[name="_token"]').val()
        };

        $.ajax({

            type: 'POST',
            url: '/update-result',
            data: formData,
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                    title: 'Success',
                    text: 'Thanks for your Request, we will reach you shortly.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // $('#myForm')[0].reset();
                $('#submit').html('Sent');
            },

                  error: function(xhr) {
            var errorMessage = xhr.responseJSON.errors ? xhr.responseJSON.errors[0] : 'Something went wrong';
            Swal.fire({
                title: 'Error',
                text: errorMessage,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            $('#submit').html('Send Again');
        }
        
            // error: function(data) {
            //     Swal.fire({
            //         title: 'Error',
            //         text: 'Something went wrong',
            //         icon: 'error',
            //         confirmButtonText: 'OK'
            //     });
            // }
        });
    }




</script>

    <script>
    function expandCell(cell) {
        if (cell.classList.contains('expandable')) {
            cell.classList.remove('expandable');
            cell.style.maxWidth = 'none';
            cell.style.whiteSpace = 'normal';
            cell.style.overflow = 'visible';
            cell.style.textOverflow = 'clip';
        } else {
            cell.classList.add('expandable');
            cell.style.maxWidth = '1000px';
            cell.style.whiteSpace = 'nowrap';
            cell.style.overflow = 'hidden';
            cell.style.textOverflow = 'ellipsis';
        }
    }
</script>
<script>
        tinymce.init({
            selector: '#space',
            // Additional configuration options if needed
        });
    </script>

         <script type="text/javascript">
    function loadImageFileAsURL() 
  { 
   var filesSelected = document.getElementById("fileid").files; 
   if (filesSelected.length > 0) 
   { 
    var fileToLoad = filesSelected[0]; 
 
    var fileReader = new FileReader(); 
 
    fileReader.onload = function(fileLoadedEvent) 
    { 
     im.src  = fileLoadedEvent.target.result; 
    }; 
 
    fileReader.readAsDataURL(fileToLoad); 
   } 
  } 
</script>
	
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>

