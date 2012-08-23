<?php Section::start('content');
$sec_printed = print_r($template->template_sections, true); ?>

<h2>'<?= $template->title; ?>' has been saved.</h2>
<p>Here's what the geeky version of the sections looks like:</p>
<pre> <?= $sec_printed; ?> </pre>

<?php Section::stop() ?>