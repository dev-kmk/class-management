import './bootstrap';

// var avatarInput = document.querySelector("#avatar-edit");

document.querySelector("#avatar-edit").addEventListener("change", function() {
    // alert("hello");
    var file = this.files[0];
    console.log(this.files);
    if(file){
        var previewSrc = URL.createObjectURL(file);
        const previewElement = document.querySelector("#preview-avatar");
        previewElement.src = previewSrc;
    }
});