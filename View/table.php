<div class="container">
    <table class="table">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Profile URL</th>
        </tr>
        <?php
        foreach ($students as $student) {
            ?>
            <tr>
                <td><?php echo $student->getFirstName() ?></td>
                <td><?php echo $student->getLastName() ?></td>
                <td><?php echo $student->getEmail() ?></td>
                <td><a href="?user=<?php echo $student->getId() ?>">Profile URL</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>