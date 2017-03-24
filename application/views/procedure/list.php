<div class="btn-toolbar" role="toolbar">
    <button type="button" class="btn btn-secondary" onclick="javascript: location.href='<?php echo base_url_with_language('procedure/add'); ?>'"><?php echo $this->lang->line('Add'); ?></button>
</div>
<div class="row">
    <div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <th><?php echo $this->lang->line('Procedure'); ?></th>
                <th><?php echo $this->lang->line('Action'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($procedures) > 0): ?>
            <?php foreach ($procedures as $procedure): ?>
            <tr>
                <td><?php echo $procedure['procedure_name_'.$lang]; ?></td>
                <td>
                    <a href="<?php echo base_url_with_language('/procedure/edit/'. $procedure['procedure_id']); ?>" class="btn btn-large"><?php echo $this->lang->line('Edit'); ?></a>
                    <?php if ($current['uid'] == USER_ROLE_ADMIN): ?>
                    <a href="javascript: confirm_url('<?php echo base_url_with_language('/procedure/delete/'. $procedure['procedure_id']); ?>')" class="btn btn-large"><?php echo $this->lang->line('Delete'); ?></a>
                    <?php else: ?>
                    <a href="javascript: return false')" class="btn btn-large disabled"><?php echo $this->lang->line('Delete'); ?></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5"><?php echo $this->lang->line('There is no record.'); ?></td></tr>
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