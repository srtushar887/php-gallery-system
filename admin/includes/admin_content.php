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
//                   $user->save();


//                    $user = User::find_user_by_id(13);
//                    $user->last_name = "sssss";
//                    $user->save();


//                $user = User::find_user_by_id(6);
//                $user->username = "sdsadasd";
//                $user->save();

//                $user = new User();
//                $user->username = "asdasdasdasd";
//                $user->save();
//                $user = User::find_all();
//                foreach ($user as $us){
//                    echo $us->username."<br>";
//                }

                                $photos = Photo::find_all();
                                foreach ($photos as $us){
                                    echo $us->title."<br>";
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