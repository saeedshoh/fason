require('./bootstrap');

$('body').on('click', '.add-attribute', function(){
    var btn = $(this);
    $.get('getAttributes', function(data) {
        $('.append-div').append(data.attributes);
        // data.forEach(element => {
        //     $('#attribute').append(`<option value='${element['id']}'>${element['name']}</option>`);
        // });
        // $('#attribute').prop('hidden', false);
        // $('.attribute').show();
    });
});