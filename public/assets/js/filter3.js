$(document).ready(function(){
    $(document).on('click','.courses_checkbox',function(){

        var courseIds = [];
        var courseCounter = 0;

        $('.courses_cards').empty();

        $('.courses_checkbox').each(function () {
            if ($(this).is(":checked")) {
                courseIds.push($(this).attr('id'));
                console.log(courseIds);
                courseCounter++;
            }
        });

        if (courseCounter == 0) {
            $('.courses_cards').empty();
            $('.courses_cards').append('Select One course or refresh the page');
        } else {
            fetchCause(courseIds);
        }
    });
});

function fetchCause(ids){

    $.ajax({
        type: 'GET',
        url:'/getCourses',
        data:{id:ids},
        success:function(response){
            var response = JSON.parse(response);
            console.log(response);

            if (response.length == 0) {
                $('.courses_cards').append('No Data Found');
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
                });
            }
        }
    });

}