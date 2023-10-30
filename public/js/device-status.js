$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $(".remote-button").click(function () {
        var id = $(this).data("device-id");
        var action = $(this).data("action");

        if (action === "on") {
            turnOn(id);
        } else if (action === "off") {
            turnOff(id);
        }
    });

    function turnOn(id) {
        $.ajax({
            url: "/device/on",
            method: "POST",
            data: { id: id, status: "On" },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                console.log(response.success);
                // location.reload();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseJSON);
            },
        });
    }

    function turnOff(id) {
        $.ajax({
            url: "/device/off",
            method: "POST",
            data: { id: id, status: "Off" },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                console.log(response.success);
                // location.reload();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseJSON);
            },
        });
    }
});
