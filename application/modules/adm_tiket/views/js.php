<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-tiket").addClass('opened');
        $(".mn-tiket").addClass('active');
        $(".mn-tiketv").addClass('visible');
        $(".mn-tiketa").addClass('active');
    });

    <?= $this->load->view('adm_tiket/jsdatatable', '', TRUE); ?>

</script>