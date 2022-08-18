<div class="btn-group btn-group-sm">
    @can('banks-update')
        <a href="{{ route('admin.banks.edit', $model->id) }}" class="btn btn-success">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('banks-delete')
        <a href="{{ route('admin.banks.destroy', $model->id) }}" class="btn btn-danger confirm-delete">
            <i class="fas fa-trash"></i>
        </a>
    @endcan
</div>
