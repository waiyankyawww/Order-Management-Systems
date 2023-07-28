<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Employee'); ?>

<?php $__env->startSection('contents'); ?>
    <!-- Page Container START -->
    <div class="page-container">


        <!-- Content Wrapper START -->
        <div class="main-content">
            <div class="page-header no-gutters has-tab">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <h4>Edit Employee</h4>

            </div>
            <div class="container-fluid">
                <?php
                    //dd(route('employees.update'));
                ?>
                <form method="POST" action="<?php echo e(route('employee-update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name"> Name</label>
                            <input type="text" class="form-control" id="name" placeholder="employee Name" name="name" required
                                value="<?php echo e($employee->name); ?>">
                            <input type="hidden" name="id" value="<?php echo e($employee->id); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Employee position</label>
                            <div class="m-b-15">
                                <select class="select2" name="position" id="position" required>
                                    <?php
                                        $employee_positions = ['Supervisor','Chef','Waiter'];
                                    ?>
                                    <?php $__currentLoopData = $employee_positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($employee_position); ?>"><?php echo e($employee_position); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Organization Name</label>
                            <input type="text" class="form-control" id="name" name="org_name" value="<?php echo e($employee->org_name); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <div class="d-flex align-items-center" onchange="timeFunction()">
                                    <div class="col-md-4">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" class="form-control datepicker-input" name="start_time" >
                                    </div>
                                    <div class="col-md-2 pt-4 d-flex justify-content-center">to</div>
                                    <div class="col-md-4">
                                        <label for="end_time">End Time</label>
                                        <input type="time" class="form-control datepicker-input" name="end_time">
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" class="form-control" id="phone_number" placeholder="Phone Number"
                                name="phone_number" required value="<?php echo e($employee->phone_number); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required
                                value="<?php echo e($employee->email); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="nrc_no">No</label>
                            <div class="m-b-15">
                                <select class="select2" name="nrc_no" id="nrc_no" required>
                                    <?php for($i = 1; $i <= 14; $i++): ?>
                                        <?php if($employee->nrc_no == $i): ?>
                                            <option value="<?php echo e($i); ?>" selected><?php echo e($i); ?> /</option>
                                        <?php else: ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?> /</option>
                                        <?php endif; ?>

                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nrc_location">Location</label>
                            <div class="m-b-15">
                                <select class="select2" name="nrc_location" id="nrc_location" required>
                                    <?php $__currentLoopData = $nrc_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nrc_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($employee->nrc_location == $nrc_number->prefix_en): ?>
                                            <option value="<?php echo e($nrc_number->prefix_en); ?>" selected>
                                                <?php echo e($nrc_number->prefix_en); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($nrc_number->prefix_en); ?>"><?php echo e($nrc_number->prefix_en); ?>

                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <?php
                                $nrc_types = ['N', 'E', 'P', 'A', 'F', 'TH', 'G'];
                            ?>
                            <label for="inputState">Type</label>
                            <select id="inputState" class="form-control" name="nrc_type" required>
                                <?php $__currentLoopData = $nrc_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nrc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nrc_type == $employee->nrc_type): ?>
                                        <option value="(<?php echo e($nrc_type); ?>)" selected>(<?php echo e($nrc_type); ?>)</option>
                                    <?php else: ?>
                                        <option value="(<?php echo e($nrc_type); ?>)">(<?php echo e($nrc_type); ?>)</option>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nrc_number">Number</label>
                            <input type="number" class="form-control" id="nrc_number" placeholder="NRC Number"
                                name="nrc_number" required value="<?php echo e($employee->nrc_number); ?>">
                        </div>
                    </div>                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Apartment, studio, or floor" name="address" required value="<?php echo e($employee->address); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">State</label>
                        <div class="m-b-15">
                            <select class="select2" name="state" id="state" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->code); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>    
                    </div>
                    <div class="col-md-3">
                        <label for="city">City/Township</label>
                        <div class="m-b-15">
                            <select class="select2" name="city" id="city" required>
                            </select>                                           
                        </div>
                    </div>                  
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="name">Branch Id</label>
                        <input type="text" class="form-control" id="name" name="branch_id">
                    </div>
                    <div class="form-group col-md-6">
                        
                        <strong>Image:</strong>
                        <input type="file" name="logo" class="form-control" placeholder="image" id="logo">
                        
                    </div>
                </div>
                
                
                <button class="btn btn-primary" type="submit">
                    Update
                </button>
                <button class="btn btn-danger btn-tone m-r-5" type="reset">Clear</button>
            </div>
            <!-- Button trigger modal -->

            </form>
        </div>
    </div>

    <!-- Modal -->

    <!-- Content Wrapper END -->

    <!-- Footer START -->
    <footer class="footer">
        <div class="footer-content">
            <p class="m-b-3">Copyright © 2021 Xsphere. All rights reserved.</p>
            <span>
                <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
            </span>
        </div>
    </footer>
    <!-- Footer END -->

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Your Action</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this Employee?
                    <input type="hidden" name="delete_id" id="delete_id">
                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger confirm_delete" id="confirm_delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Container END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!-- Core Vendors JS -->
    
    <!-- page js -->
    <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script> --}}

    <!-- Core JS -->
    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
    <script>
        $('#data-table-add').DataTable();
        $('#data-table-list').DataTable();
        $('#data-table-delete').DataTable();
        $('.select2').select2();
    </script>

    <script>
        // accessing townships and cities js
        $('#state').on('change', function() {
             console.log(this.value);
            var state_id = this.value;
            $.ajax({
                url: "<?php echo e(route('getTownship')); ?>",
                type: "GET",
                data: {
                    "state_id": state_id,
                },
                cache: false,

                success: function(result) {
                    if (result) {
                        $("#city").empty();
                        $.each(result, function(key, value) {
                            $("#city").append('<option value="' + key + '">' + value.name +
                                '</option>');
                            // console.log(key,value);
                        });
                    } else {
                        $("#city").empty();
                    }
                }
            });
        });

        $('#logo').on('change', function() {
            var fileName = $(this).val();
            var finalPath = fileName.split("\\")
            $(this).next('.custom-file-label').html(finalPath[finalPath.length - 1]);
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/edit-employee.blade.php ENDPATH**/ ?>