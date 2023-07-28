<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('vendors/select2/select2.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Feedback'); ?>

<?php $__env->startSection('contents'); ?>

<!-- Page Container START -->
<div class="page-container">
                
    <!-- Content Wrapper START -->
    <div class="main-content">
        



        
            
        <div class="container">
            <div class="card">
                <div id="mail-content" class="mail-content">
                    <div class="d-lg-flex justify-content-between"> 
                        
                        <div class="media align-items-center m-b-15 m-t-15">
                            <a id="back" class="text-gray m-15 font-size-25" href="<?php echo e(route('feedback')); ?>">
                                <i class="anticon anticon-left"></i>
                            </a>
                            
                            <div class="m-l-10">
                                <h4 class="m-b-0"><?php echo e($feedback->title); ?></h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center m-b-15 p-l-30">
                            <span class="text-gray m-r-15"><?php echo e($feedback->created_at); ?></span>
                            <button class="btn text-gray font-size-18 m-r-20 delete_feedback" data-toggle="modal" data-target="#exampleModal" id="<?php echo e($feedback->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="m-t-30 p-h-30">
                        <h3><?php echo e($feedback->title); ?></h3>
                        <div class="m-t-30" style="font-size: large;">
                            <p><?php echo e($feedback->description); ?></p>
                            
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
                Are you sure to delete this Feedback?
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

    <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>


    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<!-- Core JS -->
<script src="<?php echo e(asset('js/app.min.js')); ?>"></script>

<script>
    $('.delete_feedback').click(function(){
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
                url: "<?php echo e(route('feedback-delete')); ?>",
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/owner/feedback-detail.blade.php ENDPATH**/ ?>