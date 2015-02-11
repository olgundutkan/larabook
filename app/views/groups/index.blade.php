@extends('layouts.default')

@section('content')
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($groups as $group)
                    <tr>
                        <td>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }}</td>
                        <td>{{ e($group->created_at) }}</td>
                        <td>{{ e($group->updated_at) }}</td>
                        <td>
                            @if($currentUser->inGroup($group->id))
                                <a href="{{ route('quit_the_group_path', $group->id) }}" data-method="post" data-confirm=""><i class="fa fa-minus-square-o"></i> Quit</a>
                            @else
                                <a href="{{ route('join_the_group_path', $group->id) }}" data-method="post" data-confirm=""><i class="fa fa-plus-square-o"></i> Join</a>
                            @endif
                            @if($currentUser->isOwner($group->id))
                                <a href="{{ route('groups.edit', $group->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('groups.destroy', $group->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">No group found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop