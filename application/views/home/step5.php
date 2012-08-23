<?php Section::start('content') ?>

<div class="step step-5">

  <form method="POST" action="<?= route('step5_post', array($sow->uuid)) ?>">

    <h2 class="step-title">Step 5 - Fill out your SOW</h2>

    <div class="alert alert-info">
      Fill in the blanks below and we'll assemble your final document, which you can edit in the next step.
    </div>

    <div class="control-group x-large">
      <div class="input-prepend">
        <span class="add-on">Title</span><input type="text" name="title"
                                                value="<?= $sow->title != "" ? $sow->title : $sow->template->title; ?>" />
      </div>
    </div>

    <div class="sow-content">

      <?= VariableParser::parse(View::make('partials.step5_output')->with('sow', $sow), $sow); ?>

    </div>

    <div class="bottom-controls well">
      <a class="btn" href="<?= route('step4', array($sow->uuid)) ?>">&larr; Requirements</a>
      <button class="btn btn-primary pull-right">Edit Document &rarr;</button>
    </div>

  </form>
</div>

<?php Section::stop() ?>
