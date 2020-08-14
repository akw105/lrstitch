<div  class="row">
    <div class="form-group col">    
        <input type="text" class="form-controller" id="search" name="search" placeholder="Search by number..."/>
    </div>
    <div class="form-group col">
        <select class="form-controller" id="category" name="category">
            <option default value="null">Filter by colour</option>
            <option value="white">White</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
            <option value="grey">Grey</option>
            <option value="purple">Purple</option>
            <option value="pink">Pink</option>
        </select>
    </div>
</div>


<script type="text/javascript">
jQuery( document ).ready(function($) {
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    $('#search').on('keyup',function(){
        $value=$(this).val();
        if($value.length != 0){
            $('table').addClass('searched');
        }
        else{
            $('table').removeClass('searched');
        }
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    });
    
    $('#category').on('change',function(){
        $value=$(this).val();
        if($value.length != null){
            $.ajax({
                type : 'get',
                url : '{{URL::to('categorysearch')}}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        }
        else{
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        }

    });
});



</script>