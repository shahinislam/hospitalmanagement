<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Appointment List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody>
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php if(count($appointment)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Appointment</td>
                         </tr>
                  <?php endif; ?>
                  <?php $__currentLoopData = $appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($appointment->id); ?></td>
                   <td><?php echo e($appointment->date); ?></td>
                   <td><?php echo e($appointment->patient); ?></td>
                   <td><?php echo e($appointment->doctor); ?></td>
                   <td><a href="<?php echo e(route('doctor.appointment.delete',['appointment_id'=>$appointment->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Appointment</label>
          <div class="tab-content">
             <form action="<?php echo e(route('doctor.appointment.insert')); ?>" method="post">
                 <input type="text" name="doctor" <?php echo e($errors->has('doctor') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('doctor') ? Request::old('doctor') : isset($doctor) ? $doctor->name : ''); ?>" >

                 <input type="text" placeholder="Patient Name" id="selectedPatient" name="patient" <?php echo e($errors->has('patient') ? 'class=has-error' : ''); ?>>
                 <select id="selectPatient" onchange="getSelectedPatient();">
                    <option>Patient Name</option>
                    <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($patient->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>

                 <input type="text" placeholder="Date" name="date" <?php echo e($errors->has('doctor') ? 'class=has-error' : ''); ?>>

                 <div class="button-shadow">
                   <button type="submit" class="btn">Add Appointment</button>
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