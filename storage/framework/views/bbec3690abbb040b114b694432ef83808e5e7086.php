<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Shop'); ?>

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
                <h4>Edit Shop</h4>

            </div>
            <div class="container-fluid">
                <form method="POST" action="<?php echo e(route('shop-update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Branch Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Branch Name" name="name" required 
                            value="<?php echo e($shop->name); ?>">
                            <input type="hidden" name="id" value="<?php echo e($shop->id); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Organization Name</label>
                            <input type="text" class="form-control" id="name" name="org_name" value="<?php echo e($shop->org_name); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="nrc_no">Format</label>
                            <div class="m-b-15">
                                <select class="form-control" name="open_time" id="open_time" onchange="timeFunction()">
                                    <option value="24">24 Hour</option>
                                    <option value="0">Customize</option>
                                </select>
                            </div>    
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <label>Open Time</label>
                                <div class="d-flex align-items-center">
                                    <input type="time" class="form-control datepicker-input inputDisabled" name="start_time"  disabled id="start_time">
                                    <span class="p-h-10">to</span>
                                    <input type="time" class="form-control datepicker-input inputDisabled" name="end_time"  disabled id="end_time">
                                </div>
                            </div>
                        </div>
                        
                       
                       
                        <div class="form-group col-md-6">
                            <label for="number">Phone number</label>
                            <input type="number" class="form-control" id="phone_number" value="<?php echo e($shop->phone_number); ?>" placeholder="Phone number" name="phone_number" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" value="<?php echo e($shop->address); ?>" placeholder="Apartment, studio, or floor" name="address">
                        </div>
                        <div class="col-md-3">
                            <label for="state">State</label>
                            <div class="m-b-15">
                                <select class="form-control" name="state" id="state" required>
                                        <option value=""></option>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->code); ?>"><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="city">City/Township</label>
                            <div class="m-b-15">
                                <select class="form-control" name="city" id="city" required>
                                </select>                                           
                            </div>  
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <h5>Subscription</h5>
                    </div>   
                    <div class="form-row">   
                        <div class="form-group d-flex align-items-center col-md-3">
                            <div class="switch m-r-10">
                                <input type="checkbox" id="switch-1" name="option1" onchange="Option1()">
                                <label for="switch-1"></label>
                            </div>
                            <label>3 month/25000 MMK per month</label>
                        </div>
                        <div class="form-group d-flex align-items-center col-md-3">
                            <div class="switch m-r-10">
                                <input type="checkbox" id="switch-2" name="option2" onchange="Option2()">
                                <label for="switch-2"></label>
                            </div>
                            <label>6 month/25000 MMK per month</label>
                        </div>
                        <div class="form-group d-flex align-items-center col-md-3">
                            <div class="switch m-r-10">
                                <input type="checkbox" id="switch-3" name="option3" onchange="Option3()">
                                <label for="switch-3"></label>
                            </div>
                            <label>12 month/25000 MMK per month</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="foc_device">FOC</label>
                            <input type="text" class="form-control" id="foc_device" value="3 Devices" name="foc_device" disabled>
                        </div>
                    </div>
                    <div class="form-row">   
                        <div class="form-group col-md-4">
                            <label for="sub_free">Subscription Fee</label>
                            <input type="text" class="form-control" id="sub_fee" placeholder="0 MMK" name="sub_fee" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="new_device">Add New Device</label>
                            <input type="number" class="form-control" id="new_device" placeholder="" name="new_device" onchange="Device()">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Device Fee</label>
                            <input type="text" class="form-control" id="device_fee" placeholder="Device Fee" name="device_fee" placeholder="0 MMK" readonly>
                        </div>
                    </div> 
                    <div class="form-group">
                        <p>
                            <input type="hidden" id="month" name="month">
                            Total Fee : <span id="total_amount">0</span> MMK
                        </p>
                    </div>   
                    <div class="form-group">
                        <h5>Assign Manager</h5>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="manager_id">Manager</label>
                            <select id="manager_id" class="form-control" name="manager_id" required>
                                
                                <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <option value="<?php echo e($manager->id); ?>"><?php echo e($manager->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                            <div class="form-group col-md-3">
                                <a class="" href="" data-toggle="modal" data-target="#exampleModalScrollable"> create new manager</a>
                            </div>
                        
                       
                        
                       
                    </div>
                    <button class="btn btn-primary add_owner m-r-5" type="submit">
                        Confirm
                    </button>
                    <button class="btn btn-danger btn-tone" type="reset">Clear</button>
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
    
    <!-- Page Container END -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <!-- Core Vendors JS -->
    <script src="<?php echo e(asset('js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/select2/select2.min.js')); ?>"></script>
    <!-- page js -->
    <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
   
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

    <script type="text/javascript">

        function timeFunction() {

            var open_time = document.getElementById('open_time');
            var opt = open_time.options[open_time.selectedIndex];
        
            if(opt.value == 24) {

                document.getElementById('start_time').value = '';
                document.getElementById('end_time').value = '';
                document.getElementById('start_time').disabled = true;
                document.getElementById('end_time').disabled = true;
            } else {

                document.getElementById('start_time').disabled = false;
                document.getElementById('end_time').disabled = false;
            }
        }

        function Option1() {

            $('#switch-2').prop('checked', false);
            $('#switch-3').prop('checked', false);

            document.getElementById('sub_fee').value = 75000;
            document.getElementById('month').value = 3;

            var device_amount =  document.getElementById('new_device').value;
            var device_fee = device_amount * 3000 * 3; 
            document.getElementById('device_fee').value = device_fee;

            var total_amount = parseInt(device_fee) + parseInt("75000");
            document.getElementById('total_amount').innerHTML = total_amount;
        }

        function Option2() {

            $('#switch-1').prop('checked', false);
            $('#switch-3').prop('checked', false);

            document.getElementById('sub_fee').value = 150000;
            document.getElementById('month').value = 6;
            
            var device_amount =  document.getElementById('new_device').value;
            var device_fee = device_amount * 3000 * 6; 
            document.getElementById('device_fee').value = device_fee;

            var total_amount = parseInt(device_fee) + parseInt("150000");
            //console.log(total_amount);
            document.getElementById('total_amount').innerHTML = total_amount;
        }

        function Option3() {

            $('#switch-1').prop('checked', false);
            $('#switch-2').prop('checked', false);

            document.getElementById('sub_fee').value = 300000;
            document.getElementById('month').value = 9;

            var device_amount =  document.getElementById('new_device').value;
            var device_fee = device_amount * 3000 * 9; 
            document.getElementById('device_fee').value = device_fee;

            var total_amount = parseInt(device_fee) + parseInt("300000");
            //console.log(total_amount);
            document.getElementById('total_amount').innerHTML = total_amount;
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/edit-shop.blade.php ENDPATH**/ ?>