<div class="panel-body status-body">
@forelse($statuses as $status)
	@include ('frontend.pages.groups.partials.status')
@empty
    <p>This user hasn't yet posted a status.</p>
@endforelse
</div>