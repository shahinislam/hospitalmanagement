<nav class="side-nav">
	<ul id="navmenu">
		<li <?php echo e(Request::is('laboratorist/dashboard') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.dashboard')); ?>">Dashboard</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Add Diagnosis Report</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Manage Blood Bank</a></li>
		<li <?php echo e(Request::is('doctor/bloodbank') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.bloodbank')); ?>">Manage Blood Donor</a></li>
		<li <?php echo e(Request::is('doctor/profile') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.profile')); ?>">Profile</a></li>
	</ul>
</nav>