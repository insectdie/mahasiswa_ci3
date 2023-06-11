
<script>
    let baseUrl = '<?= base_url() ?>';
    let route = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);

    $(document).ready(function () {

        $('#tabel-mahasiswa').DataTable();
        
        // Prodi select in edit
        let id = $('.select-jurusan').val();
        let options = '<option value="" selected disabled>Pilih Jurusan</option>';

        <?php
        if (isset($prodi_all) && isset($mahasiswa)) {
            foreach ($prodi_all as $p_data) {
        ?>
            if ( <?= ($p_data->jurusan_id == NULL) ? '0' : $p_data->jurusan_id ?> == id ) {
                options += '<option value = "<?= $p_data->id ?>" <?= ($p_data->id == $mahasiswa->prodi_id) ? 'selected="selected"' : ''; ?> >(<?= $p_data->kode_prodi ?>) <?= $p_data->nama_prodi ?></option>';
            }
        <?php 
            } 
        }
        ?>
        $('.select-prodi').html(options);

        $( ".select-jurusan" ).on( "change", function() {
            let id = $(this).val();
            let options = '<option value="" selected disabled>Pilih Jurusan</option>';
            <?php
                if (isset($prodi_all)) {
                foreach ($prodi_all as $p_data) {
            ?>
                    if ( <?= ($p_data->jurusan_id == NULL) ? '0' : $p_data->jurusan_id ?> == id ) {
                    options += '<option value = "<?= $p_data->id ?>" <?= ($p_data->id == set_value('jurusan_id')) ? 'selected="selected"' : ''; ?> >(<?= $p_data->kode_prodi ?>) <?= $p_data->nama_prodi ?></option>';
                    }
            <?php 
                } 
                }
            ?>
                
            $('.select-prodi').html(options);
        } );

        // Sweet Alert
        $('a.delete-btn').on( "click",function(){
            let row = $(this).closest('tr');
            let id = row.attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: baseUrl+route+'/delete/'+id,
                        type: 'DELETE',
                        error: function() {
                            alert('Gagal!');
                        },
                        success: function(data) {
                            location.replace(location.pathname);
                        }
                    });
                }
            })
        });

    });
</script>
