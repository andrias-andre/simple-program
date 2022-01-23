

<!doctype html>
<html lang="en">
<head>
<title>Login - Simple Program</title>
<meta charset="utf-8">
<meta name="author" content="Andrias">
<meta name="theme-color" content="#000">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?= base_url('images/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon"> 
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link href="<?= base_url('assets/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style-admin.css'); ?>">
</head>
<body>
<section class="ftco-section">
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-4"><h1 class="heading-section font-weight-bold">LOGIN</h1></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="login-wrap p-4 p-md-5">
        
                <div class="icon d-flex align-items-center justify-content-center text-light">
                    <img src="<?= base_url('images/logo.png'); ?>" class="img-fluid mx-auto">
                </div>

                <h3 class="text-center m-4 ">SIMPLE PROGRAM</h3>

                <form action="<?= base_url('login'); ?>" method="POST" class="login-form">
                    
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" placeholder="Username" name="username" autocomplete="off" required>
                    </div>

                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" placeholder="Password" name="password"  required>
                    </div>

                <div class="form-group  justify-content-end">

                    <div class="text-md-left"> <input type="checkbox" name="remember_me"  /> Remember Me</div>

                </div>

                <div class="form-group text-center d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5"  ><i class="fas fa-sign-in-alt"></i> &nbsp; SUBMIT</button>
                </div>

                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" >

                </form>

            </div>

						
                        <?php if($message != ''){ ?>

                        <div class="row d-flex justify-content-center mt-4 pt-4">
                            <div class="col-md-12 mx-auto ">
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <small class="text-center"> <strong> <?php echo $message; ?> </strong> </small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>


                        <?php } ?>
            

        </div>
    </div>

</div>

</section>
<script src="<?= base_url('assets/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/font-awesome/js/all.min.js'); ?>"></script>
</body>
</html>
