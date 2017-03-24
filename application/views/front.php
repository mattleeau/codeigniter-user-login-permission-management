<div class="logo-header-front"><img src="skin/css/images/logo-erandio-tramites.png"></div>
   <div class="data-wrapper">
    <?php foreach ($procedures as $family_id=>$family_list): ?>
        <style type="text/css">
            #family-<?php echo $family_id; ?> ul.procedure-list li:hover a {
                text-decoration: underline;
                color: <?php echo $families[$family_id]['color']; ?>;
            }
        </style>
        <div class="family-wrapper" id="family-<?php echo $family_id; ?>" style="width: <?php echo $width; ?>%;color:<?php echo $families[$family_id]['color']; ?>">
            <div class="family-title">
                <i class="family-icon" style="border-color: <?php echo $families[$family_id]['color']; ?>;"></i>
                <label><?php echo $families[$family_id]['name']; ?></label>
            </div>
            <?php foreach ($family_list as $group_id=>$group_list): ?>
            <div class="group-wrapper" id="group-<?php echo $group_id; ?>">
                <div class="group-title" style="background-color: <?php echo $families[$family_id]['color']; ?>;">
                    <i class="group-icon"><img src="<?php echo base_url('/skin/icons/'.$groups[$group_id]['icon']); ?>" width="30" height="30" /></i>
                    <label><?php echo $groups[$group_id]['name']; ?></label>
                </div>
                <ul class="procedure-list" style="border-left-color: <?php echo $families[$family_id]['color']; ?>;">
                <?php foreach ($group_list as $procedure_id=>$procedure): ?>
                    <li class=""><a href="<?php echo base_url_with_language("/front/procedure/$procedure_id"); ?>"><?php echo $procedure['procedure_name_'.$lang]; ?>&nbsp;</a></li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.family-title').click(function() {
        jQuery('.family-wrapper').removeClass('active');
        jQuery('.family-wrapper').addClass('deactive');
        jQuery(this).parent().removeClass('deactive');
        jQuery(this).parent().addClass('active');
    });
    jQuery('.group-title').click(function() {
        jQuery('.family-wrapper').removeClass('active');
        jQuery('.family-wrapper').addClass('deactive');
        jQuery(this).parent().parent().removeClass('deactive');
        jQuery(this).parent().parent().addClass('active');
        jQuery(this).parent().parent().parent().find('ul.procedure-list').hide();
        jQuery(this).parent().find('ul.procedure-list').show();
    });
});
</script>
<style type="text/css">
.family-wrapper.active {
    width: calc(100% - <?php echo $width2; ?>px) !important;
}
.family-wrapper.deactive {
    width: 150px !important;
}
</style>