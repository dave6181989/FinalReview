<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$name = $checkIn = $checkOut = $RoomType= "";
$name_err = $checkIn_err = $checkOut_err = $RoomType_err= "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }
    
    // Validate Check In
    $input_checkIn = trim($_POST["checkIn"]);
    if(empty($input_checkIn)){
        $checkIn_err = 'Please enter a Date.';     
    } else{
        $checkIn = $input_checkIn;
    }
    

    
        
            // Validate Check Out
    $input_checkOut = trim($_POST["checkOut"]);
    if(empty($input_checkOut)){
        $checkOut_err = 'Please enter a Date.';     
    } else{
        $checkOut = $input_checkOut;
    }
    
    
    // Validate Room Type
    $input_RoomType= trim($_POST["RoomType"]);
    if(empty($input_RoomType)){
        $RoomType_err = 'Please enter a Room Type.';     
    } else{
        $RoomType = $input_RoomType;
    }
   
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($checkIn_err) && empty($checkOut_err)&& empty($RoomType_err)){
        // Prepare an insert statement
        $sql = "UPDATE data SET name=:name, checkIn=:checkIn, checkOut=:checkOut, RoomType=:RoomType WHERE id=:id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':name', $param_name);
            $stmt->bindParam(':checkIn', $param_checkIn);
            $stmt->bindParam(':checkOut', $param_checkOut);
            $stmt->bindParam(':RoomType', $param_RoomType);
            
            $stmt->bindParam(':id', $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_checkIn = $checkIn;
            $param_checkOut = $checkOut;
            $param_RoomType = $RoomType;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM data WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':id', $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $name = $row["name"];
                    $checkIn = $row["checkIn"];
                    $checkOut = $row["checkOut"];
                    $RoomType = $row["RoomType"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($checkIn_err)) ? 'has-error' : ''; ?>">
                            <label>Check In Date</label>
                            <textarea name="checkIn" class="form-control"><?php echo $checkIn; ?></textarea>
                            <span class="help-block"><?php echo $checkIn_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($checkOut_err)) ? 'has-error' : ''; ?>">
                            <label>Check Out Date</label>
                            <input type="text" name="checkOut" class="form-control" value="<?php echo $checkOut; ?>">
                            <span class="help-block"><?php echo $checkOut_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($RoomType_err)) ? 'has-error' : ''; ?>">
                            <label>Room Type</label>
                            <input type="text" name="RoomType" class="form-control" value="<?php echo $RoomType; ?>">
                            <span class="help-block"><?php echo $RoomType_err;?></span>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>