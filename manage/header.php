<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Services</title>
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

</head>
<style>
  .dataTables_wrapper .dataTables_filter input {
    border: none;
    box-sizing: border-box;
    border-bottom: 1px solid rgba(0,0,0,.54);
    padding: 5px;
    background-color: transparent;
    margin-left: 3px;
    border-radius:inherit;
  }
  #example_filter label {
    color: rgba(0,0,0,.54);
  }
  /* .dataTables_filter { visibility: hidden;} */
</style>
<body>
    <header class="nav-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="https://mywedservices.s3.ap-south-1.amazonaws.com/images/amsan-wedding-services.png" height="40px" class="img-responsive">
          </a>
          <div class="collapse navbar-collapse margin-100px-right">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class=""><img class="h-30" src="user-img.svg"></span>
                </a>
                <ul class="dropdown-menu dropdown-shadow" aria-labelledby="navbarDropdown">
                  <!-- <li><a class="dropdown-item padding-10" href="#"><span class="margin-25px-right"><i class="fas fa-user-circle"></i></span>Profile</a></li> -->
                  <li><a href="logout.php" class="dropdown-item padding-10" href="#"><span class="margin-25px-right"><i class="fas fa-arrow-right"></i></span>Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div id="wrapper">
      <div class="row wrapper-sub g-0">