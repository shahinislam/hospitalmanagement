<?php $__env->startSection('styles'); ?>
       <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <ul class="tabs">
        <li>
          <input type="radio" name="tabs" id="tab-1" checked>
          <label for="tab-1">Noticeboard List</label>
          <div class="tab-content">
            <table class="datalist">
               <thead>
                   <tr>
                      <th class="number">#</th>
                      <th>Title</th>
                      <th>Notice</th>
                      <th>Date</th>
                      <th>Options</th>
                   </tr>
               </thead>
               <tbody> 
                 <?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php if(count($notice)==0): ?>
                         <tr>
                             <td class="no_item" colspan="7" style="text-align:center;">No Notice</td>
                         </tr>
                     <?php endif; ?>
                  <?php $__currentLoopData = $notice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                   <td class="number"><?php echo e($notice->id); ?></td>
                   <td><?php echo e($notice->title); ?></td>
                   <td><?php echo e($notice->notice); ?></td>
                   <td><?php echo e($notice->date); ?></td>
                   <td><a href="<?php echo e(route('delete.notice',['notice_id'=>$notice->id])); ?>" class="danger">Delete</a></td>
                   </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab-2">
          <label for="tab-2">+Add Noticeboard</label>
          <div class="tab-content">
             <form action="<?php echo e(route('insert.notice')); ?>" method="post">
               <input type="text" name="title" placeholder="Title" <?php echo e($errors->has('title') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('title')); ?>" >
               <textarea name="notice" placeholder="Notice" <?php echo e($errors->has('notice') ? 'class=has-error' : ''); ?>><?php echo e(Request::old('notice')); ?></textarea>
               <input type="text" name="date" placeholder="date" <?php echo e($errors->has('password') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('date')); ?>" >

               <div class="button-shadow">
                   <button type="submit" class="btn">Add Noticeboard</button>
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