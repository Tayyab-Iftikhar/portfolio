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
                                <p class="m-0">{{ $tasks->task_name }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Task Type:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $tasks->taskType->type_name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-auto p-0">
                                <h5 class="ms-3">Task Description:</h5>
                            </div>
                            <div class="col">
                                <p class="m-0 p-0">{{ $tasks->task_description }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Project Name:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $tasks->project->project_name }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Deadline:</h5>
                            </div>
                            <div>
                                <p class="m-0">{{ $tasks->task_deadline }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mb-4">
                                <a href="#" onclick="getTime()" id="getCurrentTime" class="btn btn-primary">Start
                                    Task</a>
                            </div>
                            <div class="ms-2">
                                <a href="#" onclick="getEndTime()" id="getEndTime" class="btn btn-danger">End Task</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="px-2 m-0">Time Taken:</h5>
                            </div>
                            <div>
                                <p class="m-0" id="timeTaken"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getTime() {
        let start = new Date().getMinutes();

        fetch('/task/start', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                start_time: start
            })
        })
            .then(res => {
                document.getElementById("getCurrentTime").disabled = true;
            })
            .catch(err => {
                console.log("Start error:", err);
            });
    }

    function getEndTime() {
        let end = new Date().getMinutes();

        fetch('/task/end', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                end_time: end
            })
        })
            .then(res => res.json())
            .then(data => {
                document.getElementById("timeTaken").innerText = data.time_taken;
                document.getElementById("getEndTime").disabled = true;
            })
            .catch(error => {
                console.log("End error:", error);
            });
    }
</script>