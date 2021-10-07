<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $checklist->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Task Name</th>
                        <th>Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($checklist->tasks->whereNull('user_id') as $task)
                        <tr data-widget="expandable-table" aria-expanded="false">

                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <input type="checkbox" wire:click="completed_task({{ $task->id }})"
                                       @if(in_array($task->id , $completed_tasks)) checked="checked"  @endif />
                            </td>
                            <td>{{ $task->name }}</td>

                            <td>{{ $task->created_at->diffForHumans() }}</td>

                        </tr>
                        <tr class="expandable-body d-none">
                            <td colspan="5">
                                <p style="display: none;">
                                    {!! $task->description !!}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    div

</div>

