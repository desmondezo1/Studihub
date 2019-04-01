
/*const tutorEnum = ['Private tutor', 'Become a tutor'];

textSequence(0);
function textSequence(i) {

    if (tutorEnum.length > i) {
        setTimeout(function() {
            document.getElementById("privatetutorbutton").innerHTML = tutorEnum[i];
            textSequence(++i);
        }, 3000); // 1 second (in milliseconds)

    } else if (tutorEnum.length === i) { // Loop
        textSequence(0);
    }

}*/
   
    setTimeout(function() {
        $('#privatetutorbutton').removeAttr('display');
        $('#privatetutorbutton').css('display','none');
    }, 3000);
     