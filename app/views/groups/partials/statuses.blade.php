@forelse($statuses as $status)
	<div class="panel-body status-body">
    	@include ('groups.partials.status')
   	</div>
@empty
    <p>This user hasn't yet posted a status.</p>
@endforelse