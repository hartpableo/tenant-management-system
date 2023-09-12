window.addEventListener('load', () => {
  removeAlerts(document.querySelectorAll('.alert'));
}, {passive: true})

// remove alert after x seconds
function removeAlerts(alerts) {
  if (alerts.length) {
    for (let i = 0; i < alerts.length; i++) {
      alerts[i].style.animationDelay = `${([i] * 800) + 1000}ms`;
      alerts[i].classList.add('fadeout');
      setTimeout(() => {
        alerts[i].remove();
      }, 2600 + (500 * [i]));
    }
  }
}