<div class="btn-toolbar" role="toolbar">
    <button type="button" class="btn btn-secondary" onclick="javascript: location.href='<?php echo base_url_with_language('group/add'); ?>'"><?php echo $this->lang->line('Add group'); ?></button>
</div>
<div class="row">
    <div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <th><?php echo $this->lang->line('Family'); ?></th>
                <th><?php echo $this->lang->line('Group'); ?></th>
                <th><?php echo $this->lang->line('Icon'); ?></th>
                <th><?php echo $this->lang->line('Action'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($groups) > 0): ?>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?php echo $families[$group['family_id']]; ?></td>
                <td><?php echo $group['group_name_'.$lang]; ?></td>
                <td><img src="<?php echo base_url('skin/icons/'.$group['icon']); ?>" width="20" height="20" /></td>
                <td>
                    <a href="<?php echo base_url_with_language('/group/edit/'. $group['group_id']); ?>" class="btn btn-large"><?php echo $this->lang->line('Edit'); ?></a>
                    |
                    <a href="javascript: confirm_url('<?php echo base_url_with_language('/group/delete/'. $group['group_id']); ?>')" class="btn btn-large"><?php echo $this->lang->line('Delete'); ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4"><?php echo $this->lang->line('There is no record.'); ?></td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>
</div>
<script type="text/javascript">
function confirm_url(url)
{
    if (confirm("<?php echo $this->lang->line('Are you sure'); ?>"))
    {
        location.href = url;
    }
}
</script>