<?php

class Seed_Task {

    public function run()
    {
      $template = Template::create(array('title' => 'Web Design'));
      $deliverable = TemplateSection::create(array('template_id' => $template->id,
                                                   'section_type' => 'Deliverable',
                                                   'help_text' => 'This is the help text.',
                                                   'title' => 'Information Architecture',
                                                   'body' => 'This is the body of the deliverable. It is very awesome. Oh yeah.'));

      $requirement = TemplateSection::create(array('template_id' => $template->id,
                                                   'section_type' => 'Requirement',
                                                   'help_text' => 'This is the help text.',
                                                   'title' => 'Open-sourced code.',
                                                   'body' => 'This is the body of the requirement. Mhm.'));

    }

}
