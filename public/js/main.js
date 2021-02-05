$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function() {
    $(".datepicker").datepicker({
        altField: "#end-date",
        dateFormat: "yy-mm-dd"
    });

    $('#clear-form').click(function(e) {
        e.preventDefault();
        $('.form-type').html('Add');
        $('#todo-form input').val('');
        $('#todo-form').prop('action', $('#todo-form').data('default-action'));
        $('[name="_method"]').val('POST');
    });


    $('.edit-button').click(function() {
        $('.form-type').html('Edit');
        $('#todo-form').prop('action', $(this).data('edit-url'));
        $('[name="_method"]').val('PUT');

        $.ajax({
            url: $(this).data('fetch-url'),
            success: function(data) {
                $('#todo-form input:not([type=hidden])').each(function(i, el) {
                    $(this).val(data[$(this).prop('name')]);
                });
            }
        });
    });

    $('.delete-button').click(function() {

        $.ajax({
            type: 'DELETE',
            url: $(this).data('delete-url'),
            success: function() {
                location.reload();
            }
        });
    });
});