<?php Section::start('content') ?>

<div class="step step-4">


  <h2 class="step-title">Step 4 - Contractor and Statement of Work Qualifications</h2>

  <div class="alert alert-info">
    Technical projects often have advanced qualifications for the work. Here, you can specify the qualifications required from vendors for bidding on the project.
  </div>

  <form class="form-horizontal" method="POST" action="<?= route('step4_post', array($sow->uuid)) ?>">

    <?php foreach($requirements as $requirement): ?>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" name="requirements[]"
                   value="<?= $requirement->id ?>" <?= $requirement->in_sow($sow) ? "checked" : "" ?>>
            <span class="checkbox-tooltip" title="<?= $requirement->help_text ?>"><?= $requirement->title ?></span>
          </label>
        </div>
      </div>
    <?php endforeach; ?>

    <ul class="custom-choices">
      <li class="template clearfix">
        <div class="choice-name">
          <span></span>
          <input type="hidden" disabled name="custom_requirements[]" />
          <a>(remove)</a>
        </div>
      </li>
      <?php foreach($custom_requirements as $custom_requirement): ?>
        <li class="clearfix">
          <div class="choice-name">
            <span><?= $custom_requirement->title ?></span>
            <input type="hidden" name="custom_requirements[]" value="<?= $custom_requirement->title ?>" />
            <input type="hidden" name="custom_requirement_bodies[]" value="<?= $custom_requirement->body ?>" />
            <a>(remove)</a>
          </div>
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
      <a class="btn" href="<?= route('step3', array($sow->uuid)) ?>">&larr; Deliverables and Timeline</a>
      <button class="btn btn-primary pull-right">Fill in Blanks &rarr;</button>
    </div>

  </form>
</div>

<?php Section::stop() ?>
