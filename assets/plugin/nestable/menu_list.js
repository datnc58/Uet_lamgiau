$(document).ready(function () {
    var base_url = $("#base_url").val();
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
            url: base_url+"uetadmin/menu/savelist",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });
    };
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output-main')));

    /*begin show_menu*/
                            // activate Nestable for list top

                            $('#nestable_top').nestable({

                                group: 1

                            }).on('change', updateOutput);

                            // output initial serialised data top

                            updateOutput($('#nestable_top').data('output', $('#nestable-output-top')));

                            // activate Nestable for list left

                            $('#nestable_left').nestable({

                                group: 1

                            }).on('change', updateOutput);

                            // output initial serialised data left

                            updateOutput($('#nestable_left').data('output', $('#nestable-output-left')));

                            // activate Nestable for list right

                            $('#nestable_right').nestable({

                                group: 1

                            }).on('change', updateOutput);

                            // output initial serialised data right

                            updateOutput($('#nestable_right').data('output', $('#nestable-output-right')));

                            // activate Nestable for list bottom

                            $('#nestable_bottom').nestable({

                                group: 1

                            }).on('change', updateOutput);

                            // output initial serialised data bottom

                            updateOutput($('#nestable_bottom').data('output', $('#nestable-output-bottom')));

                            // activate Nestable for list tag

                            $('#nestable_tag').nestable({

                                group: 1

                            }).on('change', updateOutput);

                            // output initial serialised data tag

                            updateOutput($('#nestable_tag').data('output', $('#nestable-output-tag')));
/*end show_menu*/
});

function active_tab(id) {
	$.ajax({
		url: "<?php echo site_url('admin/menu/active_tab'); ?>",
		type: 'POST',
		dataType: 'json',
		data: {id:id},
		success: function (msg) {

		}
	});
}