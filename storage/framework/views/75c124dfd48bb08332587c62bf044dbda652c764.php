<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Doctor List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Doctor Name</th>
                      <th>Department</th>
                      <th>Option</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php if(count($doctor)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Doctor</td>
                         </tr>
                     <?php endif; ?>
                 <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                 
                   <tr>
                      <td class="number"><?php echo e($doctor->id); ?></td>
                      <td style="color: indigo;"><?php echo e($doctor->name); ?></td>
                      <td><?php echo e($doctor->department); ?></td>
                      <td><a href="<?php echo e(route('delete.doctor',['doctor_id'=>$doctor->id,'doctor_email'=>$doctor->email])); ?>" class="danger">Delete</a></td>
                   </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Doctor</label>
          <div class="tab-content">
             <form action="<?php echo e(route('insert.doctor')); ?>" method="post">
               <input type="text" name="name" placeholder="Name"  <?php echo e($errors->has('name') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('name')); ?>" >
               <input type="text" name="email" placeholder="E-mail"  <?php echo e($errors->has('email') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('email')); ?>" >
               <input type="text" name="password" placeholder="Password"  <?php echo e($errors->has('password') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('password')); ?>" >
               <input type="text" name="address" placeholder="Address"  <?php echo e($errors->has('address') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('address')); ?>" >
               <input type="text" name="phone" placeholder="Phone"  <?php echo e($errors->has('phone') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('phone')); ?>" >
               <input type="text" id="selectedDept" name="department" placeholder="Department"  <?php echo e($errors->has('department') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('department')); ?>" >
               <select class="sel" id="selectDept" onchange="getSelectedDept();">
                 <option>Select</option>
                 <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option><?php echo e($department->dept_name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
               <input type="text" name="profile" placeholder="Profile"  <?php echo e($errors->has('profile') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('profile')); ?>" >
               <div class="button-shadow">
                   <button type="submit" class="btn">Add Doctor</button>
               </div>
               <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
             </form>
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