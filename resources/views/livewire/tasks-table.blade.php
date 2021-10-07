<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 15px">sort</th>
        <th style="width: 10px">#</th>
        <th>Task Name</th>

        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)

        <tr>
            <td>
                @if($task->position > 1)
                    <a wire:click.prevent="task_up({{ $task->id }})" href="#">
                        &uarr;
                    </a>
                @endif
                @if($task->position < $tasks->max('position'))
                    <a wire:click.prevent="task_down({{ $task->id }})" href="#">
                        &darr;
                    </a>
                @endif

            </td>
            <td>{{$loop->iteration}}</td>
            <td>{{$task->name}}</td>

            <td>
                <a class="btn btn-sm btn-primary mr-2"
                   href="{{ route('admin.checklists.tasks.edit', [$checklist , $task]) }}">Edit </a>
                <form style="display: inline-block"
                      action="{{ route('admin.checklists.tasks.destroy', [$checklist , $task]) }}"
                      method="POST">
                    <div class="row ">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger " type="submit"
                                onclick="return confirm('Are you sure you want to Delete this group')">Delete
                        </button>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

