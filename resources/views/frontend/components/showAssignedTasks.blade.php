<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card shadow-lg my-4 border-0">
                <div class="card-header bg-white pb-3">
                    <h3>Your Tasks</h3>
                </div>
                <div class="card-body px-5 bg-white rounded">
                    @foreach ($tasks as $task)
                        <div class="card-body bg-white rounded col-md-12 shadow mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="px-2 m-0">Task Name:</h5>
                                    </div>
                                    <div>
                                        <p class="m-0">{{ $task->task_name }}</p>
                                    </div>
                                </div>
                                <div><a href="{{ route('frontend.showAssignedTaskDetails', $task->id) }}"
                                        class="btn btn-primary">See
                                        Details</a></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div>
                                    <h5 class="px-2 m-0">Task Type:</h5>
                                </div>
                                <div>
                                    <p class="m-0">{{ $task->taskType->type_name }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="px-2 m-0">Deadline:</h5>
                                </div>
                                <div>
                                    <p class="m-0">{{ $task->task_deadline }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>