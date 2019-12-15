<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
      'uses'=>'homeController@getHome',
      'as'=>'home.index'
]);

Route::post('/',[
		'uses'=>'homeController@postLogin',
		'as'=>'account.login'
]);

Route::group(['prefix'=>'/admin','middleware'=>'auth'], function(){

		Route::get('/',[
			'uses'=>'adminController@getLogout',
			'as'=>'admin.logout'
		]);

       Route::get('/dashboard',[
	      'uses'=>'adminController@getAdminDashboard',
	      'as'=>'admin.dashboard'
       ]);

       Route::get('/department',[
	      'uses'=>'adminController@getAdminDepartment',
	      'as'=>'admin.department'
       ]);

       Route::post('/department',[
	      'uses'=>'adminController@postAdminDepartment',
	      'as'=>'insert.department'
       ]);
        
       Route::get('/department/{department_id}',[
	      'uses'=>'adminController@getDeleteDepartment',
	      'as'=>'delete.department'
       ]);

       Route::get('/doctor',[
	      'uses'=>'adminController@getAdminDoctor',
	      'as'=>'admin.doctor'
       ]);

       Route::post('/doctor',[
	      'uses'=>'adminController@postAdminDoctor',
	      'as'=>'insert.doctor'
       ]);
       
       Route::get('/doctor/{doctor_id}/{doctor_email}',[
	      'uses'=>'adminController@getDeleteDoctor',
	      'as'=>'delete.doctor'
       ]);

       Route::get('/patient',[
	      'uses'=>'adminController@getAdminPatient',
	      'as'=>'admin.patient'
       ]);

       Route::post('/patient',[
	      'uses'=>'adminController@postAdminPatient',
	      'as'=>'insert.patient'
       ]);
       
       Route::get('/patient/{patient_id}/{patient_email}',[
	      'uses'=>'adminController@getDeletePatient',
	      'as'=>'delete.patient'
       ]);

       /* Nurse */

       Route::get('/nurse',[
	      'uses'=>'adminController@getAdminNurse',
	      'as'=>'admin.nurse'
       ]);

       Route::post('/nurse',[
	      'uses'=>'adminController@postAdminNurse',
	      'as'=>'insert.nurse'
       ]);
       
       Route::get('/nurse/{nurse_id}/{nurse_email}',[
	      'uses'=>'adminController@getDeleteNurse',
	      'as'=>'delete.nurse'
       ]);

       /* Pharmacist */

       Route::get('/pharmacist',[
	      'uses'=>'adminController@getAdminPharmacist',
	      'as'=>'admin.pharmacist'
       ]);

       Route::post('/pharmacist',[
	      'uses'=>'adminController@postAdminPharmacist',
	      'as'=>'insert.pharmacist'
       ]);
       
       Route::get('/pharmacist/{pharmacist_id}/{pharmacist_email}',[
	      'uses'=>'adminController@getDeletePharmacist',
	      'as'=>'delete.pharmacist'
       ]);

       /* Laboratorist */

       Route::get('/laboratorist',[
	      'uses'=>'adminController@getAdminLaboratorist',
	      'as'=>'admin.laboratorist'
       ]);

       Route::post('/laboratorist',[
	      'uses'=>'adminController@postAdminLaboratorist',
	      'as'=>'insert.laboratorist'
       ]);
       
       Route::get('/laboratorist/{laboratorist_id}/{laboratorist_email}',[
	      'uses'=>'adminController@getDeleteLaboratorist',
	      'as'=>'delete.laboratorist'
       ]);

       /* Accountant */

       Route::get('/accountant',[
	      'uses'=>'adminController@getAdminAccountant',
	      'as'=>'admin.accountant'
       ]);

       Route::post('/accountant',[
	      'uses'=>'adminController@postAdminAccountant',
	      'as'=>'insert.accountant'
       ]);
       
       Route::get('/accountant/{accountant_id}/{accountant_email}',[
	      'uses'=>'adminController@getDeleteAccountant',
	      'as'=>'delete.accountant'
       ]);

       /* NoticeBoard */

       Route::get('/noticeboard',[
	      'uses'=>'adminController@getAdminNotice',
	      'as'=>'admin.notice'
       ]);

       Route::post('/noticeboard',[
	      'uses'=>'adminController@postAdminNotice',
	      'as'=>'insert.notice'
       ]);
       
       Route::get('/noticeboard/{notice_id}',[
	      'uses'=>'adminController@getDeleteNotice',
	      'as'=>'delete.notice'
       ]);

       /* Profile */

       Route::get('/profile',[
            'uses'=>'adminController@getAdminProfile',
            'as'=>'admin.profile'
       ]);

       Route::post('/profile',[
            'uses'=>'adminController@postAdminUpdateProfile',
            'as'=>'update.profile'
       ]);

       
});


/* Doctors Route */

