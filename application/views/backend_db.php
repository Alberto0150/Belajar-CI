<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <a href="<?php echo site_url('../backend/new_form') ?>"><i class="fas fa-plus"></i> Add New</a>

    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" style="background-color:white">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Sebagai</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listAchievement as $itemlist): ?>
            <tr>
                <td width="150">
                    <?php echo $itemlist->e_nama ?>
                </td>
                <td>
                    <?php echo $itemlist->e_sebagai ?>
                </td>
                <td>
                    <?php echo $itemlist->e_tanggal ?>
                </td>
                <td>
                    <?php echo $itemlist->e_deskripsi ?>
                </td>
                <td>
                    <img src="<?php echo base_url('event_image/'.$itemlist->e_foto) ?>" width="64" />
                </td>
                <td width="250">
                    
                    <a href="<?php echo site_url('../backend/edit/'.$itemlist->e_id) ?>"
                        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?php echo site_url('../backend/delete/'.$itemlist->e_id) ?>"
                         class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    