<?php Section::start('content') ?>

<div class="step step-3">

  <h2 class="step-title"><?= $section_type ?></h2>

  <?php if ($help_text = $sow->template->get_variable($section_type)): ?>
    <div class="alert alert-info">
      <?= $help_text ?>
    </div>
  <?php endif; ?>

  <form class="form-horizontal form-sections" method="POST" action="<?= route('step3_post', array($sow->uuid, $section_type)) ?>">

    <?php $today = date('n/j/y'); ?>

    <?php foreach($sections as $section): ?>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" value="<?= $section->id ?>"
                   name="sections[]" class="section-toggle" <?= $section->in_sow($sow) ? "checked" : "" ?>>
            <span class="checkbox-tooltip" title="<?= $section->help_text ?>"><?= $section->title ?></span>
          </label>

          <?php if ($section_type == "Deliverables"): ?>
            <span class="input-append date datepicker"
                  data-date="<?= $today ?>" data-date-format="m/d/yy">
              Due Date:
              <input size="16" type="text" value="<?= $section->in_sow($sow) ? $sow->due_date($section) : $today ?>"
                     name="deliverable_dates[]" disabled><span class="add-on"><i class="icon-calendar"></i></span>
            </span>
            <label class="tbd"><input class="tbd-checkbox" type="checkbox" /> TBD</label>
          <?php endif; ?>

        </div>
      </div>
    <?php endforeach; ?>

    <ul class="custom-choices">
      <li class="template clearfix">
        <div class="choice-name">
          <span></span>
          <input type="hidden" disabled name="custom_sections[]" />
          <a>(remove)</a>
        </div>

        <?php if ($section_type == "Deliverables"): ?>
          <span class="input-append date datepicker" data-date="<?= $today ?>" data-date-format="m/d/yy">
            Due Date:
            <input size="16" type="text" value="<?= $today ?>" disabled name="custom_deliverable_dates[]"><span class="add-on"><i class="icon-calendar"></i></span>
          </span>
          <label class="tbd"><input class="tbd-checkbox" type="checkbox" /> TBD</label>
        <?php endif; ?>

      </li>
      <?php foreach($custom_sections as $custom_section): ?>
        <li class="clearfix">
          <div class="choice-name">
            <span><?= $custom_section->title ?></span>
            <input type="hidden" name="custom_sections[]" value="<?= $custom_section->title ?>" />
            <input type="hidden" name="custom_section_bodies[]" value="<?= $custom_section->body ?>" />
            <a>(remove)</a>
          </div>

          <?php if ($section_type == "Deliverables"): ?>
            <span class="input-append date datepicker" data-date="<?= $sow->due_date($custom_section) ?>" data-date-format="m/d/yy">
              Due Date:
              <input size="16" type="text" value="<?= $sow->due_date($custom_section) ?>" name="custom_deliverable_dates[]"><span class="add-on"><i class="icon-calendar"></i></span>
            </span>
            <label class="tbd"><input class="tbd-checkbox" type="checkbox" /> TBD</label>
          <?php endif; ?>

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
      <?php if ($previous_template_section_type = $sow->template_section_type_before($section_type)): ?>
        <a class="btn" href="<?= route('step3', array($sow->uuid, $previous_template_section_type)) ?>">&larr; <?= $previous_template_section_type ?></a>
      <?php else: ?>
        <a class="btn" href="<?= route('step2', array($sow->uuid)) ?>">&larr; Background &amp; Scope</a>
      <?php endif; ?>

      <button class="btn btn-primary pull-right">
        <?php if ($next_template_section_type = $sow->template_section_type_after($section_type)): ?>
          <?= $next_template_section_type ?>
        <?php else: ?>
          Fill in Variables
        <?php endif; ?>
        &rarr;
      </button>
    </div>

  </form>

</div>

<?php Section::stop() ?>
