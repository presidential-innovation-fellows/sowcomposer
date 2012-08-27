<h3>Background & Scope</h3>
<p>
  <?= $sow->background_and_scope() ?>
</p>

<?php foreach($sow->sow_section_types() as $section_type): ?>
  <h3><?= $section_type ?></h3>
  <?php $i = 1; foreach($sow->sections($section_type) as $section): ?>
    <h4><?= $i ?>) <?= $section->best_title() ?></h4>
    <p>
      <?php if ($section->template_section): ?>
        <?= $section->template_section->body ?>
      <?php else: ?>
        <textarea class="composer" name="custom_sections[<?= $section->id ?>]"><?= $section->body ?></textarea>
      <?php endif; ?>
    </p>
  <?php ++$i; endforeach; ?>
<?php endforeach; ?>