function previewPhoto(event) {
    var input = event.target;
    var preview = document.getElementById('photoPreview');
    console.log('photo changed')
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            //preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
        preview.style.display = 'none';
    }
}
