<?php
echo "
<script>
document.oncontextmenu = function(){
    return false;
}
document.onselectstart = function(){
    return false;
}
document.oncopy = function(){
    return false;
}
</script>
";
?>