<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>BloomBees</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://apis.google.com/js/client:platform.js" async defer></script>            
            <style id="dynamic"></style>
            <script type="text/javascript">
                /*
                 * Activado cuando el usuario acepta el inicio de sesión, cancela o cierra el
                 * cuadro de diálogo de autorización.
                 */
                var email = '';
                function loginFinishedCallback(authResult) {
                    if (authResult) {
                        if (authResult['error'] == undefined) {
                            gapi.auth.setToken(authResult); // Almacena el token recuperado.
                            toggleElement('signin-button'); // Oculta el inicio de sesión si se ha accedido correctamente.
                            //                        getName();
                            //                        getEmail();
                            getData();// Activa la solicitud para obtener la dirección de correo electrónico y nombre

                            //alert("mira " + email)
                        } else {
                            console.log('An error occurred');
                        }
                    } else {
                        console.log('Empty authResult');  // Se ha producido algún error
                    }
                }

                /*
                 * Inicia la solicitud del punto final userinfo para obtener la dirección de correo electrónico del
                 * usuario. Esta función se basa en gapi.auth.setToken que contiene un token
                 * de acceso de OAuth válido.
                 *
                 * Cuando se completa la solicitud, se activa getEmailCallback y recibe
                 * el resultado de la solicitud.
                 */

                function getData() {
                    gapi.client.load('oauth2', 'v2', function() {
                        var request = gapi.client.oauth2.userinfo.get();
                        request.execute(getNameEmailCallback);
                    });
                }

                function getNameEmailCallback(obj) {
                    //var el = document.getElementById('name');
                    var name = '';
                    var email = '';

                    if (obj['name']) {
                        name = obj['name'];
                    }
                    if (obj['email']) {
                        email = obj['email'];
                    }
                    //alert(name + email)
                    //                document.getElementById('username').value = name;
                    //                document.getElementById('email_user').value = email;
                    if (name !== '' && email !== '') {
                        window.location.href = "users/manage/" + name + '/' + email;
                    } else {

                        alert("Something went wrong")
                        window.location.href = "http://localhost/MYP/";
                        exit;
                    }


                    //console.log(obj);   // Sin comentario para inspeccionar el objeto completo.

                    //                el.innerHTML = name;
                    //                toggleElement('name');
                }

                function getNameCallback(obj) {
                    var el = document.getElementById('name');
                    var name = '';

                    if (obj['name']) {
                        name = obj['name'];
                    }

                    document.getElementById('username').value = name;

                    //console.log(obj);   // Sin comentario para inspeccionar el objeto completo.

                    el.innerHTML = name;
                    toggleElement('name');
                }

                function getEmailCallback(obj) {
                    var el = document.getElementById('email');
                    var email = '';

                    if (obj['email']) {
                        email = obj['email'];
                    }

                    //alert(email)

                    document.getElementById('email_user').value = email;
                    //console.log(obj);   // Sin comentario para inspeccionar el objeto completo.

                    el.innerHTML = email;
                    toggleElement('email');
                    return email;
                }

                function toggleElement(id) {
                    var el = document.getElementById(id);
                    if (el.getAttribute('class') == 'hide') {
                        el.setAttribute('class', 'show');
                    } else {
                        el.setAttribute('class', 'hide');
                    }
                }

                function checkSubmit() {                    
                    if (document.getElementById('agree').checked == false) {
                        alert("You didn't agree to the terms");
                        //window.history.back();
                        return false;
                    } else {
                        document.forms["terms"].submit();
                        return true;
                    }
                }



            </script>        