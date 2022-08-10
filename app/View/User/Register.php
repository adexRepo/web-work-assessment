<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
    <section class="vh-100" style="background-color: #fafafa;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                
                <!-- NOTIFICATION -->
                <?php 
                if(!empty($model['error']) || !empty($model['success'])){ 
                    $color = !empty($model['error']) ? 'danger': 'success';
                    $content = !empty($model['error']) ? $model['error'] : $model['success'];
                    ?>
                    <div class="row">
                        <div class="alert alert-<?= $color ?> text-center" role="alert">
                            <?= $content?>
                        </div>
                    </div>
                <?php }?>

                <!-- //Test123! -->

                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Registration Account</h3>
                            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/users/register">
                                <div class="form-floating mb-3">
                                    <input name="name" type="text" required class="form-control" id="name" placeholder="Username" autofocus>
                                    <label for="name">Name</label>
                                </div>
                                <div class="mb-3">
                                    <select name="gender" id="gender" required class="form-select" aria-label="Default select example">
                                        <option selected disabled value="" >Choose Gender</option>
                                        <option  value="0">Female</option>
                                        <option  value="1">Male</option>
                                      </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name ="password" type="password" required class="form-control validate" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name ="password" type="password" id="confirm_password" class="form-control validate" required id="rePassword" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" placeholder="Password">
                                    <label for="rePassword">Re-Password <span id='message'></span></label>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Send Request</button>
                                <p class="text-center mt-3"> <a class="mb-5" href="/users/register">back to login</a> </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
    <script>
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html(' [Matching]').css('color', 'green');
        } else 
            $('#message').html(' [Not Matching]').css('color', 'red');
        });
    </script>
</html>