let signoutForm = document.querySelector('[data-signout]');

const showsignoutForm = function () {
    signoutForm.classList.toggle("active");
}

$(document).ready(function() {

    $('#evaluationFormEdit').click(function() {
        $('#evaluationForm').find(':input[type=password]').each(function(i, elem, p) {
            $(this).data("previous-value", $(this).val());
        });
    });

    function restore() {

        $('#evaluationForm').find(':input[type=password]').each(function(i, elem, p) {
            $(this).val($(this).data("previous-value"));
        });

    }

    $('#evaluationFormEditCancel').click(function() {

        restore();

    });

});