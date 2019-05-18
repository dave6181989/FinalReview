<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$name = $checkIn = $checkOut =$RoomType= "";
$name_err = $checkIn_err = $checkOut_err =$RoomType_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
        $checkIn_err = 'Please enter an Date.';     
    } else{
        $checkIn = $input_checkIn;
    }
      
// Validate Check OuT
    $input_checkOut = trim($_POST["checkOut"]);
    if(empty($input_checkOut)){
        $checkOut_err = 'Please enter an date.';     
    } else{
        $checkOut = $input_checkOut;
    }
    
  // Validate Room Type
    $input_RoomType = trim($_POST["RoomType"]);
    if(empty($input_RoomType)){
        $RoomType = 'Please enter an Room type.';     
    } else{
        $RoomType= $input_RoomType;
    }
    
  
        
    // Check input errors before inserting in database
    if(empty($name_err) && empty($checkIn_err) && empty($checkOut_err)&& empty($RoomType_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO data (name, checkIn, checkOut, RoomType) VALUES (:name, :checkIn, :checkOut, :RoomType)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':name', $param_name);
            $stmt->bindParam(':checkIn', $param_checkIn);
            $stmt->bindParam(':checkOut', $param_checkOut);
             $stmt->bindParam(':RoomType', $param_RoomType);
             
            
            // Set parameters
            $param_name = $name;
            $param_checkIn = $checkIn;
            $param_checkOut = $checkOut;
            $param_RoomType = $RoomType;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    
                    
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                       <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                       
                       <div class="form-group <?php echo (!empty($checkIn_err)) ? 'has-error' : ''; ?>">
                            <label>Check In</label>
                            <textarea name="checkIn" class="form-control"><?php echo $checkIn; ?></textarea>
                            <span class="help-block"><?php echo $checkIn_err;?></span>
                        </div>
                       
                       <div class="form-group <?php echo (!empty($checkOut_err)) ? 'has-error' : ''; ?>">
                            <label>Check Out</label>
                            <input type="text" name="checkOut" class="form-control" value="<?php echo $checkOut; ?>">
                            <span class="help-block"><?php echo $checkOut_err;?></span>
                        </div>
                       
                       <div class="form-group <?php echo (!empty($RoomType_err)) ? 'has-error' : ''; ?>">
                            <label>Room Type</label>
                            <input type="text" name="RoomType" class="form-control" value="<?php echo $RoomType; ?>">
                            <span class="help-block"><?php echo $RoomType_err;?></span>
                        </div>
                       
                       <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    
                   </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>