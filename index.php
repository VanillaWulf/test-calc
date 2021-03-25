<html>
<head>
<script type="text/javascript" src="https://calc.jellyweb.ru/js/jquery.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="/admin/js/jquery.js"></script>
<script type="text/javascript" src="/admin/js/obrphp.js"></script>
<script>
$(document).ready(function() {
  $("#sum").text("0");
    $('[name="selectf"]').change(function(){
    var valinf = $(this).val();
    var datanames= $(this).data().name;
    var dataitems = $(this).data().item;
    var valcountry = $("#selectf-1").val();
    var valcity = $("#selectf-2").val();
    var valtypecours = $("#selectf-3").val();
    var valhour = $("#selectf-4").val();
/* VAR */
$.ajax({
    type: 'POST',
    url: '/test/'+ datanames +'.php',
    data: { "valinf": valinf, 'valcity': valcity, "valtypecours": valtypecours, "valhour": valhour },
    success: function(data) {

      if (datanames == 'country') {
        var t1 = '{ "infooption": '+ data +' }';
      } else if (datanames == 'city') {
        $("#selectf-3").css("display", "");
        var inforest = JSON.parse(data);
        var t1 = '{ "infooption": { '+ inforest.city +' }, "id": '+ inforest.idinf +' }';
      } else if (datanames == 'cours') {
        var inforest = JSON.parse(data);
        var t1 = '{ "infooption":  { '+ inforest.cours +' }, "id": '+ inforest.idinf +' }';
      } else if (datanames == 'hour') {
        var t1 = '{ "infooption": { '+ data +' } }';
      } else if (datanames == 'month') {
        var t2 = '{ "infooption": { '+ data +' } }';
        var inforest2 = JSON.parse(t2);
        $("#summonth").text(parseInt(inforest2.infooption[valcity][valtypecours][valinf]));
        var summonth = parseInt($("#summonth").text());
        var sumtaxi = parseInt($("#sumtaxi").text());
        var sumlingvo = parseInt($("#sumlingvo").text());
        $("#sum").text(summonth + sumtaxi);
        $("#finsum").text(Math.round(summonth * 0.9)+sumlingvo);
      }
/* VAR */



  /* PARSE */
  if (dataitems == '5') {} else {
    var infores = JSON.parse(t1);
      if (dataitems == '1') {
        var infooption = infores.infooption;
      } else if (dataitems == '2') {
        var infooptionsd = infores.infooption;
        var infooption = infooptionsd[valinf];
        var infooptionid = infores.id;
      } else if (dataitems == '3' || dataitems == '4') {
        var infooptionsd = infores.infooption;
        var infooption = infooptionsd[valcity][valinf];
        var infooptionid = infores.id;
      } else {
        var infooptionsd = infores.infooption;
        var infooption = infooptionsd[valinf];
      }
  }
  /* PARSE */


  if (!!infooption) {
    if (datanames == 'country') {
        var dispcity = '<option value="0">Выберите город</option>';
        $("#headinpsele-3").css("display", "none");
        $("#headinpsele-4").css("display", "none");
        $("#headinpsele-5").css("display", "none");
      } else if (datanames == 'city') {
        var dispcity = '<option value="0">Выберите курс</option>';
        $("#headinpsele-4").css("display", "none");
        $("#headinpsele-5").css("display", "none");
      } else if (datanames == 'cours') {
        var dispcity = '<option value="0">Выберите кол-во часов</option>';
        $("#headinpsele-5").css("display", "none");
      } else if (datanames == 'hour') {
        var dispcity = '<option value="0">Выберите кол-во недель</option>';
        $("#sum").text("0");
        $("#sumlingvo").text("0");
        $("#finsum").text("0");
      } else if (datanames == 'month') {
        var dispcity = '';
      }
      if (!!infooptionid) {
        for (var i = 0; i < infooptionid.length; i++) {
          var dispcity = dispcity +"<option value='"+ infooptionid[i] +"'>"+ infooption[i] +"</option>";
        }
      } else {
        for (var i = 0; i < infooption.length; i++) {
          var dispcity = dispcity +"<option value='"+ infooption[i] +"'>"+ infooption[i] +"</option>";
        }
      }

    var dataitemspl = ++dataitems;
    $("#selectf-"+ dataitemspl).empty().append(dispcity);
    $("#selectf-"+ dataitemspl).css("display", "");
    $("#headinpsele-"+ dataitemspl).css("display", "");
  }
  }
});


/* VAR */

  });
});

