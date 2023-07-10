<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4>Courses</h4>
                            </div>
                            <div class="col-6 text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                    Add Course
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered m-0" id="table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                                <!-- <tr>
                                    <td>1</td>
                                    <td>Prog</td>
                                    <td>4 Months</td>
                                    <td>Date</td>
                                    <td>Date</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            Delete
                                        </button>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>

                        <div class="alert alert-danger m-0 d-none" id="alert-msg"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once('./partials/modals.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        showCourses();

        const addFormElement = document.getElementById('add-form');
        const errorAddElement = document.getElementById('error-add');
        const successAddElement = document.getElementById('success-add');
        const alertMsgElement = document.getElementById('alert-msg');
        const tableElement = document.getElementById('table');
        const tBodyElement = document.getElementById('tbody');

        addFormElement.addEventListener('submit', function(e) {
            e.preventDefault();

            const nameAddElement = document.getElementById('name-add');
            const durationAddElement = document.getElementById('duration-add');

            let nameAddValue = nameAddElement.value;
            let durationAddValue = durationAddElement.value;

            errorAddElement.innerText = "";
            nameAddElement.classList.remove('is-invalid');
            durationAddElement.classList.remove('is-invalid');

            if (nameAddValue == "") {
                errorAddElement.innerText = "Enter course name!";
                nameAddElement.classList.add('is-invalid');
            } else if (durationAddValue == "") {
                errorAddElement.innerText = "Enter course duration!";
                durationAddElement.classList.add('is-invalid');
            } else {
                const data = {
                    name: nameAddValue,
                    duration: durationAddValue,
                    submit: 1
                };

                fetch('./add-course.php', {
                        method: 'POST',
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application.json'
                        }
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        if (result.nameError) {
                            errorAddElement.innerText = result.nameError;
                            nameAddElement.classList.add('is-invalid');
                        } else if (result.durationError) {
                            errorAddElement.innerText = result.durationError;
                            durationAddElement.classList.add('is-invalid');
                        } else if (result.success) {
                            successAddElement.innerText = result.success;
                            addFormElement.reset();
                            showCourses();
                            // alertMsgElement.classList.toggle('d-none');
                        } else if (result.failure) {
                            errorAddElement.innerText = result.failure;
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            }
        });

        function showCourses() {
            fetch('./show-courses.php')
                .then(function(response) {
                    return response.json();
                })
                .then(function(result) {
                    if (result.empty) {
                        alertMsgElement.classList.toggle('d-none');
                        alertMsgElement.innerText = result.empty;
                    } else {
                        // tableElement.classList.toggle('d-none');
                        let records = '';
                        let sr = 1;
                        result.forEach(function(value, index) {
                            records += `<tr>
                                    <td>${sr++}</td>
                                    <td>${value.name}</td>
                                    <td>${value.duration}</td>
                                    <td>${value.created_at}</td>
                                    <td>${value.updated_at}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            Delete
                                        </button>
                                    </td>
                                </tr>`;
                        });

                        tBodyElement.innerHTML = records;
                    }
                })
                .catch(function(error) {
                    console.log(error);
                })
        }
    </script>

</body>

</html>