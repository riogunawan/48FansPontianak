<script src="<?= base_url() ?>assets/neon/js/bootstrap-datepicker.js"></script>
<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-gathering").addClass('opened');
        $(".mn-gathering").addClass('active');
        $(".mn-gatheringv").addClass('visible');
        $(".mn-gatheringb").addClass('active');
    });
    <?= $this->load->view('adm_event/jsdropzone', '', TRUE); ?>
</script>
<?= $this->load->view('adm_event/jsmaps', '', TRUE); ?>