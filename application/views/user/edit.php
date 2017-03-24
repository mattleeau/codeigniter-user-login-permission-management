<div class="row">
    <!-- edit form column -->
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('User information'); ?></h3>
        <?php echo form_open(base_url_with_language("user/save"), array('id'=>'user_edit_form', 'class'=>'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form')); ?>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['user_id']; ?>">
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Firstname'); ?>:</label>
                <div class="col-lg-8">
                    <input name="firstname" class="form-control" type="text" value="<?php echo $user['firstname']; ?>" <?php echo $disabled; ?> required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Lastname'); ?>:</label>
                <div class="col-lg-8">
                    <input name="lastname" class="form-control" type="text" value="<?php echo $user['lastname']; ?>" <?php echo $disabled; ?> required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo $this->lang->line('Username'); ?>:</label>
                <div class="col-md-8">
                    <input name="username" class="form-control" type="text" value="<?php echo $user['username']; ?>" <?php echo $disabled; ?> required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo $this->lang->line('Password'); ?>:</label>
                <div class="col-md-8">
                    <input name="password" id="password" class="form-control" type="password" data-minlength="6" value="" <?php echo $disabled; ?> required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo $this->lang->line('Confirm password'); ?>:</label>
                <div class="col-md-8">
                    <input name="confirm_password" class="form-control" data-minlength="6" data-match="#password" type="password" value="" <?php echo $disabled; ?> required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"><?php echo $this->lang->line('Role'); ?>:</label>
                <div class="col-lg-8">
                    <div class="ui-select">
                        <?php $css_attr = "class='form-control' id='role'"; ?>
                        <?php if ($disabled!='') $css_attr .= " disabled"; ?>
                        <?php echo form_dropdown('role', array(USER_ROLE_ADMIN=>$this->lang->line('Administrator'), USER_ROLE_NORMAL=>$this->lang->line('Normal'), ), $user['role'], $css_attr); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" id="btn_submit" class="btn btn-primary" value="<?php echo $this->lang->line('Save'); ?>" <?php echo $disabled; ?>>
                    <span></span>
                    <input type="button" id="btn_cancel" class="btn btn-default" value="<?php echo $this->lang->line('Cancel'); ?>" onclick="javascript: location.href = '<?php echo base_url("/user"); ?>';">
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <script>
    jQuery(document).ready(function() {
        jQuery('#user_edit_form')
            .formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    lasstname: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'The full name is required and cannot be empty'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required and cannot be empty'
                            }
                        }
                    },
                    confirm_password: {
                        validators: {
                            notEmpty: {
                                message: 'The confirm password is required and cannot be empty'
                            },
                            identical: {
                                field: 'password',
                                message: 'The password and its confirm must be the same'
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
