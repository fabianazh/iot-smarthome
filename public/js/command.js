$(document).ready(function () {
    const toggleSwitch = $("#onoff");
    const ws = new WebSocket("ws://localhost:3000");

    toggleSwitch.on("change", function () {
        const lampStatus = toggleSwitch.prop("checked") ? "1" : "0";
        ws.send(lampStatus);
    });
});
