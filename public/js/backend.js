$(document).ready(function () {
    console.log($(".editor"));
    $('.editor').each(function () {
        CKEDITOR.replace(this.id, {
            uiColor: '#343a40'
        });
    })
});
