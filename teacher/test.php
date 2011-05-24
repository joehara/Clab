<html>
<head>
<script type="text/javascript">
function check()
  {
  document.getElementById("check1").value=1
  }
function uncheck()
  {
  document.getElementById("check1").value=0
  }
</script>
</head>
<body>

<form>
<input type="text" id="check1" />Do you like summer?
</form>

<button onclick="check()">Check Checkbox</button>
<button onclick="uncheck()">Uncheck Checkbox</button>

</body>
</html> 