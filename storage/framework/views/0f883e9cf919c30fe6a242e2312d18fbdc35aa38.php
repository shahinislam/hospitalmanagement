<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Accountant area</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/design.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/MainContent.css')); ?>">
	<?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('includes_accountant.accountant-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes_accountant.accountant-navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('section-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    
    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">
    	var baseUrl="<?php echo e(URL::to('/')); ?>";
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>