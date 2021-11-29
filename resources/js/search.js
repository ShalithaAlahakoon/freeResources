$(document).ready(function () {

    var awards = [];

    // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
    $('input[name="award[]"]').on('change', function (e) {

        e.preventDefault();
        awards = []; // reset 

        $('input[name="award[]"]:checked').each(function()
        {
            awards.push($(this).val());
        });

        $.post('/awardController/searchAwards', {awards: awards}, function(markup)
        {
            $('#search-results').html(markup);
        });            

    });

});