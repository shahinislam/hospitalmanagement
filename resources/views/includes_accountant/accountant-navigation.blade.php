<nav class="side-nav">
	<ul id="navmenu">
		<li {{ Request::is('accountant/dashboard') ? 'class=active' :'' }}><a href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">Invoice / Take Payment</a></li>
		<li {{ Request::is('doctor/patient') ? 'class=active' :'' }}><a href="{{ route('doctor.patient') }}">View Payment</a></li>
		<li {{ Request::is('doctor/profile') ? 'class=active' :'' }}><a href="{{ route('doctor.profile') }}">Profile</a></li>
	</ul>
</nav>