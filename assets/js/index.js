$(function(){
    var height = $('.navbar-header').height() + parseInt(10);
    $('#content').css({'padding-top':height});

    $(document).on("click", "a.menu-kiri", function(e){
        try{
            var $this=$(this);
            var class_name_array=$this.attr('class').replace('active').trim().split(' ');
            var isPath=$this.data('path');
            var header = $this.data('header');
            var url=class_name_array[class_name_array.length-1];
            var dataTable="path="+isPath+"&url="+url;

            // alert(isPath);
            // alert(url);

            // $.ajax({
            //     url : isPath+'/'+url,
            //     cache : false,
            //     success : function(data){
            //         $('#content-mitra').html(data);
            //         $('#panel-title').html(header);
            //     }
            // });
            $.ajax({
                url : isPath,
                cache : false,
                success : function(data){
                    $('#content-mitra').html(data);
                    $('#panel-title').html(header);
                }
            });
            $('#btn_collapse').trigger('click');
            return false;
        }catch(e){
            alert(e);
        }
    });

    $('#footer').load('footer.php');

    history.pushState(null, null); window.addEventListener('popstate', function(event) { history.pushState(null, null); });

});

function formatNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
}

$(function() {
      var $backToTop = $(".backTop");
      $backToTop.hide();
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
          $backToTop.fadeIn();
        } else {
          $backToTop.fadeOut();
        }
      });

      $backToTop.on('click', function(e) {
        $("html, body").animate({scrollTop: 0}, 500);
      });
});

function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function checkPassword(){
    var password_baru=$('#password_baru').val();
    var password_baru_2=$('#password_baru_2').val();

    if(password_baru!=password_baru_2){
        $('#check_password').html('<font color="red" size="3"><span class="glyphicon glyphicon-user">&nbsp; Password Tidak Sama</span></font>');
        document.getElementById('btn_simpan_password').disabled=true;
    }else{
        $('#check_password').html('<font color="green" size="3"><span class="glyphicon glyphicon-user">&nbsp; Password Sesuai</span></font>');
        document.getElementById('btn_simpan_password').disabled=false;
    }
}

function simpanPassword(){
    var password_lama=$('#password_lama').val();
    var password_baru=$('#password_baru').val();
    var password_baru_2=$('#password_baru_2').val();

    var queryParams = {
        password_lama : password_lama,
        password_baru : password_baru,
        password_baru_2 : password_baru_2
    }

    $.ajax({
      type: "POST",
          url: "__proses_simpan_password.php",
          data: queryParams,
          dataType : 'json',
          cache: false,
          beforeSend : function(){
              document.getElementById('btn_simpan_password').disabled=true;
          },
          success: function(data){
              document.getElementById('btn_simpan_password').disabled=false
              if(data.status==0){
                  $('#hasilProses').html(data.pesan);
              }else{
                  alert(data.pesan);
                  $('#btn_close').trigger('click');
              }
          }
    });
}

