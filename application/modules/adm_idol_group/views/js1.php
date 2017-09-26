<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-idolg").addClass('opened');
        $(".mn-idolg").addClass('active');
        $(".mn-idolgv").addClass('visible');
        $(".mn-idolgb").addClass('active');
    });
    <?= $this->load->view('adm_idol_group/jsdropzone', '', TRUE); ?>
</script>