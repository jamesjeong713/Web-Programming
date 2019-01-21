<html xmlns="http://www.w3.org/1999/xhtml">
<html>
  <head>
    <title>Create Account</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <?php ob_start(); ?>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <?php include("footer.php"); ?>
    <div id="content">

      <form action="createaccount.php" method="post">
        <?php session_start(); ?>
          <fieldset>
              <legend>
                  <h1>Create your account: </h1>
              </legend>
              <div>
                Please fill in all information.<br>
                  First name         : <input type="text" name="first"><br><br>
                  Last name         : <input type="text" name="last"><br><br>
                  Email Address  : <input type="email" name="email"><br><br>
                  Phone Number : <input type="tel" name="phone"><br><br>
                  SIN             : <input type="number" name="sin"><br><br>
                  Password      : <input type="password" name="password"><br>
                <input type="Submit" name="Submit" value="Submit" style="margin: 5;" />
              </div>
              <?php

              if (isset ( $_POST ['Submit'] ))
              {
                $first = $_POST ['first'];
                $last = $_POST ['last'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $sin = $_POST['sin'];
                $pass = $_POST['password'];

                $_SESSION["first"] = $_POST ['first'];
                $_SESSION["last"] = $_POST ['last'];
                $_SESSION["phone"] = $_POST['phone'];
                $_SESSION["email"] = $_POST['email'];
                $_SESSION["sin"] = $_POST['sin'];
                $_SESSION["password"] = $_POST['password'];

                $host = "localhost";
                $username = "oceanpla_james_cst8238";
                $password = "james@cst@8238";
                $database = "james_cst8238";

                $connect = mysqli_connect($host, $username, $password) or die("did not connect successfully to MySQL database $host @ $database");
                mysqli_select_db($connect, $database);
                $query = "INSERT INTO Employee VALUES('','$first','$last','$email','$phone','$sin','$pass')";

                if(mysqli_query($connect, $query))
                {
                  echo "Data inserted into $database successfully.";
                }
                else
                {
                  echo "Data could not be inserted.", "<br>", mysqli_error($connect);
                }
                mysqli_close($connect);

                header("location: http://149.56.204.160/~oceanpla/CST8238/Lab9/viewallemployees.php");
                exit();
              }
              ?>
          </fieldset>
        </form>
    </div>
  </body>
</html>
