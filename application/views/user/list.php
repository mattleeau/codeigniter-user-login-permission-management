<div class="btn-toolbar" role="toolbar">
    <button type="button" class="btn btn-secondary" onclick="javascript: location.href='<?php echo base_url_with_language('user/add'); ?>'"><?php echo $this->lang->line('Add'); ?></button>
</div>
<div class="row">
    <div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <th><?php echo $this->lang->line('Firstname'); ?></th>
                <th><?php echo $this->lang->line('Lastname'); ?></th>
                <th><?php echo $this->lang->line('Username'); ?></th>
                <th><?php echo $this->lang->line('Role'); ?></th>
                <th><?php echo $this->lang->line('Action'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php if(isset($roles[$user['role']])) echo $roles[$user['role']]; ?></td>
                <td>
                    <a href="<?php echo base_url_with_language('/user/edit/'. $user['user_id']); ?>" class="btn btn-large"><?php echo $this->lang->line('Edit'); ?></a>
                    |
                    <?php if ($current['username'] == $user['username']): ?>
                    <a href="javascript: return false')" class="btn btn-large disabled"><?php echo $this->lang->line('Delete'); ?></a>
                    <?php else: ?>
                    <a href="javascript: confirm_url('<?php echo base_url_with_language('/user/delete/'. $user['user_id']); ?>')" class="btn btn-large"><?php echo $this->lang->line('Delete'); ?></a>
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