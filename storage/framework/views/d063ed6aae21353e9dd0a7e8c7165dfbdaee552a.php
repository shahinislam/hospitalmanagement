<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Bed Allotment List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Bed Number</th>
                      <th>Patient</th>
                      <th>Allotment Date Time</th>
                      <th>Discharge Date Time</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php if(count($bedallotment)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Bed Allotment</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $bedallotment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bedallotment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($bedallotment->id); ?></td>
                   <td><?php echo e($bedallotment->bed_number); ?></td>
                   <td><?php echo e($bedallotment->patient); ?></td>
                   <td><?php echo e($bedallotment->allotment); ?></td>
                   <td><?php echo e($bedallotment->discharge); ?></td>
                   <td><a href="<?php echo e(route('doctor.bedallotment.delete',['bedallotment_id'=>$bedallotment->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Bed Allotment</label>
          <div class="tab-content">
            <form action="<?php echo e(route('doctor.bedallotment.insert')); ?>" method="post">
               <input type="text" id="selectedBedNumber" placeholder="Bed Number" name="bed_number" <?php echo e($errors->has('bed_number') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('bed_number')); ?>" >
               <select id="selectBedNumber"  onchange="getSelectedBedNumber();">
                   <option>Bed Number</option>
                 <?php $__currentLoopData = $bed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option><?php echo e($bed->bed_number); ?> - <?php echo e($bed->bed_type); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>

               <input type="text" id="selectedPatient" placeholder="Patient" name="patient" <?php echo e($errors->has('patient') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('patient')); ?>" >
               <select id="selectPatient"  onchange="getSelectedPatient();">
                   <option>Patient Name</option>
                 <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option><?php echo e($patient->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>

               <input type="text" placeholder="Allotment Time" name="allotment" <?php echo e($errors->has('allotment') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('allotment')); ?>" >

               <input type="text" placeholder="Discharge Time" name="discharge" <?php echo e($errors->has('discharge') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('discharge')); ?>" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Bed Allotment</button>
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