<?php $__env->startSection('title','Branch'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>

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
                    <a class="nav-link active" data-toggle="tab" href="#list">Branch List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#add">Add New Branch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#expired">Expired Branch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#renew">Renew Branch</a>
                </li>
                <li class="nav-item" id="fetchDeleteShop">
                    <a class="nav-link" data-toggle="tab" href="#delete">Delete Branch</a>
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
                                            <th>Shop Name</th>
                                            <th>Address</th>
                                            <th>Package</th>
                                            <th>Remind Days</th>
                                            <th>Devices</th>
                                            <th>Manager</th>
                                            <th>Status</th>
                                            <th>Rated</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td>
                                                <?php echo e($shop->id); ?>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-b-0"><a href='<?php echo e(url("shop-detail/$shop->id")); ?>'>
                                                        <?php echo e($shop->name); ?>

                                                    </h6>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?php echo e($shop->address); ?></td>
                                            <td>
                                                <?php if($shop->option1 == "on"): ?>
                                                    Package 1
                                                <?php elseif($shop->option2 == "on"): ?>
                                                    Package 2
                                                <?php elseif($shop->option3 == "on"): ?>
                                                    Package 3
                                                <?php else: ?>
                                                    No Package
                                                <?php endif; ?>
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="hidden" id="shop_name_hidden" name="shop_name_hidden" value="<?php echo e($shop->name); ?>">
                                                <a href="" data-toggle="modal" data-target="#device_modal" class="get_device" id="<?php echo e($shop->id); ?>">
                                                    <?php echo e(($shop->new_device) + 3); ?>/0
                                                </a>

                                            </td>
                                            <td>
                                                <?php
                                                    $manager = App\Models\Manager::find($shop->manager_id);
                                                ?>
                                                <?php echo e($manager->name); ?>

                                            </td>
                                            <td>
                                                <?php if($shop->status == "Approved"): ?>
                                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                                    <?php echo e($shop->status); ?>

                                                <?php elseif($shop->status == "Cancel"): ?>
                                                    <div class="badge badge-danger badge-dot m-r-10"></div>
                                                    <?php echo e($shop->status); ?>

                                                <?php elseif($shop->status == "Pending"): ?>
                                                    <div class="badge badge-primary badge-dot m-r-10"></div>
                                                    <?php echo e($shop->status); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge badge-primary badge-dot m-r-10"></span>
                                                            <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                        </div>
                                                        <span class="text-dark font-weight-semibold font-size-13">70% </span>
                                                    </div>
                                                    <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                        <div class="progress-bar bg-primary" style="width: 70%"></div>
                                                    </div>
                                                </div>
                                             </td>

                                            <td class="text-right">
                                                    <div class="dropdown dropdown-animated scale-left">
                                                        <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="anticon anticon-ellipsis"></i>
                                                        </a>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-152px, -68px, 0px);">
                                                            <button class="dropdown-item" type="button">
                                                                <i class="anticon anticon-eye"></i>
                                                                <span class="m-l-10">View</span>
                                                            </button>
                                                            <a href="<?php echo e(url("shop/$shop->id/edit")); ?>">
                                                                <button class="dropdown-item" type="button">
                                                                    <i class="anticon anticon-edit"></i>
                                                                    <span class="m-l-10">Edit</span>
                                                                </button>
                                                            </a>

                                                                <button class="dropdown-item delete_shop" data-toggle="modal" data-target="#exampleModal" id="<?php echo e($shop->id); ?>" type="button">
                                                                    <i class="anticon anticon-delete"></i>
                                                                    <span class="m-l-10">Delete</span>
                                                                </button>
                                                            
                                                        </div>
                                                    </div>
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

                            <form method="POST" action="<?php echo e(route('add-new-shop')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Branch Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Branch Name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Organization Name</label>
                                        <input type="text" class="form-control" id="name" name="org_name" value="<?php echo e($org); ?>" required>
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
                                        <input type="number" class="form-control" id="phone_number" placeholder="Phone number" name="phone_number" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Apartment, studio, or floor" name="address">
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
                                    <div class="form-group col-md-6">
                                        <label for="manager_id">Manager</label>
                                        <div class="d-flex align-items-center">
                                            <div class="col-md-6 m-0 p-0">
                                                <select id="manager_id" class="form-control" name="manager_id" required>
                                                    <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        <option value="<?php echo e($manager->id); ?>"><?php echo e($manager->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                                    <i class="anticon anticon-user-add"></i>
                                                     create new manager
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    



                                </div>
                                <button class="btn btn-primary add_owner m-r-5 mt-4" type="submit">
                                    Confirm
                                </button>
                                <button class="btn btn-danger btn-tone mt-4" type="reset">Clear</button>
                            </div>
                            <!-- Button trigger modal -->

                        </form>
                    </div>

                </div>
                <div class="tab-pane fade" id="expired" >

                </div>
                <div class="tab-pane fade" id="renew" >

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
                                            <th>Shop Name</th>
                                            <th>Address</th>
                                            
                                            <th>Devices</th>
                                            <th>Manager</th>
                                            <th>Status</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="show_delete_shops">
                                       
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
<!-- Device Modal -->
<div class="modal fade bd-example-modal-xl" id="device_modal">
    <div class="modal-dialog modal-dialog-scrollable  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Devices</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="main-content">
                    <div class="page-header no-gutters has-tab">


                        <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#list_device">Device List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#add_device">Add New Device</a>
                            </li>

                        </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="list_device" >

                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-hover e-commerce-table" id="data-table-list-device">
                                                <thead>
                                                    <tr>

                                                        <th>No</th>
                                                        <th>Device Name</th>
                                                        <th>Device S\N</th>
                                                        <th>Registerd Date</th>
                                                        <th>Status</th>
                                                        <th>Password</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="add_device" >

                                <div class="card">
                                    <div class="card-body">

                                        <form method="POST" action="<?php echo e(route('add-new-device')); ?>" id="device_form">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Device Name</label>
                                                    <input type="text" class="form-control" id="device_name" placeholder="Device Name" name="device_name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no">Device Code</label>
                                                    <input type="text" class="form-control" id="no" placeholder="Device Code" name="no" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="name">Shop Name</label>
                                                    <input type="text" class="form-control" id="shop_name" placeholder="Shop Name" name="shop_name" readonly>
                                                    <input type="hidden" class="form-control" id="shop_id" name="shop_id" readonly>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="industry">Confirm Passowrd</label>
                                                    <input type="password" class="form-control" id="repassword" placeholder="Confirm Passowrd" name="repassword">
                                                </div>
                                            </div>

                                            <button class="btn btn-primary add_owner m-r-5" type="submit">
                                                Add Device
                                            </button>
                                            <button class="btn btn-danger btn-tone" type="reset">Clear</button>
                                        </div>
                                        <!-- Button trigger modal -->

                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
                
            </div>
        </div>
    </div>
</div>
<!-- End Device Modal -->

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
                Are you sure to delete this Shop?
                <input type="hidden" name="delete_id" id="delete_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm_delete" id="confirm_delete">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Manager Modal -->
<div class="modal fade " id="exampleModalScrollable">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Manager</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">      
                        <form method="POST" action="<?php echo e(route('add-shop-manager')); ?>" enctype="multipart/form-data" id="add-manager">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Manager Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Manager Name" name="name" required>
                                    <input type="hidden" value="shop" name="page" id="page">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="code">Manager Code</label>
                                    <input type="number" class="form-control" id="code" value="<?php echo e($code); ?>" name="code" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="code">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="nrc_no">No</label>
                                    <div class="m-b-15">
                                        <select class="form-control" name="nrc_no" id="nrc_no" required>
                                            <?php for($i = 1; $i <= 14; $i++): ?>
                                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> /</option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nrc_location">Location</label>
                                    <div class="m-b-15">
                                        <select class="form-control" name="nrc_location" id="nrc_location">
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
                                        <select id="inputState" class="form-control" name="nrc_type">
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
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Apartment, studio, or floor" name="address">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <div class="m-b-15">
                                        <select class="select2" name="state" id="state_manager" >
                                                <option value=""></option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->code); ?>"><?php echo e($state->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="city">City/Township</label>
                                    <div class="m-b-15">
                                        <select class="select2" name="city" id="city_manager" required>
                                        </select>                                           
                                    </div>
                                </div>
                            </div>   
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <strong>Image:</strong>
                                    <input type="file" name="logo" class="form-control" placeholder="image" id="logo" required>
                                </div>
                            </div>  
                        </form>                 
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-manager"> Add Manager</button>
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
        // $('#data-table-list-device').DataTable();
        $('.select2').select2();
    </script>

     <script type="text/javascript">
      function timeFunction(){
        var open_time = document.getElementById('open_time');
        var opt = open_time.options[open_time.selectedIndex];

        if(opt.value == 24){
            document.getElementById('start_time').value = '';
            document.getElementById('end_time').value = '';
            document.getElementById('start_time').disabled = true;
            document.getElementById('end_time').disabled = true;
        }
        else{
            document.getElementById('start_time').disabled = false;
            document.getElementById('end_time').disabled = false;
        }
      }

      function Option1(){
        $('#switch-2').prop('checked', false);
        $('#switch-3').prop('checked', false);
        document.getElementById('sub_fee').value = 75000;
        document.getElementById('month').value = 3;

        var device_amount =  document.getElementById('new_device').value;
        var device_fee = device_amount * 3000 * 3;
        document.getElementById('device_fee').value = device_fee;

        var total_amount = parseInt(device_fee) + parseInt("75000");
        //console.log(total_amount);
        document.getElementById('total_amount').innerHTML = total_amount;
      }

      function Option2(){
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

      function Option3(){
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

      function Device(){
        var month = document.getElementById('month').value;
        var device_amount =  document.getElementById('new_device').value;
        //console.log(device_amount);
        var device_fee = device_amount * 3000 * month;
        document.getElementById('device_fee').value = device_fee;

        var total_amount = parseInt(device_fee) + parseInt(document.getElementById('sub_fee').value);
        //console.log(total_amount);
        document.getElementById('total_amount').innerHTML = total_amount;
      }
    </script>
    <script>
        $('.get_device').click(function(){
            var shop_name = $(this).closest("td").find("input[name='shop_name_hidden']").val();
            $("#shop_name").val(shop_name);
            $("#shop_id").val(this.id);
        //console.log("nyi nyi");
        $("#data-table-list-device").empty();//Clear old data before ajax
        var shop_id = this.id;

          $.ajax({
            url: "<?php echo e(route('get-devices')); ?>",
            method: "get",
                data: {
                  shop_id:shop_id
                },
                success: function (data) {
                    var table = $("#data-table-list-device");
                    table.append("<tr><th>No</th><th>Device Name</th><th>Device S\N</th><th>Reggisterd Date</th><th>Status</th><th>Password</th></tr>")
                    $.each(data, function(idx, elem) {
                        table.append("<tr><td>" + elem.id + "</td><td>" + elem.name + "</td><td>" + elem.no + "</td><td>" + elem.register_date + "</td><td>" + elem.status + "</td><td>...</td></tr>");
                 });
                },
                error: function (response) {
                   alert("Something Wrong") // I'm always get this.
                }
            });

        });
    </script>
    <script>
    $( "#device_form" ).validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        inputRequired: {
            required: true
        },
        inputMinLength: {
            required: true,
            minlength: 6
        },
        inputMaxLength: {
            required: true,
            minlength: 8
        },
        inputUrl: {
            required: true,
            url: true
        },
        inputRangeLength: {
            required: true,
            rangelength: [2, 6]
        },
        inputMinValue: {
            required: true,
            min: 8
        },
        inputMaxValue: {
            required: true,
            max: 6
        },
        inputRangeValue: {
            required: true,
            max: 6,
            range: [6, 12]
        },
        inputEmail: {
            required: true,
            email: true
        },
        password: {
            required: true
        },
        repassword: {
            required: true,
            equalTo: '#password'
        },
        inputDigit: {
            required: true,
            digits: true
        },
        inputValidCheckbox: {
            required: true
        }
    }
});
    </script>

