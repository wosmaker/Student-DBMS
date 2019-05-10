<div class="list-group list-group-flush">
    <a class="list-group-item list-group-item-action list-group-item-dark" href="#sub1" data-toggle="collapse" aria-expanded="false">Simple Form</a>

    <div id='sub1' class="collapse sidebar-submenu" >
        <div class="list-group" id="list-tab" >
            <a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-home" role="tab" aria-controls="home">Subject</a>
            <a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
            <a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
            <a class="list-group-item list-group-item-action list-group-item-light"  data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
        </div>
    </div>

    <a class="list-group-item list-group-item-action list-group-item-dark" href="#sub2" data-toggle="collapse" aria-expanded="false">Complex Form</a>

    <div id='sub2' class="collapse sidebar-submenu">
					<a href="{{route('regissubject.index')}}" class="list-group-item list-group-item-action list-group-item-light">
						Subject</a>

					<a href="{{route('updatereceipt.index')}}" class="list-group-item list-group-item-action list-group-item-light">
						Update Receipt</a>

					<a href="{{route('problemreport.index')}}" class="list-group-item list-group-item-action list-group-item-light">
						Problem Report</a>

					<a href="{{route('confirmreceipt.index')}}" class="list-group-item list-group-item-action list-group-item-light">
						Confirm Receipt</a>
    </div>

		<a class="list-group-item list-group-item-action list-group-item-dark" href="#sub3" data-toggle="collapse" aria-expanded="true">Data Analytic</a>


		<div id='sub3' class="collapse sidebar-submenu">
				@for ($i = 1; $i <= 16; $i++)
				<a href="{{URL('analytic'.$i)}}" class="list-group-item list-group-item-action list-group-item-light">
				Repert {{$i}}</a>
		        @endfor

	</div>

    <a class="list-group-item list-group-item-action list-group-item-info" href="{{URL('/analytic')}}">Analytic</a>
</div>


