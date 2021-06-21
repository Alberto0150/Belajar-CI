<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $listAchievement->e_id?>" />
        <div class="form-group">
            <label for="e_nama">Nama</label>
            <input class="form-control <?php echo form_error('e_nama') ? 'is-invalid':'' ?>"
            type="text" name="e_nama" placeholder="Nama Event" value="<?php echo $listAchievement->e_nama ?>" />
            <div class="invalid-feedback">
                <?php echo form_error('e_nama') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="e_sebagai">Sebagai</label>
            <input class="form-control <?php echo form_error('e_sebagai') ? 'is-invalid':'' ?>"
            type="text" name="e_sebagai" placeholder="Sebagai ..." value="<?php echo $listAchievement->e_sebagai ?>"/>
            <div class="invalid-feedback">
                <?php echo form_error('e_sebagai') ?>
            </div>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control <?php echo form_error('e_tanggal') ? 'is-invalid':'' ?>"
            type="date" name="e_tanggal" placeholder="tanggal kegiatan" value="<?php echo $listAchievement->e_tanggal ?>"/>
            <div class="invalid-feedback">
                <?php echo form_error('e_tanggal') ?>
            </div>
        </div>
        

        <div class="form-group">
            <label for="e_deskripsi">Deskripsi</label>
            <textarea class="form-control <?php echo form_error('e_deskripsi') ? 'is-invalid':'' ?>"
            name="e_deskripsi" placeholder="deskripsi tugas..."><?php echo $listAchievement->e_deskripsi ?></textarea>
            <div class="invalid-feedback">
                <?php echo form_error('e_deskripsi') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="e_foto">Foto</label>
            <input class="form-control-file <?php echo form_error('e_foto') ? 'is-invalid':'' ?>"
            type="file" name="e_foto" />
            <input type="hidden" name="old_image" value="<?php echo $listAchievement->e_foto ?>" />
            <div class="invalid-feedback">
                <?php echo form_error('e_foto') ?>
            </div>
        </div>

        <input class="btn btn-success" type="submit" name="btn" value="Save" />
    </form>