<script>
    $('.delete_shop').click(function(){
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
        url: "<?php echo e(route('shop-delete')); ?>",
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

    $('#fetchDeleteShop').click(function(){
        $.ajax({
            url: "<?php echo e(route('get-delete-shop')); ?>",
            method: "GET",
            success: function (data) {
                console.log(data);
                var table = $("#data-table-delete").DataTable();
                table.clear();
                $.each(data, function(i, item) {
                    
                    openPage = function(id) {
                        location.href ="<?php echo e(url('shop')); ?>/"+id+"/restore";
                    }
                    // <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" style="font-size: 19px;"><i class="anticon anticon-redo"  style="color: green; size:""></i></button>
                    var restore = '<a href="javascript:openPage(' + data[i].id + ')"></a>';
                    table.row.add([ data[i].id, data[i].name, data[i].address, data[i].new_device, data[i].manager_id, data[i].status, restore]);
                    table.draw();
                    });
            },
            error: function (response) {
                alert("Something Wrong")
            }
        });
    });

</script>

<script>      

    $(function () {
        $('#exampleModalScrollable').modal(toggle)
    });

    // accessing townships and cities js
    $('#state').on('change', function() {
        console.log("hello");
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

    $('#state_manager').on('change', function() {
        console.log("hello");
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
                    $("#city_manager").empty();
                    
                    $.each(result,function(key,value){
                        $("#city_manager").append('<option value="'+key+'">'+value.name+'</option>');
                        // console.log(key,value);
                    });
                }else{
                    $("#city_manager").empty();
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views//owner/shop-list.blade.php ENDPATH**/ ?>