<div class="row">
    <!-- edit form column -->
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Option information'); ?></h3>
        <?php echo form_open(base_url_with_language("option/save"), array('id'=>'option_edit_form', 'class'=>'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form')); ?>
            <input type="hidden" name="option_id" id="option_id" value="<?php echo $option['option_id']; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Dropdown'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='role'"; ?>
                        <?php echo form_dropdown('dropdown', $dropdowns, $option['dropdown'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Option'); ?>:</label>
                <div class="col-lg-8">
                    <input name="option_title_<?php echo $lang; ?>" class="form-control" type="text" value="<?php echo $option['option_title_'.$lang]; ?>" required autocomplete="off">
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $option['option_title_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" id="btn_submit" class="btn btn-primary" value="<?php echo $this->lang->line('Save'); ?>">
                    <span></span>
                    <input type="button" id="btn_cancel" class="btn btn-default" value="<?php echo $this->lang->line('Cancel'); ?>" onclick="javascript: location.href = '<?php echo base_url_with_language("/option"); ?>';">
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <script>
    jQuery(document).ready(function() {
        jQuery('#option_edit_form')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    dropdown: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    option_title_<?php echo $lang; ?>: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
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
