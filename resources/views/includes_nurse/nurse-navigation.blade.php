<nav class="side-nav">
	<ul id="navmenu">
		<li {{ Request::is('nurse/dashboard') ? 'class=active' :'' }}><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Patient</a></li>
		<li {{ Request::is('doctor/appointment') ? 'class=active' :'' }}><a href="{{ route('doctor.appointment') }}">Bed Ward</a></li>
		<li {{ Request::is('doctor/bloodbank') ? 'class=active' :'' }}><a href="{{ route('doctor.bloodbank') }}">View Blood Bank</a></li>
      <li {{ Request::is('doctor/managereport') ? 'class=active' :'' }}><a href="{{ route('doctor.managereport') }}">Manage Report</a></li>
		<li {{ Request::is('doctor/profile') ? 'class=active' :'' }}><a href="{{ route('doctor.profile') }}">Profile</a></li>
	</ul>
</nav>