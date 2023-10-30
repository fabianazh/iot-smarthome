import http from "http";
import { WebSocketServer } from "ws";
import { SerialPort } from "serialport";

const server = http.createServer();
const wss = new WebSocketServer({ server });
const port = new SerialPort({ path: "COM3", baudRate: 9600 });

wss.on("connection", (ws) => {
    console.log("Client connected");
    ws.on("message", (message) => {
        console.log(`Received: ${message}`);
        port.write(`${message}`);
    });
    ws.on("close", () => {
        console.log("Client disconnected");
    });
});

server.listen(3000, () => {
    console.log("Server is running on port 3000");
});
