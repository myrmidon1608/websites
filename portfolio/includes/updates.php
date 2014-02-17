
    <div class="modalContainer hidden" id="updatesModal">
        <div class="modal">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal(this);">&times;</button>
                <h4>Updates</h4>
            </div>
            <div class="modal-body update">
                
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

    