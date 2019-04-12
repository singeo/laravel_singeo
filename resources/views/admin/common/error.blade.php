<script type="text/javascript">
$(function () {
    var errorHtml = '' ;
    @foreach($errors->all() as $mess)
        errorHtml += '<div class="text-danger">{{ $mess }}</div>' ;
    @endforeach
    if(errorHtml != ''){
        // swal('',$errorHtml,'error');
        $.myModal.alert({content:errorHtml,btn:true}) ;
    }
});
</script>