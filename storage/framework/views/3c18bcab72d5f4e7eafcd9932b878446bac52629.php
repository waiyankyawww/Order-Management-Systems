<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Manager'); ?>

<?php $__env->startSection('contents'); ?>
   <!-- Page Container START -->
   <div class="page-container">          

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header no-gutters has-tab">
            <div class="page-header no-gutters has-tab">    <!-- noti actions  -->         
                <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo e(session()->get('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>       
            <ul class="nav nav-tabs" >
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#list">Manager List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#add">Add New Manager</a>
                </li>
                <li class="nav-item" id="fetchDeleteManagers">
                    <a class="nav-link" data-toggle="tab" href="#delete">Delete List</a>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="list" >
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                
                                <div class="col-lg-12 text-right">
                                    <a href="<?php echo e(route('managersExport')); ?>">
                                    <button class="btn btn-primary" id="eButton">
                                        
                                        <i class="anticon anticon-file-excel m-r-5"></i>
                                        <span>Export</span>
                                    </button>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover e-commerce-table" id="data-table-list">
                                    <thead>
                                        <tr>                                          
                                            <th>No</th>
                                            <th>Manager Name</th>
                                            <th>Manager Code</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                    ?>
                                    <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        ++$i;
                                    ?>
                                        
                                        <tr id="hidearea_<?php echo e($manager->id); ?>">
                                            <td>
                                                <?php echo e($i); ?>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-b-0"><a href='<?php echo e(url("manager/profile-detail/$manager->id")); ?>'>
                                                        <?php echo e($manager->name); ?>

                                                    </h6>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?php echo e($manager->code); ?></td>
                                            <td><?php echo e($manager->phone_number); ?></td>
                                            <td>
                                                <?php echo e($manager->email); ?>

                                            </td>
                                            
                                            <td class="text-right">
                                                <a href="<?php echo e(url("managers/$manager->id/edit")); ?>">
                                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" style="font-size: 17px;">
                                                        <i class="anticon anticon-edit"  style="color: blue;"></i>
                                                    </button>
                                                </a>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded delete_manager" data-toggle="modal" data-target="#exampleModal" id="<?php echo e($manager->id); ?>" style="font-size: 17px;">
                                                    <i class="anticon anticon-delete" style="color: red;"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="tab-pane fade" id="add" >
                    <div class="card">
                        <div class="card-body">
                            
                            <form method="POST" action="<?php echo e(route('confirm-add-manager')); ?>" enctype="multipart/form-data" id="form-validation" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Manager Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Manager Name" name="name">
                                        <input type="hidden" value="manager" name="page" id="page">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="code">Manager Code</label>
                                        
                                        <input type="number" class="form-control" id="code" placeholder="Manager Code" name="code" value="<?php echo e($code); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="code">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="nrc_no">No</label>
                                        <div class="m-b-15">
                                            <select class="select2" name="nrc_no" id="nrc_no" required>
                                                <?php for($i = 1; $i <= 14; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?> /</option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="nrc_location">Location</label>
                                        <div class="m-b-15">
                                            <select class="select2" name="nrc_location" id="nrc_location">
                                                <?php $__currentLoopData = $nrc_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nrc_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($nrc_number->prefix_en); ?>"><?php echo e($nrc_number->prefix_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="form-group col-md-2">
                                        <?php
                                            $nrc_types = ['N','E','P','A','F','TH','G'];
                                        ?>
                                        <label for="inputState">Type</label>
                                        <select id="inputState" class="select2" name="nrc_type">
                                            <?php $__currentLoopData = $nrc_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nrc_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="(<?php echo e($nrc_type); ?>)">(<?php echo e($nrc_type); ?>)</option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nrc_number">Number</label>
                                        <input type="number" class="form-control" id="nrc_number" placeholder="NRC Number" name="nrc_number">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="repassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="repassword" placeholder="Confirm Password" name="repassword">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Apartment, studio, or floor" name="address">
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
                                        <strong>Image:</strong>
                                        <input type="file" name="logo" class="form-control" placeholder="image" id="logo" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary add_owner m-r-5" type="submit">
                                   Add Manager
                                </button>
                                <button class="btn btn-danger btn-tone" type="reset">Clear</button>
                            </div>
                            <!-- Button trigger modal -->

                        </form>
                    </div>
                    
                    
                </div>
                <div class="tab-pane fade" id="delete" >
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-lg-8">
                                    <div class="d-md-flex">
                                        <div class="m-b-10">
                                            <select class="custom-select" style="min-width: 180px;">
                                                <option selected>Status</option>
                                                <option value="all">All</option>
                                                <option value="approved">Approved</option>
                                                <option value="pending">Pending</option>
                                                <option value="rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-primary">
                                        <i class="anticon anticon-file-excel m-r-5"></i>
                                        <span>Export</span>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover e-commerce-table" id="data-table-delete">
                                    <thead>
                                        <tr>
                                            
                                            <th>No</th>
                                            <th>Manager Name</th>
                                            <th>Manager Code</th>
                                            <th>Phone Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_delete_managers">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>            
    </div>



    <!-- Content Wrapper END -->

    <!-- Footer START -->
    <footer class="footer">
        <div class="footer-content">
            <p class="m-b-0">Copyright © 2021 Xsphere. All rights reserved.</p>
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
                Are you sure to delete this manager?
                <input type="hidden" name="delete_id" id="delete_id">
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
    
    <!-- page js -->
    
    
    <!-- page js -->
    <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>


    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

   
    <!-- Core JS -->
    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
    <script>
        $('#data-table-add').DataTable();
        $('#data-table-list').DataTable();
        $('#data-table-delete').DataTable();
        $('.select2').select2();
    </script>

<script>

    $( "#form-validation" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        name: {
            required: true
        },
        phone_number: {
            required: true,
        },
        nrc_number: {
            required: true,
            maxlength: 6
        }, 
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 6
        },
        repassword: {
            required: true,
            equalTo: '#password'
        },
        address: {
            required: true,
        },
        org_name: {
            required: true,
        },
        main_address: {
            required: true,
            
        }
    }
    });
