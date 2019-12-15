<nav class="side-nav">
	<ul id="navmenu">
		<li <?php echo e(Request::is('accountant/dashboard') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.dashboard')); ?>">Dashboard</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Invoice / Take Payment</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">View Payment</a></li>
		<li <?php echo e(Request::is('doctor/profile') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.profile')); ?>">Profile</a></li>
	</ul>
</nav>