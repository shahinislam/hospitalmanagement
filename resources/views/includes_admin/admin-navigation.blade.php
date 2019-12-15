<nav class="side-nav">
	<ul id="navmenu">
      <li><img src="{{ URL::asset("logo.jpg") }}" width="40" height="40"></li>
		<li {{ Request::is('admin/dashboard') ? 'class=active' :'' }}><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li {{ Request::is('admin/department') ? 'class=active' :'' }}><a href="{{ route('admin.department') }}">Department</a></li>
		<li {{ Request::is('admin/doctor') ? 'class=active' :'' }}><a href="{{ route('admin.doctor') }}">Doctor</a></li>
		<li {{ Request::is('admin/patient') ? 'class=active' :'' }}><a href="{{ route('admin.patient') }}">Patient</a></li>
		<li {{ Request::is('admin/nurse') ? 'class=active' :'' }}><a href="{{ route('admin.nurse') }}">Nurse</a></li>
		<li {{ Request::is('admin/pharmacist') ? 'class=active' :'' }}><a href="{{ route('admin.pharmacist') }}">Pharmacist</a></li>
		<li {{ Request::is('admin/laboratorist') ? 'class=active' :'' }}><a href="{{ route('admin.laboratorist') }}">Laboratorist</a></li>
		<li {{ Request::is('admin/accountant') ? 'class=active' :'' }}><a href="{{ route('admin.accountant') }}">Accountant</a></li>
        <li><button type="submit" class="monitor" onclick="selectMonitorSetting('monitor');">Monitor Hospital<span class="darrow">&#9660</span></button>		
            <ul class="sub" id="monitor">
               <li><a href="">View Appointment</a></li>
               <li><a href="">View Payment</a></li>
               <li><a href="">View Bed Status</a></li>
               <li><a href="">View Blood Bank</a></li>
               <li><a href="">View Medicine</a></li>
               <li><a href="">View Operation</a></li>
               <li><a href="">View Birth Report</a></li>
            </ul>

		</li>
		<li><button type="submit" class="setting" onclick="selectMonitorSetting('setting');">Settings<span class="darrow">&#9660</span></button>
            <ul class="sub" id="setting">
               <li {{ Request::is('admin/noticeboard') ? 'class=active' :'' }}><a href="{{ route('admin.notice') }}">Manage Noticeboard</a></li>
               <li><a href="">System Settings</a></li>
               <li><a href="">Manage Language</a></li>
               <li><a href="">Backup Restore</a></li>
            </ul>
		</li>
		<li {{ Request::is('admin/profile') ? 'class=active' :'' }}><a href="{{ route('admin.profile') }}">Profile</a></li>
	</ul>
</nav>