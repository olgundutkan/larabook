@forelse($statuses as $status)
    @include ('frontend.pages.statuses.partials.status')
@empty
    <p>This user hasn't yet posted a status.</p>
@endforelse