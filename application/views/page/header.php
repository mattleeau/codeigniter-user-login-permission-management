<html>

<head>
    <title>Tramites</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/jquery-ui.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/jquery-ui.structure.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/jquery-ui.theme.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/bootstrap-theme.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/bootstrap-select.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/formValidation.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('skin/css/custom.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('skin/js/jquery.1.11.2.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('skin/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('skin/js/bootstrap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('skin/js/bootstrap-select.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('skin/js/validator.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('skin/js/form.validation.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('skin/js/custom.js'); ?>"></script>
</head>
<body role="document">
<div id="wrap">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- div class="navbar-header">
            <a class="navbar-brand" href="< ?php echo base_url_with_language(''); ?>"><img src="< ?php echo base_url('/skin/images/logo.png'); ?>" /></a>
        </div -->
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="acceso"><a href="<?php echo base_url_with_language('/procedure'); ?>"><?php echo $this->lang->line('Procedure'); ?></a></li>
                <?php if (isset($role) && $role == 1): ?>
                <li><a href="<?php echo base_url_with_language('/family'); ?>"><?php echo $this->lang->line('Family'); ?></a></li>
                <li><a href="<?php echo base_url_with_language('/group'); ?>"><?php echo $this->lang->line('Group'); ?></a></li>
                <li><a href="<?php echo base_url_with_language('/option'); ?>"><?php echo $this->lang->line('Option management'); ?></a></li>
                <li><a href="<?php echo base_url_with_language('/user'); ?>"><?php echo $this->lang->line('User'); ?></a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php if ($this->session->userdata('lang') != 'eu'): ?>
                    <a href="<?php echo base_url($this->uri->uri_string); ?>?lang=eu"><?php echo $this->lang->line('Basque'); ?></a>
                    <?php else: ?>
                    <a onclick="javascript: return false;"><?php echo $this->lang->line('Basque'); ?></a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($this->session->userdata('lang') != 'es'): ?>
                    <a href="<?php echo base_url($this->uri->uri_string); ?>?lang=es"><?php echo $this->lang->line('Spanish'); ?></a>
                    <?php else: ?>
                    <a onclick="javascript: return false;"><?php echo $this->lang->line('Spanish'); ?></a>
                    <?php endif; ?>
                </li>
                <?php if (strtolower($this->router->class) != 'front'): ?>
                <?php if (isset($username) && $role == 1): ?>
                <li><a href="<?php echo base_url_with_language('/user/logout'); ?>"><?php echo $this->lang->line('Logout'); ?></a></li>
                <?php else: ?>
                <li><a href="<?php echo base_url_with_language('/user/login'); ?>"><?php echo $this->lang->line('Login'); ?></a></li>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?php echo show_message(); ?>
