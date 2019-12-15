<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Manage Profile</label>
          <div class="tab-content">
             <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
               <form action="<?php echo e(route('update.profile')); ?>" method="post">
               <input type="text" name="name" <?php echo e($errors->has('name') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('name') ? Request::old('name') : isset($profile) ? $profile->name : ''); ?>" >
               <input type="text" name="email"  <?php echo e($errors->has('email') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('email') ? Request::old('email') : isset($profile) ? $profile->email : ''); ?>" >
               <input type="password" placeholder="Old Password" name="oldpass" <?php echo e($errors->has('oldpass') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('oldpass')); ?>" >
             
               <input type="password" placeholder="New Password" name="newpass" <?php echo e($errors->has('newpass') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('newpass')); ?>" >
              
               <input type="password" placeholder="Confirm Password" name="conpass" <?php echo e($errors->has('conpass') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('conpass')); ?>" >

               <input type="text" name="address"  <?php echo e($errors->has('address') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('address') ? Request::old('address') : isset($profile) ? $profile->address : ''); ?>" >
               <input type="text" name="phone" <?php echo e($errors->has('phone') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('phone') ? Request::old('phone') : isset($profile) ? $profile->phone : ''); ?>" >
               <div class="button-shadow">
                   <button type="submit" class="btn">Update Profile</button>
               </div>
               <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
             </form>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2"></label>
          <div class="tab-content">

          </div>
        </li>
        <li>
           <input type="radio" name="tabs" id="tab-3">
           <label for="tab-3"></label>
        </li>
      </ul>
     
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
       <script type="text/javascript">
           var token="<?php echo e(Session::token()); ?>";
       </script>
       <script type="text/javascript" src="<?php echo e(URL::to('js/admin.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>