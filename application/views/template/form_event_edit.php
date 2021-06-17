<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
            type="text" name="nama" placeholder="Nama Event" value="<?php echo $listAchievement->e_nama ?>" />
            <div class="invalid-feedback">
                <?php echo form_error('nama') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Sebagai</label>
            <input class="form-control <?php echo form_error('sebagai') ? 'is-invalid':'' ?>"
            type="text" name="sebagai" placeholder="Sebagai ..." value="<?php echo $listAchievement->e_sebagai ?>"/>
            <div class="invalid-feedback">
                <?php echo form_error('sebagai') ?>
            </div>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
            type="date" name="tanggal" placeholder="tanggal kegiatan" value="<?php echo $listAchievement->e_tanggal ?>"/>
            <div class="invalid-feedback">
                <?php echo form_error('tanggal') ?>
            </div>
        </div>
        

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
            name="deskripsi" placeholder="deskripsi tugas..."><?php echo $listAchievement->e_deskripsi ?></textarea>
            <div class="invalid-feedback">
                <?php echo form_error('deskripsi') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Foto</label>
            <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
            type="file" name="foto" />
            <input type="hidden" name="old_image" value="<?php echo $listAchievement->e_foto ?>" />
            <div class="invalid-feedback">
                <?php echo form_error('foto') ?>
            </div>
        </div>

        <input class="btn btn-success" type="submit" name="btn" value="Save" />
    </form>