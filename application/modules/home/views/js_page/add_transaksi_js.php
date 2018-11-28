<script>
    // alert("test");
    // function openPopUpWindow(){
    function openPopUpWindow(targetField, targetField2){
        var w = window.open('<?php echo base_url() . "/index.php/home/barang"; ?>','_blank','width=600,height=800,scrollbars=1');
        // pass the targetField to the pop up window
        w.targetField = targetField;
        w.targetField2 = targetField2;
        w.focus();
    }

    // this function is called by the pop up window
    function setSearchResult(targetField, targetField2, returnValue, returnValue2){
        targetField.value = returnValue;
        targetField2.value = returnValue2;
        window.focus();
    }
</script>

