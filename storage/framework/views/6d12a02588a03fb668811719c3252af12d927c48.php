<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/dashboard.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
     
    <div class="icon">
       	  
	  <a href="<?php echo e(route('doctor.patient')); ?>"><img src="<?php echo e(URL::asset("icon/patient.png")); ?>" width="40" height="40"><div>Patient</div></a>
	  <a href="<?php echo e(route('doctor.appointment')); ?>"><img src="<?php echo e(URL::asset("icon/appointment.png")); ?>" width="40" height="40"><div>Appointment</div></a>
         <a href="<?php echo e(route('doctor.prescription')); ?>"><img src="<?php echo e(URL::asset("icon/pharmacist.png")); ?>" width="40" height="40"><div>Prescription</div></a>
         <a href="<?php echo e(route('doctor.bloodbank')); ?>"><img src="<?php echo e(URL::asset("icon/bloodbank.png")); ?>" width="40" height="40"><div>Blood Bank</div></a>
	  <a href="<?php echo e(route('doctor.bedallotment')); ?>"><img src="<?php echo e(URL::asset("icon/bed.png")); ?>" width="40" height="40"><div>Bed Allotment</div></a>
         <a href="<?php echo e(route('doctor.managereport')); ?>"><img src="<?php echo e(URL::asset("icon/death.png")); ?>" width="40" height="40"><div>Manage Report</div></a>
       	
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
       <script type="text/javascript">
       	   var token="<?php echo e(Session::token()); ?>";
       </script>
       <script type="text/javascript" src="<?php echo e(URL::to('js/admin.js')); ?>"></script>
       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.doctor-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>