<?php Section::start('content') ?>

<div class="step step-3">

  <h2 class="step-title">Step 3 - Deliverables and Timeline</h2>

  <div class="alert alert-info">
    Pick and choose what you need delivered to you in this project. If you don't see something you need, add it and you can incorporate the text later.
    You can also select dates when you'd like for these projects to start and end to give bidders a good idea of the pacing of your project. Leave items as TBD if you want to negotiate dates with your vendor. 
  </div>


  <form class="form-horizontal form-deliverables" method="POST" action="<?= route('step3_post', array($sow->uuid)) ?>">

    <?php $today = date('n/j/y'); ?>

    <?php foreach($deliverables as $deliverable): ?>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" value="<?= $deliverable->id ?>"
                   name="deliverables[]" class="deliverable-toggle" <?= $deliverable->in_sow($sow) ? "checked" : "" ?>>
            <span class="checkbox-tooltip" title="<?= $deliverable->help_text ?>"><?= $deliverable->title ?></span>
          </label>
          <span class="input-append date datepicker"
                data-date="<?= $today ?>" data-date-format="m/d/yy">
            Due Date:
            <input size="16" type="text" value="<?= $deliverable->in_sow($sow) ? $sow->due_date($deliverable) : $today ?>"
                   name="deliverable_dates[]" disabled><span class="add-on"><i class="icon-calendar"></i></span>
          </span>
          <label class="tbd"><input class="tbd-checkbox" type="checkbox" /> TBD</label>
        </div>
      </div>
    <?php endforeach; ?>

    <ul class="custom-choices">
      <li class="template clearfix">
        <div class="choice-name">
          <span></span>
          <input type="hidden" disabled name="custom_deliverables[]" />
          <a>(remove)</a>
        </div>
        <span class="input-append date datepicker" data-date="<?= $today ?>" data-date-format="m/d/yy">
          Due Date:
          <input size="16" type="text" value="<?= $today ?>" disabled name="custom_deliverable_dates[]"><span class="add-on"><i class="icon-calendar"></i></span>
        </span>
        <label class="tbd"><input class="tbd-checkbox" type="checkbox" /> TBD</label>
      </li>
      <?php foreach($custom_deliverables as $custom_deliverable): ?>
        <li class="clearfix">
          <div class="choice-name">
            <span><?= $custom_deliverable->title ?></span>
            <input type="hidden" name="custom_deliverables[]" value="<?= $custom_deliverable->title ?>" />
            <input type="hidden" name="custom_deliverable_bodies[]" value="<?= $custom_deliverable->body ?>" />
            <a>(remove)</a>
          </div>
          <span class="input-append date datepicker" data-date="<?= $sow->due_date($custom_deliverable) ?>" data-date-format="m/d/yy">
            Due Date:
            <input size="16" type="text" value="<?= $sow->due_date($custom_deliverable) ?>" name="custom_deliverable_dates[]"><span class="add-on"><i class="icon-calendar"></i></span>
          </span>
          <label class="tbd"><input class="tbd-checkbox" type="checkbox" /> TBD</label>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="control-group">
      <div class="controls">
        <input type="text" id="add-custom-choice-text" placeholder="Other" />
        <button class="btn btn-success" id="add-custom-choice-btn">Add</button>
      </div>
    </div>

    <div class="bottom-controls well">
      <a class="btn" href="<?= route('step2', array($sow->uuid)) ?>">&larr; Background &amp; Scope</a>
      <button class="btn btn-primary pull-right">Requirements &rarr;</button>
    </div>

  </form>

</div>

<?php Section::stop() ?>
