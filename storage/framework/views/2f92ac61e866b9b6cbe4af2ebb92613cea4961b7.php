<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href=<?php echo e(asset("/images/logo/favicon.png")); ?>>

    <!-- page css -->
    <link href="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
    <!-- Core css -->
    <link href="<?php echo e(asset("/css/app.min.css")); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('js/vendors.min.js')); ?>"></script>

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
   
</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.html">
                        <img src="<?php echo e(asset('images/logo/logo.png')); ?>" alt="Logo">
                        <img class="logo-fold" src="<?php echo e(asset('/images/logo/logo-fold.png')); ?>" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.html">
                        <img src="<?php echo e(asset('images/logo/logo-white.png')); ?>" alt="Logo">
                        <img class="logo-fold" src="<?php echo e(asset('images/logo/logo-fold-white.png')); ?>" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You received a new message</p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have a new update</p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    
                                    <img src="<?php echo e(env('Image_URL') .Auth::user()->logo); ?>" alt="ME">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            
                                            <img src="<?php echo e(env('Image_URL') .Auth::user()->logo); ?>"/>

                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo e(\Auth::user()->name); ?></p>
                                            <p class="m-b-0 opacity-07">Owner</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        
                                    </div>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>    <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                    <i class="anticon anticon-appstore"></i>
                </a>
            </li>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="<?php echo e(route('home')); ?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-line-chart"></i>
                                </span>
                                <span class="title">Dashboard</span>
                                
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?php echo e(route('shop')); ?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-shop"></i>
                                </span>
                                <span class="title">Shop List</span>
                                
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?php echo e(route('campaign')); ?>">
                                <span class="icon-holder">
									<i class="anticon anticon-project"></i>
								</span>
                                <span class="title">Campaign</span>
                                
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-hdd"></i>
                                </span>
                                <span class="title">Cupon</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            
                        </li>
                        
                       
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                                <span class="title">Employee</span>
                            </a>
                           
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?php echo e(route('manager')); ?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                                <span class="title">Manager</span>
                                
                            </a>
                           
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="">
                                <span class="icon-holder">
                                    <i class="anticon anticon-solution"></i>
                                </span>
                                <span class="title">Feedback</span>
                                
                            </a>
                           
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <?php echo $__env->yieldContent('contents'); ?>

           
        </div>
    </div>

    <script src="<?php echo e(asset('vendors/select2/select2.min.js')); ?>"></script>
    <!-- page js -->
    <script src="<?php echo e(asset('vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pages/datatables.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- Core Vendors JS -->
    
    

</body>

</html><?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/layout/master.blade.php ENDPATH**/ ?>