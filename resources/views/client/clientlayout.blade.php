@include('client.includes.header_topbar')
@include('client.includes.main_left_menu')
@yield('content')
<script>
        $('.changeStatus').change(function(){
            var v = $(this).val();
            var fid = $(this).attr('form_id');
            var url = "{{route('changeAppStatus')}}";
            $.get(url,{status: v, form_id: fid},function(data){
                if(data.error == false)
                {
                    
                    alert('Application Status Updated.');
                    location.reload();
                }
                else
                {
                    alert('Error occurred in changing the application status try again.');
                }
            },'json');
        });
        </script>
@include('client.includes.footer_model')

