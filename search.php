<!doctype html>
<?php session_start();
if(isset($_SESSION['id']))
{
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/fontawesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
    <!-- linkedin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="tablecss.css">
    <title>StudentInfo</title>
    
</head>
<body>
    <div >
    <?php include('header.php');?>

    <div class="container" style="margin-top:4%">
        <div class="row justify-content">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Student List: </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4" style="padding:0px">
                    <div class="card-body" >
                        <table  class="table table-bordered" style="font-size:50%" >
                            <thead>
                               
                                <tr class="header-row">
                                    <!-- <th class="header-item items">S.No</th> -->
                                    <th class="header-item items">Student Name</th>
                                    <th class="header-item items">Email</th>
                                    <th class="header-item items">Linkedin</th>
                                    <th class="header-item items">Start Year</th>
                                    <th class="header-item items">End Year</th>
                                    <th class="header-item items">Summer Internship</th>
                                    <th class="header-item items">UIL</th>
                                    <th class="header-item items">Placement Company</th>
                                    <th class="header-item items">Update</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","bvspace");
                                    if(!isset($_GET['search'])){ 
                                        $selectquery= "SELECT * FROM users ";
                                        $query= mysqli_query($con, $selectquery);
                                        $nums= mysqli_num_rows($query);
                                        //echo $nums."<br>";
                                        while($items=mysqli_fetch_assoc($query))
                                        {
                                            ?>
                                            <tr class="table-rows">
                                                        <!-- <td><?= $items['id']; ?></td> -->
                                                        <td class="items"><?= $items['username']; ?></td>
                                                        <td class="items"><?= $items['email']; ?></td>
                                                        <td class="items"><a href="<?php echo $items['linkedin']; ?>" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin-square"></i></a></td>
                                                        <td class="items"><?= $items['startYear']; ?></td>
                                                        <td class="items"><?= $items['endYear']; ?></td>
                                                        <td class="items"><?= $items['summerIntern']; ?></td>
                                                        <td class="items"><?= $items['UIL']; ?></td>
                                                        <td class="items"><?= $items['placement']; ?> </td>
                                                        <td class="items">
                                                        <?php 
                                                        $email= $_SESSION['id'];
                                                        if($items["id"]==$email)
                                                        {?>
                                                            <a href="searchUpdate.php?sno=<?php echo $items['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="fa fa-edit"></i></a>
                                                            
                                                            <?php
                                                        } 
                                                        else
                                                        {?>
                                                            <i class="fa fa-edit" title="You can not update other details"></i>
                                                                <?php
                                                        }?>
                                                        </td>
                                                    </tr>
                                        
                                            <?php
                                        }
                                    }
                                ?>
                                <?php
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                       
                                        $query = "SELECT * FROM users WHERE CONCAT(username,summerIntern,UIL,placement) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr class="table-rows">
                                                    <!-- <td><?= $items['id']; ?></td> -->
                                                    <td class="items"><?= $items['username']; ?></td>
                                                    <td class="items"><?= $items['email']; ?></td>
                                                    <td class="items"><a href="<?php echo $items['linkedin']; ?>" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin-square"></i></a></td>
                                                    <td class="items"><?= $items['startYear']; ?></td>
                                                    <td class="items"><?= $items['endYear']; ?></td>
                                                    <td class="items"><?= $items['summerIntern']; ?></td>
                                                    <td class="items"><?= $items['UIL']; ?></td>
                                                    <td class="items"><?= $items['placement']; ?> </td>
                                                    <td class="items">
                                                    <?php 
                                                    $email= $_SESSION['id'];
                                                    if($items["id"]==$email)
                                                    {?>
                                                        <a href="searchUpdate.php?sno=<?php echo $items['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="fa fa-edit"></i></a>
                                                        
                                                        <?php
                                                    } 
                                                    else
                                                    {?>
                                                        <i class="fa fa-edit" title="You can not update other details"></i>
                                                            <?php
                                                    }?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="7">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    



</body>
<div style="background-color: #221f1f;

  max-width: 121%;
  width: 100%;
  bottom: 0;
  height: 37vh;
  margin-top: 7%;
  margin-left: 0%;>
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-2 col-12">
                    <img src="https://i.ibb.co/cgMV93W/BVSpace-logos-white.png" style="margin-right: 5%; width:100%;height:100%">
                </div>
                <div class="col-md-2 col-12" style="width:25em;text-align:center;">
                    <b>
                        <p style="color:white; padding-top:10%; margin-top:25px;margin-right: -20%;">Contact US: 000-111-0001
                    </b>&nbsp


                    <a href="#" style="text-decoration:none"><i class="fa fa-facebook-official" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                    <a href="#" style="text-decoration:none"><i class="fa fa-instagram" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp</a>
                    <a href="#" style="text-decoration:none"><i class="fa fa-twitter" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i></a>
                    </p>
                </div>
            </div>
        <!-- </div> -->

        <h4 style="
                color: white;
    font-family: 'Francois One', sans-serif;
    font-weight: 500;
    letter-spacing: 2.5px;
    margin-top: -3%;
    font-size: 1em;
    margin-left: 23%;

              ">Copyright 2022 Easy WebContent, Inc. All rights reserved. Proudly made in India.</h4>

    </div>
</html>
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>