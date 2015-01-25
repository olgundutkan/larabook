@forelse($subjects as $subject)
    @include ('subjects.partials.subject')
@empty
    <p>This user hasn't yet posted a subject.</p>
@endforelse