<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Profile'); ?>

<?php $__env->startSection('contents'); ?>

<!-- Page Container START -->
<div class="page-container">
                
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h1 class="header-title">Profile</h1>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <div class="d-md-flex align-items-center">
                                <div class="text-center text-sm-left ">
                                    <div class="avatar avatar-image" style="width: 150px; height:150px">
                                        <img src="<?php echo e(asset('profiles/employees/'.$employee->logo)); ?>" alt="me" style="object-fit: cover;">
                                        
                                    </div>
                                </div>
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5"><?php echo e($employee->name); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="<?php echo e(url("employee/$employee->id/edit")); ?>">
                                <button class="btn btn-default btn-lg btn-success">
                                    Edit
                                </button>
                            </a>
                            <button class="btn btn-default btn-lg btn-danger delete_employee" data-toggle="modal" data-target="#exampleModal" id="<?php echo e($employee->id); ?>">
                                Delete
                            </button>


                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Details</h5>
                            
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled m-t-10">
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                <span>Email: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->email); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                <span>Phone: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->phone_number); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-idcard"></i>
                                                <span>NRC: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"><?php echo e($employee->nrc_no); ?> / <?php echo e($employee->nrc_type); ?> / <?php echo e($employee->nrc_number); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-environment"></i>
                                                <span>Address: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->address); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-environment"></i>
                                                <span>City: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->city); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-environment"></i>
                                                <span>State: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->state); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-global"></i>
                                                <span>Position: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->position); ?></p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-global"></i>
                                                <span>Organization Name: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> <?php echo e($employee->org_name); ?></p>
                                        </li>   
                                        
                                                        
                                                   
                                        
                                    </ul>
                                    
                                </div>
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
                Are you sure to delete this employee?
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

<!-- Core JS -->
<script src="<?php echo e(asset('js/app.min.js')); ?>"></script>

<script>
    $('.delete_employee').click(function(){
    var delete_id = this.id;
    
    //console.log(product_id);
    $("#delete_id").val(delete_id);
    
});
</script>

<script>
    $('#confirm_delete').click(function(){
        //console.log("nyi nyi");
        var id = $('[name="delete_id"]').val();
        var token = $("meta[name='csrf-token']").attr("content");
        $("#exampleModal").modal('hide');


            $.ajax({
                url: "<?php echo e(route('employee-delete')); ?>",
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
                        alert("Something Wrong") // I'm always get this.
                    }
            });
    
    });
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/employee-profile.blade.php ENDPATH**/ ?>