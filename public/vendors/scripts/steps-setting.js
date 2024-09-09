$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> #title#',
	labels: {
		finish: "Submit"
	},
	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function (event, currentIndex) {
		// $('#success-modal').modal('show');
		$('#form').submit();
	}
});

$(".tab-wizard2").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
	labels: {
		finish: "Submit",
		next: "Next",
		previous: "Previous",
	},
	onStepChanged: function(event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function(event, currentIndex) {
		$('#success-modal-btn').trigger('click');
	}
});


// $(".tab-wizard").steps({
//     headerTag: "h5",
//     bodyTag: "section",
//     transitionEffect: "fade",
//     titleTemplate: '<span class="step">#index#</span> #title#',
//     labels: {
//         finish: "Submit"
//     },
//     onStepChanged: function (event, currentIndex, priorIndex) {
//         $('.steps .current').prevAll().addClass('disabled');
//     },
//     onFinished: function (event, currentIndex) {
//         $('#form').submit();
//     },
//     submitHandler: function (form) {
//         // Get the form action URL
//         var formAction = $(form).attr('action');
//         // Set the form action to the desired URL
//         $(form).attr('action', '/submit');
//         // Submit the form
//         form.submit();
//     }
// });

// $(".tab-wizard2").steps({
//     headerTag: "h5",
//     bodyTag: "section",
//     transitionEffect: "fade",
//     titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
//     labels: {
//         finish: "Submit",
//         next: "Next",
//         previous: "Previous",
//     },
//     onStepChanged: function(event, currentIndex, priorIndex) {
//         $('.steps .current').prevAll().addClass('disabled');
//     },
//     onFinished: function(event, currentIndex) {
//         $('#success-modal-btn').trigger('click');
//     },
//     submitHandler: function (form) {
//         // Get the form action URL
//         var formAction = $(form).attr('action');
//         // Set the form action to the desired URL
//         $(form).attr('action', '/submit');
//         // Submit the form
//         form.submit();
//     }
// });
