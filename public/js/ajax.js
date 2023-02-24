$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function getLatestGame() {
        $.ajax({
            type: "GET",
            url: "/games/get-latest-game",
            dataType: "JSON",
            success: function (response) {
                $('#game_content').append(
                    '<tr>\
                        <td id="name_'+response.latest_game.id+'">'+response.latest_game.game_name+'</td>\
                        <td id="des_'+response.latest_game.id+'">'+response.latest_game.description+'</td>\
                        <td>\
                            <button id="editBtn" value="'+response.latest_game.id+'" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>\
                            <button id="deleteBtn" class="btn btn-danger">Delete</button>\
                        </td>\
                    </tr>'
                );
            }
        });
    }
    $(document).on('click', '#add', function () {
        let gameData = {
            'game_name': $('#game_name').val(),
            'description': $('#description').val()
        }
        // POST Ajax
        $.ajax({
            type: "POST",
            url: "/games/post",
            data: gameData,
            dataType: "JSON",
            success: function (response) {
                $('#successMes').append(
                    '<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">\
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>\
                        <div>\
                        '+response.message+'\
                        </div>\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>'
                );
                getLatestGame();
                $('#createModal').modal('hide');
                $('#game_name').val("");
                $('#description').val("");
            }
        });
    });

    $(document).on('click', '#editBtn',function () {
        let id = $(this).val();
        $('#disabledID').val(id);

        $.ajax({
        type: "GET",
        url: "/games/get-one-game/"+id,
        success: function (response) {
                $('#editGame_name').val(response.game.game_name)
                $('#editDescription').val(response.game.description)
            }
        });
    });
    $(document).on('click', '#update',function () {
        let id = $('#disabledID').val();
        let gameData = {
            'game_name': $('#editGame_name').val(),
            'description': $('#editDescription').val()
        }
        $.ajax({
            type: "PATCH",
            url: "/games/patch/"+id,
            data: gameData,
            dataType: "json",
            success: function (response) {
                $('#name_'+id).text(response.game.game_name);
                $('#des_'+id).text(response.game.description);
                $('#successMes').append(
                    '<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">\
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>\
                        <div>\
                        '+response.successMessage+'\
                        </div>\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>'
                );
                $('#editModal').modal('hide');
            }
        });
    });

    $(document).on('click','#deleteBtn', function () {
        let id = $(this).val();

        $.ajax({
            type: "DELETE",
            url: "games/delete/"+id,
            success: function (response) {
                // console.log(response.message);
                $('#successMes').append(
                    '<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">\
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>\
                        <div>\
                        '+response.message+'\
                        </div>\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>'
                );
                $('#row_'+id).empty();
            }
        });
    });
});