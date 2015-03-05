@extends('admin.layouts.default')

@section('content')
<div class="row">
<div class="col-lg-12">
    <h1 class="page-header">Groups</h1>
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
                            <a href="{{ route('groups.edit', $group->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ route('groups.destroy', $group->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
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
</div>
@stop