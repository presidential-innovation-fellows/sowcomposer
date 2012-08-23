<?php
  $deliverables = $sow->deliverables();
?>

<h3>Background & Scope</h3>
<p>
  <?= $sow->background_and_scope() ?>
</p>

<?php $i = 1; foreach($deliverables as $deliverable): ?>
  <h3>Deliverable Product #<?= $i ?>: <?= $deliverable->best_title() ?></h3>
  <p>
    <?php if ($deliverable->template_section): ?>
      <?= $deliverable->template_section->body ?>
    <?php else: ?>
      <?= $deliverable->body ?>
    <?php endif; ?>
  </p>
<?php ++$i; endforeach; ?>

<?php $i = 1; foreach($sow->requirements() as $requirement): ?>
  <h3>Requirement #<?= $i ?>: <?= $requirement->best_title() ?></h3>
  <p>
    <?php if ($requirement->template_section): ?>
      <?= $requirement->template_section->body ?>
    <?php else: ?>
      <?= $requirement->body ?>
    <?php endif; ?>
  </p>
<?php ++$i; endforeach; ?>

<h3>Timeline</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Deliverable</th>
      <th>Due Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($deliverables as $deliverable): ?>
      <tr>
        <td><?= $deliverable->best_title() ?></td>
        <td><?= $sow->due_date($deliverable) ? $sow->due_date($deliverable) : "TBD" ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>