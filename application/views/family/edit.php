<div class="row">
    <!-- edit form column -->
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Family information'); ?></h3>
        <?php show_message(); ?>
        <?php echo form_open(base_url_with_language("family/save"), array('id'=>'family_edit_form', 'class'=>'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form')); ?>
            <input type="hidden" name="family_id" id="family_id" value="<?php echo $family['family_id']; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Family'); ?>:</label>
                <div class="col-lg-8">
                    <input name="family_name_<?php echo $lang; ?>" class="form-control" type="text" value="<?php echo $family['family_name_'.$lang]; ?>" required autocomplete="off">
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $family['family_name_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Color'); ?>:</label>
                <div class="col-lg-8">
                    <input name="color" class="form-control" type="text" value="<?php echo $family['color']; ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" id="btn_submit" class="btn btn-primary" value="<?php echo $this->lang->line('Save'); ?>">
                    <span></span>
                    <input type="button" id="btn_cancel" class="btn btn-default" value="<?php echo $this->lang->line('Cancel'); ?>" onclick="javascript: location.href = '<?php echo base_url_with_language("/family"); ?>';">
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <script>
    jQuery(document).ready(function() {
        jQuery('#family_edit_form')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    family_name_<?php echo $lang; ?>: {
                        validators: {
                            notEmpty: {
                                message: '<?php echo $this->lang->line('Family') . ' is required and cannot be empty'; ?>'
                            }
                        }
                    }
                }
            })

        jQuery('#dropdown').selectpicker({
            size: 10,
        });
    });
    </script>
</div>
