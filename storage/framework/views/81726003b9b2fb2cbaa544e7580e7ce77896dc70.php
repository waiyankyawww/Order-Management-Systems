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
                <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                    <div class="media align-items-center m-b-15">
                       
                        <div class="m-l-15">
                            <h4 class="m-b-0"><?php echo e($shop->name); ?></h4>
                            <p class="text-muted m-b-0">Branch ID: <?php echo e($shop->id); ?></p>
                        </div>
                    </div>
                    <div class="m-b-15">
                        
                        <button class="btn btn-primary">
                            
                            <i class="anticon anticon-edit"></i>
                            <span>Edit</span>
                        </button>

                        <button class="btn btn-danger">
                            
                            <i class="anticon anticon-delete"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                    
                </div>
                <ul class="nav nav-tabs" >
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#product-overview">Overview</a>
                    </li>
                    
                </ul>
            </div>
            <div class="container-fluid">
                <div class="tab-content m-t-15">
                    <div class="tab-pane fade show active" id="product-overview">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <i class="font-size-40 text-success anticon anticon-smile"></i>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-muted">10 ratings</p>
                                                <div class="star-rating m-t-5">
                                                    <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled/><label for="star3-5" title="5 star"></label>
                                                    <input type="radio" id="star3-4" name="rating-3" value="4" disabled/><label for="star3-4" title="4 star"></label>
                                                    <input type="radio" id="star3-3" name="rating-3" value="3" disabled/><label for="star3-3" title="3 star"></label>
                                                    <input type="radio" id="star3-2" name="rating-3" value="2" disabled/><label for="star3-2" title="2 star"></label>
                                                    <input type="radio" id="star3-1" name="rating-3" value="1" disabled/><label for="star3-1" title="1 star"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                               

                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <a href='<?php echo e(url("feedback/shop/$shop->id")); ?>'>

                                            <i class="font-size-40 text-primary anticon anticon-message"></i>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-muted">Feedbacks</p>
                                                <h3 class="m-b-0 ls-1"><?php echo e($total_feedback); ?></h3>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Info</h4>
                                <div class="table-responsive">
                                    <table class="product-info-table m-t-20">
                                        <tbody>
                                            <tr>
                                                <td>Shop Name:</td>
                                                <td><?php echo e($shop->org_name); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Manager:</td>                                            
                                                <td>
                                                    <a href='<?php echo e(url("manager/profile-detail/$manager->id")); ?>'>
                                                        <?php echo e($manager->name); ?>

                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Employee:</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td><?php echo e($shop->phone_number); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?php echo e($shop->address); ?></td>
                                            </tr>                                         
                                            
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Option Info</h4>
                                <div class="table-responsive">
                                    <table class="product-info-table m-t-20">
                                        <tbody>
                                            <tr>
                                                <td>Package:</td>
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
                                            </tr>
                                            <tr>
                                                <td>Devices:</td>
                                                <td>
                                                    4
                                                </td>
                                            </tr>
                                            
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/shop-profile.blade.php ENDPATH**/ ?>