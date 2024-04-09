function previewPhoto(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function (e) {
        var imagePreview = document.getElementById("photoPreview1");
        imagePreview.setAttribute("src", e.target.result);
      };
  
      reader.readAsDataURL(input.files[0]);
    }
  }