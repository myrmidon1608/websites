
    <div class="modal fade" id="updatesModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Updates</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        $sql = updates_modal();
                        foreach($sql as $update) {
                    ?>
                    <h5><?php echo $update['title']; ?></h5>
                    <p><em><?php echo date('F jS, Y', strtotime($update['date'])); ?></em></p>
                    <p><?php echo $update['summary']; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    