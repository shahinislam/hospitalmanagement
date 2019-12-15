<nav class="side-nav">
	<ul id="navmenu">
		<li {{ Request::is('patient/dashboard') ? 'class=active' :'' }}><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
		<li {{ Request::is('doctor/appointment') ? 'class=active' :'' }}><a href="{{ route('doctor.appointment') }}">View Appointment</a></li>
		<li {{ Request::is('doctor/prescription') ? 'class=active' :'' }}><a href="{{ route('doctor.prescription') }}">View Prescription</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">View Doctor</a></li>
		<li {{ Request::is('doctor/bloodbank') ? 'class=active' :'' }}><a href="{{ route('doctor.bloodbank') }}">View Blood Bank</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Admit History</a></li>	
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Operation History</a></li>
        <li {{ Request::is('doctor/managereport') ? 'class=active' :'' }}><a href="{{ route('doctor.managereport') }}">View Invoice</a></li>
        <li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Payment History</a></li>
		<li {{ Request::is('doctor/profile') ? 'class=active' :'' }}><a href="{{ route('doctor.profile') }}">Profile</a></li>
	</ul>
</nav>