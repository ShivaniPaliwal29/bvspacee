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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Merriweather:wght@300&family=Pathway+Gothic+One&display=swap"
            rel="stylesheet"/>
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600;1,800&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <!-- footer -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
* {
                    padding: 0;
                    margin: 0;
                    box-sizing: border-box;
                    /* color:white; */
                    font-family: Verdana, sans-serif;
                    /* color: rgb(238, 236, 236); */
                }
                table, tr, td,th{
                border:none;
                }
                .h4, h4 {
                    text-align: center;
                    font-size: calc(1.275rem + .3vw);
                }

                body {
                    /* width: 100%;
                    height: 100vh; */
                    background-image:url('https://media.istockphoto.com/vectors/damask-wallpaper-pattern-vector-id165794203?k=20&m=165794203&s=612x612&w=0&h=IVSStAR2uRfrdCY_YTa5gUi7mUZI8lZkKISItuRc414=');
                    /* background-color:#E8E8E8; */
                    display: flex;
                    align-items: center;
                    justify-content: space-around;
                    flex-direction: column; 
                }

                #table{
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
                    border-bottom: 0px solid rgba(255, 255, 255, 0.7);
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
                    background-color: #FBF6EA;
                    color:black;
                }

                .table-rows:nth-child(odd) {
                    background-color: #efe7dd;
                    color:black;
                }

                .header-row {
                    background-color: white !important;
                    color:black;
                }

                .table-rows:hover {
                    background-color: #dab897;
                    transform: scale(1.1);
                }

                .table-rows:hover svg {
                    opacity: 1;
                    transform: scale(1.2);
                }
            </style>
    <title>Q & n</title>
</head>
<body>
<div>
    <?php include('header.php');?>
    <div class="container" style="margin-top:8%">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Q & A</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" size="160" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary" style="background-color: black">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div><div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="header-row">
                                    <th class="header-item items">Question</th>
                                    <th class="header-item items">Views</th>
                                </tr>
                            </thead>
                            <tbody>
                    </div>
                </div>
            </div>

            
                                <?php 
                                    $con = mysqli_connect("localhost","root","","bvspace");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM question WHERE CONCAT(ques) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr class="table-rows">
                                                    <?php $my=$items['ques_id'];?>
                                                    <td class="items"><?php
                                                    echo "<a href=\"displayanswer.php?value=$my\">";
                                                    echo $items["ques"];
                                                    echo '</a>';
                                                    ?></td>
                                                    <td class="items"><?= $items['view_times_no']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="2">No Record Found</td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<?php include('footer.php');?>
</body>
</html>
<?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>