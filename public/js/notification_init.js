function showNotification() {
  const notification = new Notification("Status pesanan kamu telah diupdate!", {
    body: "Status transaksi yang terbaru telah diupdate!",
    icon: "/img/WarungIn.png",
  });
}

function checkNotification() {
  if (Notification.permission === "granted") {
    showNotification();
  } else if (Notification.permission !== "denied") {
    Notification.requestPermission().then((permission) => {
      if (permission === "granted") {
        showNotification();
      }
    });
  }
}
