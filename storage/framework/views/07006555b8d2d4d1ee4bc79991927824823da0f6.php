<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Patient List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Patient Name</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>Blood Group</th>
                      <th>Birth Date</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php if(count($patient)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Patient</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($patient->id); ?></td>
                   <td><?php echo e($patient->name); ?></td>
                   <td><?php echo e($patient->age); ?></td>
                   <td><?php echo e($patient->sex); ?></td>
                   <td><?php echo e($patient->blood); ?></td>
                   <td><?php echo e($patient->birth); ?></td>
                   <td><a href="<?php echo e(route('delete.patient',['patient_id'=>$patient->id,'patient_email'=>$patient->email])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Patient</label>
          <div class="tab-content">
             <form action="<?php echo e(route('insert.patient')); ?>" method="post">
               <input type="text" name="name" placeholder="Patient Name" <?php echo e($errors->has('name') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('name')); ?>" >
               <input type="text" name="email" placeholder="E-mail" <?php echo e($errors->has('email') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('email')); ?>" >
               <input type="text" name="password" placeholder="Password" <?php echo e($errors->has('password') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('password')); ?>" >
               <input type="text" name="address" placeholder="Address" <?php echo e($errors->has('address') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('address')); ?>" >
               <input type="text" name="phone" placeholder="Phone" <?php echo e($errors->has('phone') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('phone')); ?>" >
               <input type="text" id="sex" name="sex" placeholder="Sex" <?php echo e($errors->has('sex') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('sex')); ?>" >
                    <select id="selectSex" onchange="getSelectedSex();">
                      <option>Select Sex</option>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
               <input type="hidden" id="birth" name="birth">
               <p style="font-weight: bold;
                         color: indigo;">Date Of Birth:</p>
               <select id="selectDate" onchange="getSelectedBirth();">
                <option>Day</option>
                 <?php for($i=1;$i<=31;$i++): ?>
                    <option><?php echo e($i); ?></option>
                 <?php endfor; ?>
               </select>
               <select id="selectMonth" onchange="getSelectedBirth();">
                <option>Month</option>
                 <?php for($i=1;$i<=12;$i++): ?>
                    <option><?php echo e($i); ?></option>
                 <?php endfor; ?>
               </select>
               <select id="selectYear" onchange="getSelectedBirth();">
                 <option>Year</option>
                 <?php for($i=2017;$i>=1800;$i--): ?>
                    <option><?php echo e($i); ?></option>
                 <?php endfor; ?>
               </select>
               <input type="text" name="age" placeholder="Age" <?php echo e($errors->has('age') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('age')); ?>" >
               <input type="text" id="blood" name="blood" placeholder="Blood Group" <?php echo e($errors->has('blood') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('blood')); ?>" >
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
               <div class="button-shadow">
                   <button type="submit" class="btn">Add Patient</button>
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