$(document).ready(function() {
    $(document).on('click', '.category_checkbox', function () {

        var ids = [];

        var counter = 0;
       
        $('.courses_cards').empty();

        $('.category_checkbox').each(function () {
            if ($(this).is(":checked")) {
                ids.push($(this).attr('id'));
                counter++;
            }
        });

        
        if (counter == 0) {
            $('.courses').empty();
            $('.courses').append('No Data Found');
        } else {
            fetchCauseAgainstCategory(ids);
        }
    });
});

function fetchCauseAgainstCategory(id) {

    $('.courses').empty();

    $.ajax({
        type: 'GET',
        url: '/getCoursesByAwardingId',
        data:{id:id},
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);
            
            if (response.length == 0) {
                $('.courses').append('No Data Found');
            } else {
                response.forEach(element => {
                    $('.courses_cards').append(`
                    <div class="card " style="width:230px; height:300; border-radius: 20px;margin: 5px; float:left">
                        <img class="card-img-top" src="img/${element.url}" alt="" style="border-radius: 15px 15px 0 0;"> <br>
                        <h6 style="margin:auto;">${element.course_name}</h6> <br>

                        <div  style="margin: auto; text-align: center;">
                            <button type="submit" class="btn btn-primary" style="border-radius:50px;" > Start Now</button><br><br>
                        
                        </div>
                    </div>
                    `);
                    $('.courses').append(`
                        <div class="custom-control  custom-checkbox course_checkebox">
                            <input type="checkbox"  attr-name="${element.course_name}" class="custom-control-input course_checkbox" id="${element.id}">
                            <label class="custom-control-label" for="${element.id}">${element.course_name}</label>
                        </div>
                                                             
                    `);
                      
                   
                });
            }
        }
    });
    
}