<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign in</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    </head>
<body>
    <section class="vh-100" style="background-color: #fafafa;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                
            <!-- NOTIFICATION -->
                <?php 
                if(isset($model['error'])){ 
                    ?>
                    <div class="row">
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $model['error'] ?>
                        </div>
                    </div>
                <?php }?>
            
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign In</h3>
                            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/users/login">
                                <div class="form-floating mb-3">
                                    <input name="userId" type="text" class="form-control" id="userId" placeholder="Username" value="<?= $_POST['userId'] ?? ''?>">
                                    <label for="userId">User Id</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
                                <p class="text-center mt-3"> <a href="#">Forgot password?</a> </p>
                                <p>Don't have an account? <a href="/users/register">Register</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>