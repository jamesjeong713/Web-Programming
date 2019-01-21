<html xmlns="http://www.w3.org/1999/xhtml">
<html>
  <head>
    <title>Login</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <?php include("header.php"); ?>
    <div id="content">

      <form action="login.php" method="post">
        <?php session_start(); ?>
          <fieldset>
              <legend>
                  <h1>Login</h1>
              </legend>
              <div>
                Email Address  : <input type="email" name="email"><br><br>
                Password      : <input type="password" name="password"><br>
                <input type="Submit" name="Submit" value="Submit" style="margin: 5;" />
              </div>
              <?php

              if (isset ( $_POST ['Submit'] ))
              {
                $email = $_POST['email'];
                $pass = $_POST['password'];

                $host = "localhost";
                $username = "oceanpla_james_cst8238";
                $password = "james@cst@8238";
                $database = "james_cst8238";

                $connect = mysqli_connect($host, $username, $password) or die("did not connect successfully to MySQL database $host @ $database");
                mysqli_select_db($connect, $database);
                $query = "SELECT * FROM Employee WHERE EmailAddress='$email' && Pass='$pass'";
                $result = $connect->query($query);

                if(mysqli_query($connect, $query))
                {
                  if($result->num_rows > 0)
                  {
                    $row = $result->fetch_assoc();

                    $_SESSION["first"] = $row ['FirstName'];
                    $_SESSION["last"] = $row ['LastName'];
                    $_SESSION["email"] = $row['EmailAddress'];
                    $_SESSION["phone"] = $row['TelephoneNumber'];
                    $_SESSION["sin"] = $row['SocialInsuranceNumber'];
                    $_SESSION["password"] = $row['Pass'];
                  }
                  else
                  {
                      echo "could not log in, user not found.", "<br>", mysqli_error($connect);
                  }
                }
                else
                {
                echo "could not log in, user not found.", "<br>", mysqli_error($connect);
                }
                mysqli_close($connect);

                header("location: http://149.56.204.160/~oceanpla/CST8238/Lab9/viewallemployees.php");
                exit();
              }
              ?>
          </fieldset>
        </form>
    </div>
    <?php include("menu.php"); ?>
    <?php include("footer.php"); ?>
  </body>
</html>
