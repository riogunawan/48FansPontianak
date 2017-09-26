<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-idolg").addClass('opened');
        $(".mn-idolg").addClass('active');
        $(".mn-idolgv").addClass('visible');
        $(".mn-idolga").addClass('active');
    });

    <?= $this->load->view('adm_idol_group/jsdatatable', '', TRUE); ?>

</script>