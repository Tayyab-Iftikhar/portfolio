<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card shadow-lg my-4 border-0">
                <div class="card-header bg-white pb-3">
                    <h3>Task Details</h3>
                </div>
                <div class="card-body px-5 bg-white rounded">
                    <div class="card-body bg-white rounded col-md-12 shadow mb-3">
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Task Name:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $task->task_name }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Task Type:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $task->taskType->type_name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-auto p-0">
                                <h5 class="ms-3">Task Description:</h5>
                            </div>
                            <div class="col">
                                <p class="m-0 p-0">{{ $task->task_description }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Project Name:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $task->project->project_name }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Created By:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $task->createdBy->name }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <h5 class="px-2 m-0">Assigned To:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $assignedTask->assignedTo->name }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Deadline:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $task->task_deadline }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>