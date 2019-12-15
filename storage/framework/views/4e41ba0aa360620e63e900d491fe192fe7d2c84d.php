<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/home.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
	
	<title>
		Hospital Management System
	</title>

</head>
<body>
        <div class="head">
            <h1>Hospital Management System</h1>
        </div>
         
        <div class="notification"><?php echo $__env->make('info-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>

        <center class="login">

	        <select class="sel" id="list" onchange="getSelectedValue();">
	            <option value="">Account Login Type</option>
	        	<option value="admin">Admin</option>
	        	<option value="doctor">Doctor</option>
	        	<option value="patient">Patient</option>
	        	<option value="nurse">Nurse</option>
	        	<option value="pharmacist">Pharmacist</option>
	        	<option value="laboratorist">Laboratorist</option>
	        	<option value="accountant">Accountant</option>
	        </select>

			<script>
			    function getSelectedValue(){
					var selectedValue=document.getElementById("list").value;
					document.getElementById("option").value=selectedValue;
				}
			</script>

		    <form action="<?php echo e(route('account.login')); ?>" method="post">
		    	<input type="text" name="email" placeholder="Email"  <?php echo e($errors->has('email') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('email')); ?>" >
		    	<input type="password" name="password" placeholder="Password"  <?php echo e($errors->has('password') ? 'class=has-error' : ''); ?>  value="<?php echo e(Request::old('password')); ?>" >
				<input type="hidden" name="selected" id="option"  value="<?php echo e(Request::old('selected')); ?>" >
		    	<button type="submit">Login</button>
		    	<script>
		    	     var selectedValue=document.getElementById("option").value;
			         document.getElementById("list").value=selectedValue;
			    </script>
		    	<div>Email: test@test.com | Password: test_pw</div>
		    	<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>" />
		    </form>

        </center>
        
        <div class="develop">
             <ul class="footer">
             	<li><center>&#169 2017 Hospital Management System-</center></li>
             	<li><center>Developed and Design By</center></li>
             	<li><center>Shahinur Islam (Reg:2012331527)</center></li>
		     	<li><center>Abu Bakar Siddique (Reg:2012331517)</center></li>
		     	<li><center>Salimul Haque (Reg:2012331524)</center></li>
		     </ul>
        </div>
</body>
</html>