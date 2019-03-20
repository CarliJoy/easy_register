<?php include "config.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Anmeldung <?php echo $title; ?> | Registration <?php echo $title_eng; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="https://www.ende-gelaende.org/wp-content/uploads/2016/04/cropped-icon-32x32.jpg" sizes="32x32" />
    <link rel="icon" href="https://www.ende-gelaende.org/wp-content/uploads/2016/04/cropped-icon-192x192.jpg" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://www.ende-gelaende.org/wp-content/uploads/2016/04/cropped-icon-180x180.jpg" />
    <link rel="stylesheet" href="hint.css" />
    <!-- calendar stuff -->
<!--            <link rel="stylesheet" type="text/css" href="calendar/calendar-blue2.css" />

            <script type="text/javascript" src="calendar/calendar.js"></script>
            <script type="text/javascript" src="calendar/calendar-en.js"></script>
            <script type="text/javascript" src="calendar/calendar-setup.js"></script>-->
    <!-- END calendar stuff -->

    <!-- expand/collapse function -->
    <script type="text/javascript" src="jquery-3.1.1.slim.min.js"></script>

    <script type="text/javascript">
    <!--
    function collapseElem(obj)
    {
        var el = document.getElementById(obj);
        el.style.display = 'none';
    }


    function expandElem(obj)
    {
        var el = document.getElementById(obj);
        el.style.display = '';
    }


    //-->
    </script>
    <!-- expand/collapse function -->


    <!-- expand/collapse function -->
        <script type="text/javascript">


        // collapse all elements, except the first one
        function collapseAll()
        {
            var numFormPages = 1;

            for(i=2; i <= numFormPages; i++)
            {
                currPageId = ('mainForm_' + i);
                collapseElem(currPageId);
            }

            // Make tooltip visible on focus
            $('input').on('blur', function(){
                $(this).parent().removeClass('hovered');
            }).on('focus', function(){
                $(this).parent().addClass('hovered');
            });
            $('select').on('blur', function(){
                $(this).parent().removeClass('hovered');
            }).on('focus', function(){
                $(this).parent().addClass('hovered');
            });
        }

        </script>
    <!-- expand/collapse function -->


        <!-- validate -->
    <script type="text/javascript">

        function validateField(fieldId, fieldBoxId, fieldType, required)
        {
            fieldBox = document.getElementById(fieldBoxId);
            fieldObj = document.getElementById(fieldId);

            if(fieldType == 'text'  ||  fieldType == 'textarea'  ||  fieldType == 'password'  ||  fieldType == 'file'  ||  fieldType == 'phone'  || fieldType == 'website')
            {
                if(required == 1 && fieldObj.value == '')
                {
                    fieldObj.setAttribute("class","mainFormError");
                    fieldObj.setAttribute("className","mainFormError");
                    fieldObj.focus();
                    return false;
                }

            }


            else if(fieldType == 'menu'  || fieldType == 'country'  || fieldType == 'state')
            {
                if(required == 1 && fieldObj.selectedIndex == 0)
                {
                    fieldObj.setAttribute("class","mainFormError");
                    fieldObj.setAttribute("className","mainFormError");
                    fieldObj.focus();
                    return false;
                }

            }


            else if(fieldType == 'email')
            {
                if((required == 1 && fieldObj.value=='')  ||  (fieldObj.value!=''  && !validate_email(fieldObj.value)))
                {
                    fieldObj.setAttribute("class","mainFormError");
                    fieldObj.setAttribute("className","mainFormError");
                    fieldObj.focus();
                    return false;
                }

            }



        }

        function validate_email(emailStr)
        {
            apos=emailStr.indexOf("@");
            dotpos=emailStr.lastIndexOf(".");

            if (apos<1||dotpos-apos<2)
            {
                return false;
            }
            else
            {
                return true;
            }
        }


        function validateDate(fieldId, fieldBoxId, fieldType, required,  minDateStr, maxDateStr)
        {
            retValue = true;

            fieldBox = document.getElementById(fieldBoxId);
            fieldObj = document.getElementById(fieldId);
            dateStr = fieldObj.value;


            if(required == 0  && dateStr == '')
            {
                return true;
            }


            if(dateStr.charAt(2) != '/'  || dateStr.charAt(5) != '/' || dateStr.length != 10)
            {
                retValue = false;
            }

            else	// format's okay; check max, min
            {
                currDays = parseInt(dateStr.substr(0,2),10) + parseInt(dateStr.substr(3,2),10)*30  + parseInt(dateStr.substr(6,4),10)*365;
                //alert(currDays);

                if(maxDateStr != '')
                {
                    maxDays = parseInt(maxDateStr.substr(0,2),10) + parseInt(maxDateStr.substr(3,2),10)*30  + parseInt(maxDateStr.substr(6,4),10)*365;
                    //alert(maxDays);
                    if(currDays > maxDays)
                        retValue = false;
                }

                if(minDateStr != '')
                {
                    minDays = parseInt(minDateStr.substr(0,2),10) + parseInt(minDateStr.substr(3,2),10)*30  + parseInt(minDateStr.substr(6,4),10)*365;
                    //alert(minDays);
                    if(currDays < minDays)
                        retValue = false;
                }
            }

            if(retValue == false)
            {
                fieldObj.setAttribute("class","mainFormError");
                fieldObj.setAttribute("className","mainFormError");
                fieldObj.focus();
                return false;
            }
        }

        function validatePage1()
        {
            retVal = true;
            if (validateField('field_1','fieldBox_1','text',0) == false)
            retVal=false;
            if (validateField('email','fieldBox_2','email',1) == false)
            retVal=false;
            if (validateField('field_3','fieldBox_3','menu',0) == false)
            retVal=false;
            if (validateField('field_4','fieldBox_4','checkbox',1) == false)
            retVal=false;
            if (validateField('field_5','fieldBox_5','checkbox',0) == false)
            retVal=false;
            if (validateField('field_6','fieldBox_6','textarea',0) == false)
            retVal=false;
            if (validateField('field_7','fieldBox_7','checkbox',1) == false)
            retVal=false;
            if (validateField('field_8','fieldBox_8','text',0) == false)
            retVal=false;
            if (validateField('field_9','fieldBox_9','checkbox',0) == false)
            retVal=false;

            if(retVal == false)
            {
                //alert('Please correct the errors.  Fields marked with an asterisk (*) are required');
                alert('Bitte die mit (*) markierten Felder alle ausfuellen!');
                return false;
            }
            return retVal;
        }



    </script>
    <!-- end validate -->




