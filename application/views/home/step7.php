<?php Section::start('content') ?>

<div class="step step-7">

  <h1><?= $sow->title ?></h1>
  <hr />

  <div class="row">
    <div class="span8">
        <?= $sow->body ?>

      <div class="disclaimer">
        <?= Config::get('sowcomposer.disclaimer') ?>
      </div>
    </div>

    <div class="span3 well sidebar">
      <h4 class="sidebar-section-title">Back to Edit</h4>
      <p>
        <a href="<?= route('step6', array($sow->uuid)) ?>" class="btn btn-primary">&larr; Edit SOW</a>
      </p>
      <h4 class="sidebar-section-title">Export</h4>
      <p>
        <a href="<?= route('print', array($sow->uuid)) ?>" target="_blank" class="btn btn-primary">Print <i class="icon-print"></i></a><br />
        <a href="<?= route('doc', array($sow->uuid)) ?>" class="btn btn-primary">Download as .doc <i class="icon-download"></i></a>
      </p>

      <h4 class="sidebar-section-title">Read-Only Permalink</h4>
      <p>
        <textarea class="select-on-click"><?= route('view', array($sow->read_only_uuid)) ?></textarea>
      </p>

      <!--
      <h4 class="sidebar-section-title">Read & Write Permalink</h4>
      <p>
        <textarea class="select-on-click"><?= route('step7', array($sow->uuid)) ?></textarea>
      </p>
      -->

    </div>
  </div>

</div>

<?php Section::stop() ?>
