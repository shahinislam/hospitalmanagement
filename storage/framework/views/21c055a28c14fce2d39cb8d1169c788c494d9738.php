<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/dashboard.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
      
       <table>
              <tr>
                     <th class="heading"><span>i</span>Admin Dashboard</th>
                     <th>Doctor</th>
                     <th>Patient</th>
                     <th>Nurse</th>
              </tr>
              <tr>
                     <td></td>
                     <td>3</td>
                     <td>1</td>
                     <td>2</td>
              </tr>
       </table>
     
       <div class="icon">
       	  <a href=""><img src="icon/doctor.png" width="40" height="40" ><div>Doctor</div></a>
       	  <a href=""><img src="icon/patient.png" width="40" height="40"><div>Patient</div></a>
       	  <a href=""><img src="icon/nurse.png" width="40" height="40"><div>Nurse</div></a>
       	  <a href=""><img src="icon/pharmacist.png" width="40" height="40"><div>Pharmacist</div></a>
       	  <a href=""><img src="icon/laboratorist.png" width="40" height="40"><div>Laboratorist</div></a>
       	  <a href=""><img src="icon/accountant.png" width="40" height="40"><div>Accountant</div></a>
       	  <a href=""><img src="icon/appointment.png" width="40" height="40"><div>Appointment</div></a>
       	  <a href=""><img src="icon/payment.png" width="40" height="40"><div>Payment</div></a>
       	  <a href=""><img src="icon/bloodbank.png" width="40" height="40"><div>Blood Bank</div></a>
       	  <a href=""><img src="icon/medicine.png" width="40" height="40"><div>Medicine</div></a>
       	  <a href=""><img src="icon/operation.png" width="40" height="40"><div>Operation</div></a>
       	  <a href=""><img src="icon/birth.png" width="40" height="40"><div>Birth Report</div></a>
       	  <a href=""><img src="icon/death.png" width="40" height="40"><div>Death Report</div></a>
       	  <a href=""><img src="icon/bed.png" width="40" height="40"><div>Bed Allotment</div></a>
       	  <a href=""><img src="icon/noticeboard.png" width="40" height="40"><div>Notice Board</div></a>
       	  <a href=""><img src="icon/setting.png" width="40" height="40"><div>Settings</div></a>
       	  <a href=""><img src="icon/language.png" width="40" height="40"><div>Language</div></a>
       	  <a href=""><img src="icon/backup.png" width="40" height="40"><div>Backup</div></a>
       </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
       <script type="text/javascript">
       	   var token="<?php echo e(Session::token()); ?>";
       </script>
       <script type="text/javascript" src="<?php echo e(URL::to('js/admin.js')); ?>"></script>
       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>