</head>

<body onload="collapseAll()">

<div id="mainForm">




    <div id="formHeader">
            <h2 class="formInfo">Anmeldung <?php echo $title; ?></br>
			 Registration <?php echo $title_eng; ?> </h2>
    </div>

    <br /><!-- begin form -->
    <form method="post" enctype="multipart/form-data" action="guest_processor.php" onsubmit="return validatePage1();">
      <ul class="mainForm" id="mainForm_1">

            <!--eMailFehler
            <li class="mainFormError" >
              <h1>Fehler|Error</h1>
              <p>Ohne Angabe einer gültigen eMail Adresse kannst du dich leider nicht anmelden!</p>
              <p>Without a valid eMail address we can't register you, sorry!</p>
            </li>
            eMailFehler-->
            <li class="mainForm hint--right" id="fieldBox_1" aria-label="Optional |optional">
                <input type="hidden" name="lang" value="de" /
                <label class="formFieldQuestion">Name | name&nbsp; <img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                <input class="mainForm" type="text" name="field_1" id="field_1" size='20' value='' />
            </li>

            <li class="mainForm" id="fieldBox_2">
              <span class="hint--right hint--medium"  aria-label="An diese Mailadresse senden wir vor dem Treffen das Programm, Anreise Informationen sowie die Adresse deiner Unterkunft. | To this mail-adress we send the programme, information on how you get there and the adress of your accomodation">
                <label class="formFieldQuestion">E-Mail Adresse | mail adress*&nbsp;&nbsp;<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                <input class="mainForm" type="text" name="email" id="email" size="20" value="" style="background-image:url(imgs/email.png); background-repeat: no-repeat;  padding: 2px 2px 2px 25px;" />
              </span>
            </li>

            <li class="mainForm" id="fieldBox_3">
                <span class="hint--right hint--medium"  aria-label="Brauchst du Kinderbetreuung auf dem Treffen sowie Unterkunft für deine Kinder? | Do you need child care and accommodation for your child(ren)? ">
                <label class="formFieldQuestion">Kinderbetreuung | Child care<img src="imgs/tip_small.png" border="0" alt="ℹ" /></label>
                <select class="mainForm" name="field_3" id="field_3">
                    <option value="0">Nein | no</option>
                    <option value="1">Ja für 1 Kind | yes, 1 child</option>
                    <option value="2">Ja für 2 Kinder | yes, 2 children</option>
                    <option value="3">Ja für 3 Kinder | yes, 3 children</option>
                    <option value="3+">Ja für mehr als 3 Kinder | yes, more then 3 children</option>
                    </select>
                </span>
            </li>

            <li class="mainForm" id="fieldBox_4">
                <span class="hint--right hint--medium"  aria-label="Für welche Nächte brauchst du eine Unterkunft? | For which nights do you need accommodation?">
                <label class="formFieldQuestion">Unterkunft für? | I need accommodation for&nbsp;*&nbsp;<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>

                    <input class="mainForm" type="checkbox" name="field_4[]" id="field_4_option_1" value="Fr/Sa" />
                        <label class="formFieldOption" for="field_4_option_1">Fr/Sa | fr/sa</label>
                    <input class="mainForm" type="checkbox" name="field_4[]" id="field_4_option_2" value="Sa/So" />
                        <label class="formFieldOption" for="field_4_option_2">Sa/So | sa/sun</label>

                </span>
            </li>

            <li class="mainForm" id="fieldBox_5">
                <label class="formFieldQuestion">Unterkunftswünsche | accommodation requests  </label>
                <span>
                    <input class="mainForm" type="checkbox" name="field_5[]" id="field_5_option_1" value="Keine_Sammelunterkunft" />
                    <label class="formFieldOption" for="field_5_option_1">Ich möchte nicht in einer Sammelunterkunft
