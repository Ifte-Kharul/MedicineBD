<h3 class="text-center">All Companies</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info ">
        <tr>
            <td>Serial No.</td>
            <td>Company Title</td>
            <td>Edit</td>
            <td>Delete</td>

        </tr>
    </thead>
    <tbody>
        <?php 
        $select_com="SELECT * from companies";
        $res_com=mysqli_query($con,$select_com);
        $num=0;
        while($row=mysqli_fetch_assoc($res_com)){
            $num++;
            $com_id=$row['company_id'];
            $com_title=$row['company_title'];
        
        ?>
        <tr>
        <td><?php echo $num; ?></td>
        <td><?php echo $com_title; ?></td>
        <td><a href='index.php?edit_com=<?php echo $com_id; ?>' style='color: green;'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_com=<?php echo $com_id; ?>' style='color: red;'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>