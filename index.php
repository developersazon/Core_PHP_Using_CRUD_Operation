<?php include 'header.php'; ?>
<?php 
    include 'function.php'; 

    $object = new dataBase();
    //Data receive 
    $show_Data = $object->read_data();


    // Delete database data
    if(isset($_GET['delete_id'])){

        $deleteid = $_GET['delete_id']; 
        $delete_MSG = $object->delete_data($deleteid);
    }

?>


<!-- PHP select section start here -->
<div id="read">
    <div class="container">
        <div class="row">
            <div class="col p-3">
                <h2 style="font-family: 'Righteous', cursive;">Our User Clients</h2>
            </div>
            <div class="col py-3">
                <a style="font-family: 'Righteous', cursive;" class="btn bg-success text-light" href="addUser.php">Add User</a>
            </div>
        </div>
    </div>
</div>
<!-- PHP select section end here -->

<!-- clients data start here -->
<div class="data">
    <div class="container py-3">
        <div class="row">
            <span style="color:green;"><?php if(isset($delete_MSG)) { echo $delete_MSG; } ?></span>
                <table class="table table-hover shadow">
                    <thead>
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Password</strong></td>
                            <td><strong>Phone</strong></td>
                            <td><strong>Gender</strong></td>
                            <td><strong>Picture</strong></td>
                            <td><strong>Address</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($read = mysqli_fetch_assoc($show_Data)) { ?>
                            <tr>
                                <td> <?php echo $read['id']; ?> </td>
                                <td><?php echo $read['name']; ?></td>
                                <td><?php echo $read['email']?></td>
                                <td><?php echo $read['password']?></td>
                                <td><?php echo $read['phone'] ?></td>
                                <td><?php echo $read['gender'] ?></td>
                                <td><?php echo $read['picture'] ?></td>
                                <td><?php echo $read['address'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="edit.php?update_id= <?php echo $read['id']; ?>">Update</a>    
                                    <a class="btn btn-danger ms-2" onclick="return confirm('Are you sure want to delete this Data !')" href="?delete_id= <?php echo $read['id']; ?>">Delete</a>    
                                </td>
                            </tr><?php } ?> 
                    </tbody>
                </table>
        </div>
    </div>
</div>
<!-- clients data end here -->







<?php include 'footer.php'; ?>