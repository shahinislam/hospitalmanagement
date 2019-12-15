<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/dashboard.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
     
       <div class="icon">
       	  <a href="<?php echo e(route('admin.doctor')); ?>"><img src="<?php echo e(URL::asset("icon/doctor.png")); ?>" width="40" height="40" ><div>Doctor</div></a>
       	  <a href="<?php echo e(route('admin.patient')); ?>"><img src="<?php echo e(URL::asset("icon/patient.png")); ?>" width="40" height="40"><div>Patient</div></a>
       	  <a href="<?php echo e(route('admin.nurse')); ?>"><img src="<?php echo e(URL::asset("icon/nurse.png")); ?>" width="40" height="40"><div>Nurse</div></a>
       	  <a href="<?php echo e(route('admin.pharmacist')); ?>"><img src="<?php echo e(URL::asset("icon/pharmacist.png")); ?>" width="40" height="40"><div>Pharmacist</div></a>
       	  <a href="<?php echo e(route('admin.laboratorist')); ?>"><img src="<?php echo e(URL::asset("icon/laboratorist.png")); ?>" width="40" height="40"><div>Laboratorist</div></a>
       	  <a href="<?php echo e(route('admin.accountant')); ?>"><img src="<?php echo e(URL::asset("icon/accountant.png")); ?>" width="40" height="40"><div>Accountant</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/appointment.png")); ?>" width="40" height="40"><div>Appointment</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/payment.png")); ?>" width="40" height="40"><div>Payment</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/bloodbank.png")); ?>" width="40" height="40"><div>Blood Bank</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/medicine.png")); ?>" width="40" height="40"><div>Medicine</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/operation.png")); ?>" width="40" height="40"><div>Operation</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/birth.png")); ?>" width="40" height="40"><div>Birth Report</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/death.png")); ?>" width="40" height="40"><div>Death Report</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/bed.png")); ?>" width="40" height="40"><div>Bed Allotment</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/noticeboard.png")); ?>" width="40" height="40"><div>Notice Board</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/setting.png")); ?>" width="40" height="40"><div>Settings</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/language.png")); ?>" width="40" height="40"><div>Language</div></a>
       	  <a href=""><img src="<?php echo e(URL::asset("icon/backup.png")); ?>" width="40" height="40"><div>Backup</div></a>
       </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
       <script type="text/javascript">
       	   var token="<?php echo e(Session::token()); ?>";
       </script>
       <script type="text/javascript" src="<?php echo e(URL::to('js/admin.js')); ?>"></script>
       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>