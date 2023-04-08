<?php include 'header.php'; ?>
<?php 
    
    include 'function.php'; 
    $object = new dataBase();

    //This code is used for field data show
    if(isset($_GET['update_id'])){

        $view_id = $_GET['update_id'];
        $showData = $object->readData($view_id);
    }
    
    
    //This code is used for update data 
    if(isset($_POST['update'])){

        $update_MSG = $object->update($_POST);
    }
    
    
?>

<!-- form section start here -->
<div id="form" class="my-4">
    <div class="container p-3 shadow">
        <div class="row">
             <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <p class="text-center h4" style="font-family: 'Righteous', cursive;">Update User Information !</p>
                <div class="mb-1">
                    <span style="color:red;"><?php if(isset($update_MSG)){ echo $update_MSG; } ?></span><br>
                    <label for="nameid" class="form-label"><strong>Name:</strong></label>
                    <input type="text" name="userIn" value="<?php if(isset($showData)) { echo $showData['name'];} ?>" class="form-control" id="nameid" placeholder="Please enter your full name..." required>
                </div>
                <div class="mb-1">
                    <label for="email_id" class="form-label"><strong>Email</strong></label>
                    <input type="email" name="emailIn" value="<?php if(isset($showData)) { echo $showData['email']; } ?>" class="form-control" id="email_id" placeholder="Please enter valid email address" required>
                </div>
                <div class="mb-1">
                    <label for="Password_id" class="form-label"><strong>Password</strong></label>
                    <input type="password" name="passwordIn" value="<?php if(isset($showData)) { echo $showData['password'];} ?>" class="form-control" id="password_id" placeholder="Write down 6 character password" required>
                </div>
                <div class="mb-2">
                    <label for="phonenum" class="form-label"><strong>Phone</strong></label>
                    <input type="text" name="phoneIn" value="<?php if(isset($showData)) { echo $showData['phone'];  } ?>" class="form-control" id="phonenum" placeholder="Enter your current phone number." required>
                </div>
                <div class="mb-2">
                    <label class="form-label"><strong>Gender:</strong></label>
                    <input type="radio" name="gender" value="Male" checked> Male
                    <input type="radio" name="gender" value="Female"> Female
                    <input type="radio" name="gender" value="Others"> Others
                </div>
                <div class="mb-1">
                    <label for="" class="form-label"><strong>Upload Image:</strong> </label>
                    <input type="file" name="upload_image">
                </div>
                <div class="mb-1">
                    <label for="address" class="form-label"><strong>Address</strong></label>
                    <input type="text" name="address" value="<?php if(isset($showData)) { echo $showData['address'];  } ?>" class="form-control" id="address" placeholder="Enter your current address" required>
                </div>
                <div class="div mt-3">
                    <input type="hidden" name="id_name" value="<?php echo $showData['id']; ?>" >
                    <input class="btn bg-success text-light" type="submit" name="update" value="Update Now">
                    <a href="index.php" class="btn bg-danger text-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- form section end here -->

<?php include 'footer.php'; ?>