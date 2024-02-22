---
title: "4RTNI2 Blood Sample Form"
study: "4RTNI2"
static: "/ncrad-test/assets/forms/Sample_Form_Blood_4RTNI2.pdf"

options:
  study: 4RTNI2
  type: Blood
  email: alzstudy@iu.edu
  fax: (317) 278-1100
  manager: Kelly Faber
  short_name: 4RTNI2
  send_to: alzstudy@iu.edu
  templates:
    intro: templates-rendered/forms/standard_intro.html
    instructions: templates-rendered/forms/standard_instruct.html

sections:
  General Information:
    type: section
    fields:
      From:
        mask: "'mask':'a{1,20} a{1,30}'"
        store: true
      Site:
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
        default: "date"
      Study:
        default: 4RTNI2
        readonly: true
      Visit:
      Kit Number:
      Site ID:
      RAVE Number:
      Family Number:
        required: false
      Birth Year:
        mask: "'mask':'9999'"
      Sex:
        type: select
        values:
          - Female
          - Male
      FedEx Number:
        mask: "'mask':'999999999999'"
        required: false
  Collection Information:
    type: section
    fields:
      Date Drawn:
        mask: "'alias' : 'datetime', 'inputformat':'mm/dd/yyyy'"
      Sodium heparin tube (PBMC) drawn:
        type: select
        values:
          - Yes
          - No
      Time of Draw:
        mask: "'mask':'9999'"
      Total volume of blood drawn into 3 x 2.5ml PAXgene<sup>TM</sup> RNA tubes:
        units: mL
        mask: "'mask':'9.9'"
      Last date ate:
        mask: "'alias' : 'datetime', 'inputformat':'mm/dd/yyyy'"
      Were the PAXgene<sup class="rvt-ts-xxs">TM</sup> tubes the last tubes drawn?:
        type: select
        values:
          - Yes
          - No
      Last time subject ate:
        mask: "'mask':'9999'"
  Blood Processing:
    type: section
    options:
  Plasma Processing:
    type: subsection
    noColumns: true
    fields:
      Time spin started:
        mask: "'mask':'9999'"
      Original Volume Drawn:
        mask: "'mask':'9{1,2}'"
        units: mL
      Number of 0&#46;5 mL plasma aliquots created (24-30 total) (Lavender cap cryovial):
        mask: "'mask':'9{1,2}'"
        units: x 0.5mL
      If applicable, volume of residual plasma aliquot (less than 0.5 mL) (Blue cap cryovial):
        units: mL
        mask: "'mask':'0.9'"
      Buffy coat aliquot created (one per EDTA tube) (Clear cap cryovial):
        mask: "'mask':'9{1,4}'"
      Time aliquots placed in freezer:
        mask: "'mask':'9999'"
  Serum Processing:
    type: subsection
    noColumns: true
    fields:
      Time spin started (within 30 minutes of draw time):
        mask: "'mask':'9999'"
      Original volume drawn (1x10 mL Serum tube):
        mask: "'mask':'9{1,2}'"
        units: mL
      Number of 0&#46;5 mL serum aliquots created (8-10 total) (Red cap cryovial):
        mask: "'mask':'9{1,2}'"
        units: x 0.5mL
      If applicable, volume of residual serum aliquot (less than 0&#46;5 mL) (Blue cap cryovial):
        units: mL
        mask: "'mask':'0.9'"
      Time aliquots placed in freezer:
        mask: "'mask':'9999'"
  Notes:
    type: section
    noColumns: true
    fields:
      Notes:
        type: textarea
        required: false
---