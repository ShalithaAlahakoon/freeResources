$(document).ready(function(){
    $(document).on('click','.course_checkbox',function(){

        var courseIds = [];
        var courseCounter = 0;

        $('.courses_cards').empty();

        $('.course_checkbox').each(function () {
            if ($(this).is(":checked")) {
                courseIds.push($(this).attr('id'));
                console.log(courseIds);
                courseCounter++;
            }
        });

        if (courseCounter == 0) {
            $('.courses_cards').empty();
            $('.courses_cards').append('No Data Found');
        } else {
            fetchCause(courseIds);
        }
    });
});

function fetchCause(id){

    $.ajax({
        type: 'GET',
        url:'/getCourses',
        data:{id:id},
        success:function(response){
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
                });
            }
        }
    });

}