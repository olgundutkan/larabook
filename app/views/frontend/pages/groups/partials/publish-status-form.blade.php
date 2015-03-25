@include('frontend.layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => ['group_statuses_path', $group->id]]) }}
        <!-- Status Form Input -->
        <div class="form-group">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "What's on your mind?"]) }}
        </div>

        <div class="form-group status-post-submit">
            {{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
            <div class="popover-markup"> 
			    <a href="#" class="trigger btn btn-default btn-xs" style="margin-right:15px;">Post and Share</a> 
			    <div class="head hide">Share With</div>
			    <div class="content hide">
			        <div class="form-group">
			            {{ Form::checkbox('share["twitter"]', true, false ) }} Twitter
			        </div>
			        <div class="form-group">
			            {{ Form::checkbox('share["facebook"]', true, false ) }} Facebook
			        </div>
			        {{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
			    </div>
			</div>
        </div>
    {{ Form::close() }}
</div>

@section('script')
	<script type="text/javascript">
        jQuery(document).ready(function($) {
        	$('.popover-markup>.trigger').popover({
			    html: true,
			    title: function () {
			        return $(this).parent().find('.head').html();
			    },
			    content: function () {
			        return $(this).parent().find('.content').html();
			    }
			});
        });	
    </script>
@stop