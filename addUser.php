<?php include 'header.php'; ?>
<?php 
    
    include 'function.php'; 
    $object = new dataBase();

    if(isset($_POST['savenow'])){

       $return_MSG =  $object-> insertData($_POST);
    }
    
    
?>

<!-- form section start here -->
<div id="form" class="my-4">
    <div class="container px-4 py-3 shadow">
        <div class="row">
             <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <p class="text-center h2" style="font-family: 'Righteous', cursive;">Create New User Now</p>
                <div class="mb-1">
                    <span style="color:red;"><?php if(isset($return_MSG)){ echo $return_MSG; } ?></span><br>
                    <label for="nameid" class="form-label"><strong>Name:</strong></label>
                    <input type="text" name="userIn" class="form-control" id="nameid" placeholder="Please enter your full name..." required>
                </div>
                <div class="mb-1">
                    <label for="email_id" class="form-label"><strong>Email</strong></label>
                    <input type="email" name="emailIn" class="form-control" id="email_id" placeholder="Please enter valid email address" required>
                </div>
                <div class="mb-1">
                    <label for="Password_id" class="form-label"><strong>Password</strong></label>
                    <input type="password" name="passwordIn" class="form-control" id="password_id" placeholder="Write down 6 character password" required>
                </div>
                <div class="mb-2">
                    <label for="phonenum" class="form-label"><strong>Phone</strong></label>
                    <input type="text" name="phoneIn" class="form-control" id="phonenum" placeholder="Enter your current phone number." required>
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
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter your current address" required>
                </div>
                <div class="div mt-3">
                    <input class="btn bg-success text-light" type="submit" name="savenow" value="Submit Data">
                    <a href="index.php" class="btn bg-danger ms-3 text-light">Cancel Now!</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- form section end here -->

<?php include 'footer.php'; ?>