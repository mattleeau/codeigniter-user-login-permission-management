<?php

?>
<div="tramite-container">
<div class="logo-header-front"><a href="<?php echo base_url_with_language(''); ?>"><img src="../../skin/css/images/logo-erandio-tramites.png"></a></div>
<div class="row tramite">
    <div class="col-md-12">
        <h2><?php echo $procedure['procedure_name_'.$lang]; ?></h2>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('What is'); ?></h3>
        <div>
          <p><?php echo $procedure['what_is_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Who can apply'); ?></h3>
        <div>
          <?php foreach ($procedure['who_can_apply'] as $w): ?>
          <p><?php echo $dropdowns[$w]; ?></p>
          <?php endforeach; ?>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Documents to be submitted'); ?></h3>
        <div>
          <p><?php echo $procedure['documents_to_be_submitted_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Where is processed'); ?></h3>
        <div>
          <?php foreach ($procedure['where_is_processed'] as $w): ?>
          <p><?php echo $dropdowns[$w]; ?></p>
          <?php endforeach; ?>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('More information'); ?></h3>
        <div>
          <?php foreach ($procedure['more_information'] as $w): ?>
          <p><?php echo $dropdowns[$w]; ?></p>
          <?php endforeach; ?>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Economic cost'); ?></h3>
        <div>
          <p><?php echo $procedure['economic_cost_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Deadline for resolution and notification'); ?></h3>
        <div>
          <p><?php echo $procedure['deadline_for_resolution_and_notification_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Applicable regulations'); ?></h3>
        <div>
          <?php foreach ($procedure['applicable_regulations'] as $w): ?>
          <p><?php echo $dropdowns[$w]; ?></p>
          <?php endforeach; ?>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Formalities after the receipt of the request'); ?></h3>
        <div>
          <p><?php echo $procedure['formalities_after_the_receipt_of_the_request_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Clarifications'); ?></h3>
        <div>
          <p><?php echo $procedure['clarifications_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Observations'); ?></h3>
        <div>
          <p><?php echo $procedure['observations_'.$lang]; ?></p>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Area'); ?></h3>
        <div class="areaTramite">
          <?php foreach ($procedure['family_id'] as $family): ?>
            <span><?php echo $families[$family]['name']; ?></span> / 
          <?php endforeach; ?>
          <?php foreach ($procedure['group_id'] as $group): ?>
            <span><?php echo $groups[$group]['name']; ?></span>
          <?php endforeach; ?>
		</div>
    </div>
    <div class="col-md-12">
        <h3><?php echo $this->lang->line('Attachment'); ?></h3>
        <div>
          <a href="<?php echo $procedure['annexes_link_'.$lang]; ?>" target="_new"><?php echo $procedure['annexes_name_'.$lang]; ?></a>
		</div>
    </div>
</div>
<div class="impContainer">
  <input type="button" onClick="window.print()" value="Imprimir trámite" id="impButton"/>
</div>
<div class="footerProcedure">
  <div class="col1"><img src="../../skin/images/logo-erandio-footer.png"></div>
	<div class="col2"><a href="tel:944890010">T. 944 89 00 10</a> · <a href="mailto:haz-sac@erandio.eus">haz-sac@erandio.eus</a> · <a href="http://www.erandio.eus" target="_blank">www.erandio.eus</a></div>
	<div class="col3"></div>
</div>
</div>