
  var count = 0
  var count1 = 0

  $('#bell').on('click', function () {
    $('.notifbox').toggle()
    count += 1
    $('.setbox').hide()
    $('#bell').addClass('checked')
    $('#set').removeClass('checked')
    console.log(count)
    if (count == 2 || count1 == 1) {
      $('#bell').removeClass('checked')
      count = 0
      count1 = 0
      console.log(count)
    }

  })
  $('.resadd').on('click', function () {
    $('.resident').css("display", "flex")
  })
  $('#set').on('click', function () {
    $('.setbox').toggle()
    count1 += 1
    $('.notifbox').hide()
    $('#set').addClass('checked')

    if (count1 == 2 || count == 1) {
      $('#set').removeClass('checked')
      count = 0
      count1 = 0

    }
  })
  $(document).on('keyup', function (e) {

    if (e.key == "Escape") {

      $('.notifbox').hide()
      $('.setbox').hide()
      $('#set').removeClass('checked')
      $('#bell').removeClass('checked')
      $('.requestinfo').removeClass('active')
      $('.hero1').css("display", "none")
      $('.addofficials').css("display", "none")
      $('.heroclearance').css("display", "none")
      $('.resident').css("display", "none")
      $('.barangayclearancebox').css("display", "none")
      $('.businessclearancebox').css("display", "none")
      $('.certificationbox').css("display", "none")
      $('.barangayindigencybox').css("display", "none")

    
    }
  });
  $('.tablerow').on('click', function () {
    $('.requestinfo').addClass('active')
    var currentrow = $(this).closest("tr");
    document.getElementById("id#").innerHTML = currentrow.find("td:eq(0)").text()
    document.getElementById("name").innerHTML = currentrow.find("td:eq(1)").text()
    document.getElementById("cnumber").innerHTML = currentrow.find("td:eq(2)").text()
    document.getElementById("address").innerHTML = currentrow.find("td:eq(3)").text()
    document.getElementById("requestpaper").innerHTML = currentrow.find("td:eq(4)").text()
    document.getElementById("purpose").innerHTML = currentrow.find("td:eq(5)").text()
    document.getElementById("requeststatus").innerHTML = currentrow.find("td:eq(6)").text()
    console.log(document.getElementById("requestpaper").innerHTML.trim());
  })
  $('#barangayclearance').on('click', function () {
    $('.barangayclearancebox').css("display", "flex")
  })

  $('#businessclearance').on('click', function () {
    $('.businessclearancebox').css("display", "flex")
  })
  $('#certification').on('click', function () {
    $('.certificationbox').css("display", "flex")
  })

  $('#barangayindigency').on('click', function () {
    $('.barangayindigencybox').css("display", "flex")
  })

  $('#officialbutton').on('click', function () {
    $('.addofficials').toggle()
    $('.addofficials').css("display", "flex")
    document.getElementById("officialid").value = ""
    document.getElementById("position").value = ""
    document.getElementById("name").value = ""
    document.getElementById("contact").value = ""
    document.getElementById("address").value = ""
    document.getElementById("start").value = ""
    document.getElementById("end").value = ""
  })

  $('#edit').on('click', function () {
    $('.addofficials').toggle()
    $('.addofficials').css("display", "flex")
    var currentrow = $(this).closest('tr');
    document.getElementById("officialid").value = currentrow.find('td:eq(0)').text();
    document.getElementById("position").value = currentrow.find('td:eq(1)').text();
    document.getElementById("name").value = currentrow.find('td:eq(2)').text();
    document.getElementById("contact").value = currentrow.find('td:eq(3)').text();
    document.getElementById("address").value = currentrow.find('td:eq(4)').text();
    document.getElementById("start").val() = currentrow.find('td:eq(5)').text();
    document.getElementById("end").val() = currentrow.find('td:eq(6)').text();
  })

  $('.requestbtn').on('click', function () {

    
    
  })

  $('#searchbox').keyup(function ()          //whenever you click off an input element
  {
    if (!$(this).val()) {
      window.location.href = ("http://localhost/barangaymanagementsystem/app/php/officialsandstaff.php")
      $(this).next('.#searchbox').focus();
    }
  });

  $('.password').keyup(function () {
    $('.show').addClass('alertshow')
    if (!$(this).val()) {
      $('.show').removeClass('alertshow')
    }
  })

  const show = document.querySelector('.show');
  let status = 1;
  show.addEventListener('click', () => {
    if (status == 1) {
      status = 0;
      show.innerHTML = 'hide'
      document.querySelector('.password').type = 'text';
      return
    }
    if (status == 0) {
      show.innerHTML = 'show'
      status = 1
      document.querySelector('.password').type = 'password';
      return
    }
  })
