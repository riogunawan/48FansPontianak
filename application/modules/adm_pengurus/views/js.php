<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-pengurus").addClass('opened');
        $(".mn-pengurus").addClass('active');
        $(".mn-pengurusv").addClass('visible');
        $(".mn-pengurusa").addClass('active');
    });

    <?= $this->load->view('adm_pengurus/jsdatatable', '', TRUE); ?>

</script>