function monthcalcplus() {
  $("#summonth").text($("#selectf-5").val());
  var summonth = parseInt($("#summonth").text());
  var sumtaxi = parseInt($("#sumtaxi").text());
  var sumlingvo = parseInt($("#sumlingvo").text());
  $("#sum").text(summonth + sumtaxi);
  $("#finsum").text(Math.round(summonth * 0.9)+sumlingvo);
}

$(document).ready(function() {
  $('[name="selectftoorrr"]').change(function(){
    var valinf = $(this).val();
    var dataitems = $(this).data().item;
    var datanames = $(this).data().name;
    var city = $("#selectf-2").val();
    if ((dataitems == '7' && valinf == '1') || dataitems == '8' || dataitems == '9') {
        $.ajax({
            type: 'POST',
            url: '/test/'+ datanames +'.php',
            data: { "valinf": valinf, "city": city },
            success: function(data) {
              if (datanames == 'yesaccommodation') {
                var datainf = JSON.parse(data);
                var t1 = '{ "infooption": '+ datainf.accommodation +', "id": '+ datainf.idinf +' }';
              } else if (datanames == 'accommodation') {
                var datainf = JSON.parse(data);
                var t1 = '{ "infooption": '+ datainf.accommodation +', "id": '+ datainf.idinf +' }';
                $("#namevivstyperazm").text(datainf.name);
                $("#namevivstyperazmdisp").css("display", "");
              } else if (datanames == 'houraccommodation') {
                var datainf = JSON.parse(data);
                  $("#summonthrazm").text(datainf.sum);
                  var summonthrazm = parseInt($("#summonthrazm").text());
                  var summonth = parseInt($("#summonth").text());
                  var sumtaxi = parseInt($("#sumtaxi").text());
                  var sumlingvo = 0;
                  $("#sum").text(summonth + sumtaxi+sumlingvo+summonthrazm);
                  $("#finsum").text(Math.round(summonth * 0.9)+sumlingvo+summonthrazm);

              }
              /* PARSE */
              if (datanames == 'houraccommodation') {} else {
                var infores = JSON.parse(t1);
                    var infooptionsd = infores.infooption;
                    var infooption = infooptionsd;
                    var infooptionid = infores.id;
              }
              /* PARSE */


  if (!!infooption) {
      if (datanames == 'yesaccommodation') {
        var dispcity = '<option value="0">Выберите тип размещения</option>';
      } else if (datanames == 'accommodation') {
        var dispcity = '<option value="0">Выберите кол-во недель</option>';
      }
        for (var i = 0; i < infooptionid.length; i++) {
          var dispcity = dispcity +"<option value='"+ infooptionid[i] +"'>"+ infooption[i] +"</option>";
        }

    var dataitemspl = ++dataitems;
    $("#selectftoorrr-"+ dataitemspl).empty().append(dispcity);
    $("#selectftoorrr-"+ dataitemspl).css("display", "");
    $("#headselyesrazmsele-"+ dataitemspl).css("display", "");
  }
          }
        });
    } else {
          $("#sumlingvo").text("0");
          $("#summonthrazm").text("0");
          var summonthrazm = parseInt($("#summonthrazm").text());
            var summonth = parseInt($("#summonth").text());
            var sumtaxi = parseInt($("#sumtaxi").text());
            var sumlingvo = 0;
            $("#sum").text(summonth + sumtaxi+sumlingvo+summonthrazm);
            $("#finsum").text(Math.round(summonth * 0.9)+sumlingvo+summonthrazm);
            $("#headselyesrazmsele-8").css("display", "none");
            $("#headselyesrazmsele-9").css("display", "none");
    }
  });
});
</script>


