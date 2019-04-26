$(function() {

    var _url = $("#_url").val();

    var ib_msg = $("#ib_msg");

    //ib_msg.html('Please wait...');

    setTimeout(function(){

        ib_msg.html('Checking the system...<br>');

        $.get( _url + "files/create_htaccess/", function( data ) {


            if(data == 'ok'){


              var ib_ajax =  $.get( _url + "settings/url_rewrite_enable/", function( data ) {

                    ib_msg.append(data);
                    ib_msg.append("<br> Redirecting to dashboard....");
                    ib_msg.append("<br> Please wait....");

                  setTimeout(function () {

                      var n_url = _url.replace('?ng=','');

                      window.open(n_url + 'dashboard/', "_self");

                  },3000);

                    // check if it's working



                    // $.get( _url + "settings/url_rewrite_check/", function( data ) {
                    //
                    //     alert(data);
                    //
                    //     if(data == 'ok'){
                    //
                    //         location.reload();
                    //
                    //     }
                    //     else{
                    //         $.get( "?ng=files/remove_htaccess/", function( resp ) {
                    //             ib_msg.append("<br> Sorry, Unable to enable URL Rewrite. Check the Server supports URL Rewriting. <br>" + data + " <br> " + resp);
                    //         });
                    //     }
                    //
                    // });

                }).fail(function() {

                  ib_msg.append("System, encountered an error. Please remove the .htaccess file from root directory.");

                  $.get( "?ng=files/remove_htaccess/", function( data ) {
                      ib_msg.append("Sorry, Unable to enable URL Rewrite. Check the Server supports URL Rewriting.");
                  });

              });

            }
            else{
                ib_msg.append(data);
            }



        });


    }, 2000);

});