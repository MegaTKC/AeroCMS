tinymce.init({ selector:'textarea' });

$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
        if(this.checked) {
                $('.checkBoxes').each(function(){
                    this.checked = true;
                });
        }
        else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });

var divBox = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(divBox);
$('#load-screen').delay(700).fadeOut(600, function(){
    $(this).remove();
});

});


function loadUsersOnline()
{
    $.get("functions.php?onlineusers=result", function(data){
        $(".usersonline").text(data);
    });
}

setInterval(function(){
    loadUsersOnline();
}, 500);

