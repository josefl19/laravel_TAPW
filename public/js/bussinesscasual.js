$(document).ready(function() {
    $('#blog_table').DataTable({
        "ajax": "/admin/jsonTable"
    });

    $(document).on('click', '.new_post', function() {
        $('#sample_form')[0].reset();
        $('#titleEditAdd').text("Add New Post");
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formModal').modal('show');
    })

    $(document).on('click', '.view_post', function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "/admin/show/" + id,
            dataType: "json",
            success: function(data) {
                $('.modal-title').text('Blog view');
                $('#titleModal').text('Title: ' + data.title);
                $('#imgModal').html('<p id="imgModal"><img id="imageModal" width="50%" height="50%" /></p>');
                $('#imageModal').attr('src', data.image);
                $('#descriptionModal').text('Description: ' + data.description);
                $('#authorModal').text('Author: ' + data.author);
                $('#createdDateModal').text('Created date: ' + data.created_date);
                $('#imgModalForm').empty(); //fire the modal
                $('#myModal').modal({ show: true });
            }
        })
    });

    $(document).on('click', '.edit_post', function() {
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url: "/admin/edit/" + id,
            dataType: "json",
            success: function(data) {
                $('#titleEditAdd').text('Edit blog');
                $('#titleEdit').val(data.title);
                $('#descriptionEdit').val(data.description);
                $('#authorEdit').val(data.author);
                $('#imageEdit').val(data.imageName);
                $('#hidden_id').val(data.id);
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal({ show: true });
            }
        })
    });

    var user_id;

    $(document).on('click', '.del_post', function() {
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });

    $('#del_button').click(function() {
        $.ajax({
            url: "/admin/delete/" + user_id,
            beforeSend: function() {
                $('#del_button').text('Deleting...');
            },
            success: function(data) {
                setTimeout(function() {
                    $('#confirmModal').modal('hide');
                    $('#blog_table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });

    $('#sample_form').on('submit', function(event) {
        var id_submit = $('#hidden_id').val();
        var formData = {
            title: $('#titleEdit').val(),
            description: $('#descriptionEdit').val(),
            author: $('#authorEdit').val(),
            image: $('#imageEdit').val(),
            id: $('#hidden_id').val(),
        }

        event.preventDefault();
        if ($('#action').val() == 'Add') {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/admin/store",
                method: "POST",
                data: formData,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#blog_table').DataTable().ajax.reload();
                        $('#confirmModal').modal('hide');
                    }
                    $('#form_result').html(html);
                }
            })
        }

        if ($('#action').val() == "Edit") {
            console.log(formData);
            console.log(id_submit);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/admin/update/" + id_submit,
                method: "PUT",
                data: formData,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        //$('#sample_form')[0].reset();
                        $('#blog_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        }
    });

    function deleteBlog(id) {
        $.get("/admin/show/" + id)
            .done((data) => {
                data = JSON.parse(data);
                $('.modal-title').text(data.title)
                $('#imageModal').attr('src', data.image);
                $('#descriptionModal').text('Description: ' + data.description);
                $('#authorModal').text('Author: ' + data.author);
                $('#createdDateModal').text('Created date: ' + data.created_date);
                //fire the modal
                $('#myModal').modal({ show: true });
            });
    }
    //console.log(formData);

});

$(document).ready(function() {
    $('#contactForm').on('submit', function(event) {
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            mensaje: $('#message').val(),
        }
        event.preventDefault();
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "/contact",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                console.log(response);
                $('#contactForm')[0].reset();
            },
        });
    });
});

$(document).ready(function() {
    $('#team_table').DataTable({
        "ajax": "/admin/jsonTeam"
    });

    $(document).on('click', '.new_member', function() {
        $('#sample_formTeam')[0].reset();
        $('#teamEditAdd').text("Add New Member");
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#formTeam').modal('show');
    })

    $(document).on('click', '.view_member', function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "/admin/about/show/" + id,
            dataType: "json",
            success: function(data) {
                $('.modal-title').text('Blog view');
                $('#nameMember').text(data.name);
                $('#imgMember').html('<p id="imgMember"><img id="imageMember" width="50%" height="50%" /></p>');
                $('#imageMember').attr('src', data.image);
                $('#jobMember').text('Puesto: ' + data.puesto);
                $('#imgModalForm').empty(); //fire the modal
                $('#viewMember').modal({ show: true });
            }
        })
    });

    $(document).on('click', '.edit_member', function() {
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url: "/admin/about/edit/" + id,
            dataType: "json",
            success: function(data) {
                $('#teamEditAdd').text('Edit blog');
                $('#nameT').val(data.name);
                $('#imageTeam').val(data.imageName);
                $('#jobTeam').val(data.puesto);
                $('#hidden_id').val(data.id);
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formTeam').modal({ show: true });
            }
        })
    });

    var member_id;
    $(document).on('click', '.del_member', function() {
        member_id = $(this).attr('id');
        $('#confirmDelMember').modal('show');
    });

    $('#del_member').click(function() {
        $.ajax({
            url: "/admin/about/delete/" + member_id,
            beforeSend: function() {
                $('#del_member').text('Deleting...');
            },
            success: function(data) {
                setTimeout(function() {
                    $('#confirmDelMember').modal('hide');
                    $('#team_table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });

    $('#sample_formTeam').on('submit', function(event) {
        var id_submit = $('#hidden_id').val();
        var formData = {
            name: $('#nameT').val(),
            puesto: $('#jobTeam').val(),
            image: $('#imageTeam').val(),
            id: $('#hidden_id').val(),
        }
        event.preventDefault();
        if ($('#action').val() == 'Add') {
            console.log(formData);
            console.log(id_submit);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/admin/about/store",
                method: "POST",
                data: formData,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#team_table').DataTable().ajax.reload();
                        $('#formTeam').modal('hide');
                    }
                    $('#form_result').html(html);
                }
            })
        }

        if ($('#action').val() == "Edit") {
            console.log(formData);
            console.log(id_submit);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/admin/about/update/" + id_submit,
                method: "PUT",
                data: formData,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        //$('#sample_form')[0].reset();
                        $('#team_table').DataTable().ajax.reload();
                        $('#formTeam').modal('hide');
                    }
                    $('#form_result').html(html);
                }
            });
        }
    });
});