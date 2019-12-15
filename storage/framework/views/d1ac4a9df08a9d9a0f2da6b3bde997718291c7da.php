<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Blood Donor List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>Blood Group</th>
                      <th>Last Donation Date</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     <?php if(count($bloodbank)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Blood Donor</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $bloodbank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodbank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($bloodbank->id); ?></td>
                   <td><?php echo e($bloodbank->name); ?></td>
                   <td><?php echo e($bloodbank->age); ?></td>
                   <td><?php echo e($bloodbank->sex); ?></td>
                   <td><?php echo e($bloodbank->blood); ?></td>
                   <td><?php echo e($bloodbank->date); ?></td>
                   <td><a href="<?php echo e(route('doctor.bloodbank.delete',['bloodbank_id'=>$bloodbank->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">Blood Bank</label>
          <div class="tab-content">
            <form action="<?php echo e(route('doctor.bloodbank.insert')); ?>" method="post">
               <input type="text"  placeholder="Donor Name" name="name" <?php echo e($errors->has('name') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('name')); ?>" >

               <input type="text"  placeholder="Age" name="age" <?php echo e($errors->has('age') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('age')); ?>" >

               <input type="text"  id="sex" placeholder="Sex" name="sex" <?php echo e($errors->has('sex') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('sex')); ?>" >

               <select id="selectSex" onchange="getSelectedSex();">
                      <option>Select Sex</option>
                      <option>Male</option>
                      <option>Female</option>
                </select>

               <input type="text" id="blood" placeholder="Blood Group" name="blood" <?php echo e($errors->has('blood') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('blood')); ?>" >

               <select id="selectBlood" onchange="getSelectedBlood();">
                      <option>Select Blood</option>
                      <option>A+</option>
                      <option>A-</option>
                      <option>B+</option>
                      <option>B-</option>
                      <option>AB+</option>
                      <option>AB-</option>
                      <option>O+</option>
                      <option>O-</option>
               </select>

               <input type="text"  placeholder="Last Donation Date" name="date" <?php echo e($errors->has('date') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('date')); ?>" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Blood Bank</button>
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


<?php echo $__env->make('layouts.doctor-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>