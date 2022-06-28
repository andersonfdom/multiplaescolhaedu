<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
jQuery(document).ready(function( $ ){  
    var sel = document.getElementById('fld_3074495_1');
  
    for (i = sel.length - 1; i >= 0; i--) {
        if(sel[i].value.includes('unidade') == false){
           sel.remove(i);           
        }
    }
  
    var sel2 = document.getElementById('fld_2994162_1');
    
  for (i = sel2.length - 1; i >= 0; i--) {
        if(sel2[i].value.includes('unidade') == true){
           sel2.remove(i);           
        }
    }
});
</script>
<!-- end Simple Custom CSS and JS -->
