$(document).ready(function() {
    $(document).on('click', '.award_checkbox', function () {

        var ids = [];

        var counter = 0;
       
        $('.courses_cards').empty();

        $('.award_checkbox').each(function () {
            if ($(this).is(":checked")) {
                ids.push($(this).attr('id'));
                counter++;
            }
        });

        
        if (counter == 0) {
            $('.courses').empty();
            $('.courses').append('Select one awarding body or refresh the page');
        } else {
            fetchCauseAgainstAward(ids);
        }
    });
});

function fetchCauseAgainstAward(ids) {
    console.log(ids);
    $('.courses').empty();

    $.ajax({
        type: 'GET',
        url: '/getCoursesByAwardingId',
        data:{id:ids},
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);
            
            if (response.length == 0) {
                $('.courses').append('No Data Found');
                $('.courses_cards').empty();
                $('.courses_cards').append('Thid type of courses are not available or you cleared the filter.Plese select check box or refresh the page to see all courses');
            } else {
                response.forEach(element => {
                    $('.courses_cards').append(`
                   
                    <div class="card col-lg-3 col-md-3 col-sm-6" style="float:left" >
                        <img class="card-img-top" src="img/${element.url}" alt="" > <br>
                        <h6 style="margin:auto;">${element.course_name}</h6> <br>

                        <div  style="margin: auto; text-align: center;">
                            <button type="submit" class="btn btn-primary" style="border-radius:50px;" > Start Now</button><br><br>
                        
                        </div>
                    </div>
                    `);
                    
                    $('.courses').append(`
                        <div class="custom-control  custom-checkbox ">
                            <input type="checkbox"  attr-name="${element.course_name}" class="custom-control-input courses_checkbox" id="${element.id}">
                            <label class="custom-control-label" for="${element.id}">${element.course_name}</label>
                        </div>
                                                             
                    `);
                      
                   
                });
            }
        }
    });
    
}