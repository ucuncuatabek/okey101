$(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
    });

    $('#addPoints').validate({
        errorClass:   'has-error',
        errorElement: 'span',
        errorClass:   'help-block',
        highlight:    function(element) {
            $(element)
            .closest('.form-group')
            .addClass('has-error');
        },
        unhighlight: function(element) {
            $(element)
            .closest('.form-group')
            .removeClass('has-error');
        },
    });

    $(document).on('click', '.save-point', function() {
        $siblings     = $(this).siblings();

        var $input    = $($siblings[0]).prop('disabled', 'disabled');
        var id        = $input.attr('id');
        var new_point = $input.val();
        var old_point = $input.data('val');

        // aktif maçlarda geçmiş puanı değiştirdikten sonra kayıt tuşuna
        // basınca matchup editpoint fonksiyonu çağırılıyor
        if (old_point != new_point) {
            $.post('/matchup/editPoint', {'point': new_point,'id': id}, function (data) {
                alert('Kayıt başarılı.');
            }).fail(function(data) {
                alert('Puan girilmesi zorunludur');
                $input.val(old_point);
            });

            $(this).toggle();
            $($siblings[1]).toggle();
        }
    });

    $(document).on('click', '.edit-point', function() { // aktif maçlarda kişinin geçmiş skorlarından kalem tuşuna basılan input enabled oluyor
        $(this).toggle().siblings('.input-group-addon').toggle();
        $(this).siblings('input').removeAttr('disabled');
    });

    $(document).on('focusin', 'input.prev-point', function(){
        $(this).data('val', $(this).val());
    });

    $(document).on('click', '.additionals', function() {
        $($(this).attr('data-target')).slideToggle();
        $(this).toggleClass('btn-primary btn-success');
        var text = $(this).text();
        var data_text = $(this).attr('data-toggletext');
        $(this).text(data_text);
        $(this).attr('data-toggletext', text)
    });

    $('.collapse-member').on('show.bs.collapse', function() {
        $(this).parent('.panel-warning').find('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
    }).on('hide.bs.collapse', function() {
        $(this).parent('.panel-warning').find('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
    });

    $(document).on('click', '.change-penalty', function() {
        if ($(this).hasClass('decrement')) {
            if ($($(this).attr('data-field')).val() != 0) {
                $($(this).attr('data-field')).val(parseInt($($(this).attr('data-field')).val()) - 1);
            }
        } else {
            $($(this).attr('data-field')).val(parseInt($($(this).attr('data-field')).val()) + 1);
        }
    });

});
