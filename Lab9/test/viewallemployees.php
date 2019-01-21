$tab<html xmlns="http://www.w3.org/1999/xhtml">
<html>
  <head>
    <title>View All Employees</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <?php include("header.php"); ?>
    <div id="content">

      <form action="viewallemployees.php" method="post">
        <?php session_start(); ?>
        <?php
        $host = "localhost";
        $username = "oceanpla_james_cst8238";
        $password = "james@cst@8238";
        $database = "james_cst8238";

          $email = $_SESSION['email'];
          $pass = $_SESSION['password'];

          $connect = mysqli_connect($host, $username, $password) or die("did not connect successfully to MySQL database $host @ $database");
          mysqli_select_db($connect, $database);
          $query = "SELECT * FROM Employee WHERE EmailAddress='$email' && Pass='$pass'";
          $result = $connect->query($query);

          if(mysqli_query($connect, $query))
          {
            if($result->num_rows > 0)
            {
              $row = $result->fetch_assoc();

              echo '<div class="topdiv">';
              echo '<h1> Session State Data. </h1>';
              echo "Employee ID: " . $row["EmployeeId"]. "<br>".
              " - First Name: " . $row["FirstName"]. "<br>".
              " - Last Name: " . $row["LastName"]. "<br>".
              " - Email: " . $row["EmailAddress"]. "<br>".
              " - Phone #: " . $row["TelephoneNumber"]. "<br>".
              " - SIN: " . $row["SocialInsuranceNumber"]. "<br>".
              " - Password: " . $row["Pass"]. "<br><br><br><br>";
              echo '</div>';

              echo '<div class="bottomdiv" style="text-align:center">';
              echo '<h1> Database Data. </h1><br>';
              echo "<table> <thead style='font-weight:bold'> <tr>";
              echo "<td> ID </td>",
                   "<td> FirstName </td>",
                   "<td> LastName </td>",
                   "<td> Email </td>",
                   "<td> TelephoneNumber </td>",
                   "<td> SIN </td>",
                   "<td> Password </td>";
              $query = "SELECT * FROM Employee";
              $result = $connect->query($query);
              echo "</tr></thead><tbody>";
              while($row = $result->fetch_assoc())
              {
                echo "<tr>";
                echo "<td>", $row["EmployeeId"], "</td>",
                     "<td>", $row["FirstName"], "</td>",
                     "<td>", $row["LastName"], "</td>",
                     "<td>", $row["EmailAddress"], "</td>",
                     "<td>", $row["TelephoneNumber"], "</td>",
                     "<td>", $row["SocialInsuranceNumber"], "</td>",
                     "<td>", $row["Pass"], "</td>";
                echo "</tr>";
              }
              echo "</tbody></table>";
              echo '</div>';
            }
            else
            {
                echo "You are not logged in.", "<br>", mysqli_error($connect);
                header("location: http://149.56.204.160/~oceanpla/CST8238/Lab9/login.php");
                exit();
            }
          }
          else
          {
            echo "could not log in, user not found.", "<br>", mysqli_error($connect);
          }
          mysqli_close($connect);
          ?>
    </div>
    <?php include("menu.php"); ?>
    <?php include("footer.php"); ?>
  </body>
</html>
