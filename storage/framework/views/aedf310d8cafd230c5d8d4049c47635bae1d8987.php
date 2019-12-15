<nav class="side-nav">
	<ul id="navmenu">
		<li <?php echo e(Request::is('nurse/dashboard') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.dashboard')); ?>">Dashboard</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Patient</a></li>
		<li <?php echo e(Request::is('doctor/appointment') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.appointment')); ?>">Bed Ward</a></li>
		<li <?php echo e(Request::is('doctor/bloodbank') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.bloodbank')); ?>">View Blood Bank</a></li>
      <li <?php echo e(Request::is('doctor/managereport') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.managereport')); ?>">Manage Report</a></li>
		<li <?php echo e(Request::is('doctor/profile') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.profile')); ?>">Profile</a></li>
	</ul>
</nav>