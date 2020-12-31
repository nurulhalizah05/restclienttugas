<font color="orange">
<?php echo $this->session->flashdata('info'); ?>
</font>
<h1>DATA NOVEL</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>JUDUL</th>
        <th>GENRE</th>
        <th>PENULIS</th>
    </tr>
    <?php
    foreach ($data_novel as $novel) {
        echo "<tr>
              <td>$novel->id</td>
              <td>$novel->judul</td>
              <td>$novel->genre</td>
              <td>$novel->penulis</td>
              <td>" . anchor('novel/edit/' . $novel->id, 'Edit') . "
                  " . anchor('novel/delete/' . $novel->id, 'Delete') . "</td>
              </tr>";
    }
    ?>
</table>
<a href=<?=base_url()?>index.php/novel/simpan>+ Tambah data</a>

