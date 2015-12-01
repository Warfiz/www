<?php
  $conn = mysqli_connect( 'localhost', 'web-client', 'web-client2k15', 'meatmarket' );  

  if ( !$conn ) {
    die( 'Could not connect: ' . mysqli_connect_error() );
  }
?>
