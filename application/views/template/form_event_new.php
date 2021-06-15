<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <form action="<?php echo site_url('template/form_event_new') ?>" method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="name">Nama</label>
            <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
            type="text" name="nama" placeholder="Nama Event" />
            <div class="invalid-feedback">
                <?php echo form_error('nama') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Sebagai</label>
            <input class="form-control <?php echo form_error('sebagai') ? 'is-invalid':'' ?>"
            type="text" name="sebagai" placeholder="Sebagai ..." />
            <div class="invalid-feedback">
                <?php echo form_error('sebagai') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Tanggal &#91;yyyy-mm-dd&#92;</label>
            <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
            type="date" name="tanggal" placeholder="tanggal kegiatan" />
            <div class="invalid-feedback">
                <?php echo form_error('tanggal') ?>
            </div>
        </div>
        

        <div class="form-group">
            <label for="name">Deskripsi</label>
            <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
            name="deskripsi" placeholder="deskripsi tugas..."></textarea>
            <div class="invalid-feedback">
                <?php echo form_error('deskripsi') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Foto</label>
            <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
            type="file" name="foto" />
            <div class="invalid-feedback">
                <?php echo form_error('foto') ?>
            </div>
        </div>

        <input class="btn btn-success" type="submit" name="btn" value="Save" />
    </form>