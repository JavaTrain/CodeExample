$(document).ready(function(){

    function showUsers(){

        var role = $("#selRole option:selected").val();//todo
        var course = $("#selCourse option:selected").val();//todo


        //if (role == 0) {
        //    alert("Change a role");
        //    return;
        //}

        $.ajax({
            type: "POST",
            url: "http://fwork.loc/ajax",
            data: { role: role, course: course },
            dataType: "json",
            cache: false,
            success: function(data) {

                console.log(data);

                // Таблица tableUsers
                var tab = $('#tableUsers');

                var vv = tab.children();

                vv.remove();

                var TableTitle = ["Id", "Name", "Email", "Role", "Course", "Edit", "Delete"];

                tab.append(
                    $('<thead/>'),
                    $('<tfoot/>'),
                    $('<tbody/>')
                );

                var TitleCell = $('<tr/>');
                $.each(TableTitle,function( myIndex, myData ) {
                    TitleCell.append(
                        $('<th/>',{
                            text:myData
                        })
                    );
                });
                $("thead",tab).append(TitleCell);

                for (var i = 0; i<data.length; i++) {

                    TitleCell = $('<tr/>');
                    TitleCell.append(
                        $('<td/>',{
                            text:data[i]['id']
                        }),
                        $('<td/>',{
                            text:data[i]['name']
                        }),
                        $('<td/>',{
                            text:data[i].email
                        }),
                        $('<td/>',{
                            text:data[i].role
                        }),
                        $('<td/>',{
                            text:data[i].course
                        }),
                        $('<td/>').append(
                            $('<a/>',{
                                'href':'http://fwork.loc/edit/' + data[i]['id'] + '/update',
                                text:'Edit'
                            })),
                        $('<td/>').append(
                            $('<a/>',{
                                'href':'http://fwork.loc/del/' + data[i]['id'],
                                text:'Delete'
                            }))
                    );

                    $("tbody",tab).append(TitleCell);
                }

            }
        });
    }


    $('button').on('click', function(){
        showUsers();
    });

});