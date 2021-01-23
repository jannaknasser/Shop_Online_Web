<?php 
session_start();
$pageTitle = 'Profile';
include 'init.php';
if(isset($_SESSION ['user'])) {

        $getUser = $con->prepare("SELECT * FROM users WHERE Username=?" );
        $getUser->execute(array($sessionUser));
        $info = $getUser->fetch();
 

?>
          <h1 class="text-center">My Profile</h1>
        <div class ="information block">
        <div class ="container">
        <div class ="panel panel-primary">
        <div class ="panel-heading">My Information</div>
        <div class ="panel-body">
                Name: <?php echo $info ['Username'] ?> <br/>
                Email: <?php echo $info ['Email'] ?> <br/>
                Full Name: <?php echo $info [' FullName'] ?> <br/>
                Register Date: <?php echo $info ['Date'] ?> <br/>
               Favourite Category: 


        </div>
        </div>
       </div>
        </div>

        <div class ="my-ads block">
        <div class ="container">
        <div class ="panel panel-primary">
        <div class ="panel-heading">My Ads</div>
        <div class ="panel-body">
        <div class="row">
    <?php
    foreach(getItems('Member_ID' , $info['UserID']) as $item){
        echo '<div class="col-sm-6 coll-md-3">';
           echo '<div class ="thumbnail item-box">';
            echo '<span class="price-tag">';
               echo '<img class="img-responsive" src="img.png" alt="" />';
               echo'<div class="caption">' . $p\item['price'] . '</span>';
                    echo '<h3>' . $item['Name'] . '</h3>' ;
                    echo '<p>' . $item['Description']. '</p>';
        echo'</div>';
        echo'</div>';
        echo'</div>';

    }
    ?>
    </div>
        </div>
        </div>
       </div>
        </div>

        <div class ="My-Comment block">
        <div class ="container">
        <div class ="panel panel-primary">
        <div class ="panel-heading">Latest Comments</div>
        <div class ="panel-body">
         
                 <?php
                                 //Select All user Except Admin
                        $stmt = $con->prepare("SELECT comment FROM comments WHERE user_id = ?");
                
                                    //Execute The Statement
                        $stmt->execute(array($info['UserID']));

                                  //Assign to Variable 
                        $comments = $stmt->fetchAll();
                if (! empty($comments)){
                        foreach ($comments as $comment ) {
                                echo '<p>' . $comment ['comment'] . '</p>' ;
                                
                        }

                } else{
                        echo 'There\'s No Comments to show';
                }

                ?>         
        
        </div>
        </div>
       </div>
        </div>
<?php
} else{
        header('Location: login.php');
        exit();
}

 include $tpl . 'footer.php'; ?>