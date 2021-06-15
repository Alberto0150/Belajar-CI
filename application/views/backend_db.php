<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
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
                    <a href="<?php echo site_url('../edit/template/form_event_edit.php'.$itemlist->e_id) ?>"
                        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    <a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$itemlist->e_id) ?>')"
                        href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>