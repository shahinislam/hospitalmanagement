<nav class="side-nav">
	<ul id="navmenu">
		<li {{ Request::is('laboratorist/dashboard') ? 'class=active' :'' }}><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Add Diagnosis Report</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Manage Blood Bank</a></li>
		<li {{ Request::is('doctor/bloodbank') ? 'class=active' :'' }}><a href="{{ route('doctor.bloodbank') }}">Manage Blood Donor</a></li>
		<li {{ Request::is('doctor/profile') ? 'class=active' :'' }}><a href="{{ route('doctor.profile') }}">Profile</a></li>
	</ul>
</nav>