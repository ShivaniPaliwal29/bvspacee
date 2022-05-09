<!doctype html>
<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>
<?php session_start();
if (isset($_SESSION['id'])) 
{
?>
    <html lang="en">

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- delete -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
        <!-- footer -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Study Material</title>
    </head>
    <style>
        * {
            padding: 0;
            margin: 0;
            /* box-sizing: border-box; */
            font-family: 'Patrick Hand', cursive;
            /* color: rgb(238, 236, 236); */
        }

        .h4,
        h4 {
            text-align: center;
            font-size: calc(1.275rem + .3vw);
        }

        table,
        tr,
        td,
        th {
            border: none;
        }

        body {
            width: 100%;
            height: 100vh;
            background-image: url('https://image.shutterstock.com/image-illustration/abstract-blue-white-gray-polygon-260nw-1451847182.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
        }

        #table {
            text-align: center;
            border-collapse: collapse;
        }

        .table-rows {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .items {
            padding: 15px 35px;
            font-size: 19px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.7);
        }

        .icons {
            width: 15px;
            height: 15px;
            display: inline-block;
        }

        .dec {
            fill: rgba(239, 49, 49, 0.56);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .inc {
            fill: rgba(110, 227, 89, 0.56);
            opacity: 0;
            transition: all 0.5s ease;
        }

        .table-rows:nth-child(even) {
            background-color: rgba(95, 197, 208, 0.21);
        }

        .table-rows:nth-child(odd) {
            background-color: rgba(55, 131, 138, 0.17);
            /* background-color:#31757C; */
        }

        .header-row {
            background-color: linear-gradient(to right bottom, #828282, #839fb5, #5fc5d0, #73e7b8, #d6fb84) !important;
        }

        .table-rows:hover {
            background-image: linear-gradient(to right bottom, #828282, #839fb5, #5fc5d0, #73e7b8, #d6fb84);
            transform: scale(1.1);
        }

        .table-rows:hover svg {
            opacity: 1;
            transform: scale(1.2);
        }
    </style>

    <body>
    <?php
        if (isset($_GET['search'])) 
        {
            ?>
        <?php include('header.php'); ?>
        <div class="container" style="margin-top:15%">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="color: black;text-transform:uppercase;font-size:40px;font-weight:900;font-family: 'Francois One', sans-serif;letter-spacing:7px"><?php echo $_GET['sub'] ?></h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <!-- <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" id="search" size="300" required value="<?php if (isset($_GET['search'])) {
                                                                                                            echo $_GET['search'];
                                                                                                        } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" name="btn" class="btn btn-primary" style="background-image: linear-gradient(to right bottom, #828282, #839fb5, #5fc5d0, #73e7b8, #d6fb84);">Search</button>
                                    </div>
                                </form> -->


                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>

                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="header-row">

                                        <th class="header-item items">Name</th>
                                        <th class="header-item items">Subject</th>
                                        <th class="header-item items">Title</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    include 'dbcon.php';

                                    $filtervalues = $_GET['search'];
                                    if (isset($_GET['btn']))
                                    {
                                        $filt = $_GET['search'];
                                        $query1 = "SELECT * FROM resources WHERE CONCAT(Subject,Branch,Title) LIKE '%$filt%' ";
                                        echo $query;
                                        $query_run1 = mysqli_query($con, $query1);


                                        if (mysqli_num_rows($query_run1) > 0) 
                                        {
                                            foreach ($query_run1 as $result) 
                                            {
                                        ?>
                                                <tr class="table-rows">

                                                    <td class="items"> <?php
                                                                        $i = $result["id"];
                                                                        $selectquery4 = "SELECT * FROM users WHERE id=$i";
                                                                        $query4 = mysqli_query($con, $selectquery4);
                                                                        while ($res4 = mysqli_fetch_assoc($query4)) {
                                                                            echo $res4["username"];
                                                                        }
                                                                        ?></td>
                                                    <td class="items"> <?php echo $result['Subject']; ?></td>
                                                    <td class="items"> <?php echo $result['Title']; ?></td>
                                                    <td class="items"><a href="<?php echo $result['Document']; ?>"><i class="fa-solid fa-download" title="Download" style="color:black; font-size:30px"></a></td></i>
                                                    <td>
                                                    <?php $email = $_SESSION['id'];
                                                    if ($result['id'] == $email) 
                                                    { ?>
                                                        <a href="deletestudy.php?sno=<?php echo $result['S.No']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="material-icons" style="">delete</i></a>   
                                                        <?php
                                                    } else 
                                                    { ?>
                                                        <i class="material-icons" style="color:grey" title="You can't delete other's posted Study Material">delete_forever</i>
                                                    <?php
                                                    } ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } 
                                        else 
                                        {
                                            ?>
                                            <tr class="table-rows">
                                                <td colspan="5">No Record Found</td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    if(!isset($_GET['btn']))
                                    {
                                    $query = "SELECT * FROM resources WHERE CONCAT(Branch) LIKE '%$filtervalues%' ";
                                    //echo $query;
                                    $query_run = mysqli_query($con, $query);


                                    if (mysqli_num_rows($query_run) > 0) 
                                    {
                                        foreach ($query_run as $result) 
                                        {
                                    ?>
                                            <tr class="table-rows">

                                                <td class="items"> <?php
                                                                    $i = $result["id"];
                                                                    $selectquery4 = "SELECT * FROM users WHERE id=$i";
                                                                    $query4 = mysqli_query($con, $selectquery4);
                                                                    while ($res4 = mysqli_fetch_assoc($query4)) {
                                                                        echo $res4["username"];
                                                                    }
                                                                    ?></td>
                                                <td class="items"> <?php echo $result['Subject']; ?></td>
                                                <td class="items"> <?php echo $result['Title']; ?></td>
                                                <!-- <td class="items"> <?php //echo $result['Branch']; ?></td> -->
                                                <td class="items"><a href="<?php echo $result['Document']; ?>"><i class="fa-solid fa-download" title="Download" style="color:black; font-size:30px"></a></td></i>
                                                <td>
                                                <?php $email = $_SESSION['id'];
                                                if ($result['id'] == $email) 
                                                { ?>
                                                    <a href="deletestudy.php?sno=<?php echo $result['S.No']; ?>&search=<?php echo $filtervalues;?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="material-icons" style="">delete</i></a>   
                                                    <?php
                                                } else 
                                                { ?>
                                                    <i class="material-icons" style="color:grey" title="You can't delete other's posted Study Material">delete_forever</i>
                                                <?php
                                                } ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } 
                                    else 
                                    {
                                        ?>
                                        <tr class="table-rows">
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                    <?php
                                    }
                                }
                                    // }
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
<?php }?>
        <!-- Footer -->
        <div style="background-color: #221f1f;
    width: 100%;
    width: 100%;
    bottom: 0;
    height: 29vh;
    margin-top: 7%;
    padding-bottom:4%">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-12">
                        <img src="https://i.ibb.co/cgMV93W/BVSpace-logos-white.png" style="margin-right: 5%; width:100%;height:100%">
                    </div>
                    <div class="col-md-2 col-12" style="width:25em;text-align:center;">
                        <b>
                            <p style="color:white; padding-top:10%; margin-top:25px; margin-left:-10%">Contact US: 000-111-0001
                        </b>&nbsp&nbsp&nbsp


                        <a href="#" style="text-decoration:none"><i class="fa fa-facebook-official" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                        <a href="#" style="text-decoration:none"><i class="fa fa-instagram" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i>&nbsp&nbsp</a>
                        <a href="#" style="text-decoration:none"><i class="fa fa-twitter" aria-hidden="true" style="color: white;padding-right: 1%;font-size: 30px;"></i></a>
                        </p>
                    </div>
                </div>
            </div>

            <h4 style="
                color: white;
    font-family: 'Francois One', sans-serif;
    font-weight: 500;
    letter-spacing: 2.5px;
    margin-top: -3%;
    font-size: 1em;
    margin-left: 1%;

              ">Copyright 2022 Easy WebContent, Inc. All rights reserved. Proudly made in India.</h4>

        </div>

    </body>

    </html>
<?php
} else {
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>