<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/dashboard.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
     
       <div class="icon">    
       	  <a href=""><img src="<?php echo e(URL::asset("icon/invoice.png")); ?>" width="40" height="40"><div>Take Payment</div></a>
          <a href=""><img src="<?php echo e(URL::asset("icon/payment.png")); ?>" width="40" height="40"><div>View Payment</div></a>    	  
       </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
       <script type="text/javascript">
       	   var token="<?php echo e(Session::token()); ?>";
       </script>
       <script type="text/javascript" src="<?php echo e(URL::to('js/admin.js')); ?>"></script>
       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.accountant-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>