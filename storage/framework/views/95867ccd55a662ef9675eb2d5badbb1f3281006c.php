<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Campaign'); ?>

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

            <ul class="nav nav-tabs" >
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#list">Campaign List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#add">Add New Campaign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#current">Current Campaign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pending">Pending Campaign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#delete">Delete Campaign</a>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="list" >
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
                                <table class="table table-hover e-commerce-table" id="data-table-list">
                                    <thead>
                                        <tr>

                                            <th>No</th>
                                            <th>Campaign Name</th>
                                            <th>Manager Code</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Township</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <h6 class="m-b-0"></h6>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                             </td>

                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-stop"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded delete_campaign" data-toggle="modal" data-target="#exampleModal" id="">
                                                    <i class="anticon anticon-delete"></i>
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

                            <form method="POST" action="<?php echo e(route('confirm-add-manager')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="shop">Shop</label>
                                        <div class="m-b-15">
                                            <select class="select2" name="shops[]" id="shop" multiple="multiple">
                                                <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($shop->id); ?>"><?php echo e($shop->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="title">Campaign title</label>
                                        <input type="text" class="form-control" id="title" placeholder="Campaign title" name="title">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Campaign Date</label>
                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control datepicker-input" placeholder="From" name="start_date">
                                            <span class="p-h-10">to</span>
                                            <input type="text" class="form-control datepicker-input" placeholder="To" name="end_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group d-flex align-items-center col-md-1">

                                            <div class="switch m-r-10">
                                                <input type="checkbox" id="switch-2" name="cupon">
                                                <label for="switch-2"></label>
                                            </div>
                                            <label>Cupon</label>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="title">Cupon title</label>
                                        <input type="text" class="form-control" id="cupon_title" placeholder="Cupon title" name="cupon_title">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="cupon_type">Type</label>
                                        <input type="text" class="form-control" id="cupon_type" name="cupon_type">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="title">Cupon Description</label>
                                        <input type="text" class="form-control" id="cupon_des" placeholder="Cupon Description" name="cupon_des">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Cupon Date</label>
                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control datepicker-input" placeholder="From" name="cupon_start_date">
                                            <span class="p-h-10">to</span>
                                            <input type="text" class="form-control datepicker-input" placeholder="To" name="cupon_end_date">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center col-md-1">

                                        <div class="switch m-r-10">
                                            <input type="checkbox" id="switch-3" name="employee_vote">
                                            <label for="switch-3"></label>
                                        </div>
                                        <label>Employee Vote</label>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Campaign type</label><br>
                                        <button class="btn btn-primary btn-tone m-r-5" type="button">Multiple Choice</button>
                                        <button class="btn btn-primary btn-tone m-r-5" type="button">Star Rating</button>
                                        <button class="btn btn-primary btn-tone m-r-5" type="button">Emoji</button>
                                    </div>
                                    <div class="form-group col-md-6">

                                    </div>
                                </div>


                                <button class="btn btn-primary add_owner m-r-5" type="submit">
                                   Save Campaign
                                </button>
                                <button class="btn btn-danger btn-tone" type="reset">Clear</button>
                            </div>
                            <!-- Button trigger modal -->

                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="current" >
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
                                <table class="table table-hover e-commerce-table" id="data-table-current">
                                    <thead>
                                        <tr>

                                            <th>No</th>
                                            <th>Campaign Name</th>
                                            <th>Manager Code</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Township</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <h6 class="m-b-0"></h6>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                             </td>

                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-stop"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded delete_campaign" data-toggle="modal" data-target="#exampleModal" id="">
                                                    <i class="anticon anticon-delete"></i>
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
                <div class="tab-pane fade" id="pending" >
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
                                <table class="table table-hover e-commerce-table" id="data-table-pending">
                                    <thead>
                                        <tr>

                                            <th>No</th>
                                            <th>Campaign Name</th>
                                            <th>Manager Code</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Township</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <h6 class="m-b-0"></h6>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                             </td>

                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-stop"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded delete_campaign" data-toggle="modal" data-target="#exampleModal" id="">
                                                    <i class="anticon anticon-delete"></i>
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
                                            <th>Campaign Name</th>
                                            <th>Manager Code</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Township</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <h6 class="m-b-0"></h6>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                             </td>

                                            <td class="text-right">
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-stop"></i>
                                                </button>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded delete_campaign" data-toggle="modal" data-target="#exampleModal" id="">
                                                    <i class="anticon anticon-delete"></i>
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

            </div>
        </div>
    </div>



    <!-- Content Wrapper END -->

    <!-- Footer START -->
    <footer class="footer">
        <div class="footer-content">
            <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
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
    <!-- Core Vendors JS -->
    
    <script src="<?php echo e(asset('vendors/select2/select2.min.js')); ?>"></script>
    <!-- page js -->
    <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script>

    <!-- Core JS -->

    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
    <script>
        $('#data-table-add').DataTable();
        $('#data-table-list').DataTable();
        $('#data-table-pending').DataTable();
        $('#data-table-current').DataTable();
        $('#data-table-delete').DataTable();
        $('.select2').select2();
        $('.datepicker-input').datepicker();

    </script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/campaign.blade.php ENDPATH**/ ?>