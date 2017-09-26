<script>
    //CLASS AKTIF
    $(document).ready(function() {
        $('.mn-berita').addClass('opened');
        $('.mn-berita').addClass('active');
        $('.mn-beritav').addClass('visible');
        $('.mn-beritab').addClass('active');
        // $('.mn-beritaa').removeClass('active');
    });
<?= $this->load->view('adm_berita/dropzone', '', TRUE); ?>
</script>