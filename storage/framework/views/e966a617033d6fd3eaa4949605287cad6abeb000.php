
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log In</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/logo/favicon.png')); ?>">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?php echo e(asset('css/app.min.css')); ?>" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="<?php echo e(asset('images/logo/logo-invoice.png')); ?>">
                                        <h4 class="m-b-0">Sign In</h4>
                                    </div>
                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" placeholder="Username" id="email" name="email">
                                            </div>
                                            <?php if($errors->has('email')): ?>
                                                <span class="font-size-13 text-danger d-block">
                                                <?php echo e($errors->first('email')==="These credentials do not match our records."? null : $errors->first('email')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>
                                            <?php if($errors->has('password')): ?>
                                            <span class="font-size-13 text-danger d-block">
                                            <?php echo e($errors->first('password')); ?>

                                            </span>
                                        <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-block">
                                                    <?php if(count($errors) == 1): ?>
                                                            <span class="font-size-13 text-danger d-block">
                                                                Invalid email and password
                                                            </span>
                                                    <?php endif; ?>
                                                    <span class="font-size-13 text-muted d-block">
                                                        Forget Password?
                                                        <a class="small" href="<?php echo e(route('password.request')); ?>"> Click here</a>
                                                    </span>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="<?php echo e(asset('js/vendors.min.js')); ?>"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?php echo e(asset('js/app.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH /Users/waiyankyaw/Desktop/Xsphere/wa-admin-backend/resources/views/auth/login.blade.php ENDPATH**/ ?>