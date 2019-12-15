<nav class="side-nav">
	<ul id="navmenu">
		<li {{ Request::is('doctor/dashboard') ? 'class=active' :'' }}><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Patient</a></li>
		<li {{ Request::is('doctor/appointment') ? 'class=active' :'' }}><a href="{{ route('doctor.appointment') }}">Manage Appointment</a></li>
		<li {{ Request::is('doctor/prescription') ? 'class=active' :'' }}><a href="{{ route('doctor.prescription') }}">Manage Prescription</a></li>
		<li {{ Request::is('doctor/bedallotment') ? 'class=active' :'' }}><a href="{{ route('doctor.bedallotment') }}">Bed Allotment</a></li>
		<li {{ Request::is('doctor/bloodbank') ? 'class=active' :'' }}><a href="{{ route('doctor.bloodbank') }}">View Blood Bank</a></li>
      <li {{ Request::is('doctor/managereport') ? 'class=active' :'' }}><a href="{{ route('doctor.managereport') }}">Manage Report</a></li>
		<li {{ Request::is('doctor/profile') ? 'class=active' :'' }}><a href="{{ route('doctor.profile') }}">Profile</a></li>
	</ul>
</nav>