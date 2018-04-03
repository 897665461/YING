<script>
// 全选
function allPick() {
    $("[type=checkbox]:checkbox").each(function() {
        this.checked = true;
    })
}
//
全不选
function unAllPick() {
    $("[type=checkbox]:checkbox").each(function() {
        this.checked = false;
    })
}
//
反转
function inverserPick() {
    $("[type=checkbox]:checkbox").each(function() {
        this.checked = !this.checked;
    })
}
</script>