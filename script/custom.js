$(document).ready(function () {
  $("#signup").click(function () {
    $("#main").load("signup.php");
  });
  $("#login").click(function () {
    $("#main").load("./includes/login.php");
  });
  $("#cancel_index").click(function () {
    $("#main").load("ask.php");
  });
});