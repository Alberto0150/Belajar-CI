<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <form action="<?php echo site_url('template/form_event_new') ?>" method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="name">Name*</label>
            <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
            type="text" name="name" placeholder="Product name" />
            <div class="invalid-feedback">
                <?php echo form_error('name') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="price">Price*</label>
            <input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
            type="number" name="price" min="0" placeholder="Product price" />
            <div class="invalid-feedback">
                <?php echo form_error('price') ?>
            </div>
        </div>


        <div class="form-group">
            <label for="name">Photo</label>
            <input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
            type="file" name="image" />
            <div class="invalid-feedback">
                <?php echo form_error('image') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Description*</label>
            <textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
            name="description" placeholder="Product description..."></textarea>
            <div class="invalid-feedback">
                <?php echo form_error('description') ?>
            </div>
        </div>

        <input class="btn btn-success" type="submit" name="btn" value="Save" />
    </form>