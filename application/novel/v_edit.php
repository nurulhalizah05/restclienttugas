<?php echo form_open('novel/edit'); ?>
<?php echo form_hidden('id', $data_novel[0]->id); ?>
<h1>EDIT NOVEL</h1>
<table>
    <tr><td>ID</td><td><?php echo form_input('', $data_novel[0]->id, "disabled"); ?></td></tr>
    <tr><td>JUDUL</td><td><?php echo form_input('judul', $data_novel[0]->judul); ?></td></tr>
    <tr><td>GENRE</td><td><?php echo form_input('genre', $data_novel[0]->genre); ?></td></tr>
    <tr><td>PENULIS</td><td><?php echo form_input('penulis', $data_novel[0]->penulis); ?></td></tr>
    <tr><td colspan="2">
            <?php echo form_submit('submit', 'Simpan'); ?>
            <?php echo anchor('novel', 'Kembali'); ?></td></tr>
</table>
<?php
echo form_close();
?>

