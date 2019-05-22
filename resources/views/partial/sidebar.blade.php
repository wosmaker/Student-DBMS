<div class="list-group list-group-flush">

	@if($role == 1)
		<a href="{{route('regissubject.index')}}" class="list-group-item list-group-item-action list-group-item-light">Subject</a>
		<a href="{{route('updatereceipt.index')}}" class="list-group-item list-group-item-action list-group-item-light">Update Receipt</a>
		<a href="{{route('problemreport.index')}}" class="list-group-item list-group-item-action list-group-item-light">Problem Report</a>
		<a href="{{route('personal.index')}}" class="list-group-item list-group-item-action list-group-item-light">Personal</a>
	@endif

	@if($role == 2)
		<a href="{{route('problemreport.index')}}" class="list-group-item list-group-item-action list-group-item-light">Problem Report</a>
		<a href="{{route('personal.index')}}" class="list-group-item list-group-item-action list-group-item-light">Personal</a>

	@endif

	@if($role == 3)
		<a href="{{route('editsubject.index')}}" class="list-group-item list-group-item-action list-group-item-light">Edit Subject</a>
		<a href="{{route('confirmreceipt.index')}}" class="list-group-item list-group-item-action list-group-item-light">Confirm Receipt</a>
		<a href="{{route('problemreport.index')}}" class="list-group-item list-group-item-action list-group-item-light">Problem Report</a>
		<a href="{{route('personal.index')}}" class="list-group-item list-group-item-action list-group-item-light">Personal</a>
	@endif

	@if($role == 4)
		<a href="{{route('problemreport.index')}}" class="list-group-item list-group-item-action list-group-item-light">Problem Report</a>
		<a href="{{route('personal.index')}}" class="list-group-item list-group-item-action list-group-item-light">Personal</a>
	@endif

	@if($role == 5)
		<a class="list-group-item list-group-item-action list-group-item-dark" href="#sub2" data-toggle="collapse" aria-expanded="false">Complex Form</a>

		<div id='sub2' class="collapse sidebar-submenu">
			<a href="{{route('regissubject.index')}}" class="list-group-item list-group-item-action list-group-item-light">
				Subject</a>

			<a href="{{route('editsubject.index')}}" class="list-group-item list-group-item-action list-group-item-light">
				Edit Subject</a>

			<a href="{{route('updatereceipt.index')}}" class="list-group-item list-group-item-action list-group-item-light">
				Update Receipt</a>

			<a href="{{route('problemreport.index')}}" class="list-group-item list-group-item-action list-group-item-light">
				Problem Report</a>

			<a href="{{route('confirmreceipt.index')}}" class="list-group-item list-group-item-action list-group-item-light">
				Confirm Receipt</a>

			<a href="{{route('personal.index')}}" class="list-group-item list-group-item-action list-group-item-light">Personal</a>

		</div>
	@endif

	@if($role == 4 || $role == 5)
		<a class="list-group-item list-group-item-action list-group-item-dark" href="#sub3" data-toggle="collapse" aria-expanded="true">Data Analytic</a>

		<div id='sub3' class="collapse sidebar-submenu">
				<a href="#" id="analytic_1" class="list-group-item list-group-item-action list-group-item-light">GEN 111</a>
				<a href="#" id="analytic_2" class="list-group-item list-group-item-action list-group-item-light"Credit Group</a>
				<a href="#" id="analytic_3" class="list-group-item list-group-item-action list-group-item-light">Late Regis</a>
				<a href="#" id="analytic_4" class="list-group-item list-group-item-action list-group-item-light">Room</a>
				<a href="#" id="analytic_5" class="list-group-item list-group-item-action list-group-item-light">Seat used</a>
				{{-- <a id="analytic_6" class="list-group-item list-group-item-action list-group-item-light">report 6</a> --}}
				<a href="#" id="analytic_7" class="list-group-item list-group-item-action list-group-item-light">Room <></a>
				<a href="#" id="analytic_8" class="list-group-item list-group-item-action list-group-item-light">Bank used</a>
				<a href="#" id="analytic_9" class="list-group-item list-group-item-action list-group-item-light">Late by depart...</a>
				<a href="#" id="analytic_10" class="list-group-item list-group-item-action list-group-item-light">Pay day</a>
				<a href="#" id="analytic_11" class="list-group-item list-group-item-action list-group-item-light">Department problem</a>
				<a href="#" id="analytic_12" class="list-group-item list-group-item-action list-group-item-light">Male & Female</a>
				<a href="#" id="analytic_13" class="list-group-item list-group-item-action list-group-item-light">Most Seat</a>
				<a href="#" id="analytic_14" class="list-group-item list-group-item-action list-group-item-light">Least Seat</a>
				<a href="#" id="analytic_15" class="list-group-item list-group-item-action list-group-item-light">Not paid</a>
				<a href="#" id="analytic_16" class="list-group-item list-group-item-action list-group-item-light">Not Answered</a>
		</div>
	@endif
</div>