<script>
$(document).ready(function() {
  $("#sum").text("0");
  $('[name="selectftoo"]').change(function(){
    var valinf = $(this).val();
    var dataitems = $(this).data().item;

    var dgfg = $("#selectftoo-7").val();

/* VAR */
    if (dataitems == '6') {
      if (valinf == '1') {
        var t1 = '{ "infooption": ["Принимающая семья","Студенческое общежитие","Студенческая комната"] }';
      } else if (valinf == '2') {
        $("#selectftoo-7").css("display", "none");
        $("#selectftoo-8").css("display", "none");
        $("#selectftoo-9").css("display", "none");
      }
    } else if (dataitems == '7') {
      var t1 = '{ "infooption": { '
      +'"Принимающая семья": ["Однушка","Двушка"],'
      +'"Студенческое общежитие": ["1 блок","2 блок"],'
      +'"Студенческая комната": ["1 комната","2 комнаты"] } }';
    } else if (dataitems == '8') {
      var t1 = '{ "infooption": { '
      +'"Принимающая семья": { "Однушка": ["Однокомнатная квартира"], "Двушка": ["Двухкомнатная квартира"] },'
      +'"Студенческое общежитие": { "1 блок": ["1 кв","2 кв"], "2 блок": ["8 кв","9 кв"] },'
      +'"Студенческая комната": { "1 комната": ["Однокомнатная комната","Двухкомнатная комната"], "2 комнаты": ["Однокомнатная комната","Двухкомнатная комната"] } } }';
    }
/* VAR */


/* PARSE */
if (dataitems == '6' && valinf == '2') {} else {
  var infores = JSON.parse(t1);
  if (dataitems == '7') {
    var infooptionsd = infores.infooption;
    var infooption = infooptionsd[valinf];
  } else if (dataitems == '8') {
    var infooptionsd = infores.infooption;
    var infooption = infooptionsd[dgfg][valinf];
  } else {
    var infooption = infores.infooption;
  }
}
/* PARSE */

    if (!!infooption) {
      for (var i = 0; i < infooption.length; i++) {
        var dispcity = dispcity +"<option value='"+ infooption[i] +"'>"+ infooption[i] +"</option>";
      }
      var dataitemspl = ++dataitems;
      document.getElementById('selectftoo-'+ dataitemspl).innerHTML = dispcity;
      $("#selectftoo-"+ dataitemspl).css("display", "");
    }
  });
});
</script>

<script>
  function sendmess() {

    var to = $("#selectf-1").val();
    var td = $("#selectf-2").val();
    var tt = $("#selectf-3").val();
    var th = $("#selectf-4").val();
    var tp = $("#selectf-5").val();
    var nameuser = $("#nameuser").val();
    var emailuser = $("#emailuser").val();
  var comment = $("#comment").val();
    var finsum = $("#finsum").text();
    var hous = $('input[name=selectftoorrr]:checked').val();
    var aeroport = $('input[name=selectftwo]:checked').val();
    var sum = $("#sum").text();


        $.ajax({
          type: 'POST',
          url: '/test/send.php',
          data: { "to": to, "td": td, "tt": tt, "th": th, "tp": tp, "nameuser": nameuser, "emailuser": emailuser, "comment": comment, "finsum": finsum, "sum": sum, "hous": hous, "aeroport": aeroport },
          success: function(data) {
              if (data == '1') {
                alert("Ваша заявка отправлена");
              } else {
                alert(data);
              }
              ga('send', 'event', 'form', 'calculate'); yaCounter47962151.reachGoal('Raschet-kursa'); return true;
          },
          error: function(xhr, str){
                alert(data);
            }
        });
  }

</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5GNNBNP');</script>
<!-- End Google Tag Manager -->


<style>
.qwe_ff_none {
  display: none;
}

select, .tttt {
  margin: 0;
    min-width: 10px;
    max-width: 100%;
    width: 100%;
    padding: 8px;
    height: auto;
    line-height: 1.5;
    font-size: 1em;
    border: 1px solid #e3e3e3;
    font-style: italic;
    transition: .3s;
    border-radius: 3px;
    background-color: #f8f8f8;
    text-transform: none;
    font: inherit;
    align-items: center;
    white-space: pre;
    -webkit-rtl-ordering: logical;
    cursor: default;
    -webkit-appearance: menulist;
    letter-spacing: normal;
    word-spacing: normal;
    text-rendering: auto;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
}

select:not(:-internal-list-box) {
    background-color: buttonface;
}

select:not(:-internal-list-box) {
    overflow: visible !important;
}

select:focus {
  outline: 0;
}

button {
    background-color: #f8f8f8;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
}

.title {
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 1.89;
    font-family: 'Open Sans', sans-serif;
    letter-spacing: 0em;
    text-align: left;
    color: #000000;
}
.titlecost {
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 1.89;
    font-family: 'Open Sans', sans-serif;
    letter-spacing: 0em;
    text-align: right;
    color: #000000;
}
#headinpsele-1,
#headinpsele-2,
#headinpsele-3,
#headinpsele-4,
#headinpsele-5 {
    display: inline-block;
    width: 300px;
    margin-right: 3%;
}
#headinpsele-8,
#headinpsele-9
{
    display: inline-block;
    width: 300px;
    margin-right: 3%;
}
.tttt {
  -webkit-appearance: none;
  max-width: 100%;
  cursor: unset;
}


