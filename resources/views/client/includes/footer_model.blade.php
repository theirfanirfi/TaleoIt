<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">

<div class="modal-dialog">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">×</button>
           <h3>Settings</h3>
       </div>
       <div class="modal-body">
           <p>Here settings can be configured...</p>
       </div>
       <div class="modal-footer">
           <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
           <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
       </div>
   </div>
</div>
</div>

<footer class="row">
<p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="" target="_blank">Irfan Irfi</a> 2018 - 2020</p>

<p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
       href="">TaleoIt</a></p>
</footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- library for cookie management -->
<script src="{{URL::asset('js/jquery.cookie.js') }}"></script>
<!-- calender plugin -->
<script src="{{URL::asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<!-- data table plugin -->
<script src="{{URL::asset('js/jquery.dataTables.min.js') }}"></script>

<!-- select or dropdown enhancer -->
<script src="{{URL::asset('bower_components/chosen/chosen.jquery.min.js') }}"></script>
<!-- plugin for gallery image view -->
<script src="{{URL::asset('bower_components/colorbox/jquery.colorbox-min.js') }}"></script>
<!-- notification plugin -->
<script src="{{URL::asset('js/jquery.noty.js') }}"></script>
<!-- library for making tables responsive -->
<script src="{{URL::asset('bower_components/responsive-tables/responsive-tables.js') }}"></script>
<!-- tour plugin -->
<script src="{{URL::asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
<!-- star rating plugin -->
<script src="{{URL::asset('js/jquery.raty.min.js') }}"></script>
<!-- for iOS style toggle switch -->
<script src="{{URL::asset('js/jquery.iphone.toggle.js') }}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{URL::asset('js/jquery.autogrow-textarea.js') }}"></script>
<!-- multiple file upload plugin -->
<script src="{{URL::asset('js/jquery.uploadify-3.1.min.js') }}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{URL::asset('js/jquery.history.js') }}"></script>
<!-- application script for Charisma demo -->
<script src="{{URL::asset('js/charisma.js') }}"></script>

@if(Session('error'))
<script>
    
noty({"text":"{{Session('error')}}","layout":"center","type":"error"});

    </script>
@endif

@if(Session('success'))
<script>
    
noty({"text":"{{Session('success')}}","layout":"top","type":"success"});

    </script>
@endif

<script>
        function checkNotification()
        {
            var url = "{{route('checkNotification')}}";
            $.get(url,function(data){
                if(data > 0){
                $('#notification').html(data);
                }
            });
        }
        setInterval(checkNotification,3000);
        </script>

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
</body>
</html>
