<div class="row">
    <!-- edit form column -->
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Procedure information'); ?></h3>
        <?php echo form_open(base_url_with_language("procedure/save"), array('id'=>'procedure_edit_form', 'class'=>'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form')); ?>
            <input type="hidden" name="procedure_id" id="procedure_id" value="<?php echo $procedure['procedure_id']; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Procedure'); ?>:</label>
                <div class="col-lg-8">
                    <input name="procedure_name_<?php echo $lang; ?>" class="form-control" type="text" value="<?php echo $procedure['procedure_name_'.$lang]; ?>" required autocomplete="off">
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['procedure_name_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Family'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='family_id'"; ?>
                        <?php echo form_multiselect('family_id[]', $families, $procedure['family_id'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Group'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='group_id'"; ?>
                        <?php echo form_multiselect('group_id[]', $groups, $procedure['group_id'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('What is'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="what_is_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['what_is_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['what_is_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Who can apply'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='who_can_apply'"; ?>
                        <?php echo form_multiselect('who_can_apply[]', $dropdowns[DROPDOWN_WHO], $procedure['who_can_apply'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Documents to be submitted'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="documents_to_be_submitted_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['documents_to_be_submitted_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['documents_to_be_submitted_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Where is processed'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='where_is_processed'"; ?>
                        <?php echo form_multiselect('where_is_processed[]', $dropdowns[DROPDOWN_WHERE], $procedure['where_is_processed'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('More information'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='more_information'"; ?>
                        <?php echo form_multiselect('more_information[]', $dropdowns[DROPDOWN_MORE], $procedure['more_information'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Economic cost'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="economic_cost_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['economic_cost_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['economic_cost_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Applicable regulations'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='applicable_regulations'"; ?>
                        <?php echo form_multiselect('applicable_regulations[]', $dropdowns[DROPDOWN_APPLICABLE], $procedure['applicable_regulations'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Deadline for resolution and notification'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="deadline_for_resolution_and_notification_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['deadline_for_resolution_and_notification_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['deadline_for_resolution_and_notification_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Formalities after the receipt of the request'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="formalities_after_the_receipt_of_the_request_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['formalities_after_the_receipt_of_the_request_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['formalities_after_the_receipt_of_the_request_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Clarifications'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="clarifications_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['clarifications_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['clarifications_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Observations'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="observations_<?php echo $lang; ?>" class="form-control" rows="10" required><?php echo $procedure['observations_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['observations_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Attachment'); ?>:</label>
                <div class="col-lg-8">
                    <div class="col-lg-1"><?php echo $this->lang->line('Name'); ?></div>
                    <div class="col-lg-11">
                        <input name="annexes_name_<?php echo $lang; ?>" class="form-control" type="text" value="<?php echo $procedure['annexes_name_'.$lang]; ?>" required autocomplete="off" style="width:85%;display:inline-block;margin-bottom:10px;">
                        <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['annexes_name_'.$other_lang]; ?></p>
                    </div>
                    <div class="col-lg-1"><?php echo $this->lang->line('Link'); ?></div>
                    <div class="col-lg-11">
                        <input name="annexes_link_<?php echo $lang; ?>" class="form-control" type="text" value="<?php echo $procedure['annexes_link_'.$lang]; ?>" required autocomplete="off" style="width:85%;display:inline-block;margin-bottom:10px;">
                        <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['annexes_link_'.$other_lang]; ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Search terms'); ?>:</label>
                <div class="col-lg-8">
                    <textarea name="search_terms_<?php echo $lang; ?>" class="form-control" rows="10" required placeholder="<?php echo $this->lang->line('Comma separated'); ?>"><?php echo $procedure['search_terms_'.$lang]; ?></textarea>
                    <p class="form-text text-muted other-lang"><b style="text-transform: capitalize;"><?php echo $languages[$other_lang]; ?>: </b><br><?php echo $procedure['search_terms_'.$other_lang]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" id="btn_submit" class="btn btn-primary" value="<?php echo $this->lang->line('Save'); ?>">
                    <span></span>
                    <input type="button" id="btn_cancel" class="btn btn-default" value="<?php echo $this->lang->line('Cancel'); ?>" onclick="javascript: location.href = '<?php echo base_url_with_language("/procedure"); ?>';">
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <script>
    jQuery(document).ready(function() {
        jQuery('#family_id').change(function() {
            jQuery.ajax({
                url: "<?php echo base_url('/group/get_groups_of_family'); ?>",
                method: 'post',
                data: {'family_id': jQuery(this).val(), 'lang': '<?php echo $lang; ?>'},
                success: function(html) {
                    jQuery('#group_id').html(html);
                }
            })
        })
        jQuery('#procedure_edit_form')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    procedure_name: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    family_id: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    group_id: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    what_is_<?php echo $lang; ?>: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    documents_to_be_submitted_<?php echo $lang; ?>: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    economic_cost_<?php echo $lang; ?>: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    who_can_apply: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    where_is_processed: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    more_information: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    }
                }
            })

        jQuery('#role').selectpicker({
            size: 10,
        });
    });
    </script>
</div>
