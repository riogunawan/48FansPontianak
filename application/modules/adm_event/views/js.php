<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-gathering").addClass('opened');
        $(".mn-gathering").addClass('active');
        $(".mn-gatheringv").addClass('visible');
        $(".mn-gatheringa").addClass('active');
    });

    <?= $this->load->view('adm_event/jsdatatable', '', TRUE); ?>

</script>