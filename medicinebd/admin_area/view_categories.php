<h3 class="text-center">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info ">
        <tr>
            <td>Serial No.</td>
            <td>Category Title</td>
            <td>Edit</td>
            <td>Delete</td>

        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat = "SELECT * from categories";
        $res_cat = mysqli_query($con, $select_cat);
        $num = 0;
        while ($row = mysqli_fetch_assoc($res_cat)) {
            $num++;
            $cat_id = $row['category_id'];
            $cat_title = $row['category_title'];

        ?>
            <tr>
                <td><?php echo $num; ?></td>
                <td><?php echo $cat_title; ?></td>
                <td><a href='index.php?edit_cat=<?php echo $cat_id; ?>' style='color: green;'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_cat=<?php echo $cat_id; ?>' style='color: red;' type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are You Sure? </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_categories" class="text-decoration-none text-light">No</a></button>
                <button type="button" class="btn btn-primary"><a href='index.php?delete_cat=<?php echo $cat_id; ?>'  class="text-decoration-none text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>