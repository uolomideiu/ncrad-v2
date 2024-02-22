{% extends 'templates/researcherInPage.html' %}

{% block content %}

<script src='/js/qrcode.min.js'></script>

<?php if(empty($_POST)): ?>

    {% include options.templates.intro %}

    {% include options.templates.instructions %}

    <form class='form-horizontal' id='sampleForm' method='POST'  onreset='resetForm(this)' action='#'>
    <p>( <strong>*</strong> = <i>required field for submission</i> )</p>
      {% for key, section in sections %}
      
        {% if section.type == "subsection" %}
          <h4 class='page-header'>
              {{ key | safe }}
          </h4>
        {% else %}
          <h3 class='page-header'>
              {{ key | safe }}
          </h3>
        {% endif %}

        {% if section.fields %}

        <!-- <fieldset> -->
          <!-- <legend style="display:none;">{{ key | safe }}</legend> -->

            {% if section.noColumns %}
              <div class="form-field-list">
            {% else %}
              <div class="form-field-grid">
            {% endif %}

              {% for k, field in section.fields %}
            
                {% set input_id %}{{ key | replace(" ", "") }}_var{{ loop.index0 }}{% endset %}

                <div class="form-field">
        
                  <div class="field-text">
                    <label for="{{ input_id | safe }}">{{ k | safe }}{% if field.required != false %} *{% endif %}</label>

                    

                    {% if field.description %}
                      <p>{{ field.description }}</p>
                    {% endif %}
                  </div>
        
                  <div class='input-group'>
                    {% if field.type == "select" %}
                      <select class='form-control' id='{{ input_id | safe}}' name='{{ input_id | safe }}' {% if field.required != false %}required{% endif %}>
                        
                        <option></option>

                        {% for opt in field.values %}
                          <option>{{ opt | safe }}</option>
                        {% endfor %}

                      </select>
                    {% elif field.type == "checkbox" %}
                      <div>

                        {% for opt in field.values %}

                          {% set opt_id %}{{ input_id | safe }}_{{ loop.index0 }}{% endset %}

                          <div>
                            
                            <label for="{{ opt_id | safe }}">
                              {{ opt | safe }}:
                              <input type="checkbox" id="{{ opt_id | safe }}" name="{{ opt_id | safe }}" value="{{ opt | safe }}"/>
                            </label>
                          </div>
                        {% endfor %}
                       
                      </div>
                    {% elif field.type == "textarea" %}
                      <textarea id='{{ input_id | safe}}' name='{{ input_id | safe }}' {% if field.required != false %}required{% endif %}></textarea>
                    {% else %}
                      
                      <input type='text' class='form-control' id='{{ input_id | safe}}' name='{{ input_id | safe }}' data-inputmask="{{ field.mask | safe }}" {% if field.required != false %}required{% endif %} {% if field.readonly %}readonly{% endif %} value="{{ field.default | safe }}" placeholder="{{ field.placeholder | safe }}"/>
                      
                    {% endif %}

                    {% if field.units %}
                      <div class='input-group-addon'>{{ field.units }}</div>
                    {% endif %}

                  </div>
                </div>
              {% endfor %}
            </div>
          <!-- </fieldset> -->
        {% endif %}
        
        
      {% endfor %}

      <div class='form-buttons'>
        <button type='submit' class='btn btn-lg btn-success hidden-print'>Submit Form</button>
        <button type='reset' class='btn btn-lg btn-danger hidden-print'>Reset Form</button>
      </div>

    </form>

  
    <script src='/js/form_storage.js'></script>
    
    <script>
      // var stored_ids = ['From', 'Site', 'Phone', 'Fax', 'Email']
      // var required_fields = ['From', 'Site', 'Phone', 'Email', 'Date', 'Study', 'Visit', 'KitNumber', 'SiteID', 'RAVENumber', 'BirthYear', 'Sex', 'DateDrawn', 'SodiumheparintubePBMCdrawn', 'TimeofDraw', 'Totalvolumeofblooddrawninto3x25mlPAXgenesupTMsupRNAtubes', 'Lastdateate', 'WerethePAXgenesupTMsuptubesthelasttubesdrawn', 'Lasttimesubjectate', 'plasmaTimespinstarted', 'plasmaOriginalVolumeDrawn', 'plasmaNumberof05mLplasmaaliquotscreated2430totalLavendercapcryovial', 'plasmaIfapplicablevolumeofresidualplasmaaliquotlessthan05mLBluecapcryovial', 'plasmaBuffycoataliquotcreatedoneperEDTAtubeClearcapcryovial', 'plasmaTimealiquotsplacedinfreezer', 'serumTimespinstartedwithin30minutesofdrawtime', 'serumOriginalvolumedrawn1x10mLSerumtube', 'serumNumberof05mLserumaliquotscreated810totalRedcapcryovial', 'serumIfapplicablevolumeofresidualserumaliquotlessthan05mLBluecapcryovial', 'serumTimealiquotsplacedinfreezer', 'Notes']
      // if (typeof(Storage) !== "undefined") {
      //   getDefaults(stored_ids)
      // } else {
      //   $("#alertAnchor").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Local Storage not available. Update to a modern browser to enable saving default values.</div>')
      // }
    </script>

  <?php 
    else: 

    ob_start(); 
  ?>

    <div id = 'qrcode' class = 'visible-print-inline-block' style = 'position: fixed; bottom: 0; left: 0; float: left; background: white; padding-right: 10px; width: 75px; height: 75px;'>
    </div>

    <button class = 'pull-right btn btn-ncrad-orange btn-lg hidden-print' onclick = 'javascript:window.print()'>
      <i class = 'fa fa-print'></i> Print
    </button>

    <p class = 'hidden-print'>
      Thank you for using NCRAD.org's electronic form submittal.
    </p>

    <p class = 'hidden-print'>
      <strong style = 'font-size: 1.2em;'>Please <a href = 'javascript:window.print()'>print</a> this page and include it when shipping the sample.</strong>
    </p>

  <?php 

    $confirmation = ob_get_clean(); 

    ob_start();
  ?>

    {% for key, section in sections %}
  
      {% if section.type == "subsection" %}
        <h4 class='page-header'>
            {{ key | safe }}
        </h4>
      {% else %}
        <h3 class='page-header'>
            {{ key | safe }}
        </h3>
      {% endif %}

      {% if section.fields %}

      <table width = '100%'>
        
            {% for k, field in section.fields %}

              {% set input_id %}{{ key | replace(" ", "") }}_var{{ loop.index0 }}{% endset %}
              <tr>
                <td style = 'font-weight: bold; text-align: right; padding-top: 15px; padding-right: 15px; width: 21%;'>
                  {{ k | safe }}:
                </td>

                <td style = 'text-align: left; padding-left: 5px; border-bottom: solid black 1px; vertical-align: bottom; width: 29%;'>

                  {% if field.type == "checkbox" %}

                    <?php
                      $input_res = "";
                    ?>

                    {% for opt in field.values %}

                      {% set opt_id %}{{ input_id | safe }}_{{ loop.index0 }}{% endset %}

                      <?php
                      
                        $temp_var = htmlspecialchars($_POST["{{ opt_id | safe }}"]); 
                      
                        if(!empty($temp_var)) {

                          if(!empty($input_res)) {

                            $input_res .= ", " . $temp_var;
                          }
                          else {
                            $input_res = $temp_var;
                          }
                        }
                      ?>
                    {% endfor %}

                    <?php 
  
                      if(!empty($input_res)) {
                        echo  $input_res;
                      }
                      else {
                        echo "[none selected]";
                      }
                    ?>

                  {% else %}
                    <?php echo htmlspecialchars($_POST["{{ input_id | safe }}"]); ?>
                  {% endif %}
                </td>
              </tr> 
              <tr><td><p> </p></td></tr>
            {% endfor %}
        
      </table>
      {% endif %}
    {% endfor %}

  <?php 

    $htmlTable = ob_get_clean(); 

    $confirmation .= $htmlTable;

    ob_start();
  ?>


    <div class = 'hidden-print' style = 'text-align: center; margin-top: 20px; width: 100%;'>
      <button class = 'btn btn-lg btn-ncrad-orange' onclick = 'javascript:window.print()'><i class = 'fa fa-print'></i> Print this Page</button>
      <a class = 'btn btn-lg btn-ncrad-orange' href = '{{ file_name }}'><i class = 'fa fa-arrow-left'></i> Return to Form</a>
    </div>

  <?php

      $confirmation .= ob_get_clean(); 

      echo $confirmation;

      function sanitize($x) {
        return substr(htmlspecialchars(strip_tags($x)), 0, 10000);
      }

      require 'C:/PHPMailer/PHPMailer.php';
      require 'C:/PHPMailer/Exception.php';
      require 'C:/PHPMailer/SMTP.php';
      
      // require 'PHPMailer/PHPMailerAutoload.php';

      date_default_timezone_set('America/Indiana/Indianapolis');


      $emailBody = "<p>A {{ options.short_name }} form has been submitted from NCRAD.org</p>";
      $emailBody .= $htmlTable;

      $root = realpath($_SERVER["DOCUMENT_ROOT"]);

      $ini = parse_ini_file($root . '/../app.php.ini');

        
      $mail = new PHPMailer\PHPMailer\PHPMailer;

      $mail->isSMTP();

      $mail->Host = "mail-relay.iu.edu";
      $mail->SMTPAuth = true;
      $mail->Username = "ncradbio";
      $mail->Password = "Put a gun against my head!";
      $mail->Port = 465;
      $mail->SMTPSecure = 'ssl';
      $mail->From = 'ncradbio@iu.edu';
      $mail->FromName = "";
      $mail->addAddress('uolomide@iu.edu');     // Add a recipient
      $mail->isHTML(true); 
      $mail->Subject = '[SECURE MESSAGE] NCRAD.org {{ options.short_name }} {{ options.type }} Sample Form Submission';
      $mail->Body = $emailBody;

      if(!($mail->send())) {
        echo '<p>There was an error when sending your message. Please try again later or use the contact information to the right.</p><p>We apologize for the inconvenience.</p>';
      }
      else {
        echo $confirmation;
      }

      $qr_fields = array();
      echo "<script>new QRCode('qrcode', {text: '" . json_encode($qr_fields) . "', width: 128, height: 128})</script>";

  endif; ?>

{% endblock %}

{% block sidebar %}

  {{ super() }}

{% endblock %}