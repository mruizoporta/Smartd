$(document).ready(function() {

    $('#bootbox-plantilla-h-form').on('click', function(){
        bootbox.dialog({
            title: "Orden de trabajo.",
            message:'<div class="row"> ' + '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' + '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Plantilla</label> ' +                   
                    '<label class="form-radio form-icon demo-modal-radio active"><input type="radio" autocomplete="off" name="awesomeness" value="Really awesome" checked> Really awesome</label>' +
                    '<label class="form-radio form-icon demo-modal-radio"><input type="radio" autocomplete="off" name="awesomeness" value="Super awesome"> Super awesome </label> </div>' +
                    '</div> </div>' + '</form> </div> </div><script></script>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-purple",
                    callback: function() {
                        var name = $('#name').val();
                        var answer = $("input[name='awesomeness']:checked").val();

                        $.niftyNoty({
                            type: 'purple',
                            icon : 'fa fa-check',
                            message : "Hello " + name + ".<br> You've chosen <strong>" + answer + "</strong>",
                            container : 'floating',
                            timer : 4000
                        });
                    }
                }
            }
        });

        $(".demo-modal-radio").niftyCheck();
    });


 })