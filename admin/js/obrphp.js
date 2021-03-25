function login() {
        var login = $("#login").val();
        var pass = $("#pass").val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/login.php',
          data: {"login": login, "pass": pass},
          success: function(data) {
            if (data == '0') {
              alert("Ошибка.");
            } else {
              location.reload();
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function newcountry() {
      var newcountryf = $("#newcountryf").serialize();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newcountry.php',
          data: newcountryf,
          success: function(data) {
            alert(data);
            $("#name").val("");
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function newcity() {
      var newcityf = $("#newcityf").serialize();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newcity.php',
          data: newcityf,
          success: function(data) {
            alert(data);
            $("#name").val("");
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function newcours() {
      var newcoursf = $("#newcoursf").serialize();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newcours.php',
          data: newcoursf,
          success: function(data) {
            alert(data);
            $("#name").val("");
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function newhour() {
      var newhourf = $("#newhourf").serialize();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newhour.php',
          data: newhourf,
          success: function(data) {
            alert(data);
            $("#name").val("");
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function plustabmonth() {
  var itemsdatavar = $("#itemsdatavar").text();
  $("#itemsdatavar").text(parseInt(itemsdatavar) + 1);
  var goitemsdatavar = $("#itemsdatavar").text();
  document.getElementById('month').innerHTML+=""
        +"<div class='inpbl'>"
          +"<input type='number' id='name' data-items='"+ goitemsdatavar +"' placeholder='| Количество недель'>"
          +"<input type='number' id='sum-"+ goitemsdatavar +"' placeholder='| Цена'>"
        +"</div>";
}

function newmonth() {
      var arr = [].map.call(document.querySelectorAll('.inpbl'), function(block) {
          return [].map.call(block.querySelectorAll('#name'), function(inpbl) {
            var valueselectsuccessvar = $("#sum-"+ inpbl.getAttribute('data-items')).val();
            return inpbl.value +"^"+ valueselectsuccessvar +", ";
          });
        });
        var varik = arr;
        var hoursss = $("#hours").val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newmonth.php',
          data: { "varik": varik, "hours": hoursss },
          success: function(data) {
            alert(data);
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}





function oprecountry(id) {
  $("#link-"+ id).css("display", "none");
  $("#input-"+ id).css("display", "");
}



function delcountry(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delcountry.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function recountry(id) {
  var rename = $("#rename-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/recountry.php',
          data: { "id": id, "name": rename },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function delcity(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delcity.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function recity(id) {
  var rename = $("#rename-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/recity.php',
          data: { "id": id, "name": rename },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function delcours(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delcours.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
       });
}

function recours(id) {
  var rename = $("#rename-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/recours.php',
          data: { "id": id, "name": rename },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function delhours(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delhours.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function rehours(id) {
  var rename = $("#rename-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/rehours.php',
          data: { "id": id, "name": rename },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function delmonth(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delmonth.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function remonth(id) {
  var rename = $("#rename-"+ id).val();
  var resum = $("#resum-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/remonth.php',
          data: { "id": id, "name": rename, "sum": resum },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename +" ("+ resum +")");
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}





$(document).ready(function() {
    $('#city').change(function(){
      var valinf = $(this).val();
        $.ajax({
          type: 'POST',
          url: '/admin/search/cours.php',
          data: { "id": valinf },
          success: function(data) {
            var tnullselect = "<option value='0'>Выберите курс</option>";
              $("#cours").empty().append(tnullselect + data);
              $("#cours").css("display", "");
          },
          error: function(xhr, str){
                alert(data);
            }
        });

    });

    $('#cours').change(function(){
      var valinf = $(this).val();
        $.ajax({
          type: 'POST',
          url: '/admin/search/hours.php',
          data: { "id": valinf },
          success: function(data) {
            var tnullselect = "<option value='0'>Выберите кол-во часов</option>";
              $("#hours").empty().append(tnullselect + data);
              $("#hours").css("display", "");
          },
          error: function(xhr, str){
                alert(data);
            }
        });

    });
});

function newaccommodation() {
      var newaccommodationf = $("#newaccommodationf").serialize();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newaccommodation.php',
          data: newaccommodationf,
          success: function(data) {
            alert(data);
            $("#name").val("");
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function delcaccommodation(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delaccommodation.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function reaccommodation(id) {
  var rename = $("#rename-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/reaccommodation.php',
          data: { "id": id, "name": rename },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function newhouraccommodation() {
      var newhouraccommodationf = $("#newhouraccommodationf").serialize();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/newhouraccommodation.php',
          data: newhouraccommodationf,
          success: function(data) {
            alert(data);
            $("#name").val("");
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function rehouraccommodation(id) {
  var rename = $("#rename-"+ id).val();
  var resum = $("#resum-"+ id).val();
        $.ajax({
          type: 'POST',
          url: '/admin/obr/rehouraccommodation.php',
          data: { "id": id, "name": rename, "sum": resum },
          success: function(data) {
            if (data == '1') {
              $("#link-"+ id).css("display", "");
              $("#input-"+ id).css("display", "none");
              $("#newname-"+ id).text(rename +" - "+ resum);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}

function delhouraccommodation(id) {
        $.ajax({
          type: 'POST',
          url: '/admin/obr/delhouraccommodation.php',
          data: { "id": id },
          success: function(data) {
            if (data == '1') {
              $("#infobl-"+ id).hide();
            } else {
              alert(data);
            }
          },
          error: function(xhr, str){
                alert(data);
            }
        });
}