 <?php
require_once "../Home page/config.php";
// require_once "../signup_page/signup.php"; 

// if($con){
//   echo "connection ok";
// }
// else {
//   echo "not working";
// }

if(isset($_POST['user_email']) || isset($_POST['user_password']))
{
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $query = "SELECT * from user_details where user_email = $user_email and user_password = $user_password";
    $result = pg_query($con, $query);
    //$query = "SELECT* from verify($1, $2);";
    //$res = pg_query_params($con, $res, array('user_email','user_password'));
    //$result = pg_fetch_object($res);
    if($result)
    {
      echo "login successfull";
        //header('location: home.php');
    }
    else
    {
      echo "<h3>Invalid username or password!</h3>";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login 04</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5"></div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
              <div
                class="img"
                style="
                  background-image: url(https://cdni.iconscout.com/illustration/premium/thumb/man-trading-in-stock-market-4487035-3738442.png);
                "
              ></div>
              <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                  <div class="w-100">
                    <h3 class="mb-4">Sign In</h3>
                  </div>
                  <div class="w-100">
                    <p class="social-media d-flex justify-content-end">
                      <a
                        href="#"
                        class="social-icon d-flex align-items-center justify-content-center"
                        ><span class="fa fa-facebook"></span
                      ></a>
                      <a
                        href="#"
                        class="social-icon d-flex align-items-center justify-content-center"
                        ><span class="fa fa-twitter"></span
                      ></a>
                    </p>
                  </div>
                </div>
                <form action= "" class="signin-form">
                  <div class="form-group mb-3">
                    <label class="label">Username (Email)</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      name="user_email"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label class="label">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Password"
                      name="user_password" 
                      required
                    />
                  </div>
                  <div class="form-group">
                    <button
                      type="submit"
                      class="form-control btn btn-primary rounded submit px-3"
                    >
                      Sign In
                    </button>
                  </div>
                  <div class="form-group d-md-flex">
                    <div class="w-50 text-left">
                      <label class="checkbox-wrap checkbox-primary mb-0"
                        >Remember Me
                        <input type="checkbox" checked />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="w-50 text-md-right">
                      <a href="#">Forgot Password</a>
                    </div>
                  </div>
                </form>
                <p class="text-center">
                  Not a member?
                  <a href="../signup_page/signup.php">Sign Up</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
