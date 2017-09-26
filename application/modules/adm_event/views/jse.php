<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-event").addClass('opened');
        $(".mn-event").addClass('active');
        $(".mn-eventv").addClass('visible');
        $(".mn-eventa").addClass('active');
    });

    <?= $this->load->view('adm_event/jsdatatable', '', TRUE); ?>

</script>