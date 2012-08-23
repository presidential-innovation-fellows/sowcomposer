<h3>Background & Scope</h3>
<p>
  <?= $sow->background_and_scope() ?>
</p>

<?php $i = 1; foreach($sow->deliverables() as $deliverable): ?>
  <h3>Deliverable Product #<?= $i ?>: <?= $deliverable->best_title() ?></h3>
  <p>
    <?php if ($deliverable->template_section): ?>
      <?= $deliverable->template_section->body ?>
    <?php else: ?>
      <textarea class="composer" name="custom_sections[<?= $deliverable->id ?>]"><?= $deliverable->body ?></textarea>
    <?php endif; ?>
  </p>
<?php ++$i; endforeach; ?>

<?php $i = 1; foreach($sow->requirements() as $requirement): ?>
  <h3>Requirement #<?= $i ?>: <?= $requirement->best_title() ?></h3>
  <p>
    <?php if ($requirement->template_section): ?>
      <?= $requirement->template_section->body ?>
    <?php else: ?>
      <textarea class="composer" name="custom_sections[<?= $requirement->id ?>]"><?= $requirement->body ?></textarea>
    <?php endif; ?>
  </p>
<?php ++$i; endforeach; ?>
