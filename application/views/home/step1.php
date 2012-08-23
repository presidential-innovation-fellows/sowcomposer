<?php Section::start('content') ?>

<div class="step step-1">
  <h1>Welcome to SOW Composer</h1>
  <h3>Helping Government Write Awesome Statements of Work.</h3>

  <hr />

  <form class="form-horizontal" action="<?= route('step1_post') ?>" method="POST">
    <p>To get started, we just need your email address and the kind of project you're looking to work on:</p>
    <fieldset>
      <div class="control-group">
        <label class="control-label" for="author_email">Email Address</label>
        <div class="controls">
          <input type="text" name="author_email" class="input-xlarge">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Project Type</label>
        <div class="controls">
          <select name="template_id">
            <?php foreach($templates as $template): ?>
              <option value="<?= $template->id ?>"><?= $template->title ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-actions">
        <button class="btn btn-primary">Next &rarr;</button>
      </div>

    </fieldset>
  </form>


</div>

<?php Section::stop() ?>
