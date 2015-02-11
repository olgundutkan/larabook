@forelse($statuses as $status)
    @include ('groups.partials.status')
@empty
    <p>This user hasn't yet posted a status.</p>
@endforelse