<div class="btn-group" role="group" aria-label="">
    <button type="button" class="btn btn-outline-primary"
            style="padding: 1px">
        <a href="{{ route('classes.show', $id) }}" class="edit btn btn-success">
            <i class="bi bi-eye-fill"></i>
        </a>
    </button>
    <button type="button" class="btn btn-outline-primary"
            style="padding: 1px">
        <a href="{{ route('classes.edit.show', $id) }}" class="edit btn btn-primary">
            <i class="bi bi-pencil-fill"></i>
        </a>
    </button>

    <button type="button" class="btn btn-outline-primary"
            onclick="deleteFunc({{ $id }})"
            style="padding: 1px">
        <a href="javascript:void(0)" class="delete btn btn-danger">
            <i class="bi bi-trash-fill"></i>
        </a>
    </button>

</div>
