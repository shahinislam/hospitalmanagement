<nav class="side-nav">
	<ul id="navmenu">
		<li <?php echo e(Request::is('user') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li <?php echo e(Request::is('user/admin/department') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.department')); ?>">Department</a></li>
		<li <?php echo e(Request::is('user/admin/doctor') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.doctor')); ?>">Doctor</a></li>
		<li <?php echo e(Request::is('user/admin/patient') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.patient')); ?>">Patient</a></li>
		<li <?php echo e(Request::is('user/admin/nurse') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.nurse')); ?>">Nurse</a></li>
		<li <?php echo e(Request::is('user/admin/pharmacist') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.pharmacist')); ?>">Pharmacist</a></li>
		<li <?php echo e(Request::is('user/admin/laboratorist') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.laboratorist')); ?>">Laboratorist</a></li>
		<li <?php echo e(Request::is('user/admin/accountant') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.accountant')); ?>">Accountant</a></li>
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
               <li <?php echo e(Request::is('user/admin/noticeboard') ? 'class=active' :''); ?>><a href="<?php echo e(route('admin.notice')); ?>">Manage Noticeboard</a></li>
               <li><a href="">System Settings</a></li>
               <li><a href="">Manage Language</a></li>
               <li><a href="">Backup Restore</a></li>
            </ul>
		</li>
		<li><a href="">Profile</a></li>
	</ul>
</nav>