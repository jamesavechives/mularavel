jQuery(document).ready(function($){
    $('#file_form :submit').click(function() {
        var form_data = {};
        $('#file_form').find('input').each(function () {
            form_data[this.name] = $(this).val();
        });
        console.log(form_data);
        $('#file_form').ajaxForm({
            url: "http://localhost/test/wp-admin/admin-ajax.php", // there on the admin side, do-it-yourself on the front-end
            data: form_data,
            type: 'POST',
            contentType: 'json',
            success: function (response) {
                alert(response.message);
            },
            error: function (response) {
                console.log('error');
            }
        });
        return false;
    });
});