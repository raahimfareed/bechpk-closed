<div class="row">
    <div class="col s12">
        <h4>All Admins</h4>
        <table class="responsive-table highlight white">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Admin ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Image</td>
                    <td>Permission Level</td>
                    <td>Registration Date</td>
                    <?php if($Admin -> GetPermissionLevel() <= 3) {; ?>
                    <td>Actions</td>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT * from admins';
                $stmt = $Admin -> GetDB() -> prepare($sql);
                $stmt -> execute();
                while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                    ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['AdminId'] ?></td>
                    <td><?php echo $row['FirstName']." ".$row['LastName']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><img class="all-admin-img materialboxed" src='<?php echo $row['ProfileImage']; ?>' /></td>
                    <td><?php echo $row['PermissionLevel']; ?></td>
                    <td><?php $adminDate = new DateTime($row['RegistrationDate']); echo $adminDate -> format('d-M-Y'); ?></td>
                    <?php if($Admin -> GetPermissionLevel() <= 3) {; ?>
                    <td>
                        <a data-adminid='<?php echo $row['AdminId']; ?>' class="btn-small blue">Promote</a>
                        <a data-adminid='<?php echo $row['AdminId']; ?>' class="btn-small green">Active</a>
                        <a data-adminid='<?php echo $row['AdminId']; ?>' class="btn-small orange darken-2">Disable</a>
                        <a data-adminid='<?php echo $row['AdminId']; ?>' class="btn-small red">Delete</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>