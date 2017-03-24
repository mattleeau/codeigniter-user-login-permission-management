<div class="row">
    <!-- edit form column -->
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Group information'); ?></h3>
        <?php echo form_open_multipart(base_url_with_language("group/save"), array('id'=>'group_edit_form', 'class'=>'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form')); ?>
            <input type="hidden" name="group_id" id="group_id" value="<?php echo $group['group_id']; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Family'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='role'"; ?>
                        <?php echo form_dropdown('family_id', $families, $group['family_id'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Group name'); ?>:</label>
                <div class="col-lg-8">
                    <input name="group_name_<?php echo $lang; ?>" class="form-control" type="text" value="<?php echo $group['group_name_'.$lang]; ?>" required autocomplete="off">
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $group['group_name_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Icon'); ?>: </label>
                <div class="col-lg-8">
                    <?php if ($group['icon']!=""): ?>
                    <img id="exist_icon" src="<?php echo base_url('skin/icons/'.$group['icon']); ?>" width="40" height="40" />
                    <input type="button" id="btn_icon_change" class="btn btn-default" value="<?php echo $this->lang->line('Delete'); ?>">
                    <?php endif; ?>
                    <input name="icon" id="icon" class="btn btn-default" type="file" required <?php if($group['icon']): ?>style="display: none;"<?php endif;?>>
                    <input type="hidden" name="icon_is_changed" id="icon_is_changed" value="0" />
                    <input type="hidden" name="old_icon" value="<?php echo $group['icon']; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" id="btn_submit" class="btn btn-primary" value="<?php echo $this->lang->line('Save'); ?>">
                    <span></span>
                    <input type="button" id="btn_cancel" class="btn btn-default" value="<?php echo $this->lang->line('Cancel'); ?>" onclick="javascript: location.href = '<?php echo base_url_with_language("/group"); ?>';">
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <script>
    jQuery(document).ready(function() {
        jQuery('#group_edit_form')
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
                    group_name_<?php echo $lang; ?>: {
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

        jQuery('#btn_icon_change').click(function() {
            jQuery("#exist_icon").hide();
            jQuery(this).hide();
            jQuery("#icon").show();
            jQuery("#icon_is_changed").val(1);
        })
    });
    </script>
</div>
