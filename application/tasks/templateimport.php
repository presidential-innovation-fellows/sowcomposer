<?php

class Templateimport_Task {
    //TODO get smart about only importing ones that have changed since the last import. For now, be lazy.
    public function run()
    {
      echo "\nBYE-BYE EXISTING TEMPLATES!\n\n";
      DB::query('UPDATE `templates` set `visible` = 0');

      $template_files = scandir('_templates');
      foreach($template_files as $tf) {
        if ($tf != "." && $tf != "..") {
          echo "Parsing " . $tf . "... ";
          $tp = Templateparser::parse(File::get('_templates/' . $tf));
          echo "'" . $tp->title . "' created.\n";
        }
      }
    }

}
