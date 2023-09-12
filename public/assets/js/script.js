window.addEventListener('load', () => {
  removeAlerts(document.querySelectorAll('.alert'));
}, {passive: true})

// remove alert after x seconds
function removeAlerts(alerts) {
  if (alerts.length) {
    alerts.forEach(alert => {
      setTimeout(() => {
        alert.remove();
      }, 2500);
    });
  }
}