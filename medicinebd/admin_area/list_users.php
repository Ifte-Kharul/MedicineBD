<h3 class="text-center">All Users</h3>
<table class="table table-bordered ">
    <?php
    $user_query="SELECT * from user_table";
    $run_query=mysqli_query($con,$user_query);
    $count=mysqli_num_rows($run_query);
    if($count==0){
        echo "<h3 class='text-center'>No User to show</h3>";
    }else{
    ?>
    <thead class="bg-info text-center">
        <tr>
            <td>Sl No</td>
            <td>Username</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>Address</td>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $number=0;
        
        while($row_user=mysqli_fetch_assoc($run_query)){
        $number++;
        $user_id=$row_user['user_id'];
        $username=$row_user['user_username'];
        $user_address=$row_user['user_address'];
        $user_mobile=$row_user['user_mobile'];
        $user_email=$row_user['user_email'];
        
        
    
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_mobile; ?></td>
            <td><?php echo $user_address; ?></td>
        </tr>
        <?php
        }}
        ?>
    </tbody>
   
</table>