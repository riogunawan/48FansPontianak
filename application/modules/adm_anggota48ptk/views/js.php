<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $(".mn-anggota").addClass('opened');
        $(".mn-anggota").addClass('active');
        $(".mn-anggotav").addClass('visible');
        $(".mn-anggotaa").addClass('active');
    });

    <?= $this->load->view('adm_anggota48ptk/jsdatatable', '', TRUE); ?>

</script>