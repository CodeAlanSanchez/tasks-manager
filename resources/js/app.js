import "./bootstrap";

$(function () {
    let from = -1;

    $(".tasks").sortable({
        opacity: 0.5,
        tolerance: "pointer",
        start: function (_, ui) {
            from = ui.item.index() + 1;
        },
        update: function (_, ui) {
            $.ajax({
                url: "/tasks/priority",
                contentType: "application/json",
                data: JSON.stringify({
                    to: ui.item.index() + 1,
                    from: from,
                }),
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
            });
        },
    });
});