</script>

<script>
    $('.delete_manager').click(function(){
    var delete_id = this.id;
    
    //console.log(product_id);
    $("#delete_id").val(delete_id);
    
});
</script>

    <script>
        $('#confirm_delete').click(function(){
        // console.log("nyi nyi");
        var id = $('[name="delete_id"]').val();
        // console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");
        $("#exampleModal").modal('hide');
        
            $.ajax({
                url: "<?php echo e(route('manager-delete')); ?>",
                method: "GET",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (data) {         
                    $('#hidearea_'+id).remove();
                    window.location.reload();
                },
                error: function (response) {
                    alert("Something Wrong")
                }
            });
    
    });

    $('#fetchDeleteManagers').click(function(){
        $.ajax({
            url: "<?php echo e(route('getDeleteManager')); ?>",
            method: "GET",
            success: function (data) {
                // console.log(data);
                var table = $("#data-table-delete").DataTable();
                table.clear();
                $.each(data, function(i, item) {
                    
                    openPage = function(id) {
                        location.href ="<?php echo e(url('manager')); ?>/"+id+"/restore";
                    }
                    var restore = '<a href="javascript:openPage(' + data[i].id + ')"><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" style="font-size: 19px;"><i class="anticon anticon-redo"  style="color: green; size:""></i></button></a>';
                    table.row.add([ data[i].id, data[i].name, data[i].code, data[i].phone_number, restore]);
                    table.draw();
                    });
            },
            error: function (response) {
                alert("Something Wrong")
            }
        });
    });
    </script>

<script>                                    // accessing townships and cities js
    $('#state').on('change', function() {
        console.log(this.value);
        var state_id = this.value;
        $.ajax({
            url: "<?php echo e(route('getTownship')); ?>",
            type: "GET",
            data: {
                "state_id" : state_id,
            },
            cache: false,

            success: function(result){
                if(result){
                    $("#city").empty();
                    $.each(result,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value.name+'</option>');
                        // console.log(key,value);
                    });
                }else{
                    $("#city").empty();
                }
            }
        });
    });
</script>


    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/manager-list.blade.php ENDPATH**/ ?>