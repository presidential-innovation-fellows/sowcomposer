<?php Section::start('content') ?>

<div class="step step-6">
  <form method="POST" action="<?= route('step6_post', array($sow->uuid)) ?>">
    <h2 class="step-title">Edit Document Text</h2>

    <textarea id="sow-content-wysiwyg" name="body" style="width: 100%; min-height: 400px">
      <?= VariableParser::parse(View::make('partials.step6_output')->with('sow', $sow), $sow, "read") ?>
    </textarea>

    <div class="bottom-controls well">
      <a class="btn" href="<?= route('step5', array($sow->uuid)) ?>">&larr; Enter Variables</a>
      <button class="btn btn-primary pull-right">Download SOW &rarr;</button>
    </div>
  </form>
</div>

<?php Section::stop() ?>

<?php Section::start('additional-scripts') ?>
  <?= HTML::script('js/wysihtml5_parser_rules.js') ?>
  <?= HTML::script('js/wysihtml5-0.3.0.min.js') ?>
  <?= HTML::script('js/bootstrap-wysihtml5.js') ?>
<?php Section::stop() ?>

<?php Section::start('additional-styles') ?>
  <?= HTML::style('css/bootstrap-wysihtml5.css') ?>
<?php Section::stop() ?>