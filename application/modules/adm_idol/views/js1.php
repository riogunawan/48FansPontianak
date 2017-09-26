<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-idol").addClass('opened');
        $(".mn-idol").addClass('active');
        $(".mn-idolv").addClass('visible');
        $(".mn-idolb").addClass('active');
    });
    <?= $this->load->view('adm_idol/jsdropzone', '', TRUE); ?>
</script>