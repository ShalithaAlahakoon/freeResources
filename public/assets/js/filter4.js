$(document).ready(function(){
    $(document).on('click','.resource_checkbox',function(){

        var resourceIds = [];
        var resourceCounter = 0;

        // $('.courses_cards').empty();

        $('.resource_checkbox').each(function () {
            if ($(this).is(":checked")) {
                resourceIds.push($(this).attr('id'));
                console.log(resourceIds);
                resourceCounter++;
            }
        });

        if (resourceCounter == 0) {
            // $('.courses_cards').empty();
            // $('.courses_cards').append('No Data Found');
        } else {
            getCause(resourceIds);
        }
    });
});

function getCause(ids){

    $.ajax({
        type: 'GET',
        url:'/getCoursesfromResource',
        data:{ids:ids},
        success:function(response){
            var response = JSON.parse(response);
            console.log(response);

            if (response.length == 0) {
                // $('.courses_cards').append('No Data Found');
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