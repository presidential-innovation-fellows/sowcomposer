<?php Section::start('content') ?>
<div >
  <form action="/templates" method="POST" name="new-sowtemplate-form" id="new-sowtemplate-form" class="form-vertical">
    <fieldset>
      <div class="control-group">
        <h3>Create a new SOW Template</h3>

<textarea name="sowbody" class="composer">---TITLE---

Default Title for this SOW

---DELIVERABLES---

# Information Architecture

## This is the help text for the IA deliverable.

### This is the body for the IA deliverable, which will be displayed in the SOW.
A variable looks like: {{ AGENCY | Agency | The agency that you work for. }}


# Something else

## This is the help text for the something else.

### This is the body for the IA deliverable, which will be displayed in the SOW.
A variable looks like: {{ AGENCY | Agency | The agency that you work for. }}

---REQUIREMENTS---

# Open-sourced project online

## Help text for this requirement

### The {{AGENCY}} {{OFFICE | Office name | What office is requesting this work? }} requests that you have at least one project's code available for public review online.</textarea>
      </div>

      <div class="step-actions">
        <button type="submit" class="btn btn-primary next">Create</button>
      </div>
    </fieldset>
  </form>
</div>

<?php Section::stop() ?>