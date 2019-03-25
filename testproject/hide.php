<html>
<head>
<title>(Type a title for your page here)</title>


<script language="JavaScript">
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
</script>

</head>
<body >
<input type="radio" name=type value='Show Layer' name="ff" onclick="setVisibility('sub3', 'inline');";>
<input type="radio"  name=type value='Hide Layer' name="ff" onclick="setVisibility('sub3', 'none');";>
<div id="sub3">Message Box</div>
</body>
</html>