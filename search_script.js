/** LIVE SEARCH
 * This file contains Javascript functions that perform AJAX requests to server
 */

$(document).ready(function () {
    $("#live_search").keyup(function () {
        $('#search_static').css('display', 'none');
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: 'ajax-live-search.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');

                    // $("#live_search").focusout(function () {
                    //     $('#search_result').css('display', 'none');
                    // });
                    // $("#live_search").focusin(function () {
                    //     $('#search_result').css('display', 'block');
                    // });
                }
            });
        } else {
            $('#search_result').css('display', 'none');
        }
    });

});

function searchHandler () {
    var query = $("#live_search").val();
    if (query != "") {
        $.ajax({
            url: 'static-search.php',
            method: 'POST',
            data: {
                query: query
            },
            success: function (data) {
                $('#search_static').html(data);
                $('#search_static').css('display', 'block');

                
                $('#search_result').css('display', 'none');
                // $("#live_search").focusin(function () {
                //     $('#search_result').css('display', 'block');
                // });
            }
        });
    } else {
        $('#search_static').css('display', 'none');
    }
}