übernachten | I don't want to sleep in a collective accommodation.</label>
                    <input class="mainForm" type="checkbox" name="field_5[]" id="field_5_option_2" value="Keine_Isomatte" />
                    <label class="formFieldOption" for="field_5_option_2">Ich kann nicht auf einer Isomatte
übernachten | I can' t sleep on a camping mattress.</label>
                </span></li>

            <li class="mainForm" id="fieldBox_10">
              <span class="hint--right hint--medium"  aria-label="Wir brauchen diese Info, damit die Vokü möglichst genau weiß, wann sie wie viele Essen vorbereiten muss! | We need this information so that the kitchen knows how many meals they need to prepare">
                <label class="formFieldQuestion">Lecker Essen - zu welchen Mahlzeiten wirst du da sein? | Great food! - for which meals will you be there?&nbsp;*&nbsp;<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                    <input class="mainForm" type="checkbox" name="field_10[]" id="field_10_option_1" value="FrAb" /><label class="formFieldOption" for="field_10_option_1">Freitag Abend | Friday dinner </label>
                    <input class="mainForm" type="checkbox" name="field_10[]" id="field_10_option_2" value="SaMo" /><label class="formFieldOption" for="field_10_option_2">Samstag Morgen | Saturday breakfast </label>
                    <input class="mainForm" type="checkbox" name="field_10[]" id="field_10_option_3" value="SaMi" /><label class="formFieldOption" for="field_10_option_3">Samstag Mittag | Saturday lunch </label>
                    <input class="mainForm" type="checkbox" name="field_10[]" id="field_10_option_4" value="SaAb" /><label class="formFieldOption" for="field_10_option_4">Samstag Abend | Saturday dinner </label>
                    <input class="mainForm" type="checkbox" name="field_10[]" id="field_10_option_5" value="SoMo" /><label class="formFieldOption" for="field_10_option_5">Sonntag Morgen | Sunday breakfast</label>
                    <input class="mainForm" type="checkbox" name="field_10[]" id="field_10_option_6" value="SoMi" /><label class="formFieldOption" for="field_10_option_6">Sonntag Mittag | Sunday dinner </label>
					
              </span>
            </li>

            <li class="mainForm" id="fieldBox_6">
              <span class="hint--right hint--medium"  aria-label="Wir versuchen allen die Teilnahme am Treffen zu ermöglichen daher versuchen wir Geld für Fahrtkosten zu organisieren. Wir können aber nichts versprechen.
            Sag uns wie viel du für eine Teilnahme brauchen würdest, wir melden uns bei dir. | We try to make it possible for everyone to participate, so we try to organise refund for your travel costs. We can't promise this, but tell us, how much you would need and we get in contact with you.
            ">
                  <label class="formFieldQuestion">Fahrtkostenerstattung? | Do you need refund of your travel costs?<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                  <input size="10" type="text" class="mainForm"  name="field_6" id="field_6" />
              </span>
            </li>

            <li class="mainForm" id="fieldBox_7">
              <span class="hint--right hint--medium"  aria-label="Wir benötigen diese Info um herauszufinden, welche Dolmetsch-Strukturen wir bereitstellen müssen. Leider können wir nicht garantieren, dass wir in alle Sprachen werden übersetzen können. | We need this information get an idea how much interpreting infrastructure is needed. Unfortunately we can't guarantee a translation/intpretation in all languages.">
                <label class="formFieldQuestion">Sprachen, in denen du an Diskussionen teilnehmen kannst | Languages you okay with attending discussions&nbsp;*&nbsp;<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_1" value="es" /><label class="formFieldOption" for="field_7_option_1">Español</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_2" value="de" /><label class="formFieldOption" for="field_7_option_2">Deutsch</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_3" value="en" /><label class="formFieldOption" for="field_7_option_3">English</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_4" value="fr" /><label class="formFieldOption" for="field_7_option_4">Français</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_5" value="ar" /><label class="formFieldOption" for="field_7_option_5">العربية</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_6" value="pl" /><label class="formFieldOption" for="field_7_option_6">Polski</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_7" value="cz" /><label class="formFieldOption" for="field_7_option_7">Ceština</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_8" value="nl" /><label class="formFieldOption" for="field_7_option_8">Nederlands</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_9" value="sv" /><label class="formFieldOption" for="field_7_option_9">Svenska</label>
                    <input class="mainForm" type="checkbox" name="field_7[]" id="field_7_option_10" value="OT" /><label class="formFieldOption" for="field_7_option_10">Andere Sprachen (bitte ins Kommentarfeld schreiben) | Other (please specify in comments)</label>
              </span>
            </li>

            <li class="mainForm" id="fieldBox_trans">
                <span class="hint--right hint--medium"  aria-label="Schreib bitte ins Kommentarfeld von welcher Sprache in welche Sprache du übersetzen kannst. | Please note in the comments which languages you are able to translate.">
                    <label class="formFieldQuestion">Übersetzen? | Translation?<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                    <input class="mainForm" type="checkbox" id="field_trans" name="field_trans" value="yes" /><label class="formFieldOption" for="field_trans">Kannst/Magst du übersetzen? | Are you able to translate?</label>
                </span>
            </li>

            <li class="mainForm" id="fieldBox_9">
              <span class="hint--right hint--medium"  aria-label="Essen ist vegan=laktosefrei. Falls notwendig Allergien in Kommentar spezifizieren. | The food is vegan = lactose-free;if necessary, please specify in the comments">
                <label class="formFieldQuestion">Allergien (Essen) | allergies (food)<img src="imgs/tip_small.png" border="0" alt="ℹ"/></label>
                <input class="mainForm" type="checkbox" name="field_9[]" id="field_9_option_1" value="Gluten" />
                    <label class="formFieldOption" for="field_9_option_1">Gluten | gluten </label>
                <input class="mainForm" type="checkbox" name="field_9[]" id="field_9_option_2" value="Soja" />                   <label class="formFieldOption" for="field_9_option_2">Soja | soy</label>
                <input class="mainForm" type="checkbox" name="field_9[]" id="field_9_option_3" value="Fruktose" />
                    <label class="formFieldOption" for="field_9_option_3">Fruktose | fructose </label>
                <input class="mainForm" type="checkbox" name="field_9[]" id="field_9_option_4" value="Nüsse" />
                    <label class="formFieldOption" for="field_9_option_4">Nüsse | nuts</label>
                <input class="mainForm" type="checkbox" name="field_9[]" id="field_9_option_5" value="Anderes" />
                    <label class="formFieldOption" for="field_9_option_5">Anderes (bitte in Kommentarfeld schreiben) | other (please note in comment box)</label>
              </span>
            </li>

            <li class="mainForm" id="fieldBox_8">
              <label class="formFieldQuestion">Kommentar | comments</label>
              <input class="mainForm" type="text" name="field_8" id="field_8" size='20' value='' />
            </li>
            <li class="mainForm">
                <input id="saveForm" class="mainForm" type="submit" value="anmelden | submit" />
            </li>
          </ul>
        </form>
        <!-- end of form -->
    <!-- close the display stuff for this page -->
    <small>Date Number: <?php echo $datenr; ?> </small>
    </div>

</body>
</html>
