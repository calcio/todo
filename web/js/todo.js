$(function() {
    $('#createButton').click(function() {
        $('#modalFormTodoListContent').modal('show')
            .find('#formTodoListContent')
            .load($(this).attr('value'));
    });

    $('.updateButton').click(function() {
        $('#modalFormTodoListContentUpdate').modal('show')
            .find('#formTodoListContentUpdate')
            .load($(this).attr('value'));
    });

    $('.viewButton').click(function() {
        $('#modalFormTodoListContentView').modal('show')
            .find('#formTodoListContentView')
            .load($(this).attr('value'));
    });

    $('#todo .select-on-check-all').click(function() {
        $.ajax()
    });

});
