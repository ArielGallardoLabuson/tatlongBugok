
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
  $('#bell1').on('click', function () {
    $('.notifbox').toggle()
    count += 1
    $('.setbox1').hide()
    $('#bell1').addClass('checked')
    $('#set1').removeClass('checked')
    console.log(count)
    if (count == 2 || count1 == 1) {
      $('#bell1').removeClass('checked')
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
  $('#set1').on('click', function () {
    $('.setbox').toggle()
    count1 += 1
    $('.notifbox').hide()
    $('#set1').addClass('checked')

    if (count1 == 2 || count == 1) {
      $('#set1').removeClass('checked')
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
      $('.approveform').css("display", "none")
      $('.declineform').css("display", "none")
      $('.announcementform').css("display", "none")
      

    
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
  $('#menuicon').on('click', function () {
    $('.sidebar').css("display", "flex")
    $('.navbar').css("display", "none")
    $('.announcementform').css("display", "none")
    $('.eventform').css("display", "none")
    
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

  $('.no').on('click', function () {
    $('.approveform').css("display", "none")
  })
  $('.no1').on('click', function () {
    $('.declineform').css("display", "none")
  })
  $(' #totalresidents').on('click', function () {
    window.location.href ="residents.php"
  })
  $(' #pwds').on('click', function () {
    window.location.href ="residents.php"
  })
  $(' #senior').on('click', function () {
    window.location.href ="residents.php"
  })
  $(' #voters').on('click', function () {
    window.location.href ="residents.php"
  })
  $(' #household').on('click', function () {
    window.location.href ="household.php"
  })
  $(' #barangayofficials').on('click', function () {
    window.location.href ="officialsandstaff.php"
  })
  $(' #totalblotter').on('click', function () {
    window.location.href ="blotterrecord.php"
  })
  $(' #certificates').on('click', function () {
    window.location.href ="requesttable.php"
  })
  $('#sort').on('click', function () {
    let constatus = 1;
    if(document.getElementById("sort").value == "PWD"){
      document.querySelector('.consubmit').click();
    
    }
    
    if(document.getElementById("sort").value == "Normal"){
    
      document.querySelector('.consubmit').click();
      
    }
    if(document.getElementById("sort").value == "All"){
        
      document.querySelector('.consubmit').click();
      
    }
    if(document.getElementById("sort").value == "Senior Citizen"){
      document.querySelector('.consubmit').click();
    }
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
      window.location.href = ("officialsandstaff.php")
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
  window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");
  
    loader.classList.add("loader--hidden");
  
    loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
    });
  });

