<<<<<<< HEAD
<?php
include 'init.php'; 
?>
<div class ="container ">
<h1 class="text-center">Show Categories </h1>
<div class="row">
    <?php
     foreach(getItems('Cat_ID' , $_GET['pageid']) as $item){
        echo '<div class="col-sm-6 coll-md-3">';
           echo '<div class ="thumbnail item-box">';
            echo '<span class="price-tag">';
               echo '<img class="img-responsive" src="img.png" alt="" />';
               //echo'<div class="caption">' . $p\item['price'] . '</span>';
                    echo '<h3> <a href="items.php?itemid='. $item['Item_ID'].'">' . $item['Name'] . '</a></h3>' ;
                    echo '<p>' . $item['Description']. '</p>';
                    echo '<div class="date">' . $item['Add_Date']. '</div>';

        echo'</div>';
        echo'</div>';
        echo'</div>';

    }
    ?>
    </div>
    </div>


<?php include $tpl . 'footer.php';?>
=======
<?php
include 'init.php'; ?>
<div class ="container ">
<h1 class="text-center"><?php echo str_replace('-',' ',$_GET['pagename']?> </h1>
<div class="row">
    <?php
    foreach(getItems('Cat_ID' , $_GET['pageid']) as $item){
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


<?php include $tp1 . 'footer.php';?>
>>>>>>> eda3cc6c901deba950efdcf240e66b2a4d74ea58