</style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5GNNBNP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<div id='headinpsele-1'>
  <div class='title'>Выберите страну</div>
  <select id='selectf-1' name="selectf" data-item='1' data-name='country'>
  <?php include("cdb.php");
  echo "<option value='0'>Выберите страну</option>";
  $infotestcounyrys = mysql_query("SELECT * FROM country ORDER BY name");
  while ($infotestcounyry = mysql_fetch_array($infotestcounyrys)) {
  echo "
  <option value='$infotestcounyry[id]'>$infotestcounyry[name]</option>";
  } ?>
</select>
</div>
</br>
<div id='headinpsele-2' style='display: none;'>
  <div class='title'>Выберите город</div>
  <select id='selectf-2' name="selectf" data-item='2' data-name='city' style='display: none;'>
  </select>
</div>
</br>
<div id='headinpsele-3' style='display: none;'>
  <div class='title'>Тип курса</div>
  <select id='selectf-3' name="selectf" data-item='3' data-name='cours' style='display: none;'>
  </select>
</div>
</br>
<div id='headinpsele-4' style='display: none;'>
  <div class='title'>Кол-во часов в неделю</div>
  <select id='selectf-4' name="selectf" data-item='4' data-name='hour' style='display: none;'>
  </select>
</div>
</br>
<div id='headinpsele-5' style='display: none;'>
  <div class='title'>Кол-во недель</div>
  <select id='selectf-5' name="selectf" data-item='5' data-name='month' style='display: none;'>
  </select>
<br>

<div class='title' style='margin-top: 15px;'>Требуется размещение</div>
<input type="radio" id="selectftoorrr-7" name="selectftoorrr" data-name='yesaccommodation' data-item='7' value="1">
<label for="selectftoorrr-7" ><span class="quform-option-text">Да</span></label>
<input type="radio" id="selectftoorrr-7" name="selectftoorrr" data-item='7' value="2" checked>
<label for="selectftoorrr-7" ><span class="quform-option-text">Нет</span></label>

<div id="headselyesrazmsele-8" style='display: none;'>
<div class='title' style='margin-top: 15px;'>Тип размещения</div>
<select name='selectftoorrr' id="selectftoorrr-8" data-item='8' data-name='accommodation'></select>
</div>

<div id="headselyesrazmsele-9" style='display: none;'>
<div class='title' style='margin-top: 15px;'>Кол-во недель размещения</div>
<select name='selectftoorrr' id="selectftoorrr-9" data-item='9' data-name='houraccommodation'></select>
<div class='title' style='margin-top: 15px;font-size: 14px;text-align: left;'>* размещение более 4 недель оплачивается отдельно</div>
</div>

<div class='title' style='margin-top: 15px;'>Встречать в аэропорту?</div>
<input type="radio" id="selectftwo-10" name="selectftwo" data-item='10' value="1">
<label for="selectftwo-10" ><span class="quform-option-text">Да</span></label>
<input type="radio" id="selectftwo-10" name="selectftwo" checked data-item='10' value="2">
<label for="selectftwo-10" ><span class="quform-option-text">Нет</span></label>

<br />
<div id='headinpsele-9'>
<div class='titlecost' style='margin-top: 15px;'>Прямая цена школы:
<div id='sum' style='display: inline-block;font-size: 18px;font-family: sans-serif;'></div> €</div>

<div class='titlecost' style='margin-top: 15px;'>ИТОГО (скидка 10%):
<div id='finsum' style='display: inline-block;font-size: 42px;font-family: sans-serif;'></div> €</div>
</div>
<br />

<div class='title' style='margin-top: 15px;font-size: 14px;text-align: left;'>Результаты расчета не являются офертой, возможны доп. сборы. Для получения точной стоимости, пожалуйста заполните форму ниже.
<div id='namevivstyperazmdisp' style='display: none;'>
<div id='namevivstyperazm' style='display: inline-block;'></div>
</div>
</div>
<div class='title'>Ваше Имя</div>
<input class="tttt" type='text' id='nameuser' placeholder=" Ваше Имя"><br />
<div class='title'>E-mail</div>
<input class="tttt" type='email' id='emailuser' placeholder=" E-mail"><br />
<div class='title'>Комментарий</div>
<textarea name="comment" class="tttt" id='comment' placeholder=" Ваш комментарий"></textarea><br />
<button type='button' onClick='sendmess();'>Получить консультацию</button>
</div>

<br /><br />

<div id='summonth' class='qwe_ff_none'>1</div>
<div id='sumlingvo' class='qwe_ff_none'>0</div>
<div id='sumtaxi' class="qwe_ff_none">0</div>
<div id='summonthrazm' class="qwe_ff_none">0</div>

<div id='ajaxotv'></div>

</body>
</html>
