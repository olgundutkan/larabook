@if($currentUser->isOwner($group->id))
    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit</a>
    <a href="{{ route('groups.destroy', $group->id) }}" class="btn btn-default" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
@else
    @if($currentUser->inGroup($group->id))
        <a href="{{ route('quit_the_group_path', $group->id) }}" data-method="post" class="btn btn-danger"><i class="fa fa-minus-square-o"></i> Quit</a>
    @else
        <a href="{{ route('join_the_group_path', $group->id) }}" data-method="post" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Join</a>
    @endif
@endif