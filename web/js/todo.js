$(function() {
    $('#createButton').click(function() {
        $('#modalFormTodoListContent').modal('show')
            .find('#formTodoListContent')
            .load($(this).attr('value'));
    });
});
