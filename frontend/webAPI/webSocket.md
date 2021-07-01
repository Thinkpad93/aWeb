---
webSocket
---

```js
var client = AgoraRTC.createClient({mode: 'live', codec: "h264"});

client.init(<APPID>, function () {
    console.log("AgoraRTC client initialized");
}, function (err) {
    console.log("AgoraRTC client init failed", err);
});
```
