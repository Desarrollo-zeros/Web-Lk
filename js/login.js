// Get the modal

var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

var myVar = setInterval(myTimer, 100);
function myTimer() {
    var d = new Date();

    var n =155;
    var r ="px";
    document.getElementById("demo").innerHTML.value = d.toLocaleTimeString();
    document.getElementById("demo1").innerHTML.value;
    document.getElementById("demo2").style.width = n.toString()+r;
}

var modal1 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = 'none';
    }
}


/*----------->*/
// ref: http://diveintohtml5.org/detect.html
function supports_input_placeholder()
{
    var i = document.createElement('input');
    return 'placeholder' in i;
}

if(!supports_input_placeholder()) {
    var fields = document.getElementsByTagName('INPUT');
    for(var i=0; i < fields.length; i++) {
        if(fields[i].hasAttribute('placeholder')) {
            fields[i].defaultValue = fields[i].getAttribute('placeholder');
            fields[i].onfocus = function() { if(this.value == this.defaultValue) this.value = ''; }
            fields[i].onblur = function() { if(this.value == '') this.value = this.defaultValue; }
        }
    }
}


$(document).ready(function() {
    $('#username').blur(function(){
        $('#Info').html('<img src="../img/loader.gif" alt="" />').fadeOut(1000);
        var username = $(this).val();
        var email = $(this).val();
        var dataString = 'username='+username;
        $.ajax({
            type: "POST",
            url: "validar_usuario.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });
});

$(document).ready(function() {
    $('#email').blur(function(){
        $('#Info1').html('<img src="../img/loader.gif" alt="" />').fadeOut(1000);
        var email = $(this).val();
        var dataString = 'email='+email;
        $.ajax({
            type: "POST",
            url: "validar_correo.php",
            data: dataString,
            success: function(data) {
                $('#Info1').fadeIn(1000).html(data);
            }
        });
    });
});