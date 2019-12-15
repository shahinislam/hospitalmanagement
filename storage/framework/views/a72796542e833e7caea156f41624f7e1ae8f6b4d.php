<nav class="side-nav">
	<ul id="navmenu">
		<li <?php echo e(Request::is('patient/dashboard') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.dashboard')); ?>">Dashboard</a></li>
		<li <?php echo e(Request::is('doctor/appointment') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.appointment')); ?>">View Appointment</a></li>
		<li <?php echo e(Request::is('doctor/prescription') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.prescription')); ?>">View Prescription</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">View Doctor</a></li>
		<li <?php echo e(Request::is('doctor/bloodbank') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.bloodbank')); ?>">View Blood Bank</a></li>
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Admit History</a></li>	
		<li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Operation History</a></li>
        <li <?php echo e(Request::is('doctor/managereport') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.managereport')); ?>">View Invoice</a></li>
        <li <?php echo e(Request::is('doctor/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.patient')); ?>">Payment History</a></li>
		<li <?php echo e(Request::is('doctor/profile') ? 'class=active' :''); ?>><a href="<?php echo e(route('doctor.profile')); ?>">Profile</a></li>
	</ul>
</nav>