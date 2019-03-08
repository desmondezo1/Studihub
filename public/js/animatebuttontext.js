
var example = ['<a class="nav-link front" href="/privatetutor">Get Private tutor</a>', '<a class="nav-link front" href="/tutor-signup">Become a tutor</a>'];

textSequence(0);
function textSequence(i) {

    if (example.length > i) {
        setTimeout(function() {
            document.getElementById("privatetutorbutton").innerHTML = example[i];
            textSequence(++i);
        }, 3000); // 1 second (in milliseconds)

    } else if (example.length == i) { // Loop
        textSequence(0);
    }

}
