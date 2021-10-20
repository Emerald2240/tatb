function showMissingItems() {
    var title = document.getElementById("title");
    var editor = document.getElementById("editor");
    var image = document.getElementById("image");
    var tag = document.getElementById("tag");

    var errorDiv = document.getElementById('errorContainer');
    errorDiv = errorDiv.innerHTML;

    if (editor == "") {
        errorDiv += '<p class="alert alert-danger">'
        errorDiv += 'Missing blog title';
        errorDiv += '</p>';
    }


    // for (var i = 0; i < pjson.length; i++) {
    //     html += '<div class="question">'; //start of question div
    //     html += '<span class="num">';
    //     html += [i + 1];
    //     html += '</span>';
    //     html += '<div class="q">';
    //     html += pjson[i][1];
    //     html += '</div></div><br>';
    //     if (i == limit) {
    //         i = pjson.length;
    //     }
    // }
    // container.innerHTML = html;
}