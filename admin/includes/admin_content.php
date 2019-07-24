<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               Admin Content
            </h1>

                <?php

//                   $user = new User();
//                   $user->username = "nai";
//                   $user->password = "123456";
//                   $user->first_name = "nai";
//                   $user->last_name = "nai";
//                   $user->create();


//                    $user = User::find_user_by_id(2);
//                    $user->username = "sei";
//                    $user->password = "789456";
//                    $user->first_name = "sei";
//                    $user->last_name = "sei";
//                    $user->update();


                $user = User::find_user_by_id(5);
                $user->delete();


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