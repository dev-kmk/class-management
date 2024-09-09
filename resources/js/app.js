import './bootstrap';

const avatarInput = document.querySelector("#avatar-edit");

avatarInput.addEventListener("change", function() {
    var file = this.files[0];
    console.log(this.files);
    if(file){
        var previewSrc = URL.createObjectURL(file);
        const previewElement = document.querySelector("#preview-avatar");
        previewElement.src = previewSrc;
    }
});

document.querySelector("#avatar-edit-btn").onclick = () => {
    avatarInput.click();
}