<?php

    

?>

<div id="userBar" class="">
    <ul>
        <li>
            <img src="thisisanimage.png" alt="" />
        </li>
        <li>
            <strong>
                <?php echo 'Hello, ' . ucfirst($user_data['first_name']) . '!'; ?>
            </strong>
        </li>
        <li>
            <a href="">Profile</a>
        </li>
        <li>
            <a href="includes/logout.php">Logout</a>
        </li>
    </ul>
</div>
