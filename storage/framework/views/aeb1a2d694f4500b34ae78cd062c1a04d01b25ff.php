<nav class="side-nav">
	<ul id="navmenu">
		<li <?php echo e(Request::is('pharmacist/dashboard') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.dashboard')); ?>">Dashboard</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Medicine Category</a></li>
		<li <?php echo e(Request::is('doctor/appointment') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.appointment')); ?>">Manage Medicine</a></li>
		<li <?php echo e(Request::is('doctor/bloodbank') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.bloodbank')); ?>">Provide Medication</a></li>
		<li <?php echo e(Request::is('doctor/profile') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.profile')); ?>">Profile</a></li>
	</ul>
</nav>