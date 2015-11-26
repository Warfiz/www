function expandMenu() {
  var d = document.getElementsByTagName('sidebar')[0];
  if (d.className == 'sidebar') {
    d.className += ' expanded';
  } else {
    d.className = 'sidebar';
  }
}
