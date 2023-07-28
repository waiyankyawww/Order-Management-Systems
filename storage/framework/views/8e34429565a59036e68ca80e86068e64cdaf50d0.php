<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Feedback'); ?>

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
                                    <a class="nav-link active" data-toggle="tab" href="#list">Feedback List</a>
                                </li>
                                <li class="nav-item" id="fetchDeleteFeedback">
                                    <a class="nav-link" data-toggle="tab" href="#delete">Delete List</a>
                                </li>
                            </ul>
                        </div>            
                    </div>

                    

                    <div class="container-fluid">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="list" >

                                <div class="mail-wrapper">
                                    
                                    <div id="mail-list" class="mail-content"  style="width: 100%">
                                    
                                        <div class="row d-flex align-items-center justify-content-between p-10">
                                            <div class="col-md-2 d-none d-md-flex align-items-baseline m-b-10">
                                                <div class="checkbox d-inline-block">
                                                    <input id="checkAll" type="checkbox">
                                                    <label for="checkAll"></label>
                                                </div>
                                                <select class="custom-select">
                                                    <option selected>Fliter By</option>
                                                    <option value="All">All</option>
                                                    <option value="Unread">Unread</option>
                                                    <option value="Date">Date</option>
                                                    <option value="Name">Name</option>
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center col-md-5 m-b-10">

                                                <div class="col-lg-12 text-right">
                                                    <a href="<?php echo e(route('feedbacksExport')); ?>">
                                                        <button class="btn btn-primary" id="eButton">  
                                                            <i class="anticon anticon-file-excel m-r-5"></i>
                                                            <span>Export</span>
                                                        </button>
                                                    </a>
                                                </div>

                                                <div class="input-affix m-r-10">
                                                    <i class="prefix-icon anticon anticon-search"></i>
                                                    <input type="text" class="form-control" placeholder="Search">
                                                </div> --}}
                                                <button class="btn btn-icon btn-default" id="refresh-table">
                                                    <i class="anticon anticon-reload"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <a href=" <?php echo e(url("owner/feedback-detail/$feedback->id")); ?>">
                                            <div class="mail-list">
                                                <div class="checkbox d-inline-block">
                                                    <input id="mail-checkbox-1" type="checkbox">
                                                    <label for="mail-checkbox-1"></label>
                                                </div>
                                                <table class="table list-info">
                                                    <tr>
                                                        
                                                        <td class="list-sender">
                                                            <div class="media align-items-center">
                                                                
                                                                <h6 class="m-l-10 m-b-0"><?php echo e($feedback->title); ?></h6>
                                                            </div>
                                                        </td>
                                                        <td class="list-content">
                                                            <div class="list-msg">
                                                                <span class="list-text text-gray"><?php echo e($feedback->description); ?></span>
                                                            </div>
                                                        </td>
                                                        <td class="list-date">
                                                            <span>12:06PM</span>
                                                        </td>
                                                    
                                                    </tr>
                                                </table>
                                            </div>
                                        </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <div class="m-t-20 text-right">
                                            <ul class="pagination justify-content-end">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
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

            <!-- Search Start-->
            


            <!-- Search End-->

            <!-- Quick View START -->
            
            <!-- Quick View END -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <!-- Core Vendors JS -->
    

     <!-- page js -->
     <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
     <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script>
     <script src="<?php echo e(asset('vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
 
 
     <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
 
    
     <!-- Core JS -->
     <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>

    <script>
        // $('#data-table-add').DataTable();
        $('#data-table-list').DataTable();
        $('#data-table-delete').DataTable();
        $('.select2').select2();
    </script>

    <script>
        $('#fetchDeleteFeedback').click(function(){
            $.ajax({
                url: "<?php echo e(route('get-delete-feedback')); ?>",
                method: "GET",
                success: function (data) {
                   
                    var table = $("#data-table-delete").DataTable();
                    table.clear();
                    $.each(data, function(i, item) {
                        
                        openPage = function(id) {
                            location.href ="<?php echo e(url('feedback')); ?>/"+id+"/restore";
                        }
                        var restore = '<a href="javascript:openPage(' + data[i].id + ')"><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right" style="font-size: 19px;"><i class="anticon anticon-redo"  style="color: green; size:""></i></button></a>';
                        table.row.add([ data[i].id, data[i].title, data[i].description, restore]);
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
        $(document).ready(function() {

        function RefreshTable() {
            $( "#feedback" ).load( "feedback.blade.php #feedback" );
        }

        $("#refresh-table").on("click", RefreshTable);
    </script>
    
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/feedback.blade.php ENDPATH**/ ?>