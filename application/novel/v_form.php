<?php echo form_open_multipart('novel/simpan'); ?>
<h1>TAMBAH DATA</h1>
<table>
    <tr>
        <td>JUDUL</td><td><?php echo form_input('judul'); ?></td>
    </tr>
    <tr>
        <td>GENRE</td><td><?php echo form_input('genre'); ?></td>
    </tr>        
    <tr>
        <td>PENULIS</td><td><?php echo form_input('penulis'); ?></td>
    </tr>  
    <tr>
        <td></td>
        <td colspan="2">
            <?php echo form_submit('submit', 'Simpan'); ?>
            <?php echo anchor('novel', 'Kembali'); ?></td></tr>
</table>
<?php
echo form_close();
?>