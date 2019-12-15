<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Prescription List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Medication</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php if(count($prescription)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Prescription</td>
                         </tr>
                  <?php endif; ?>
                  <?php $__currentLoopData = $prescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($prescription->id); ?></td>
                   <td><?php echo e($prescription->date); ?></td>
                   <td><?php echo e($prescription->patient); ?></td>
                   <td><?php echo e($prescription->doctor); ?></td>
                   <td><?php echo e($prescription->medication); ?></td>
                   <td><a href="<?php echo e(route('doctor.prescription.delete',['prescription_id'=>$prescription->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Prescription</label>
          <div class="tab-content">
            <form action="<?php echo e(route('doctor.prescription.insert')); ?>" method="post">
               <input type="text" id="selectedDoctor" placeholder="Doctor" name="doctor" <?php echo e($errors->has('doctor') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('doctor')); ?>" >
               <select id="selectDoctor"  onchange="getSelectedDoctor();">
                   <option>Name Of Doctor</option>
                 <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option><?php echo e($doctor->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>

               <input type="text" id="selectedPatient" placeholder="Patient" name="patient" <?php echo e($errors->has('patient') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('patient')); ?>" >
               <select id="selectPatient"  onchange="getSelectedPatient();">
                   <option>Patient Name</option>
                 <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option><?php echo e($patient->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>

               <textarea  placeholder="Case History" name="case" <?php echo e($errors->has('case') ? 'class=has-error' : ''); ?>><?php echo e(Request::old('case')); ?></textarea>

              <textarea  placeholder="Medication" name="medication" <?php echo e($errors->has('medication') ? 'class=has-error' : ''); ?>><?php echo e(Request::old('medication')); ?></textarea>

               <textarea  placeholder="Description" name="description" <?php echo e($errors->has('description') ? 'class=has-error' : ''); ?>><?php echo e(Request::old('description')); ?></textarea>

               <input type="text" placeholder="Date" name="date" <?php echo e($errors->has('date') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('date')); ?>" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Prescription</button>
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