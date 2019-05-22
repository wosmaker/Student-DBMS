<div class="list-group list-group-flush">

	@if($role == 5)
		<a class="list-group-item list-group-item-action list-group-item-dark" href="#sub1" data-toggle="collapse" aria-expanded="false">Simple Form</a>

		<div id='sub1' class="collapse sidebar-submenu" >
			<div class="list-group" id="list-tab" >
				<a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-home" role="tab" aria-controls="home">Subject</a>
				<a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
				<a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
				<a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
			</div>
		</div>
	@endif

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
				<a id="analytic_1" class="list-group-item list-group-item-action list-group-item-light">report 1</a>
				<a id="analytic_2" class="list-group-item list-group-item-action list-group-item-light">report 2</a>
				<a id="analytic_3" class="list-group-item list-group-item-action list-group-item-light">report 3</a>
				<a id="analytic_4" class="list-group-item list-group-item-action list-group-item-light">report 4</a>
				<a id="analytic_5" class="list-group-item list-group-item-action list-group-item-light">report 5</a>
				<a id="analytic_6" class="list-group-item list-group-item-action list-group-item-light">report 6</a>
				<a id="analytic_7" class="list-group-item list-group-item-action list-group-item-light">report 7</a>
				<a id="analytic_8" class="list-group-item list-group-item-action list-group-item-light">report 8</a>
				<a id="analytic_9" class="list-group-item list-group-item-action list-group-item-light">report 9</a>
				<a id="analytic_10" class="list-group-item list-group-item-action list-group-item-light">report 10</a>
				<a id="analytic_11" class="list-group-item list-group-item-action list-group-item-light">report 11</a>
				<a id="analytic_12" class="list-group-item list-group-item-action list-group-item-light">report 12</a>
				<a id="analytic_13" class="list-group-item list-group-item-action list-group-item-light">report 13</a>
				<a id="analytic_14" class="list-group-item list-group-item-action list-group-item-light">report 14</a>
				<a id="analytic_15" class="list-group-item list-group-item-action list-group-item-light">report 15</a>
				<a id="analytic_16" class="list-group-item list-group-item-action list-group-item-light">report 16</a>

		</div>
	@endif
</div>


