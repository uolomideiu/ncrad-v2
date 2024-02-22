---
title: 90+ Study Blood Sample Form

options:
  study: 90+
  type: Blood
  email: alzstudy@iu.edu
  fax: (317) 278-1100
  manager: Kelly Faber
  short_name: blood
  send_to: alzstudy@iu.edu
  templates:
    intro: templates-rendered/forms/standard_intro.html
    instructions: templates-rendered/forms/standard_instruct.html

sections:
  Center Information:
    type: section
    fields:
      From:
        mask: "'mask':'a{1,20} a{1,30}'"
        store: true
      Center:
        store: true
      Phone:
        mask: "'mask':'(999) 999-9999'"
        store: true
      Fax:
        mask: "'mask':'(999) 999-9999'"
        store: true
        required: false
      Email:
        mask: "'alias':'email'"
        store: true
      Date:
        mask: "'alias' : 'datetime', 'inputformat':'mm/dd/yyyy'"
        default: "<?php echo date('m/d/Y'); ?>"

  Subject Information:
    type: section
    fields:
      Subject#:
      Sex:
        type: select
        values:
          - Male
          - Female
      Sample Type Included:
        type: checkbox
        values:
          - Blood in Purple top EDTA Tube
          - Saliva in Oragene Collection Kit

  Sample Information:
    type: section
    options:
      Date Blood Drawn:
        mask: "'alias' : 'datetime', 'inputformat':'mm/dd/yyyy'"
        default: "<?php echo date('m/d/Y'); ?>"
---