Route::group(['prefix'=>'/doctor','middleware'=>'auth'], function(){

      Route::get('/',[
             'uses'=>'doctorController@getLogout',
             'as'=>'doctor.logout'
      ]);
      
       Route::get('/dashboard',[
            'uses'=>'doctorController@getDoctorDashboard',
            'as'=>'doctor.dashboard'
      ]);

      /* Patient */

      Route::get('/patient',[
            'uses'=>'doctorController@getDoctorPatient',
            'as'=>'doctor.patient'
      ]);

      Route::post('/patient',[
            'uses'=>'doctorController@postDoctorPatient',
            'as'=>'doctor.patient.insert'
       ]);
       
       Route::get('/patient/{patient_id}/{patient_email}',[
            'uses'=>'doctorController@getDeletePatient',
            'as'=>'doctor.patient.delete'
       ]);

       /* Manage Appointment */

      Route::get('/appointment',[
            'uses'=>'doctorController@getDoctorAppointment',
            'as'=>'doctor.appointment'
      ]);

      Route::post('/appointment',[
            'uses'=>'doctorController@postDoctorAppointment',
            'as'=>'doctor.appointment.insert'
       ]);
       
       Route::get('/appointment/{appointment_id}',[
            'uses'=>'doctorController@getDeleteAppointment',
            'as'=>'doctor.appointment.delete'
       ]);

       /* Prescription */

      Route::get('/prescription',[
            'uses'=>'doctorController@getDoctorPrescription',
            'as'=>'doctor.prescription'
      ]);

      Route::post('/prescription',[
            'uses'=>'doctorController@postDoctorPrescription',
            'as'=>'doctor.prescription.insert'
       ]);
       
       Route::get('/prescription/{prescription_id}',[
            'uses'=>'doctorController@getDeletePrescription',
            'as'=>'doctor.prescription.delete'
       ]);

        /* Bed Allotment */

      Route::get('/bedallotment',[
            'uses'=>'doctorController@getDoctorBedallotment',
            'as'=>'doctor.bedallotment'
      ]);

      Route::post('/bedallotment',[
            'uses'=>'doctorController@postDoctorBedAllotment',
            'as'=>'doctor.bedallotment.insert'
       ]);
       
       Route::get('/bedallotment/{bedallotment_id}',[
            'uses'=>'doctorController@getDeleteBedallotment',
            'as'=>'doctor.bedallotment.delete'
       ]);

        /* Bed Allotment */

      Route::get('/bloodbank',[
            'uses'=>'doctorController@getDoctorBloodBank',
            'as'=>'doctor.bloodbank'
      ]);

      Route::post('/bloodbank',[
            'uses'=>'doctorController@postDoctorBloodBank',
            'as'=>'doctor.bloodbank.insert'
       ]);
       
       Route::get('/bloodbank/{bloodbank_id}',[
            'uses'=>'doctorController@getDeleteBloodBank',
            'as'=>'doctor.bloodbank.delete'
       ]);

       /* Manage Report */

      Route::get('/managereport',[
            'uses'=>'doctorController@getDoctorManageReport',
            'as'=>'doctor.managereport'
      ]);

      Route::post('/managereport',[
            'uses'=>'doctorController@postDoctorManageReport',
            'as'=>'doctor.report.insert'
       ]);
       
       Route::get('/managereport/{report_id}',[
            'uses'=>'doctorController@getDeleteManageReport',
            'as'=>'doctor.report.delete'
       ]);

       /* Profile */

       Route::get('/profile',[
            'uses'=>'doctorController@getDoctorProfile',
            'as'=>'doctor.profile'
       ]);

       Route::post('/profile',[
            'uses'=>'doctorController@postDoctorUpdateProfile',
            'as'=>'doctor.update.profile'
       ]);

});

Route::group(['prefix'=>'/patient','middleware'=>'auth'], function(){
      
      Route::get('/',[
             'uses'=>'patientController@getLogout',
             'as'=>'patient.logout'
      ]);
      
       Route::get('/dashboard',[
            'uses'=>'patientController@getPatientDashboard',
            'as'=>'patient.dashboard'
      ]);
});

Route::group(['prefix'=>'/nurse','middleware'=>'auth'], function(){
      
      Route::get('/',[
             'uses'=>'nurseController@getLogout',
             'as'=>'nurse.logout'
      ]);
      
       Route::get('/dashboard',[
            'uses'=>'nurseController@getNurseDashboard',
            'as'=>'nurse.dashboard'
      ]);
});

Route::group(['prefix'=>'/pharmacist','middleware'=>'auth'], function(){
      
      Route::get('/',[
             'uses'=>'pharmacistController@getLogout',
             'as'=>'pharmacist.logout'
      ]);
      
       Route::get('/dashboard',[
            'uses'=>'pharmacistController@getPharmacistDashboard',
            'as'=>'pharmacist.dashboard'
      ]);
});

Route::group(['prefix'=>'/laboratorist','middleware'=>'auth'], function(){
      
      Route::get('/',[
             'uses'=>'laboratoristController@getLogout',
             'as'=>'laboratorist.logout'
      ]);
      
       Route::get('/dashboard',[
            'uses'=>'laboratoristController@getLaboratoristDashboard',
            'as'=>'laboratorist.dashboard'
      ]);
});

Route::group(['prefix'=>'/accountant','middleware'=>'auth'], function(){
      
      Route::get('/',[
             'uses'=>'accountantController@getLogout',
             'as'=>'accountant.logout'
      ]);
      
       Route::get('/dashboard',[
            'uses'=>'accountantController@getAccountantDashboard',
            'as'=>'accountant.dashboard'
      ]);
});