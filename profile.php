<?php 
session_start();
$pageTitle = 'Profile';
include 'init.php';
?>
          <h1 class="text-center">My Profile</h1>
        <div class ="information block">
        <div class ="container">
        <div class ="panel panel-primary">
        <div class ="panel-heading">My Information</div>
        <div class ="panel-body">
                Name:Osama
        </div>
        </div>
       </div>
        </div>

        <div class ="my-ads block">
        <div class ="container">
        <div class ="panel panel-primary">
        <div class ="panel-heading">My Ads</div>
        <div class ="panel-body">
                Test Ads
        </div>
        </div>
       </div>
        </div>

        <div class ="My-Comment block">
        <div class ="container">
        <div class ="panel panel-primary">
        <div class ="panel-heading">Latest Comments</div>
        <div class ="panel-body">
            Test Comment
        </div>
        </div>
       </div>
        </div>


<?php
echo 'Welcome ' . $_SESSION['user'];
 include $tpl . 'footer.php'; ?>