    
<?php

    $errors = array();

    if(count($_POST) > 0) {
        if(check_form("EMAIL")) {
            $errors["email"] = check_form("EMAIL");
        }
        
        if(check_form("FNAME")) {
            $errors["fname"] = check_form("FNAME");
        }
        
        if(check_form("LNAME")) {
            $errors["lname"] = check_form("LNAME");
        }
        
        if(check_form("BODY")) {
            $errors["body"] = check_form("body");
        }
        
        if(count($errors) == 0) {
            send_email(); ?>

            <div class="alert alert-info" role="alert">Your email has been sent. Thank you for contacting <?php bloginfo('name'); ?>!</div>
            
        <?php }
    }
?>

    <form action="" role="form" method="post">
        <div class="form-group">
            <label for="contact-EMAIL">Email address</label>
            <input type="email" value="<?php if(isset($_POST["EMAIL"])) { echo $_POST["EMAIL"]; } ?>" name="EMAIL" class="form-control" id="contact-EMAIL">
            <?php if(isset($errors["email"])) { ?><p class="form-error"><?php echo $errors["email"]; ?></p><?php } ?>
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="contact-FNAME">First name</label>
                <input type="text" value="<?php if(isset($_POST["FNAME"])) { echo $_POST["FNAME"]; } ?>" name="FNAME" class="form-control" id="contact-FNAME">
                <?php if(isset($errors["fname"])) { ?><p class="form-error"><?php echo $errors["fname"]; ?></p><?php } ?>
            </div>
            <div class="col-sm-6 form-group">
                <label for="contact-LNAME">Last name</label>
                <input type="text" value="<?php if(isset($_POST["LNAME"])) { echo $_POST["LNAME"]; } ?>" name="LNAME" class="form-control" id="contact-LNAME">
                <?php if(isset($errors["lname"])) { ?><p class="form-error"><?php echo $errors["lname"]; ?></p><?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label for="contact-BODY">What's on your mind?</label>
            <textarea name="BODY" class="form-control" id="contact-BODY" rows="5"><?php if(isset($_POST["BODY"])) { echo $_POST["BODY"]; } ?></textarea>
            <?php if(isset($errors["body"])) { ?><p class="form-error"><?php echo $errors["body"]; ?></p><?php } ?>
        </div>
        <p><small>*All fields required</small></p>
        <button type="submit" class="btn btn-default">Submit</button>

    </form>