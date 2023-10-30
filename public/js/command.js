const toggleSwitch = document.getElementById("onoff");
const ws = new WebSocket("ws://localhost:3000");

toggleSwitch.addEventListener("change", () => {
    const lampStatus = toggleSwitch.checked ? "1" : "0";
    ws.send(lampStatus);
});
