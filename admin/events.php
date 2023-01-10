<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | organizations</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          </button>
          <a class="navbar-brand" href="#">organizations MANAGEMENT</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../login.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>organizations</h1>
            </div>
            <div class="col-md-2">
              <div class="dropdown create">
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#addPage" >
                  Add event</button>
                </div>
        </div>
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item ">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="bookings_list.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Bookings List </a>
              <a href="organizations.php" class="list-group-item"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> organizations </a>
              <a href="events.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> events </a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users </a>
              <a href="filter.php" class="list-group-item"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter </a>
              <a href="event_logs.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Deleted events </a>
          </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">events</h3><br>
                
              </div>
              <div class="panel-body">
                
                <table class="table table-striped table-hover">
                      <tr>
                        <th>event no</th>
                        <th>event</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Operation</th>
                      </tr>
                      <?php  include('../connection.php'); ?>
                      <?php
                       $sql="SELECT * from `event`;";
                       $res = mysqli_query ($data, $sql);
                       $i=1;
                       while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>"; echo $i++; echo" </td>";
                        echo "<td>"; echo $row["name"]; echo" </td>";
                        echo "<td>"; echo $row["address"]; echo" </td>";
                        echo "<td>"; echo $row["description"]; echo" </td>";
                        echo "<td>"; echo $row["points"]; echo" </td>";
                        $id =  $row["id"];
                        echo "<td>"; echo "<a class='btn btn-default' href='edit_event.php?id= $id'>Edit</a>
                         <a class='btn btn-primary' href='delete_events.php?id= $id'>Delete</a>"; echo" </td>";
                        echo "</tr>";
                       }
                      ?>
                      
                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New event</h4>
          </div>
          <div class="modal-body">
    <div class="container-fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <form action="" id="manage-event" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group row">
                <div class="col-md-5">
                  <label for="" class="control-label">event</label>
                  <input type="text" class="form-control" name="event" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <label for="" class="control-label">Address</label>
                  <textarea name="address" id="address" class="form-control" cols="30" rows="5" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <label for="" class="control-label">Short Description</label>
                  <textarea name="description" id="description" class="form-control" cols="30" rows="5" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <label for="" class="control-label">points</label>
                  <input type="number" class="form-control text-right" step="any" name="points" value="0" required>
                </div>
              </div>
              <!-- <div class="form-group">
                <div><label for="" class="control-label">event Images</label></div>
                <input type="file" id="chooseFile" multiple="multiple" onchange="displayIMG(this)" accept="image/x-png,image/gif,image/jpeg" style="display: none">
                <label for="chooseFile" id="choose"><strong>Choose File</strong></label>
                    <div id="drop">
                                        <span id="dname" class="text-center">Drop Files Here</span>
                                    </div>
                    <div id="list">
                    </div> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
if(isset($_POST['save'])){ 
 
  $name =  isset($_POST['event']) ? $_POST['event'] : '';
  $address =isset($_POST['address']) ? $_POST['address'] : '';
  $desc = isset($_POST['description']) ? $_POST['description'] : '';
  $points =  isset($_POST['points']) ? $_POST['points'] : '';
 
  $sql_name="SELECT * FROM `event` WHERE `name`= '$name'";
    $db_name = mysqli_query($data, $sql_name);
    $sql_address = "SELECT * FROM `event` WHERE `address`= '$address'";
    $db_add = mysqli_query($data, $sql_address);

    if(mysqli_num_rows($db_name)!=0){
      $name_error = "event already exits";
      echo "<script>alert('$name_error');</script>";
      echo "<script> window.location = 'events.php'</script>";
  }
  else if(mysqli_num_rows($db_add)!=0){
    $add_error = "Address already exits";
    echo "<script>alert('$add_error');</script>";
    echo "<script> window.location = 'events.php';</script>";
   } else {
  $sql_addevent = "INSERT INTO `event`( `name`, `address`, `description`, `points`) VALUES ('$name','$address' ,'$desc','$points');";
  $result = mysqli_query($data, $sql_addevent);
  if($result)
    {
      echo "<script>alert('event added successfully!');</script>";
      echo "<script> window.location = 'events.php'</script>";
    }
  echo "<meta http-equiv='refresh' content='0'>";
  $data->close();
  }
  unset($sql_name);
  unset($sql_address);
}

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
