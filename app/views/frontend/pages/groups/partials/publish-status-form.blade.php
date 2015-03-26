@include('frontend.layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => ['group_statuses_path', $group->id], 'id' => 'information']) }}
        <!-- Status Form Input -->
        <div class="form-group">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "What's on your mind?"]) }}
        </div>

        <div class="form-group status-post-submit">
            {{ Form::submit('Inform', ['class' => 'btn btn-default btn-xs']) }}
            <div class="popover-markup"> 
			    <a href="javascript:void(0);" class="trigger btn btn-default btn-xs" style="margin-right:15px;" data-html="true">Inform and Share</a> 
			    <div class="head hide">Share With</div>
			    <div class="content hide" style="width: 150px;">
			        <div class="form-group">
			            {{ Form::checkbox('share["twitter"]', true, false ) }} Twitter
			        </div>
			        <div class="form-group">
			            {{ Form::checkbox('share["facebook"]', true, false ) }} Facebook
			        </div>
			        {{ Form::submit('Inform', ['id' =>'share-and-inform', 'class' => 'btn btn-default btn-xs']) }}
			    </div>
			</div>
        </div>
    {{ Form::close() }}
</div>

@section('script')
	<script type="text/javascript">
        jQuery(document).ready(function($) {
        	$('#share-and-inform').css('background-color', 'red');
        	$('.popover-markup>.trigger').popover({
			    html: true,
			    title: function () {
			        return $(this).parent().find('.head').html();
			    },
			    content: function () {
			        return $(this).parent().find('.content').html();
			    },
			    container: 'body'
			});
        });	
    </script>
@stop