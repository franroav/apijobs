<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center" style="color:#2b4491">INSTRUCCIONS FOR THE API REST</h2>
                        <p class="card-text">The purpose of this api. it's to save as many jobs in a file or database and allow for hundreds or even thousands of job submitters and job processors to add and update jobs on the queue simultaneously.
                            This api should read, read only, create, update and delete data from job, job submitters(clients), job processor.

                            <ul>
                                <li><strong>1.</strong> <a href="install">Install</a></li>
                                <li><strong>2.</strong> <a href="instructions">Instructions to use</a></li>
                                <li><strong>3.</strong> <a href="testing">Testing</a></li>
                            </ul>
                            

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr />
<section class="mt-2 ml-2 mr-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Title-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h2>JOBS </h2>
                        </div>
                    </div>
                </div>
                <!--Table-->
                <table class="table table-sm table-responsive table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Url</th>
                            <th scope="col">Method</th>
                            <th scope="col">Header</th>
                            <th scope="col">Body (raw) Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><a href="http://localhost/apijobs/api/jobs/read.php">
                                    <p>http://localhost/apijobs/api/jobs/read.php</p>
                                </a></td>
                            <td>READ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="http://localhost/apijobs/api/jobs/read_only.php?id_job=2">
                                    <p>http://localhost/apijobs/api/jobs/read_only.php?id_job=2</p>
                                </a></td>
                            <td>READ ONLY</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="http://localhost/apijobs/api/jobs/create.php">
                                    <p>http://localhost/apijobs/api/jobs/create.php</p>
                                </a></td>
                            <td>CREATE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_client":"1",
                                "id_job_processor": "3",
                                "title":"Hidraulica",
                                "description":"Especicaciones tecnicas y hojas de datos",
                                "last_date":"2020-03-07 19:50:32"
                                }
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><a href="http://localhost/apijobs/api/jobs/update.php">
                                    <p>http://localhost/apijobs/api/jobs/update.php</p>
                                </a></td>
                            <td>UPDATE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_job":"1",
                                "id_client":"1",
                                "id_job_processor":"1",
                                "title":"Hidraulica",
                                "description":"Recambio bomba sumidero",
                                "last_date":"2020-03-07 14:20:32"
                                }</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><a href="http://localhost/apijobs/api/jobs/delete.php">
                                    <p>http://localhost/apijobs/api/jobs/delete.php</p>
                                </a></td>
                            <td>DELETE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_job":"1"
                                }</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<hr />
<section class="mt-2 ml-2 mr-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Title-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h2>CLIENTS </h2>
                        </div>
                    </div>
                </div>
                <!--Table-->
                <table class="table table-sm table-responsive table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Url</th>
                            <th scope="col">Method</th>
                            <th scope="col">Header</th>
                            <th scope="col">Body (raw) Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><a href="http://localhost/apijobs/api/clients/read.php">
                                    <p>http://localhost/apijobs/api/clients/read.php</p>
                                </a></td>
                            <td>READ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="http://localhost/apijobs/api/clients/read_only.php?id_client=3">
                                    <p>http://localhost/apijobs/api/clients/read_only.php?id_client=3</p>
                                </a></td>
                            <td>READ ONLY</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="http://localhost/apijobs/api/clients/create.php">
                                    <p>http://localhost/apijobs/api/clients/create.php</p>
                                </a></td>
                            <td>CREATE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "name":"Christian",
                                "lastname":"Peralta",
                                "phone":"+56924156789",
                                "mail":"c.peralta@gmail.com"
                                }

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><a href="http://localhost/apijobs/api/clients/update.php">
                                    <p>http://localhost/apijobs/api/clients/update.php</p>
                                </a></td>
                            <td>UPDATE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_client":"3",
                                "name":"Rodrigo",
                                "lastname":"Varas Couchot",
                                "phone":"+56912549638",
                                "mail":"r.varas@gmail.com"
                                }
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><a href="http://localhost/apijobs/api/clients/delete.php">
                                    <p>http://localhost/apijobs/api/clients/delete.php</p>
                                </a></td>
                            <td>DELETE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_client":"3"
                                }
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<hr />
<section class="mt-2 ml-2 mr-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Title-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h2>JOB PROCESSOR </h2>
                        </div>
                    </div>
                </div>
                <!--Table-->
                <table class="table table-sm table-responsive table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Url</th>
                            <th scope="col">Method</th>
                            <th scope="col">Header</th>
                            <th scope="col">Body (raw) Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><a href="http://localhost/apijobs/api/jobs_processor/read.php">
                                    <p>http://localhost/apijobs/api/jobs_processor/read.php</p>
                                </a></td>
                            <td>READ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="http://localhost/apijobs/api/jobs_processor/read_only.php?id_processor=1">
                                    <p>http://localhost/apijobs/api/jobs_processor/read_only.php?id_processor=1</p>
                                </a></td>
                            <td>READ ONLY</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="http://localhost/apijobs/api/jobs_processor/create.php">
                                    <p>http://localhost/apijobs/api/jobs_processor/create.php</p>
                                </a></td>
                            <td>CREATE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_job_processor": "7",
                                "priority_level":"7",
                                "priority":"None"
                                }
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><a href="http://localhost/apijobs/api/jobs_processor/update.php">
                                    <p>http://localhost/apijobs/api/jobs_processor/update.php</p>
                                </a></td>
                            <td>UPDATE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_processor":"1",
                                "id_job_processor":"0",
                                "priority_level":"0",
                                "priority":"1st Priority"
                                }

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><a href="http://localhost/apijobs/api/jobs_processor/delete.php">
                                    <p>http://localhost/apijobs/api/jobs_processor/delete.php</p>
                                </a></td>
                            <td>DELETE</td>
                            <td>Content-type: application/json</td>
                            <td>{
                                "id_client":"3"
                                }

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
