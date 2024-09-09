<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Admin Dashboard</title>

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

		<link
			rel="stylesheet"
			type="text/css"
			href="{{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}"
		/>

		 <link rel="stylesheet" href = "{{asset('w3/w32.css') }}">

		 	<link
			rel="stylesheet"
			type="text/css"
			href="{{asset('src/plugins/jquery-steps/jquery.steps.css') }}"
		/>
		 <script src="{{asset('jsx/tinymce/tinymce.min.js') }}"></script>

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

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-3d"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




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
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }

</style>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>

	</head>
	<body>
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
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
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
								
							</span>
							<span class="user-name">{{Auth::user()->name}}</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.html"
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
				<a href="/admin/home">
					<img src="{{asset('new/gallery/navylogo4.png')}}" alt="" class="dark-logo" />
					<img
						src="{{asset('new/gallery/navylogo4.png')}}"
						alt=""
						style = "height: 60px;"
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
							<a href="/admin/home" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
							
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-people"></span
								><span class="mtext">Student</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('student.index')}}">All Students</a></li>
								<li>
									<a href="/students/import">Import Student</a>
								</li>
								<li><a href="{{route('student.create')}}">Register Student</a></li>
							
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-mortarboard"></span
								><span class="mtext">Staff</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('teachers.index')}}">Teaching </a></li>
								<li><a href="{{route('staffs.index')}}">Non Teaching</a></li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-book"></span
								><span class="mtext"> Subjects</span>
							</a>
							<ul class="submenu">
								<li><a href="{{ route('subject.index') }}">School Subject</a></li>
								
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-building"></span
								><span class="mtext">Class</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('classes.index')}}">Classes Details</a></li>
								
							</ul>
						</li>

							<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-bell"></span
								><span class="mtext">Notifications</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('news.index')}}">News </a></li>
								<li><a href="{{route('event.index')}}">Events</a></li>
								<li><a href="{{route('notice.index')}}">Notice</a></li>
								
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-check-all"></span
								><span class="mtext">Result</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('grade.index')}}">Add Grade</a></li>
								<li><a href="{{route('subject.submit')}}">Submitted Result</a></li>
								<li><a href="{{route('import')}}">Import Result</a></li>
								
							</ul>
						</li>

						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-library"></span
								><span class="mtext">Library</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('library.index')}}">Books</a></li>
								
								
							</ul>
						</li>

						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon dw dw-stethoscope"></span
								><span class="mtext">Medical</span>
							</a>
							<ul class="submenu">
							
								<li><a href="{{route('patient.index')}}">Patient List</a></li>
								
								
							</ul>
						</li>

						<li>
							<a href="{{route('gallery.index')}}" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-gallery"></span
								><span class="mtext">Gallery</span>
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
								<span class="micon dw dw-settings2"></span
								><span class="mtext">Settings</span>
							</a>
							<ul class="submenu">
								<li><a href="{{route('profile.index')}}">Profile</a></li>
								<li><a href="{{route('faq.index')}}">Faq</a></li>
								<li><a href="{{route('settings.index')}}">General</a></li>
								
							</ul>
						</li>
						<li>
							<a
								href="https://dropways.github.io/deskapp-free-single-page-website-template/"
								target="_blank"
								class="dropdown-toggle no-arrow"
							>
								<span class="micon bi bi-layout-text-window-reverse"></span>
								<span class="mtext"
									>Landing Page
									<img src="vendors/images/coming-soon.png" alt="" width="25"
								/></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

@yield('content')


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
<script src="{{ asset('src/plugins/jQuery-Knob-master/jquery.knob.min.js') }}"></script>
		<script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
		<script src="{{ asset('src/plugins/highcharts-6.0.7/code/highcharts-more.js') }}"></script>
		<script src="{{ asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
		<script src="{{ asset('src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('vendors/scripts/dashboard3.js') }}"></script>
		<script src="{{ asset('vendors/scripts/dashboard2.js') }}"></script>

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




<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('growthChart').getContext('2d');
    let chart;

    // Sample data for testing
    const sampleData = [
        { created_at: '2024-01-01', score: 50 },
        { created_at: '2024-02-01', score: 60 },
        { created_at: '2024-03-01', score: 70 },
        { created_at: '2024-04-01', score: 80 },
        { created_at: '2024-05-01', score: 90 },
        { created_at: '2024-06-01', score: 100 }
    ];

    function renderChart(data) {
        const labels = data.map(item => new Date(item.created_at).toLocaleDateString());
        const scores = data.map(item => item.score);

        if (chart) {
            chart.destroy();
        }

        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Growth',
                    data: scores,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Use sample data for testing
    function updateChart() {
        renderChart(sampleData);
    }

    setInterval(updateChart, 5000); // Update every 5 seconds
    updateChart();
});
</script>


    <!--  -->

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
            cell.style.maxWidth = '100px';
            cell.style.whiteSpace = 'nowrap';
            cell.style.overflow = 'hidden';
            cell.style.textOverflow = 'ellipsis';
        }
    }
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

 <script>
        tinymce.init({
            selector: '#space',
            // Additional configuration options if needed
        });
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

