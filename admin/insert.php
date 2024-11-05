<?php
include ('../connections.php');

$first_name  = $last_name  = $phone_number = $email = "";
$first_nameErr = $middle_nameErr = $last_nameErr = $genderErr = $preffixErr = $seven_digitErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["first_name"])) {
        $first_nameErr = "Required";
    } else {
        $first_name = $_POST["first_name"];
    }

    if (empty($_POST["middle_name"])) {
        $middle_nameErr = "Required";
    } else {
        $middle_name = $_POST["middle_name"];
    }

    if (empty($_POST["last_name"])) {
        $last_nameErr = "Required";
    } else {
        $last_name = $_POST["last_name"];
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Required";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["preffix"])) {
        $preffixErr = "Required";
    } else {
        $preffix = $_POST["preffix"];
    }

    if (empty($_POST["seven_digit"])) {
        $seven_digitErr = "Required";
    } elseif (!preg_match('/^[0-9]{7}$/', $_POST["seven_digit"])) {
        $seven_digitErr = "Must be 7 digits";
    } else {
        $seven_digit = $_POST["seven_digit"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    if($first_name && $middle_name && $last_name && $gender && $preffix && $seven_digit && $email) {
           if (!preg_match("/^[a-zA-Z  ]*$/", $first_name)) {
                $first_nameErr = "Only letters and spaces are allowed";
           }else{
                $count_first_name_string = strlen($first_name);
           if($count_first_name_string <2 ){
                $first_nameErr = "First name must be at least 2 characters long";
           }else{
                $count_middle_name_string = strlen($middle_name);

           if($count_middle_name_string <2 ){
                $middle_nameErr = "Middle name must be at least 2 characters long";
           }else{
                $count_last_name_string = strlen($last_name);
           if($count_last_name_string < 2) {
                $last_nameErr = "Last name must be at least 2 characters long";
           }else{
            
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }else{
                    $count_seven_digit_string = strlen($seven_digit);
                    
                    if($count_seven_digit_string < 7){
                        $seven_digitErr = "Seven digit must be at least 7 characters long";
                    }else{

                        function random_password ( $length = 5) {
                            $str ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890";
                            $shuffled = substr (str_shuffle($str), 0, $length);
                            return $shuffled;
                        }
                        $password = random_password(8); 

                     
                    }
                }
            }
           }
    }
}

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 3 by Creative Tim
  </title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php include ('includes/navbar.php');?>
<div class="container">
        <div class="sidebar">
            <?php include 'includes/sidebar.php'; ?>
        </div>
    <!-- End Navbar -->
    <div name ="main-content"class="container-fluid py-4">
    <div class="row min-vh-80 h-100">  
        <div class="col-12">

    <div class="card">
      <div class="card-header mt-3">
          <h4>
            INSERT DATA INTO BATABASE USING PHP

            <a href="insert.php" class="btn btn-primary float-end">Insert Data</a>
          </h4>
      </div>
      <div class="card-body">
      <div class="form-container">
        <form>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
                <span class="error"><?php echo $first_nameErr; ?></span>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
        </form>
    </div>
      </div>
        
      </div>

      </div>

    </div>
      
    </div>
    
  </main>

</div>


  <style>
.container {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    flex: 0 0 200px; /* Adjust the width as needed */
    background-color: #f0f0f0;
    padding: 10px;
}
.main-content {
    flex: 1;
    padding: 10px;
}
.form-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            border-radius: 6px;
            border: 2px solid #007bff; /* Makes border more visible */
            background-color: #f8f9fa; /* Light background color */
            padding: 10px; /* Adds padding for a better look */
            transition: border-color 0.3s; /* Smooth border color transition on focus */
        }
        .form-container input[type="text"]:focus,
        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            border-color: #0056b3; /* Darker border color on focus */
            outline: none; /* Removes default outline */
            background-color: #ffffff; /* Highlights background on focus */
        }
        .form-container input[type="checkbox"] {
            margin-right: 8px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
        }
        .form-text {
            font-size: 0.9rem;
        }
    </style>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, 
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Views",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#43A047",
          data: [50, 45, 22, 28, 50, 60, 76],
          barThickness: 'flex'
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#e5e5e5'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
              color: "#737373"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Sales",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              title: function(context) {
                const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                return fullMonths[context[0].dataIndex];
              }
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Tasks",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#737373',
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [4, 4]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>