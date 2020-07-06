<script>
function up(){
    var hr = new XMLHttpRequest();
    var url = "user_data.php";
    var date=new Date();
    var screen_width=screen.width;
    var screen_height=screen.height;
    var vars = "date="+date+"&screen_height="+screen_height+"&screen_width="+screen_width;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.send(vars);
}
</script>