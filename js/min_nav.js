function expandMenu() {
  var d = document.getElementsByClassName('sidebar')[0];
  if (d.className == 'sidebar') {
    d.className += ' expanded';
  } else {
    d.className = 'sidebar';
  }
}
