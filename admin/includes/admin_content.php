<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               Admin Content
            </h1>

                <?php

                    $sql = "SELECT * FROM users WHERE id = 1";
                    $result = $database->query($sql);
                    while ($row = mysqli_fetch_array($result)){
                        echo $row['username'];
                    }

                ?>


            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>