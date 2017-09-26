<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-memesan").addClass('active');
    });

    <?= $this->load->view('adm_memesan_semua/jsdatatable', '', TRUE); ?>

</script>