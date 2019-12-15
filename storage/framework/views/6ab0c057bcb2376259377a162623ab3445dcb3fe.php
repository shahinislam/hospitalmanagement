<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs" id="managereport">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Operation</label>
          <div class="tab-content">
               <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     <?php if(count($operation)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Operation</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $operation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($operation->id); ?></td>
                   <td><?php echo e($operation->description); ?></td>
                   <td><?php echo e($operation->date); ?></td>
                   <td><?php echo e($operation->patient); ?></td>
                   <td><?php echo e($operation->doctor); ?></td>
                   <td><a href="<?php echo e(route('doctor.report.delete',['report_id'=>$operation->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">Birth</label>
          <div class="tab-content">
               <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     <?php if(count($birth)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Birth Report</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $birth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $birth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($birth->id); ?></td>
                   <td><?php echo e($birth->description); ?></td>
                   <td><?php echo e($birth->date); ?></td>
                   <td><?php echo e($birth->patient); ?></td>
                   <td><?php echo e($birth->doctor); ?></td>
                   <td><a href="<?php echo e(route('doctor.report.delete',['report_id'=>$birth->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-3">
          <label for="tab-3">Death</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     <?php if(count($death)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Death Report</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $death; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $death): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($death->id); ?></td>
                   <td><?php echo e($death->description); ?></td>
                   <td><?php echo e($death->date); ?></td>
                   <td><?php echo e($death->patient); ?></td>
                   <td><?php echo e($death->doctor); ?></td>
                   <td><a href="<?php echo e(route('doctor.report.delete',['report_id'=>$death->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-4">
          <label for="tab-4">Other</label>
          <div class="tab-content">
              <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     <?php if(count($other)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Other Report</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($other->id); ?></td>
                   <td><?php echo e($other->description); ?></td>
                   <td><?php echo e($other->date); ?></td>
                   <td><?php echo e($other->patient); ?></td>
                   <td><?php echo e($other->doctor); ?></td>
                   <td><a href="<?php echo e(route('doctor.report.delete',['report_id'=>$other->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-5">
          <label for="tab-5">+Add Report</label>
          <div class="tab-content">
              <form action="<?php echo e(route('doctor.report.insert')); ?>" method="post">
                  <input id="selectedManageReport" type="text" name="type" placeholder="Manage Type" <?php echo e($errors->has('type') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('type')); ?>" >
                  <select id="selectManageReport" onchange="getSelectedManageReport();">
                        <option>Select Type</option>
                        <option>Operation</option>
                        <option>Birth</option>
                        <option>Death</option>
                        <option>Other</option>
                  </select>
                  <input type="text" name="description" placeholder="Description" <?php echo e($errors->has('description') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('description')); ?>" >

                  <input type="text" name="date" placeholder="Date" <?php echo e($errors->has('date') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('date')); ?>" >

                  <input type="text" placeholder="Doctor Name" id="selectedDoctor" name="doctor" <?php echo e($errors->has('doctor') ? 'class=has-error' : ''); ?>>
                 <select id="selectDoctor" onchange="getSelectedDoctor();">
                    <option>Doctor Name</option>
                    
                    <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($doctor->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>

                 <input type="text" placeholder="Patient Name" id="selectedPatient" name="patient" <?php echo e($errors->has('patient') ? 'class=has-error' : ''); ?>>
                 <select id="selectPatient" onchange="getSelectedPatient();">
                    <option>Patient Name</option>
                    <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($patient->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>

                 <div class="button-shadow">
                   <button type="submit" class="btn">Add Report</button>
               </div>
               <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

              </form>
          </div>
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