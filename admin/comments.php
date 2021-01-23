<?php 
	session_start();

	$pageTitle = 'Comments';

	if(isset($_SESSION['Username'])){

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		if($do == 'Manage' ) { //Manage Members Page 

			$stmt = $con->prepare("SELECT 
										comments.*, items.Name AS Item_Name, users.UserName AS Member 
									FROM 
										comments
									INNER JOIN
									items
									ON
										items.Item_ID = comments.item_id
									INNER JOIN
										users
									ON
										users.UserID = comments.user_id
									ORDER BY 
									c_id DESC 	");
			$stmt->execute();
			$rows = $stmt->fetchAll();

			?>


			<h1 class="text-center">Manage Comments</h1>
    		<div class="container">
    			<div class="table-responsive">
    				<table class="main-table text-center table table-bordered">
    					<tr>
    						<td>#ID</td>
    						<td>Comment</td>
    						<td>Item Name</td>
    						<td>User Name</td>
    						<td>Added Date</td>
    						<td>Control</td>
    					</tr>

    					<?php

    					foreach ($rows as $row) {
    						echo "<tr>";
    							echo "<td>" . $row['c_id'] . "</td>";
    							echo "<td>" . $row['comment'] . "</td>";
    							echo "<td>" . $row['Item_Name'] . "</td>";
    							echo "<td>" . $row['Member'] . "</td>";
    							echo "<td>" . $row['comment_date'] . "</td>"; 
    							echo "<td>
    									<a href='comments.php?do=Edit&comid=" . $row['c_id'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
    									<a href='comments.php?do=Delete&comid=" . $row['c_id'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";

    									if ($row['status'] == 0) {
    										echo "<a href='comments.php?do=Approve&comid="
	    										 . $row['c_id'] ."' 
	    										 class='btn btn-info activate'>
	    										 <i class='fa fa-check'></i> Approve </a>";
    									}

    								echo "</td>";
    						echo "</tr>";
    					}

    					?>

    				</table>
    			</div>
    		</div>	

    		

			<?php

			}elseif($do == 'Edit') { // Edit Page    

				$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0 ;

				$stmt = $con->prepare("SELECT * FROM comments WHERE c_id = ? LIMIT 1");

				$stmt->execute(array($comid));
				$row = $stmt->fetch();
				$count = $stmt->rowCount();

				if($count > 0){  ?>

		    		<h1 class="text-center">Edit Comment</h1>
		    		<div class="container">
		    			<form class="form-horizontal" action="?do=Update" method="POST">

		    				<input type="hidden" name="comid" value="<?php echo $comid ?>"/>

		    				<!---comment field--->
		    				<div class="form-group form-group-lg">
		    					<label class="col-sm-2 control-label">Username</label>
		    					<div class="col-sm-10 col-md-6">
		    						<textarea class="form-comtrol" name="comment"><?php echo $row['comment'] ?></textarea>
		    					</div>
		    				</div>

		    				<!---save button--->
		    				<div class="form-group form-group-lg">
		    					<div class="col-sm-offset-2 col-sm-10">
		    						<input type="submit" value="Save" class="btn btn-primary btn-lg"/>
		    					</div>
		    				</div>
		    			</form>
		    		</div>


			<?php

				}else{

					echo "no id ";
				}
	 	}elseif($do == 'Update'){ //Update Page

	 		echo " <h1 class='text-center'>Update Comment</h1> ";
	 		echo "<div class='container'>";

	 		if($_SERVER['REQUEST_METHOD'] == 'POST'){

	 			// get Variables from the Form 

	 			$comid = $_POST['comid'];
	 			$comment = $_POST['comment'];
	 		

	 			// Update Database with this info

 				$stmt = $con->prepare("UPDATE comments SET comment = ? WHERE c_id = ? ");

				$stmt->execute(array( $comment, $comid));

				$theMsg =  "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

				echo "<div class='container'>";
				redirectHome($theMsg , 'back',3);
		        echo "</div>";

	 			

	 		}else{

	 			echo "<div class='container'>";
	 			$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';
	 			redirectHome($theMsg);
	 			echo "</div>";

	 			//echo "cant browsedirectly";
	 		}

	 		echo "</div>";


	 	}elseif ($do == 'Delete') { // Delete Page

	 		echo " <h1 class='text-center'>Delete Member</h1> ";
	 		echo "<div class='container'>";

		 		$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0 ;

				$check = checkItem('c_id' , 'comments' , $comid);

				if($check > 0){ 

					$stmt = $con->prepare("DELETE FROM comments WHERE c_id = :id");
					$stmt->bindParam(":id", $comid);
					$stmt->execute();

					echo "<div class='container'>";
					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
					redirectHome($theMsg , 'back');
		 			echo "</div>";

				}else{
					echo "<div class='container'>";
	 				$theMsg = '<div class="alert alert-danger">There Is No Such ID</div>';
		 			redirectHome($theMsg);
		 			echo "</div>";
					}

			echo '</div>';


			
	 	}elseif($do == 'Approve'){

	 		echo " <h1 class='text-center'>Aprove Comment</h1> ";
	 		echo "<div class='container'>";

		 		$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0 ;


				$check = checkItem('c_id' , 'comments' , $comid);

				if($check > 0){ 

					$stmt = $con->prepare("UPDATE comments SET status = 1  WHERE c_id = ?");

					$stmt->execute(array($comid));

					echo "<div class='container'>";
					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Approved</div>';
					redirectHome($theMsg ,'back');
		 			echo "</div>";

				}else{
					echo "<div class='container'>";
	 				$theMsg = '<div class="alert alert-danger">There Is No Such ID</div>';
		 			redirectHome($theMsg);
		 			echo "</div>";
					}

			echo '</div>';

	 	}

		include $tpl . 'footer.php';

	}else{

		header('Location: index.php');

		exit();
	}